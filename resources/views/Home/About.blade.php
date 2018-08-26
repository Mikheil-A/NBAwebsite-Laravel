@extends('Shared.master')
@section('title', 'About Me')

<link href="{{ asset('css/pages/about.css') }}" rel="stylesheet" />

@section('article')
  <article>
    <div id="about">
      <h1>About me:</h1>
      <table>
        <tr id="github">
          <td><img src="{{ asset('images/About/icons/github.png') }}" height="40" width="40" /></td>
          <td><a href="https://github.com/Mikheil-A" target="_blank">Mikheil-A</a></td>
        </tr>
        <tr id="email">
          <td><img src="{{ asset('images/About/icons/email.png') }}" height="40" width="40" /></td>
          <td><a href="mailto:mikheilalekside@gmail.com">mikheilalekside@gmail.com</a></td>
        </tr>
        <tr id="tel">
          <td><img src="{{ asset('images/About/icons/phone.png') }}" height="40" width="40" /></td>
          <td><a>(+995) 598 00 76 68</a></td>
        </tr>
        <tr id="fb">
          <td><img src="{{ asset('images/About/icons/fb.png') }}" height="40" width="40" /></td>
          <td><a href="http://www.facebook.com/mikheil.aleksidze" target="_blank">Mikheil Aleksidze</a></td>
        </tr>
      </table>
    </div>

    <br />
    <hr />

    <p id="sourceCodeOnGithub">
      Download this website with source from GitHub:
      <a href="https://github.com/Mikheil-A/NBAwebsite" target="_blank">
        https://github.com/<span style="color: #4caf50;">Mikheil-A</span>/<span style="color: #3e0309">NBAwebsite</span>
      </a>
    </p>

    <p id="infoFrom">
      The information on this website is provided from
      <a href="http://www.nba.com" target="_blank">nba.com</a>
      and it might be outdated.
      <br />
      Please, visit the website for further details...
    </p>
  </article>
@endsection
