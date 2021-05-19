<?php

//hereda la cadena de conexion
class Categoria extends Conectar{

//funcion rest para acceder a la informacion
    public function get_categoria(){
        $conectar = parent::Conexion();
        parent::set_names();
        //clausula que trae todos los articulos activos 
        $sql= "SELECT * FROM categorias WHERE estado =1" ;
        $sql=$conectar->prepare($sql);
        $sql->execute();
        //retorna todo lo que contenga la clausula sin enumerar 
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);


    }



    //consumir la informacion por id    
    public function get_categoria_id($id){
        $conectar = parent::Conexion();
        parent::set_names();
        //clausula que trae todos los articulos activos o con id solicitado 
        $sql= "SELECT * FROM categorias WHERE estado =1 and id= ?" ;
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $id);
        $sql->execute();
        //retorna todo lo que contenga la clausula sin enumerar 
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);

    }


    public function insertar_categoria($nombre, $observacion){
        $conectar = parent::Conexion();
        parent::set_names();
        //clausula que trae todos los articulos activos o con id solicitado 
        $sql= "INSERT INTO categorias (id,nombre,observacion, estado) VALUES (NULL, '', '', '1');" ;
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $nombre);
        $sql->bindValue(2, $observacion);


        $sql->execute();
        //retorna todo lo que contenga la clausula sin enumerar 
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);

    }



    
    public function update_categoria($id,$nombre,$observacion){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="UPDATE categorias set
            nombre = ?,
            observacion = ?
            WHERE
            id = ?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $nombre);
        $sql->bindValue(2, $observacion);
        $sql->bindValue(3, $id);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function delete_categoria($id){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="UPDATE categorias set
            estado = '0'
            WHERE
            id = ?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $id);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }









}



?>






