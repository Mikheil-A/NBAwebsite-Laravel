<?php
namespace App\Http\Controllers;

//If session isn't started, start it (you should always check it before starting a session)
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}

//use Illuminate\Http\Request;
use App\models\viewModels\Register;
use App\models\viewModels\Login;
use App\models\AccessRegistrationData;
use App\models\Logout;
use App\models\viewModels\Profile;

class AccountController extends Controller
{
  public function __construct(){
    /* If an user is logged in, 'CheckLogin' middleware doesn't allow him/her
     * to access 'Register' and 'Login' actions. It redirects him/her to 'Profile' action
     */
    $this->middleware('CheckLogin')->only('Register', 'Login');

    /* If an user is NOT logged in, 'CheckLogin2' middleware doesn't allow a him/her
     * to access 'Profile' and 'Logout' actions. It redirects him/her to 'Login' action
     */
    $this->middleware('CheckLogin2')->only('Profile', 'Logout');
  }


  //Http Get
  public function Register(){
    return view("Account.Register", ['registerResult' => null]);
  }

  //Http Post
  public function RegisterPOST(){
//    if($_SERVER['REQUEST_METHOD'] == 'POST') //There's no need to check it

    $reg = new Register();
    $registerResult = $reg->insertIntoTbl();

    if ($registerResult == "Account created successfully! Please, Log in!") {
      return redirect()->action('AccountController@Login');
    }

    return view("Account.Register", ['registerResult' => $registerResult]);
  }


  //Http Get
  public function Login(){
    return view("Account.Login", ['loginResult' => null]);
  }

  //Http Post
  public function LoginPOST(){
//    if($_SERVER['REQUEST_METHOD'] == 'POST') //There's no need to check it

    $obj = new Login();

    if ($obj->existsRecord()) {
      $ard = new AccessRegistrationData();
      //Session are created for the last registered user by calling this method
      $ard->getLastRegisteredUser();

      return redirect()->action('AccountController@Profile');
    }

    $loginResult = $obj->getLoginMessage();
    return view("Account.Login", ['loginResult' => $loginResult]);
  }


  //Http Get
  public function Profile(){
    $obj = new Profile();

    return view("Account.Profile",
        ['stmtUser' => $obj->getAllRegisteredUsers()],
        ['stmtMsg' => $obj->getUserMessages()]
    )
        ->with('passwordChangedMsg', null)
        ->with('totalMessages', $obj->getTotalMessages())
        ->with('totalUsers', $obj->getTotalUsers());
  }

  //Http Post
  public function ProfilePOST(){
    $obj = new Profile();
    $obj->changeAvatar();

    return view("Account.Profile",
        ['stmtUser' => $obj->getAllRegisteredUsers()],
        ['stmtMsg' => $obj->getUserMessages()]
    )
        ->with('passwordChangedMsg', $obj->changePassword())
        ->with('totalMessages', $obj->getTotalMessages())
        ->with('totalUsers', $obj->getTotalUsers());
  }


  //Http Get
  public function Logout(){
    $obj = new Logout();
    $obj->updateLastActivityDate();

    //Destroying sessions
    if(session_status() == PHP_SESSION_ACTIVE){
      session_destroy();
    }

    //Redirecting to an uri
    return redirect("Account/Login");
    //Redirecting to a controller action (method). .blade.php is appended when using this one...
//    return redirect()->action('AccountController@Login');
  }
}
