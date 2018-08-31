<?php
  /**
   *
   */
   include("Config.php");
  class Core {
      protected $db;
      protected $result;
      private $rows;

      public function __construct(){

        $this->db= new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
            // Check connection
            if ($this->db->connect_error) {
                die("Connection failed: " .mysqli_connect_error());
            }

      }

      public function query($sql){
        $this->result=$this->db->query($sql);

      }
      public function rows(){
        for($x=1; $x<= $this->db->affected_rows; $x++){
          $this->rows[]=$this->result->fetch_assoc();
        }
        return $this->rows;
      }

  }

?>
