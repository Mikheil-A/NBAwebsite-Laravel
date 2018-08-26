<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use PDO;

class Logout extends Model
{
    public function updateLastActivityDate(){
      $conn = GetPDOConnectionObject::conObject();
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $query = "update tblUser set userLastActiveAt = now() where userName = :username;";
      $stmt = $conn->prepare($query);
      $stmt->bindParam(':username', $_SESSION['loggedIn_username']);
      $stmt->execute();
    }
}
