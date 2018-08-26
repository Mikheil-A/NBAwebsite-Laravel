<link href="{{ asset('css/subViews/footer.css') }} " rel="stylesheet" type="text/css"/>

<footer>
  @if(isset($_SESSION['lastRegistered_username']) && isset($_SESSION['lastRegistered_registrationDate']))
    <div id="lastRegistered">
      <span>Last registered user: {{ $_SESSION['lastRegistered_username'] }}</span><br />
      <span>Date: {{ $_SESSION['lastRegistered_registrationDate'] }}</span>
    </div>
  @endif

  <p id="copyright">
    Copyright <span style="font-size:22px;">&copy;</span> {{ date('Y') }} - All Rights Reserved
  </p>

  <span id="developer">
        Developed by:
        <a href="http://www.facebook.com/mikheil.aleksidze" target="_blank">Mikheil Aleksidze</a>
  </span>
</footer>
