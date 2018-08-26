@extends('Shared.master')
@section('title', 'Home')

<link href="{{ asset('css/pages/index.css') }}" rel="stylesheet" />

@section('article')
<article>
    <!-- LAKERS -->
    <div style="background-image: url({{ asset('images/Team_backgrounds/lakers.jpg') }})">
        <a href="{{ action('TeamController@LosAngelesLakers') }}" target="_self" title="Read More">
            <img src="{{ asset('images\ReadMoreButton.jpg') }}" id="readMore" />
        </a>
        <div class="players">
            <div>
                <a href="http://www.nba.com/players/d'angelo/russell/1626156" target="_blank"
                   title="D'Angelo Russell">
                    <img src="{{ asset('images\Players\Lakers\Russell.png') }} " />
                </a>
            </div>
            <div>
                <a href="http://www.nba.com/players/jordan/clarkson/203903" target="_blank"
                   title="Jordan Clarkson">
                    <img src="{{ asset('images\Players\Lakers\Clarkson.png') }} " />
                </a>
            </div>
            <div>
                <a href="http://www.nba.com/players/luol/deng/2736" target="_blank"
                   title="Luol Deng">
                    <img src="{{ asset('images\Players\Lakers\Deng.png') }} " />
                </a>
            </div>
            <div>
                <a href="http://www.nba.com/players/timofey/mozgov/202389" target="_blank"
                   title="Timofey Mozgov">
                    <img src="{{ asset('images\Players\Lakers\Mozgov.png') }} " />
                </a>
            </div>
            <div>
                <a href="http://www.nba.com/players/julius/randle/203944" target="_blank"
                   title="Julius Randle">
                    <img src="{{ asset('images\Players\Lakers\Randle.png') }} " />
                </a>
            </div>
        </div>
    </div>

    <!-- HEAT -->
    <div style="background-image: url({{ asset('images/Team_backgrounds/heat.jpg') }});">
        <a href="{{ action('TeamController@MiamiHeat') }}" target="_self" title="Read More">
            <img src="{{asset('images\ReadMoreButton.jpg')}}" id="readMore" />
        </a>
        <div class="players">
            <div>
                <a href="http://www.nba.com/players/chris/bosh/2547" target="_blank"
                   title="Chris Bosh">
                    <img src="{{asset('images\Players\Heat\Bosh.png')}}" />
                </a>
            </div>
            <div>
                <a href="http://www.nba.com/players/goran/dragic/201609" target="_blank"
                   title="Goran Dragic">
                    <img src="{{asset('images\Players\Heat\Dragic.png')}}" />
                </a>
            </div>
            <div>
                <a href="http://www.nba.com/players/wayne/ellington/201961" target="_blank"
                   title="Wayne Ellington">
                    <img src="{{asset('images\Players\Heat\Ellington.png')}}" />
                </a>
            </div>
            <div>
                <a href="http://www.nba.com/players/hassan/whiteside/202355" target="_blank"
                   title="Hassan Whiteside">
                    <img src="{{asset('images\Players\Heat\Whiteside.png')}}" />
                </a>
            </div>
            <div>
                <a href="http://www.nba.com/players/justise/winslow/1626159" target="_blank"
                   title="Justise Winslow">
                    <img src="{{asset('images\Players\Heat\Winslow.png')}}" />
                </a>
            </div>
        </div>
    </div>

    <!-- WARRIORS -->
    <div style="background-image:url({{asset('images/Team_backgrounds/warriors.jpg')}});">
        <a href="{{action('TeamController@GoldenStateWarriors')}}" target="_self" title="Read More">
            <img src="{{asset('images\ReadMoreButton.jpg')}}" id="readMore" />
        </a>
        <div class="players">
            <div>
                <a href="http://www.nba.com/players/stephen/curry/201939" target="_blank"
                   title="Stephen Curry">
                    <img src="{{asset('images\Players\Warriors\Curry.png')}}" />
                </a>
            </div>
            <div>
                <a href="http://www.nba.com/players/kevin/durant/201142" target="_blank"
                   title="Kevin Durant">
                    <img src="{{asset('images\Players\Warriors\Durant.png')}}" />
                </a>
            </div>
            <div>
                <a href="http://www.nba.com/players/zaza/pachulia/2585" target="_blank"
                   title="Zaza Pachulia">
                    <img src="{{asset('images\Players\Warriors\Pachulia.png')}}" />
                </a>
            </div>
            <div>
                <a href="http://www.nba.com/players/draymond/green/203110" target="_blank"
                   title="Draymond Green">
                    <img src="{{asset('images\Players\Warriors\Green.png')}}" />
                </a>
            </div>
            <div>
                <a href="http://www.nba.com/players/klay/thompson/202691" target="_blank"
                   title="Klay Thompson">
                    <img src="{{asset('images\Players\Warriors\Thompson.png')}}" />
                </a>
            </div>
        </div>
    </div>

    <!-- SPURS -->
    <div style="background-image:url({{ asset('images/Team_backgrounds/spurs.jpg') }});">
        <a href="{{action('TeamController@SanAntonioSpurs')}}" target="_self" title="Read More">
            <img src="{{asset('images\ReadMoreButton.jpg')}}" id="readMore" />
        </a>
        <div class="players">
            <div>
                <a href="http://www.nba.com/players/pau/gasol/2200" target="_blank"
                   title="Pau Gasol">
                    <img src="{{asset('images\Players\Spurs\Gasol.png')}}" />
                </a>
            </div>
            <div>
                <a href="http://www.nba.com/players/kawhi/leonard/202695" target="_blank"
                   title="Kawhi Leonard">
                    <img src="{{asset('images\Players\Spurs\Leonard.png')}}" />
                </a>
            </div>
            <div>
                <a href="http://www.nba.com/players/tony/parker/2225" target="_blank"
                   title="Tony Parker">
                    <img src="{{asset('images\Players\Spurs\Parker.png')}}" />
                </a>
            </div>
            <div>
                <a href="http://www.nba.com/players/danny/green/201980" target="_blank"
                   title="Danny Green">
                    <img src="{{asset('images\Players\Spurs\Green.png')}}" />
                </a>
            </div>
            <div>
                <a href="http://www.nba.com/players/lamarcus/aldridge/200746" target="_blank"
                   title="LaMarcus Aldridge">
                    <img src="{{asset('images\Players\Spurs\Aldridge.png')}}" />
                </a>
            </div>
        </div>
    </div>
</article>
@endsection
