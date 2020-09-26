<?php

class Cliente extends Controller{
    function __construct()
    {
        parent::__construct();
        $this->view->mensaje="";
        // echo "<p>Nuevo controlador main</p>";
    }
    function render(){
      $cliente=$this->model->get();
      $this->view->datos=$cliente;
      $this->view->render('cliente/index');
    }

    function nuevo(){
      $this->view->render('cliente/crear');
    }

    function verCliente($param){
      $idCliente=$param[0];
      $cliente=$this->model->getById($idCliente);

      session_start();
      $_SESSION['id_cliente']=$idCliente;

      $this->view->cliente=$cliente;
      // var_dump($this->view->cliente);
      $this->view->render('cliente/editar');
    }

    function registrarCliente(){
        $nombre=$_POST['txtNombre'];
        $apellido_Paterno=$_POST['txtApellidoPaterno'];
        $apellido_Materno=$_POST['txtApellidoMaterno'];
        $tipo_documento=$_POST['cboDocumento'];
        $numero_documento=$_POST['txtNumDocumento'];
        $email=$_POST['txtEmail'];
        $telefono=$_POST['txtTelefono'];
        $observacion=$_POST['txtObservacion'];
        $fecha_registro=date("Y-m-d H:i:s");

        $mensaje="";

        if($this->model->insert(
            [
                'Nombre'=>$nombre,
                'Apellido_Paterno'=>$apellido_Paterno,
                'Apellido_Materno'=>$apellido_Materno,
                'Tipo_Documento'=>$tipo_documento,
                'Num_Documento'=>$numero_documento,
                'Email'=>$email,
                'Telefono'=>$telefono,
                'Fecha_Registro'=>$fecha_registro,
                'Observacion'=>$observacion
            ]
        )){
            $mensaje="Alumno registrado correctamente";
        }else{
            $mensaje="Hubo un inconveniente al registrar el alumno";
        }

        $this->view->mensaje=$mensaje;
        header('Location: '.constant('URL').'cliente');
        // $this->render();
    }

    function actualizarCliente(){
        session_start();
        $id_cliente=$_SESSION['id_cliente'];
        $nombre=$_POST['txtNombre'];
        $apellido_Paterno=$_POST['txtApellidoPaterno'];
        $apellido_Materno=$_POST['txtApellidoMaterno'];
        $tipo_documento=$_POST['cboDocumento'];
        $numero_documento=$_POST['txtNumDocumento'];
        $email=$_POST['txtEmail'];
        $telefono=$_POST['txtTelefono'];
        $observacion=$_POST['txtObservacion'];
        $fecha_registro=date("Y-m-d H:i:s");

        $mensaje="";

        unset($_SESSION['id_cliente']);

        if($this->model->update(
            [
                'Id_Cliente'=>$id_cliente,
                'Nombre'=>$nombre,
                'Apellido_Paterno'=>$apellido_Paterno,
                'Apellido_Materno'=>$apellido_Materno,
                'Tipo_Documento'=>$tipo_documento,
                'Num_Documento'=>$numero_documento,
                'Email'=>$email,
                'Telefono'=>$telefono,
                'Observacion'=>$observacion
            ]
        )){
            $mensaje="Alumno registrado correctamente";
        }else{
            $mensaje="Hubo un inconveniente al actualizar el cliente";
        }

        $this->view->mensaje=$mensaje;
        header('Location: '.constant('URL').'cliente');
    }

    function eliminarCliente($param){

        $id_cliente=$param[0];

        $mensaje;

        if($this->model->delete(
            [
                'Id_Cliente'=>$id_cliente
            ]
        )){
            $mensaje=[
              'mensaje'=>"Cliente eliminado correctamente",
              'value'=>true
            ];
        }else{
          $mensaje=[
            'mensaje'=>"Hubo un inconveniente al eliminar el cliente",
            'value'=>true
          ];
        }
        echo json_encode($mensaje);
        // $this->view->mensaje=$mensaje;
        // $this->render();
    }
}

?>
