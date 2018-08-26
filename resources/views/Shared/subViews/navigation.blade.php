<link href="{{ asset('css/subViews/navigation.css') }} " rel="stylesheet" type="text/css" />

<nav>
  <ul>
    <li id="home">
      <a href="{{ action('HomeController@Index') }}" target="_self" title="Home">
        <img src="{{ asset('images/Navigation/Home.gif') }} " height="50" width="50" alt="Home gif" />
      </a>
    </li>

    <li class="dropdown">
      <a href="{{ action('TeamController@LosAngelesLakers') }}" target="_self" title="Los Angeles Lakers">
        Lakers
        <sub><img src="{{ asset('images/Navigation/Triangle.png') }}" height="10" width="10" /></sub>
      </a>
      <div class="dropdown-content">
        <a href="http://www.nba.com/players/d'angelo/russell/1626156" target="_blank">
          D'Angelo Russell
        </a>
        <a href="http://www.nba.com/players/jordan/clarkson/203903" target="_blank">
          Jordan Clarkson
        </a>
        <a href="http://www.nba.com/players/luol/deng/2736" target="_blank">
          Luol Deng
        </a>
        <a href="http://www.nba.com/players/julius/randle/203944" target="_blank">
          Julius Randle
        </a>
        <a href="http://www.nba.com/players/timofey/mozgov/202389" target="_blank">
          Timofey Mozgov
        </a>
      </div>
    </li>

    <li class="dropdown">
      <a href="{{ action('TeamController@MiamiHeat') }}" target="_self" title="Miami Heat">
        Heat
        <sub><img src="{{ asset('images/Navigation/Triangle.png') }}" height="10" width="10" /></sub>
      </a>
      <div class="dropdown-content">
        <a href="http://www.nba.com/players/chris/bosh/2547" target="_blank">
          Chris Bosh
        </a>
        <a href="http://www.nba.com/players/hassan/whiteside/202355" target="_blank">
          Hassan Whiteside
        </a>
        <a href="http://www.nba.com/players/goran/dragic/201609" target="_blank">
          Goran Dragic
        </a>
        <a href="http://www.nba.com/players/justise/winslow/1626159" target="_blank">
          Justise Winslow
        </a>
        <a href="http://www.nba.com/players/wayne/ellington/201961" target="_blank">
          Wayne Ellington
        </a>
      </div>
    </li>

    <li class="dropdown">
      <a href="{{ action('TeamController@GoldenStateWarriors') }}" target="_self" title="Golden State Warriors">
        Warriors
        <sub><img src="{{ asset('images/Navigation/Triangle.png') }}" height="10" width="10" /></sub>
      </a>
      <div class="dropdown-content">
        <a href="http://www.nba.com/players/stephen/curry/201939" target="_blank">
          Stephen Curry
        </a>
        <a href="http://www.nba.com/players/kevin/durant/201142" target="_blank">
          Kevin Durant
        </a>
        <a href="http://www.nba.com/players/zaza/pachulia/2585" target="_blank">
          Zaza Pachulia
        </a>
        <a href="http://www.nba.com/players/draymond/green/203110" target="_blank">
          Draymond Green
        </a>
        <a href="http://www.nba.com/players/klay/thompson/202691" target="_blank">
          Klay Thompson
        </a>
      </div>
    </li>

    <li class="dropdown">
      <a href="{{ action('TeamController@SanAntonioSpurs') }}" target="_self" title="San Antonio Spurs.html">
        Spurs
        <sub>
          <img src="{{ asset('images/Navigation/Triangle.png') }} " height="10" width="10" />
        </sub>
      </a>
      <div class="dropdown-content">
        <a href="http://www.nba.com/players/pau/gasol/2200" target="_blank">
          Pau Gasol
        </a>
        <a href="http://www.nba.com/players/kawhi/leonard/202695" target="_blank">
          Kawhi Leonard
        </a>
        <a href="http://www.nba.com/players/tony/parker/2225" target="_blank">
          Tony Parker
        </a>
        <a href="http://www.nba.com/players/danny/green/201980" target="_blank">
          Danny Green
        </a>
        <a href="http://www.nba.com/players/lamarcus/aldridge/200746" target="_blank">
          LaMarcus Aldridge
        </a>
      </div>
    </li>

    <li class="dropdown" id="me">
      <span>
        <img src="{{ asset('images/Navigation/more.png') }} " height="25" width="63" alt="More" />
      </span>
      <div class="dropdown-content" id="dropdown-content-forMe">
        <a href="{{ action('HomeController@Contact') }}" target="_self" title="Contact Me">
          <u>Contact Me</u>
        </a>
        <a href="{{ action('HomeController@About') }}" target="_self" title="About Me">
          <u>About Me</u>
        </a>
      </div>
    </li>
  </ul>
</nav>
