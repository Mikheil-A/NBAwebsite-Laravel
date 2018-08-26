<?php
//If session isn't started, start it (you should always check it before starting a session)
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
?>

@extends('Shared.master')
@section('title', 'Profile')

<link href="{{ asset('css/pages/profile.css') }}" rel="stylesheet" />

@section('article')
  <article>
    <h1>Dashboard</h1>
    <hr />

    <div class="greyContainer">
      <div class="floatLeft forWatermark">
        @if(file_exists(storage_path('app/public/avatars/' . $_SESSION['loggedIn_username'] . '.jpg')))
          <img src="{{route('avatar', $_SESSION['loggedIn_username'] . '.jpg')}}" />
        @else
          <img src="{{asset('images/defaultAvatar.jpg') }}">
        @endif
        <div id="watermark">
          <p>
            Change<br>
            <img src="{{ asset('images/imageIcon.png') }}"><br>
            photo
          </p>
          <form action="{{action('AccountController@ProfilePOST')}}" enctype="multipart/form-data" method="post">
            <input type="file" name="avatar">
            <input type="submit" value="Change" name="avatarChangeSubmit">
          </form>
        </div>
      </div>

      <table id="profileInfo">
        <tr>
          <td>Username</td>
          <td>{{ $_SESSION['loggedIn_username'] }}</td>
        </tr>
        <tr>
          <td>E-mail</td>
          <td>{{ $_SESSION['loggedIn_email'] }}</td>
        </tr>
        <tr>
          <td>Registration date</td>
          <td>{{ $_SESSION['loggedIn_registrationDate'] }}</td>
        </tr>
        <tr>
          <td>Last active</td>
          <td>{{ $_SESSION['loggedIn_lastActiveDate'] }}</td>
        </tr>
      </table>

      <form method="post" action="{{ action('AccountController@ProfilePOST') }}">
        <fieldset id="changePassword">
          <legend>Change password</legend>

          @if(isset($passwordChangedMsg))
            <p id="passChangeResult">{{ $passwordChangedMsg }}</p>
          @endif

          <input type="password" name="newPassword" placeholder="Enter a new password"><br>
          <input type="submit" value="Change" id="changePassButton" name="changePassSubmit">
        </fieldset>
      </form>
    </div>


    @if($stmtMsg->rowCount() > 0)
      <fieldset id="msg">
        <legend>Your messages:</legend>
        @while($row = $stmtMsg->fetch())
          <div id="msgHeading">
            <span>Title: <b>{{ $row["msgTitle"] }}</b></span>
            <span>Sent date: <b>{{ date('d-M-Y H:i:s', strtotime($row['msgSentDate'])) }}</b></span>
          </div>

          <p id="msgText">{{ $row["msgText"] }}</p>
        @endwhile

        <p id="total">Total: {{ $totalMessages }}</p>
      </fieldset>
    @endif


    @if($stmtUser->rowCount() > 1)
      <fieldset>
        <legend>All registered users:</legend>

      <?php $i = 1; $floating = ""; ?>
      @while($row = $stmtUser->fetch())
        <!--Skip logged in user-->
          @if($row['userName'] == $_SESSION['loggedIn_username'])
            @continue
          @endif

          <?php
          if($i % 2 == 1){ $floating = "avatar_fl"; }
          else{ $floating = "avatar_fr"; }
          ?>

          <div class="{{ $floating }}">
            @if(file_exists(storage_path('app/public/avatars/' . $row['userName'] . '.jpg')))
              <img src="{{route('avatar', $row['userName'] . '.jpg')}}" />
            @else
              <img src="{{asset('images/defaultAvatar.jpg') }}">
            @endif
          </div>

          <table class="userInfo">
            <tbody>
            <tr>
              <td>Username</td>
              <td>{{ $row['userName'] }}</td>
            </tr>
            <tr>
              <td>Email</td>
              <td>{{ $row["userEmail"] }}</td>
            </tr>
            <tr>
              <td>Registration date</td>
              <td>{{ date('d-M-Y H:i:s', strtotime($row['userRegisterAt'])) }}</td>
            </tr>
            <tr>
              <td>Last active</td>
              <td>{{ date('d-M-Y H:i:s', strtotime($row['userLastActiveAt'])) }}</td>
            </tr>
            </tbody>
          </table>

          <hr id="users">

          <?php $i++; ?>
        @endwhile

        <p id="total">Total: {{ $totalUsers - 1 }}</p>
      </fieldset>
    @endif

  </article>
@endsection
