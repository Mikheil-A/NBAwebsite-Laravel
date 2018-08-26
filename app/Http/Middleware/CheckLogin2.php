<?php

namespace App\Http\Middleware;

//If session isn't started, start it (you should always check it before starting a session)
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}

use Closure;

class CheckLogin2
{
  /**
   * This middleware checks whether an user is logged in or not.
   * If an user is NOT logged in while accessing certain pages,
   * he/she will be redirected to the login page
   */
    public function handle($request, Closure $next)
    {
      if(!isset($_SESSION['loggedIn_username'])){
        //There's no need to give the session a descriptive value. You just need to set a session
        $_SESSION['AccessDenied'] = 1;
        return redirect()->action('AccountController@Login');
      }

        return $next($request);
    }
}
