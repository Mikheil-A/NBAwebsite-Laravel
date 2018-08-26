<?php

namespace App\Http\Middleware;

use Closure;

class CheckLogin
{
  /**
   * This middleware checks whether an user is logged in or not.
   * If an user is logged in while trying to access specific routes,
   * he/she will be redirected to profile page
   */
  public function handle($request, Closure $next)
  {
    if(isset($_SESSION['loggedIn_username'])){
      return redirect()->action('AccountController@Profile');
    }

    return $next($request);
  }
}
