<?php

/*
 * Acceso a datos con BD Usuarios : 
 * Usando la librería PDO *******************
 * Uso el Patrón Singleton :Un único objeto para la clase
 * Constructor privado, y métodos estáticos 
 */
class AccesoDatos {
    
    private static $modelo = null;
    private $dbh = null;
    
    public static function getModelo(){
        if (self::$modelo == null){
            self::$modelo = new AccesoDatos();
        }
        return self::$modelo;
    }
    
    

   // Constructor privado  Patron singleton
   
    private function __construct(){
        try {
            $dsn = "mysql:host=".DB_SERVER.";dbname=".DATABASE.";charset=utf8";
            $this->dbh = new PDO($dsn,DB_USER,DB_PASSWD);
            $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e){
            echo "Error de conexión ".$e->getMessage();
            exit();
        }  

    }

    // Cierro la conexión anulando todos los objectos relacioanado con la conexión PDO (stmt)
    public static function closeModelo(){
        if (self::$modelo != null){
            $obj = self::$modelo;
            // Cierro la base de datos
            $obj->dbh = null;
            self::$modelo = null; // Borro el objeto.
        }
    }

    
      
    // SELECT Devuelvo un usuario o false
    public function getUsu (int $email) {
        $usu = false;
        $stmt_usu   = $this->dbh->prepare("select * from usuario where email=:email");
        $stmt_usu->setFetchMode(PDO::FETCH_CLASS, 'usuario');
        $stmt_usu->bindParam(':email', $email);
        if ( $stmt_usu->execute() ){
             if ( $obj = $stmt_usu->fetch()){
                $cli= $obj;
            }
        }
        return $usu;
    }


/*
    // UPDATE USUARIO
    public function modUsu($usu):bool{
      
        $stmt_moduser   = $this->dbh->prepare("update Clientes set first_name=:first_name,last_name=:last_name".
        ",email=:email,gender=:gender, ip_address=:ip_address,telefono=:telefono WHERE id=:id");
        $stmt_moduser->bindValue(':first_name', $usu->first_name);
        $stmt_moduser->bindValue(':last_name'   ,$usu->last_name);
        $stmt_moduser->bindValue(':email'       ,$usu->email);
        $stmt_moduser->bindValue(':gender'      ,$usu->gender);
        $stmt_moduser->bindValue(':ip_address'  ,$usu->ip_address);
        $stmt_moduser->bindValue(':telefono'    ,$usu->telefono);
        $stmt_moduser->bindValue(':id'          ,$usu->id);

        $stmt_moduser->execute();
        $resu = ($stmt_moduser->rowCount () == 1);
        return $resu;
    }
*/

    //INSERT USUARIO
    public function insertUsu($usu):bool{
       
        // El id se define automáticamente por autoincremento.
        $stmt_crearcli  = $this->dbh->prepare(
            "INSERT INTO `usuario`( `email`, `nombre`, `apellidos`, `nick`, `contrasena`, `intereses`)".
            "Values(?,?,?,?,?,?)");
        $stmt_crearcli->bindValue(1,$usu->email);
        $stmt_crearcli->bindValue(2,$usu->nombre);
        $stmt_crearcli->bindValue(3,$usu->apellidos);
        $stmt_crearcli->bindValue(4,$usu->nick);
        $stmt_crearcli->bindValue(5,$usu->contrasena);
        $stmt_crearcli->bindValue(6,$usu->intereses);    
        $stmt_crearcli->execute();
        $resu = ($stmt_crearcli->rowCount () == 1);
        return $resu;
    }

    //INSERT REFUGIO
    public function insertRefugio($refugio):bool{
       
        // El id se define automáticamente por autoincremento.
        $stmt_crearcli  = $this->dbh->prepare(
            "INSERT INTO `usuario`( `email`, `nombre`, `apellidos`, `nick`, `contrasena`, `intereses`)".
            "Values(?,?,?,?,?,?)");
        $stmt_crearcli->bindValue(1,$refugio->email);
        $stmt_crearcli->bindValue(2,$refugio->nombre);
        $stmt_crearcli->bindValue(3,$refugio->apellidos);
        $stmt_crearcli->bindValue(4,$refugio->nick);
        $stmt_crearcli->bindValue(5,$refugio->contrasena);
        $stmt_crearcli->bindValue(6,$refugio->intereses);    
        $stmt_crearcli->execute();
        $resu = ($stmt_crearcli->rowCount () == 1);
        return $resu;
    }
   
    //DELETE 
    public function borrarCliente(int $id):bool {


        $stmt_boruser   = $this->dbh->prepare("delete from Clientes where id =:id");

        $stmt_boruser->bindValue(':id', $id);
        $stmt_boruser->execute();
        $resu = ($stmt_boruser->rowCount () == 1);
        return $resu;
        
    }   
    
    
     // Evito que se pueda clonar el objeto. (SINGLETON)
    public function __clone()
    { 
        trigger_error('La clonación no permitida', E_USER_ERROR); 
    }

    
}
