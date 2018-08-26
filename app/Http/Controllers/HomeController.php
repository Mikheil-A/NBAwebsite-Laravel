<?php
namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use App\models\viewModels\Contact;

class HomeController extends Controller
{
  public function __construct(){
    /* If an user is NOT logged in, 'CheckLogin2' middleware doesn't allow a him/her
     * to access 'Contact' action. It redirects him/her to 'Login' action
     */
    $this->middleware('CheckLogin2')->only('Contact');
  }


  public function Index(){
    return view("Home.Index");
  }


  public function Contact(){
    return view("Home.Contact");
  }

  public function ContactPOST(){
    $obj = new Contact();
    $obj->insertIntoTbl();

    return redirect()->action('AccountController@Profile');
//    return redirect("Account/Profile#msg");
  }


  public function About(){
    return view("Home.About");
  }
}
