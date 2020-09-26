<?php

class MesaModel extends Model{

    public function __construct(){
        parent::__construct();
    }


    public function get(){
        $items=[];
        try{
            $query=$this->db->connect()->query('SELECT * FROM mesa');

            while($row=$query->fetch()){
                $item=new Mesa();
                $item->cod_mesa=$row['Cod_Mesa'];
                $item->id_mesa=$row['Id_Mesa'];
                $item->cantidad=$row['Cantidad'];
                $item->ubicacion=$row['Ubicacion'];
                $item->fecha_modificacion=$row['Fecha_Modificacion'];
                $item->fecha_registro=$row['Fecha_Registro'];
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
        $item=new Mesa();
        try{
            $query=$this->db->connect()->prepare('SELECT * FROM mesa where Id_Mesa=:id');
            $query->execute(['id'=>$id]);
            while($row=$query->fetch()){
                $item->cod_mesa=$row['Cod_Mesa'];
                $item->id_mesa=$row['Id_Mesa'];
                $item->cantidad=$row['Cantidad'];
                $item->ubicacion=$row['Ubicacion'];
                $item->fecha_modificacion=$row['Fecha_Modificacion'];
                $item->fecha_registro=$row['Fecha_Registro'];
                $item->estado=$row['Estado'];
            }
            return $item;
        }catch(PDOException $ex){
            print_r('Error_Connection: ' . $ex->getMessage());
            return [];
        }

    }

    //insertar mesa en la base datos
    public function insert($datos){
        try{
            $query=$this->db->connect()->prepare('INSERT INTO mesa(Cod_Mesa,Cantidad,Ubicacion,Fecha_Registro,Fecha_Modificacion,Estado)
             values(:cod_mesa,:cantidad,:ubicacion,:fecha_registro,:fecha_modificacion,:estado)');
            $query->execute([
                'cod_mesa'=>$datos['cod_mesa'],
                'cantidad'=>$datos['cantidad'],
                'ubicacion'=>$datos['ubicacion'],
                'fecha_registro'=>$datos['fecha_registro'],
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

    //actualizar datos de mesa
    public function update($datos){
        try{
            $query=$this->db->connect()->prepare('UPDATE mesa set
            Cantidad=:cantidad,
            Ubicacion=:ubicacion,
            Fecha_Modificacion=:fecha_modificacion
            WHERE Id_Mesa=:id_mesa'
            );
            $query->execute([
                'id_mesa'=>$datos['id_mesa'],
                'cantidad'=>$datos['cantidad'],
                'ubicacion'=>$datos['ubicacion'],
                'fecha_modificacion'=>$datos['fecha_modificacion']
            ]);
            return true;
        }catch(Exception $ex){
            print_r('Error_Connection: ' . $ex->getMessage());
            return false;
        }
        // echo "Insertar datos";
    }

    //eliminar datos de mesa
    public function delete($datos){
        try{
            $query=$this->db->connect()->prepare('DELETE FROM mesa
            WHERE Id_Mesa=:id_mesa'
            );
            $query->execute([
                'id_mesa'=>$datos['id_mesa']
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
