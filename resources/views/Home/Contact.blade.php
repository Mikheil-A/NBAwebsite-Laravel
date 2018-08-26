@extends('Shared.master')
@section('title', 'Contact Me')

<link href="{{ asset('css/pages/contact.css') }}" rel="stylesheet" />
{{--<script src="{{ asset('js/contact.js') }}"></script>--}}

@section('article')
  <article>
    <div id="redirectToAbout">
      <p>The message you send from here will be stored in the database and I'll be able to read it.</p>
      <p>But in order to contact me directly, please use the information provided in
        <a href="{{ action('HomeController@About') }}" title="Go to about page">About Me</a> page.
      </p>
    </div>

    <hr />

    <form onsubmit="alert('Your contact form has been sent successfully!\nSee your messages in the profile page');"
          method="post" action="{{ action('HomeController@ContactPOST') }}">
      <fieldset>
        <legend>Type your message</legend>

        <p>
          <label>
            Title: <span class="asterisk">*</span>
            <span class="tooltipText">This field is marked as important!</span>
          </label>
        </p>
        <input type="text" name="title" placeholder="Enter the message title" required/>

        <p>
          <label>
            Massage: <span class="asterisk">*</span>
            <span class="tooltipText">This field is marked as important!</span>
          </label>
        </p>
        <textarea name="msg" placeholder="What's on your mind?" required></textarea>
      </fieldset>

      <!--<Prove you're not a robot>-->
      {{--<div id="robot">--}}
        {{--<label id="robo-ch-box">--}}
          {{--<input type="checkbox" name="robotCheckbox" required />--}}
          {{--I'm not a robot! <span class="asterisk">*</span>--}}
          {{--<span class="tooltipText">This field is marked as important!</span>--}}
        {{--</label>--}}
        {{--<br />--}}
        {{--<div id="textImage">--}}
          {{--<img class="textImages" src="{{ asset('images/Robot/0.jpg') }}" />--}}
          {{--<img class="textImages" src="{{ asset('images/Robot/1.jpg') }}" />--}}
          {{--<img class="textImages" src="{{ asset('images/Robot/2.jpg') }}" />--}}
          {{--<img class="textImages" src="{{ asset('images/Robot/3.png') }}" />--}}

          {{--<img src="{{ asset('images/Robot/change.png') }}" width="50" height="50"--}}
               {{--title="Click here to change the text image" onclick="changetheTextImage()" />--}}
        {{--</div>--}}

        {{--<input type="text" name="proveText" id="pictureText" required--}}
               {{--title="Type the text you see in the picture"--}}
               {{--placeholder="Type the text you see in the picture" />--}}
      {{--</div>--}}
      <!--</Prove you're not a robot>-->

      <div>
        <input type="submit" name="submitButton" value="Send"
               title="Click here to submit the form" class="tooltip" />
        <span class="tooltipText">Please, review the form before submitting</span>
      </div>
    </form>
  </article>
@endsection
