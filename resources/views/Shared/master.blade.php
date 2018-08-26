<?php
//If session isn't started, start it (you should always check it before starting a session)
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <link href="{{ asset('css/master.css') }}" rel="stylesheet" type="text/css"/>
  <link href="{{ asset('images/icon.jpg') }}" rel="icon" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <script src="{{ asset('js/master.js') }}"></script>

  <title>NBA :: @yield('title')</title>
</head>
<body onload="scrollToTopImageVisibility()">

@include('Shared.subViews.header')
@include('Shared.subViews.navigation')
@include('Shared.subViews.sidebars')

<article>
  @yield('article')
</article>

<!--Scroll to top-->
<a id="ScrollToTop_Image" title="Scroll To Top" onclick="scrollToTop()">
  <img src="{{ asset('images/scrolltotop.jpg') }}" />
</a>

@include('Shared.subViews.footer')


<!--jQuery doesn't work-->
<!--jQuery script for footer being always at the bottom without "position:fixed"-->
{{--<script src="http://code.jquery.com/jquery.js"></script>--}}
{{--<script>--}}
  {{--$(document).ready(function () {--}}
    {{--var bodyHeight = $("body").height();--}}
    {{--var vwptHeight = $(window).height();--}}
    {{--if (vwptHeight > bodyHeight) {--}}
      {{--$("footer").css("position", "absolute").css("bottom", 0);--}}
    {{--}--}}
  {{--});--}}
{{--</script>--}}

</body >
</html >
