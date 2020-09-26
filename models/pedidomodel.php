<?php

require 'models/cliente.php';
require 'models/mesa.php';
require 'models/personal.php';

class PedidoModel extends Model{

    public function __construct(){
        parent::__construct();
    }


    public function get(){
        $items=[];
        try{
            $query=$this->db->connect()->query('SELECT p.Id_Pedido,c.Id_Cliente,c.Nombre Nombre_Cliente,c.Apellido_Paterno ApellidoP_Cliente,c.Apellido_Materno ApellidoM_Cliente
              ,m.Cod_Mesa,ps.Nombre Nombre_Camarero,ps.Apellido_Paterno ApellidoP_Camarero,ps.Apellido_Materno ApellidoM_Cliente,p.Fecha_Registro
              FROM pedido p
              inner join cliente c on c.Id_Cliente=p.Id_Cliente
              inner join mesa m on m.Id_Mesa=p.id_mesa
              inner join personal ps on ps.Id_Personal=p.Id_Camarero
            ');

            while($row=$query->fetch()){
                $item=new Pedido();
                $item->id_pedido=$row['Id_pedido'];
                $item->id_cliente=$row['Id_Cliente'];
                $item->cliente=new CLiente();
                $item->cliente->nombre=$row['Nombre_Cliente'];
                $item->cliente->apellido_paterno=$row['ApellidoP_Cliente'];
                $item->cliente->apellido_materno=$row['ApellidoM_Cliente'];
                $item->id_mesa=$row['Id_Mesa'];
                $item->mesa=new Mesa();
                $item->mesa->cod_mesa=$row['Cod_Mesa'];
                $item->id_camarero=$row['Id_Camarero'];
                $item->personal->nombre=$row['Nombre_Camarero'];
                $item->personal->apellido_paterno=$row['ApellidoP_Camarero'];
                $item->personal->apellido_materno=$row['ApellidoM_Cliente'];
                $item->fecha_registro=$row['Fecha_Registro'];
                array_push($items,$item);
            }

            return $items;
        }catch(PDOException $ex){
            print_r('Error_Connection: ' . $ex->getMessage());
            return [];
        }

    }

    public function getById($id){
        $item=new Pedido();
        try{
            $query=$this->db->connect()->prepare('SELECT * FROM pedido where Id_Pedido=:id');
            $query->execute(['id'=>$id]);
            while($row=$query->fetch()){
              $item->id_pedido=$row['Id_pedido'];
              $item->id_cliente=$row['Id_Cliente'];
              $item->id_mesa=$row['Id_Mesa'];
              $item->id_camarero=$row['Id_Camarero'];
              $item->fecha_registro=$row['Fecha_Registro'];
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
            $query=$this->db->connect()->prepare('INSERT INTO pedido(Id_Cliente,Id_Mesa,Id_Camarero,Fecha_Registro)
            values(:id_cliente,:id_mesa,:id_camarero,:fecha_registro)');
            $query->execute([
                'id_cliente'=>$datos['id_cliente'],
                'id_mesa'=>$datos['id_mesa'],
                'id_camarero'=>$datos['id_camarero'],
                'fecha_registro'=>$datos['fecha_registro']
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
