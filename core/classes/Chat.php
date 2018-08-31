<?php
/**
 *
 */
// $namedb="mario_P";

class Chat extends Core{

  public function fetchMessages(){
    $this->query("
      SELECT      `chat`.`message`,
                  `users`.`username`,
                  `users`.`user_id`
      FROM        `chat`
      JOIN        `users`
      ON          `chat`.`user_id`=`users`.`user_id`
      ORDER BY    `chat`.`timestamp`
      ASC

    ");

      return $this->rows();



  }

  public function throwMessage($user_id,$message){
$user_id=$_SESSION["user_id"];
    $this->query("
      INSERT INTO `chat` (`message_id`, `user_id`, `message`, `timestamp`) VALUES (NULL, ".(int)$user_id.", '".$this->db->real_escape_string(htmlentities($message))."', CURRENT_TIMESTAMP);");

  }

  public function deletMessage($message_id){
    // sql to delete a record
    $sql=$this->query("DELETE FROM `chat` WHERE `chat`.`message_id` = ".(int)$message_id." ");

      if ($conn->query($sql) === TRUE) {
          echo "Record deleted successfully";
      } else {
          echo "Error deleting record: " . $conn->error;
      }

      $conn->close();

  }



  public function creatMessages(){
    // Create connection

    $conn = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $dbnames="mario_d";
    $sql = 'CREATE TABLE '.$dbnames.' ( `message_id` INT(11) NOT NULL, `user_id` INT(11) NOT NULL, `message` TEXT NOT NULL, `timestamp` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP )';

    if (mysqli_query($conn, $sql)) {
        echo "Table $dbnames created successfully";
    } else {
        echo "Error creating table: " . mysqli_error($conn);
    }

    mysqli_close($conn);
    $conn->close();

  }
  public function delChatPrivite(){
$dbnames="mario_d";
    $this->query("DROP TABLE $dbnames");
    $conn = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $dbnames="mario_P";
    $sql = "DROP TABLE $dbnames";

    if (mysqli_query($conn, $sql)) {
        echo "Table $dbnames Delete successfully";
    } else {
        echo "Error creating table: " . mysqli_error($conn);
    }

    mysqli_close($conn);



  }

}
