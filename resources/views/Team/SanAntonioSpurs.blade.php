@extends('Shared.master')
@section('title', 'San Antonio Spurs')

<link href="{{ asset('css/pages/teams.css') }}" rel="stylesheet" />
<style>
  /*Navigation - current page*/
  nav li:nth-child(5) > a {
    background-color: #111;
  }
</style>

@section('article')
  <article>
    <img src="{{ asset('images/Team_backgrounds/spurs.jpg') }}" height="350" width="1085" />

    <?php $i = 1; $floating = ""; ?>
    @while($row = $stmt->fetch())
      <div>
        <h1>{{ $row["fullname"] }}</h1>

        <?php
        if($i % 2 == 0){ $floating = "playerImage_fl"; }
        else{ $floating = "playerImage_fr"; }
        ?>

        <table class="{{ $floating }}">
          <tr>
            <td>
              <a href="{{ $row['nbacomUrl'] }}" target="_blank" title="{{ $row["fullname"] }}">
                <img src="{{ asset('images/Players/Spurs/' . $row["profilePhoto"]) }}" />
              </a>
            </td>
          </tr>
          <tr>
            <td>
              For more information<br />
              click the photo above
            </td>
          </tr>
        </table>

        <table class="playerInfo">
          <tbody>
          <tr>
            <td>Height</td>
            <td>{{ $row["height"] }}</td>
          </tr>
          <tr>
            <td>Weight</td>
            <td>{{ $row["weight"] }}</td>
          </tr>
          <tr>
            <td>Born</td>
            <td>{{ $row["born"] }}</td>
          </tr>
          <tr>
            <td>Age</td>
            <td>{{ $row["age"] }} years</td>
          </tr>
          <tr>
            <td>From</td>
            <td>{{ $row["_from"] }}</td>
          </tr>
          <tr>
            <td>NBA debut</td>
            <td>{{ $row["nbaDebut"] }}</td>
          </tr>
          <tr>
            <td>Years in NBA</td>
            <td>{{ $row["yearsInNba"] }}</td>
          </tr>
          </tbody>
        </table>
      </div>

      <?php $i++; ?>
    @endwhile
  </article>
@endsection
