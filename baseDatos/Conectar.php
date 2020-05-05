<?php 
Class Connection{
    //Credenciales de usuario para conectarse a la base de datos bdcliente
    private $servidor = "mysql:host=localhost;dbname=bdcliente";
    private $usuarioBD = "root"; //nombre de usuario para conectarse a MySQL
    private $claveBD = ""; //clave para conectarse a MySQL
    private $options  = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,);   
    
    protected $conn; //    $conn es la variable en donde se va a almacenar la conexión con MySQL
     
     //Función para conectarse a la base de datos
    public function conectarBD(){
         try{
             $this->conn = new PDO($this->servidor, $this->usuarioBD, $this->claveBD, $this->options);
             return $this->conn;
         }
         catch (PDOException $e){
             echo "OcurriÃ³ un problema con la conexiÃ³n: " . $e->getMessage();
         }
   
    }
   
   //Función para desconectarse de la base de datos
    public function cerrarBD(){
           $this->conn = null;
     }
   
   }