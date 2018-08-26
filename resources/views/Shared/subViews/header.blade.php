<link href="{{ asset('css/subViews/header.css') }} " rel="stylesheet" type="text/css" />

<header>
  <a href="http://www.nba.com" target="_blank" title="NBA.com">
    <img src="{{ asset('images/NBA logo.png') }} " height="80" width="300" id="logo" />
  </a>

  <div class="loginData">
    @if(isset($_SESSION['loggedIn_username']))
      <div id="dropdown">
        @if(file_exists(storage_path('app/public/avatars/' . $_SESSION['loggedIn_username'] . '.jpg')))
          <img id="profilePhoto" src="{{route('avatar', $_SESSION['loggedIn_username'] . '.jpg')}}" />
        @else
          <img id="profilePhoto" src="{{asset('images/defaultAvatar.jpg') }}">
        @endif

        <a id="loggedInUsername">{{ $_SESSION['loggedIn_username'] }}</a>
        <sub><img src="{{ asset('images/Navigation/Triangle.png') }}" height="9" width="9" /></sub>
        <div id="dropdown-content">
          <a href="{{ action('AccountController@Profile') }}">Profile</a>
          <a href="{{ action('AccountController@Logout') }}">Log Out</a>
        </div>
      </div>
    @else
      <a href="{{ action('AccountController@Login') }}" title="log in">Log In</a>
    @endif
  </div>

  <p id="nba">
    <span id="N">N</span>ational
    <span id="B">B</span>asketball
    <span id="A">A</span>ssociation
  </p>
</header>
