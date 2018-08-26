<?php
namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use App\models\viewModels\TeamData;

class TeamController extends Controller
{
  private $tdObj = null;

  public function __construct(){
    $this->tdObj = new TeamData();

    /* If an user is NOT logged in, 'CheckLogin2' middleware doesn't allow a he/she
     * to access TeamController actions (This middleware is assigned to all the action methods).
     * It redirects he/she to 'Login' action
     */
    $this->middleware('CheckLogin2');
  }

  public function LosAngelesLakers(){
    return view("Team.LosAngelesLakers", ['stmt' => $this->tdObj->getLosAngelesLakers()]);
  }

  public function MiamiHeat(){
    return view("Team.MiamiHeat", ['stmt' => $this->tdObj->getMiamiHeat()]);
  }

  public function GoldenStateWarriors(){
    return view("Team.GoldenStateWarriors", ['stmt' => $this->tdObj->getGoldenStateWarriors()]);
  }

  public function SanAntonioSpurs(){
    return view("Team.SanAntonioSpurs", ['stmt' => $this->tdObj->getSanAntonioSpurs()]);
  }
}
