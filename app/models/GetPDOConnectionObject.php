<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use PDO;

class GetPDOConnectionObject extends Model
{
  public static function conObject(){
    //Set timezone
    date_default_timezone_set('Asia/Tbilisi');

    //Database credentials (local)
    $servername = "localhost:3306";
    $username = "root";
    $password = "";
    $dbname = "NBAWebsiteDB";

    //Database credentials (hosted at 000webhost.com)
    //$servername = "localhost";
    //$username = "id3268262_mikheil";
    //$password = "fzFe684vzT2";
    //$dbname = "id3268262_nbawebsitedb";

    return new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  }
}
