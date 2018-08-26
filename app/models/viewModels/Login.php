<?php
namespace App\models\viewModels;

use Illuminate\Database\Eloquent\Model;
use App\models\GetPDOConnectionObject;
use PDO;
use PDOException;
use Exception;

class Login extends Model
{
  private $usernameOrEmail = "";
  private $password = "";

  private $loginMessage = "";

  public function __construct()
  {
    //Storing values of the input fields to the variables
    $this->usernameOrEmail = $_POST['usernameOrEmail'];
    $this->password = $_POST['password'];
  }

  public function getLoginMessage(){return $this->loginMessage;}

  public function existsRecord():bool {
    $result = false;

    try{
      // Create connection
      $conn = GetPDOConnectionObject::conObject();
      // set the PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      //Check the record
      $query = "select userID, userName, userEmail, userRegisterAt, userLastActiveAt from tblUser where (userName = :usernameoremail || userEmail = :usernameoremail) && userPassword = :password;";
      $stmt = $conn->prepare($query);
      $stmt->bindParam(':usernameoremail', $this->usernameOrEmail);
      $stmt->bindParam(':password', $this->password);
      $stmt->execute();

      //If the record exists, this if statement will be true
      if($row = $stmt->fetch()){
        //Create sessions if an user record exists
        $_SESSION['loggedIn_userId'] = $row['userID'];
        $_SESSION['loggedIn_username'] = $row['userName'];
        $_SESSION['loggedIn_email'] = $row['userEmail'];
        $_SESSION['loggedIn_registrationDate'] = date('d-M-Y H:i:s', strtotime($row['userRegisterAt']));
        $_SESSION['loggedIn_lastActiveDate'] = date('d-M-Y H:i:s', strtotime($row['userLastActiveAt']));

        $result = true;
      }
      else{ $this->loginMessage = "Username/Email or Password is incorrect!";}
    }
    catch (PDOException $e){
      $this->loginMessage = "Something went wrong...<br/>PDO exception looks like this:<br/>"
          . $e->getMessage();
    }
    catch (Exception $e){
      $this->loginMessage = "Something went wrong...<br/>General exception looks like this:<br/>"
          . $e->getMessage();
    }
    finally{
      //Close the connection
      $conn = null;
    }

    return $result;
  }
}
