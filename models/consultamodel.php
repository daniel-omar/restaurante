<?php
include_once 'models/alumno.php';
class ConsultaModel extends Model{

    public function __construct(){
        parent::__construct();
    }

    //insertar tecnico en la base datos
    public function get(){
        $items=[];
        try{
            $query=$this->db->connect()->query('SELECT * FROM alumnos');
            
            while($row=$query->fetch()){
                $item=new Alumno();
                $item->nombre=$row['Nombre'];
                $item->apellidos=$row['Apellidos'];
                $item->direccion=$row['Direccion'];
                $item->edad=$row['Edad'];
                $item->ciclo=$row['Ciclo'];
                $item->email=$row['Email'];
                $item->estado=$row['Estado'];
                array_push($items,$item);
            }

            return $items;
        }catch(PDOException $ex){
            print_r('Error_Connection: ' . $ex->getMessage());
            return [];
        }
       
        // echo "Insertar datos";

    }
}   

?>