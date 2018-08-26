<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use PDO;

class AccessRegistrationData extends Model
{
  public function getLastRegisteredUser(){
    $conn = GetPDOConnectionObject::conObject();
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //Get username and registration date from the last registered user's record
    $query = "select userName, userRegisterAt from tblUser where userRegisterAt = (select max(userRegisterAt) from tblUser)";
    $stmt = $conn->prepare($query);
    $stmt->execute();

    if($row = $stmt->fetch()){
      $_SESSION['lastRegistered_username'] = $row['userName'];
      $_SESSION['lastRegistered_registrationDate'] = date('d-M-Y H:i:s', strtotime($row['userRegisterAt']));
    }

    $conn = null;
  }
}
