<?php

namespace App\models\viewModels;

//If session isn't started, start it (you should always check it before starting a session)
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}

use Illuminate\Database\Eloquent\Model;
use PDO;
use App\models\GetPDOConnectionObject;

class Contact extends Model
{
  private $msgText = "";
  private $msgTitle = "";

  public function __construct()
  {
    //Storing values of the input fields to the variables
    $this->msgTitle = $_POST['title'];
    $this->msgText = $_POST['msg'];
  }


  /* The id this functions returns will be inserted as a foreign key in tblMessage table
   * in order to make connection between tblUser and tblMessage tables
   */
  private function getMsgAuthorID(): int{
    $conn = GetPDOConnectionObject::conObject();
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "select userID from tblUser where userName = :username;";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':username', $_SESSION['loggedIn_username']);
    $stmt->execute();
    $conn = null;

    $row = $stmt->fetch();
    return $row[0];
  }


  public function insertIntoTbl()
  {
    $conn = GetPDOConnectionObject::conObject();
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "insert into tblMessage(userID, msgTitle, msgText, msgSentDate) values (:fk_id, :title, :msg, :sentDate);";
    $stmt = $conn->prepare($sql);

    $x = $this->getMsgAuthorID();

    $stmt->bindParam(':fk_id', $x);
    $stmt->bindParam(':title', $this->msgTitle);
    $stmt->bindParam(':msg', $this->msgText);

    $sentDate = date('Y-m-d H:i:s');
    $stmt->bindParam(':sentDate', $sentDate);

    $stmt->execute();
    $conn = null;
  }
}
