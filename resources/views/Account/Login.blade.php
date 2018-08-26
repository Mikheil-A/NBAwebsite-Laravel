@extends('Shared.master')
@section('title', 'Login')

<link href="{{ asset('css/pages/register-login.css') }}" rel="stylesheet" type="text/css"/>

@section('article')
  @if(isset($_SESSION['AccessDenied']))
    <script>
      window.alert("You don't have permission to access this page. Please log in first!");
    </script>
    <!--And then delete the session here-->
    <?php unset($_SESSION['AccessDenied']); ?>
  @endif

  @if(isset($_SESSION['registerMessage_success']))
    <script>
      window.alert("Account created successfully! Please, Log in!");
    </script>
    <?php unset($_SESSION['registerMessage_success']); ?>
  @endif

  <article>
    <h1>Log in</h1>
    <hr />

    @if($loginResult != "")
      <p id="submitResult"><?php echo $loginResult; ?></p>
    @endif

    <form method="post" action="{{ action('AccountController@LoginPOST') }}">
      <table>
        <tr>
          <td>
            <label>Username/Email Address: <span class="asterisk">*</span>
              <span class="tooltipText">This field is marked as important!</span>
            </label>
          </td>
          <td>
            <input type="text" name="usernameOrEmail" placeholder="Type in your username or email" required />
          </td>
        </tr>
        <tr>
          <td>
            <label>Password: <span class="asterisk">*</span>
              <span class="tooltipText">This field is marked as important!</span>
            </label>
          </td>
          <td>
            <input type="password" name="password" placeholder="Type in the password" required/>
          </td>
        </tr>
      </table>

      <input type="submit" value="Log in" />
    </form>

    <p id="redirectToRegister">
      If you don't have an account, register
      <a href="{{action('AccountController@Register')}}" target="_self" style="color: black; margin-bottom:40px;">
         here
      </a>.
    </p>
  </article>
@endsection
