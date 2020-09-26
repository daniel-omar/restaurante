<?php
require_once "models/tipo_personal.php";

class Personal extends Controller{
    function __construct()
    {
        parent::__construct();
        $this->view->mensaje="";
        // echo "<p>Nuevo controlador main</p>";
    }
    function render(){
      $personal=$this->model->get();
      $this->view->datos=$personal;
      $this->view->render('personal/index');
    }

    function nuevo(){
      $tipo_personal=$this->model->getTipoPersonal();
      $this->view->datos=$tipo_personal;
      $this->view->render('personal/crear');
    }

    function verPersonal($param){
      $idPersonal=$param[0];
      $personal=$this->model->getById($idPersonal);

      session_start();
      $_SESSION['id_personal']=$idPersonal;
      $this->view->personal=$personal;

      $tipo_personal=$this->model->getTipoPersonal();
      $this->view->datos=$tipo_personal;

      $this->view->render('personal/editar');
    }

    function registrarPersonal(){
        $nombre=$_POST['txtNombre'];
        $apellido_Paterno=$_POST['txtApellidoPaterno'];
        $apellido_Materno=$_POST['txtApellidoMaterno'];
        $tipo_documento=$_POST['cboDocumento'];
        $numero_documento=$_POST['txtNumDocumento'];
        $email=$_POST['txtEmail'];
        $telefono=$_POST['txtTelefono'];
        $id_tipo_personal=$_POST['cboPersonal'];
        $fecha_registro=date("Y-m-d H:i:s");
        $fecha_modificacion=date("Y-m-d H:i:s");
        $estado=true;
        $mensaje="";

        if($this->model->insert(
            [
              'nombre'=>$nombre,
              'apellido_paterno'=>$apellido_Paterno,
              'apellido_materno'=>$apellido_Materno,
              'tipo_documento'=>$tipo_documento,
              'num_documento'=>$numero_documento,
              'email'=>$email,
              'telefono'=>$telefono,
              'fecha_registro'=>$fecha_registro,
              'fecha_modificacion'=>$fecha_modificacion,
              'estado'=>$estado,
              'id_tipo_personal'=>$id_tipo_personal
            ]
        )){

            $mensaje="Personal registrado correctamente";
        }else{
            $mensaje="Hubo un inconveniente al registrar el personal";
        }

        $this->view->mensaje=$mensaje;

        $this->render();
    }

    function actualizarPersonal(){
        session_start();
        $id_personal=$_SESSION['id_personal'];
        $nombre=$_POST['txtNombre'];
        $apellido_Paterno=$_POST['txtApellidoPaterno'];
        $apellido_Materno=$_POST['txtApellidoMaterno'];
        $tipo_documento=$_POST['cboDocumento'];
        $numero_documento=$_POST['txtNumDocumento'];
        $email=$_POST['txtEmail'];
        $telefono=$_POST['txtTelefono'];
        $id_tipo_personal=$_POST['cboPersonal'];
        $fecha_modificacion=date("Y-m-d H:i:s");
        $estado=true;

        $mensaje="";

        unset($_SESSION['id_personal']);

        if($this->model->update(
            [
                'id_personal'=>$id_personal,
                'nombre'=>$nombre,
                'apellido_paterno'=>$apellido_Paterno,
                'apellido_materno'=>$apellido_Materno,
                'tipo_documento'=>$tipo_documento,
                'num_documento'=>$numero_documento,
                'email'=>$email,
                'telefono'=>$telefono,
                'fecha_modificacion'=>$fecha_modificacion,
                'estado'=>$estado,
                'id_tipo_personal'=>$id_tipo_personal
            ]
        )){
            $mensaje="Personal actualizado correctamente";
        }else{
            $mensaje="Hubo un inconveniente al actualizar el personal";
        }

        $this->view->mensaje=$mensaje;
        // $this->render();
        header('Location: '.constant('URL').'personal');
    }

    function eliminarPersonal($param){

        $id_personal=$param[0];

        $mensaje;

        if($this->model->delete(
            [
                'id_personal'=>$id_personal
            ]
        )){
            $mensaje=[
              'mensaje'=>"Personal eliminado correctamente",
              'value'=>true
            ];
        }else{
          $mensaje=[
            'mensaje'=>"Hubo un inconveniente al eliminar el personal",
            'value'=>true
          ];
        }
        echo json_encode($mensaje);
        // $this->view->mensaje=$mensaje;
        // $this->render();
    }


}

?>
