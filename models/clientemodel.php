<?php

class ClienteModel extends Model{

    public function __construct(){
        parent::__construct();
    }


    public function get(){
        $items=[];
        try{
            $query=$this->db->connect()->query('SELECT * FROM cliente');

            while($row=$query->fetch()){
                $item=new Cliente();
                $item->id_cliente=$row['Id_Cliente'];
                $item->nombre=$row['Nombre'];
                $item->apellido_paterno=$row['Apellido_Paterno'];
                $item->apellido_materno=$row['Apellido_Materno'];
                $item->tipo_documento=$row['Tipo_Documento'];
                $item->numero_documento=$row['Num_Documento'];
                $item->email=$row['Email'];
                $item->telefono=$row['Telefono'];
                $item->fecha_registro=$row['Fecha_Registro'];
                $item->observacion=$row['Observaciones'];
                array_push($items,$item);
            }

            return $items;
        }catch(PDOException $ex){
            print_r('Error_Connection: ' . $ex->getMessage());
            return [];
        }

    }

    public function getById($id){
        $item=new Cliente();
        try{
            $query=$this->db->connect()->prepare('SELECT * FROM cliente where Id_Cliente=:id');
            $query->execute(['id'=>$id]);
            while($row=$query->fetch()){
                $item->id_cliente=$row['Id_Cliente'];
                $item->nombre=$row['Nombre'];
                $item->apellido_paterno=$row['Apellido_Paterno'];
                $item->apellido_materno=$row['Apellido_Materno'];
                $item->tipo_documento=$row['Tipo_Documento'];
                $item->numero_documento=$row['Num_Documento'];
                $item->email=$row['Email'];
                $item->telefono=$row['Telefono'];
                $item->fecha_registro=$row['Fecha_Registro'];
                $item->observacion=$row['Observaciones'];
            }
            return $item;
        }catch(PDOException $ex){
            print_r('Error_Connection: ' . $ex->getMessage());
            return [];
        }

    }

    //insertar cliente en la base datos
    public function insert($datos){
        try{
            $query=$this->db->connect()->prepare('INSERT INTO cliente(Nombre,Apellido_Paterno,Apellido_Materno,Tipo_Documento,Num_Documento,Email,Telefono,Observaciones,Fecha_Registro)
            values(:nombre,:apellido_paterno,:apellido_materno,:tipo_documento,:num_documento,:email,:telefono,:observacion,:fecha_registro)');
            $query->execute([
              'nombre'=>$datos['Nombre'],
              'apellido_paterno'=>$datos['Apellido_Paterno'],
              'apellido_materno'=>$datos['Apellido_Materno'],
              'tipo_documento'=>$datos['Tipo_Documento'],
              'num_documento'=>$datos['Num_Documento'],
              'email'=>$datos['Email'],
              'telefono'=>$datos['Telefono'],
              'observacion'=>$datos['Observacion'],
              'fecha_registro'=>$datos['Fecha_Registro']
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
            $query=$this->db->connect()->prepare('UPDATE cliente set
            Nombre=:nombre,
            Apellido_Paterno=:apellido_paterno,
            Apellido_Materno=:apellido_materno,
            Tipo_Documento=:tipo_documento,
            Num_Documento=:num_documento,
            Email=:email,
            Telefono=:telefono,
            Observaciones=:observacion
            WHERE Id_Cliente=:id_cliente'
            );
            $query->execute([
                'id_cliente'=>$datos['Id_Cliente'],
                'nombre'=>$datos['Nombre'],
                'apellido_paterno'=>$datos['Apellido_Paterno'],
                'apellido_materno'=>$datos['Apellido_Materno'],
                'tipo_documento'=>$datos['Tipo_Documento'],
                'num_documento'=>$datos['Num_Documento'],
                'email'=>$datos['Email'],
                'telefono'=>$datos['Telefono'],
                'observacion'=>$datos['Observacion']
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
            $query=$this->db->connect()->prepare('DELETE FROM cliente
            WHERE Id_Cliente=:id_cliente'
            );
            $query->execute([
                'id_cliente'=>$datos['Id_Cliente']
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
