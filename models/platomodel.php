<?php

class PlatoModel extends Model{

    public function __construct(){
        parent::__construct();
    }


    public function get(){
        $items=[];
        try{
            $query=$this->db->connect()->query('SELECT * FROM plato');

            while($row=$query->fetch()){
                $item=new Plato();
                $item->id_plato=$row['Id_Plato'];
                $item->descripcion=$row['Descripcion'];
                $item->precio=$row['Precio'];
                $item->stock=$row['Stock'];
                $item->fecha_registro=$row['Fecha_Registro'];
                $item->id_usuario_registro=$row['Id_Usuario_Registro'];
                $item->fecha_modificacion=$row['Fecha_Modificacion'];
                $item->id_usuario_modificacion=$row['Id_Usuario_Modificacion'];
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
        $item=new Plato();
        try{
            $query=$this->db->connect()->prepare('SELECT * FROM plato where Id_Plato=:id');
            $query->execute(['id'=>$id]);
            while($row=$query->fetch()){
              $item->id_plato=$row['Id_Plato'];
              $item->descripcion=$row['Descripcion'];
              $item->precio=$row['Precio'];
              $item->stock=$row['Stock'];
              $item->fecha_registro=$row['Fecha_Registro'];
              $item->id_usuario_registro=$row['Id_Usuario_Registro'];
              $item->fecha_modificacion=$row['Fecha_Modificacion'];
              $item->id_usuario_modificacion=$row['Id_Usuario_Modificacion'];
              $item->estado=$row['Estado'];
            }
            return $item;
        }catch(PDOException $ex){
            print_r('Error_Connection: ' . $ex->getMessage());
            return [];
        }

    }

    //insertar plato en la base datos
    public function insert($datos){
        try{
            $query=$this->db->connect()->prepare('INSERT INTO plato(Descripcion,Precio,Stock,Fecha_Registro,Id_Usuario_Registro,Fecha_Modificacion,Id_Usuario_Modificacion,Estado)
            values(:descripcion,:precio,:stock,:fecha_registro,:id_usuario_registro,:fecha_modificacion,:id_usuario_modificacion,:estado)');
            $query->execute([
                'descripcion'=>$datos['descripcion'],
                'precio'=>$datos['precio'],
                'stock'=>$datos['stock'],
                'fecha_registro'=>$datos['fecha_registro'],
                'id_usuario_registro'=>$datos['id_usuario_registro'],
                'fecha_modificacion'=>$datos['fecha_modificacion'],
                'id_usuario_modificacion'=>$datos['id_usuario_modificacion'],
                'estado'=>$datos['estado']
            ]);
            return true;
        }catch(Exception $ex){
            print_r('Error_Connection: ' . $ex->getMessage());
            return false;
        }

        // echo "Insertar datos";

    }

    //actualizar plato en la base datos
    public function update($datos){
        try{
            $query=$this->db->connect()->prepare('UPDATE plato set
            Descripcion=:descripcion,
            Precio=:precio,
            Stock=:stock,
            Fecha_Modificacion=:fecha_modificacion,
            Id_Usuario_Modificacion=:id_usuario_modificacion,
            Estado=:estado
            WHERE Id_Plato=:id_plato');
            $query->execute([
                'id_plato'=>$datos['id_plato'],
                'descripcion'=>$datos['descripcion'],
                'precio'=>$datos['precio'],
                'stock'=>$datos['stock'],
                'fecha_modificacion'=>$datos['fecha_modificacion'],
                'id_usuario_modificacion'=>$datos['id_usuario_modificacion'],
                'estado'=>$datos['estado']
            ]);
            return true;
        }catch(Exception $ex){
            print_r('Error_Connection: ' . $ex->getMessage());
            return false;
        }

    }
    //eliminar plato
    public function delete($datos){
        try{
            $query=$this->db->connect()->prepare('DELETE FROM plato
            WHERE Id_Plato=:id_plato'
            );
            $query->execute([
                'id_plato'=>$datos['id_plato']
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
