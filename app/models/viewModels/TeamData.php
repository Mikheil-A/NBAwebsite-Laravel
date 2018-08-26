<?php

namespace App\models\viewModels;

use Illuminate\Database\Eloquent\Model;
use App\models\GetPDOConnectionObject;
use PDO;

class TeamData extends Model
{
  private function getTeamTemplate($query){
    $conn = GetPDOConnectionObject::conObject();
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->prepare($query);
    $stmt->execute();

    $conn = null;

    return $stmt;
  }

  public function getGoldenStateWarriors(){
    return $this->getTeamTemplate("select * from tblTeam_GoldenStateWarriors;");
  }

  public function getLosAngelesLakers(){
    return $this->getTeamTemplate("select * from tblTeam_LosAngelesLakers;");
  }

  public function getMiamiHeat(){
    return $this->getTeamTemplate("select * from tblTeam_MiamiHeat;");
  }

  public function getSanAntonioSpurs(){
    return $this->getTeamTemplate("select * from tblTeam_SanAntonioSpurs;");
  }
}
