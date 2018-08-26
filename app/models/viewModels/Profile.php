<?php

namespace App\models\viewModels;

use Illuminate\Database\Eloquent\Model;
use App\models\GetPDOConnectionObject;
use PDO;

class Profile extends Model
{
  //On get requests

  public function getAllRegisteredUsers(){
    $conn = GetPDOConnectionObject::conObject();
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->prepare("select userName, userEmail, userRegisterAt, userLastActiveAt from tblUser;");
    $stmt->execute();

    $conn = null;

    return $stmt;
  }


  public function getUserMessages(){
    $conn = GetPDOConnectionObject::conObject();
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $query = "select msgTitle, msgText, msgSentDate from tblMessage inner join tblUser on tblMessage.UserID = tblUser.userID where tblUser.userName = :username;";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':username', $_SESSION['loggedIn_username']);
    $stmt->execute();

    $conn = null;

    return $stmt;
  }


  public function getTotalMessages(){
    $conn = GetPDOConnectionObject::conObject();
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $query = "select count(msgID) from tblMessage where userID = :userid;";
    $stmt = $conn->prepare($query);
    $stmt->bindParam('userid', $_SESSION['loggedIn_userId']);
    $stmt->execute();

    $conn = null;

    $row = $stmt->fetch();
    return $row[0];
  }


  public function getTotalUsers(){
    $conn = GetPDOConnectionObject::conObject();
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $query = "select count(userID) from tblUser;";
    $stmt = $conn->prepare($query);
    $stmt->execute();

    $conn = null;

    $row = $stmt->fetch();
    return $row[0];
  }


  //On post requests

  public function changeAvatar(){
    if(isset($_POST['avatarChangeSubmit'])){
      $name = $_SESSION['loggedIn_username'] . ".jpg";
      $file = request()->file('avatar');
      if($file != null){
        $file->storeAs('public/avatars/', $name);
      }
    }
  }


  public function changePassword() {
    if(isset($_POST['changePassSubmit'])){
      if($_POST['newPassword'] != "") {
        $conn = GetPDOConnectionObject::conObject();
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query = "update tblUser set userPassword = :newPass where userName = :username;";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':username', $_SESSION['loggedIn_username']);
        $stmt->bindParam(':newPass', $_POST['newPassword']);
        $stmt->execute();

        return "Password has been changed successfully!";
      }
      return "Password field must be filled out!";
    }
  }
}
