@extends('Shared.master')
@section('title', 'Register')

<link href="{{asset('css/pages/register-login.css')}}" rel="stylesheet" type="text/css" />
<script src='https://www.google.com/recaptcha/api.js'></script> <!--Google reCaptcha API-->

@section('article')
  <article>
    <h1>Create a new account.</h1>
    <hr />

    {{--This is null on httpGET request and it has a value on httpPOST request--}}
    @if($registerResult != null)
      <p id="submitResult">{{ $registerResult }}</p>
    @endif

    <form method="post" action="{{ action('AccountController@RegisterPOST') }}"
          enctype="multipart/form-data">
      <table>
        <tr>
          <td>
            <label>Username: <span class="asterisk">*</span>
              <span class="tooltipText">This field is marked as important!</span>
            </label>
          </td>
          <td>
            <input type="text" placeholder="Type in an username" name="username"
                   maxlength="255" required />
            {{--<span id="validation">Ajax validation will go here</span>--}}
          </td>
        </tr>

        <tr>
          <td>
            <label>Email Address: <span class="asterisk">*</span>
              <span class="tooltipText">This field is marked as important!</span>
            </label>
          </td>
          <td>
            <input type="email" placeholder="Example@example.com" name="email"
                   maxlength="255" required />
            <span id="tooltipForEmail">You can provide a <b>FAKE</b> email address</span>
            {{--<span id="validation">Ajax validation will go here</span>--}}
          </td>
        </tr>

        <tr>
          <td>
            <label>Password: <span class="asterisk">*</span>
              <span class="tooltipText">This field is marked as important!</span>
            </label>
          </td>
          <td>
            <input placeholder="Type in a password" type="password" name="password"
                   minlength="4" maxlength="50" required/>
            {{--<span id="validation">Ajax validation will go here</span>--}}
          </td>
        </tr>

        <tr>
          <td>
            <label>Confirm Password: <span class="asterisk">*</span>
              <span class="tooltipText">This field is marked as important!</span>
            </label>
          </td>
          <td>
            <input placeholder="Confirm password" type="password" name="confirmationPassword"
                   minlength="4" maxlength="50" required/>
            {{--<span id="validation">Ajax validation will go here: "The password doesn't match the Confirmation Password."</span>--}}
          </td>
        </tr>

        <tr>
          <td>Avatar/Profile photo:</td>
          <td><input type="file" name="avatar"></td>
        </tr>
      </table>

      <!--Google reCAPTCHA-->
      <!--
         * All the information for robot validation by google called "Google reCAPTCHA"
         * will be provided after you register a new site from here:
         * https://www.google.com/recaptcha/admin
      -->
      <!--Site 1 (for localhost using "private-email"@gmail.com)-->
      <div class="g-recaptcha" data-sitekey="6LfXPS4UAAAAAM2jNNDvA0KoaO-sYNqCN9IfRA2U" id="googleRecaptcha"></div>
      <!--Site 2 (for nbawebsite.000webhostapp.com using mikheilalekside@gmail.com)-->
      {{--<div class="g-recaptcha" data-sitekey="6LcXfDQUAAAAAL0yu6W0p0kugjzjBWOw4EL1anod" id="googleRecaptcha"></div>--}}

      <input type="submit" value="Register" />
    </form>
  </article>
@endsection
