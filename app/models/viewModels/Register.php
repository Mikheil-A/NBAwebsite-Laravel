<?php

namespace App\models\viewModels;

use Illuminate\Database\Eloquent\Model;
use Exception;
use PDO;
use PDOException;
use App\models\GetPDOConnectionObject;

class Register extends Model
{
  private $username = "";
  private $email = "";
  private $password = "";
  private $confirmationPassword = "";

  private $registerMessage = "";

  public function __construct(){
    //Storing values of the input fields to the variables
    $this->username = $_POST['username'];
    $this->email = $_POST['email'];
    $this->password = $_POST['password'];
    $this->confirmationPassword = $_POST['confirmationPassword'];
  }


  /**
   * This method checks whether an username or an email which an user provided by an user
   * while registering already exists in the database or not.
   * The method returns 1 if there's an attempt of inserting of duplicate username,
   * 2 of email and 0 if no duplicate value is provided
   */
  private function isDuplicateUsernameOrEmail():int {
    // Create connection
    $conn = GetPDOConnectionObject::conObject();
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //Check for username
    $stmt = $conn->prepare("select max(userName) from tblUser where userName = :username");
    $stmt->bindParam(':username', $this->username);
    $stmt->execute();

    $row = $stmt->fetch();
    if($row[0] == $this->username){return 1;}

    //Check for email
    $stmt = $conn->prepare("select max(userEmail) from tblUser where userEmail = :email");
    $stmt->bindParam(':email', $this->email);
    $stmt->execute();

    $row = $stmt->fetch();
    if($row[0] == $this->email){return 2;}

    //There's no duplicated username or email in the database
    return 0;
  }


  private function googleRecaptchaValidation():bool{
    if (isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])) {
      /**
       * Your site 'secret key'
       * I've registered localhost site from here:
       * https://www.google.com/recaptcha/admin
       * You'll have to register a new site for every single hosted site domain name...
       */
      //Local version (site 1: using 'private-email'@gmail.com)
      $secretKey = '6LfXPS4UAAAAAOdxmgxz1lLXQhb9Trul0PQW8Hzn';
      //Hosted version (site 2: using mikheilaleksidze@gmail.com)
      //$secretKey = '6LcXfDQUAAAAAD6CdEGbufTAHmJQYrJfVu2-tCKe';

      //Response is created after an user clicks on a submit button
      $response = $_POST['g-recaptcha-response'];
      $remoteip = $_SERVER['REMOTE_ADDR'];

      //Get verify response data
      $verifyResponseUrl = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$response&remoteip=$remoteip");

      $responseDataResult = json_decode($verifyResponseUrl);

      if ($responseDataResult->success) {return true;}
    }
    return false;
  }


  private function storeAvatar(){
    //All file types will be changed to .jpg extension
    //And the avatar will be named as 'username.jpg' which will be unique
    $name = $this->username . ".jpg";

    $file = request()->file('avatar');

    //You want to check whether an user uploads a file or not
    //because avatar uploading shouldn't be required
    if($file != null){
      /**
       * An uploaded file will be stored at storage folder, in this case it'll be
       * storage/app/public/avatars directory.
       * If you want to access the files stored in storage/app/public directory
       * There're 2 options:
       * 1. Create so called 'a symbolic link'. For more information see the documentation:
       *    https://laravel.com/docs/5.4/filesystem#the-public-disk
       * 2. Define a route in web.php file... (I've used this way)
       */
      $file->storeAs('public/avatars/', $name);
    }
  }


  public function insertIntoTbl():string {
    try {
      /**
       * All the validations are checked using the database by table constraints
       * except this one. So, I have to check it before attempting to insert something
       * into the database
       */
      if($this->password === $this->confirmationPassword) {
        if ($this->googleRecaptchaValidation()) {
          //Create connection
          $conn = GetPDOConnectionObject::conObject();
          //Set the PDO error mode to exception
          $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

          //SQL query
          $sql = "call insertIntoTblUser(:username, :email, :password, :registerDate, :lastActiveDate);";
          $stmt = $conn->prepare($sql);

          //Parameter bindings
          $stmt->bindParam(':username', $this->username);
          $stmt->bindParam(':email', $this->email);
          $stmt->bindParam(':password', $this->password);

          $registerDate = date('Y-m-d H:i:s');
          $lastActiveDate = date('Y-m-d H:i:s');
          $stmt->bindParam(':registerDate', $registerDate);
          $stmt->bindParam(':lastActiveDate', $lastActiveDate);

          $stmt->execute();
          $this->registerMessage = "Account created successfully! Please, Log in!";

          $this->storeAvatar();
        }
        else{
          $this->registerMessage = "Robot verification failed! Please click on the reCAPTCHA box and prove you aren't a robot.";
        }
      }
      else{
        $this->registerMessage = "Password and Confirmation Password doesn't match";
      }
    }
    catch (PDOException $e) {
      if($this->isDuplicateUsernameOrEmail() == 1){
        return $registerMessage = "The username already exists in the database. Please provide a different one";
      }
      if($this->isDuplicateUsernameOrEmail() == 2){
        return $registerMessage = "The email already exists in the database. Please provide a different one";
      }

      if($this->username == "" || $this->email == "" ||
          $this->password == "" || $this->confirmationPassword == ""){
        return $this->registerMessage = "All the input fields must be filled out";
      }

      if(strlen($this->password) < 4 || strlen($this->confirmationPassword) < 4){
        return $this->registerMessage = "The field Password must have a minimum length of 4";
      }

      $this->registerMessage = $e->getMessage();
    }
    catch(Exception $e) {
      $this->registerMessage = $e->getMessage();
    }
    finally {
      $conn = null; //Close the connection
    }

    $_SESSION['registerMessage_success'] = $this->registerMessage;
    return $this->registerMessage;
  }
}
