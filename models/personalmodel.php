<?php
include_once 'models/tipo_personal.php';
class PersonalModel extends Model{

    public function __construct(){
        parent::__construct();
    }


    public function get(){
        $items=[];
        try{
            $query=$this->db->connect()->query('SELECT p.*,tp.Descripcion FROM personal p
              inner join tipo_personal tp on tp.Id_Tipo_Personal=p.Id_Tipo_Personal
            ');
            while($row=$query->fetch()){
                $item=new Personal();
                $item->id_personal=$row['Id_Personal'];
                $item->nombre=$row['Nombre'];
                $item->apellido_paterno=$row['Apellido_Paterno'];
                $item->apellido_materno=$row['Apellido_Materno'];
                $item->tipo_documento=$row['Tipo_Documento'];
                $item->numero_documento=$row['Num_Documento'];
                $item->id_tipo_personal=$row['Id_Tipo_Personal'];
                $item->tipo_personal=new Tipo_Personal();
                $item->tipo_personal->descripcion=$row['Descripcion'];
                $item->fecha_ingreso=$row['Fecha_Ingreso'];
                $item->fecha_modificacion=$row['Fecha_Modificacion'];
                $item->email=$row['Email'];
                $item->telefono=$row['Telefono'];
                $item->estado=$row['Estado'];
                array_push($items,$item);
            }

            return $items;
        }catch(PDOException $ex){
            print_r('Error_Connection: ' . $ex->getMessage());
            return [];
        }

    }

    public function getTipoPersonal(){
        $items=[];
        try{
            $query=$this->db->connect()->query('SELECT * FROM tipo_personal');
            while($row=$query->fetch()){
                $item=new Tipo_Personal();
                $item->id_tipo_personal=$row['Id_Tipo_Personal'];
                $item->descripcion=$row['Descripcion'];
                $item->estado=$row['Estado'];
                array_push($items,$item);
            }

            return $items;
        }catch(PDOException $ex){
            print_r('Error_Connection: ' . $ex->getMessage());
            return [];
        }

    }

    public function getById($id){
        $item=new Personal();
        try{
            $query=$this->db->connect()->prepare('SELECT p.*,tp.Descripcion FROM personal p
              inner join tipo_personal tp on tp.Id_Tipo_Personal=p.Id_Tipo_Personal
              where p.Id_Personal=:id');
            $query->execute(['id'=>$id]);
            while($row=$query->fetch()){
              $item->id_personal=$row['Id_Personal'];
              $item->nombre=$row['Nombre'];
              $item->apellido_paterno=$row['Apellido_Paterno'];
              $item->apellido_materno=$row['Apellido_Materno'];
              $item->tipo_documento=$row['Tipo_Documento'];
              $item->numero_documento=$row['Num_Documento'];
              $item->id_tipo_personal=$row['Id_Tipo_Personal'];
              $item->tipo_personal=new Tipo_Personal();
              $item->tipo_personal->descripcion=$row['Descripcion'];
              $item->fecha_ingreso=$row['Fecha_Ingreso'];
              $item->fecha_modificacion=$row['Fecha_Modificacion'];
              $item->email=$row['Email'];
              $item->telefono=$row['Telefono'];
              $item->estado=$row['Estado'];
            }
            return $item;
        }catch(PDOException $ex){
            print_r('Error_Connection: ' . $ex->getMessage());
            return [];
        }

    }

    //insertar tecnico en la base datos
    public function insert($datos){
        try{
            $query=$this->db->connect()->prepare('INSERT INTO personal(Nombre,Apellido_Paterno,Apellido_Materno,Tipo_Documento,Num_Documento,Id_Tipo_Personal,Email,Telefono,Fecha_Ingreso,Fecha_Modificacion,Estado)
            values(:nombre,:apellido_paterno,:apellido_materno,:tipo_documento,:num_documento,:id_tipo_personal,:email,:telefono,:fecha_ingreso,:fecha_modificacion,:estado)');
            $query->execute([
                'nombre'=>$datos['nombre'],
                'apellido_paterno'=>$datos['apellido_paterno'],
                'apellido_materno'=>$datos['apellido_materno'],
                'tipo_documento'=>$datos['tipo_documento'],
                'num_documento'=>$datos['num_documento'],
                'id_tipo_personal'=>$datos['id_tipo_personal'],
                'email'=>$datos['email'],
                'telefono'=>$datos['telefono'],
                'fecha_ingreso'=>$datos['fecha_registro'],
                'fecha_modificacion'=>$datos['fecha_modificacion'],
                'estado'=>$datos['estado']
            ]);
            return true;
        }catch(Exception $ex){
            print_r('Error_Connection: ' . $ex->getMessage());
            return false;
        }

        // echo "Insertar datos";
    }

    //actualizar datos del cliente
    public function update($datos){
        try{
            $query=$this->db->connect()->prepare('UPDATE personal set
            Nombre=:nombre,
            Apellido_Paterno=:apellido_paterno,
            Apellido_Materno=:apellido_materno,
            Tipo_Documento=:tipo_documento,
            Num_Documento=:num_documento,
            Email=:email,
            Telefono=:telefono,
            Fecha_Modificacion=:fecha_modificacion,
            Id_Tipo_Personal=:id_tipo_personal
            WHERE Id_Personal=:id_personal'
            );
            $query->execute([
                'id_personal'=>$datos['id_personal'],
                'nombre'=>$datos['nombre'],
                'apellido_paterno'=>$datos['apellido_paterno'],
                'apellido_materno'=>$datos['apellido_materno'],
                'tipo_documento'=>$datos['tipo_documento'],
                'num_documento'=>$datos['num_documento'],
                'email'=>$datos['email'],
                'telefono'=>$datos['telefono'],
                'fecha_modificacion'=>$datos['fecha_modificacion'],
                'id_tipo_personal'=>$datos['id_tipo_personal']
            ]);
            return true;
        }catch(Exception $ex){
            print_r('Error_Connection: ' . $ex->getMessage());
            return false;
        }
        // echo "Insertar datos";
    }

    //eliminar datos del cliente
    public function delete($datos){
        try{
            $query=$this->db->connect()->prepare('DELETE FROM personal
            WHERE Id_Personal=:id_personal'
            );
            $query->execute([
                'id_personal'=>$datos['id_personal']
            ]);
            return true;
        }catch(Exception $ex){
            print_r('Error_Connection: ' . $ex->getMessage());
            return false;
        }
        // echo "Insertar datos";
    }
}

?>
