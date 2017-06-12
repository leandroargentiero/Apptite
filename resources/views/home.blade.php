@extends('layouts.master_home')

@section('hero')
    @include('partials.hero')
@stop

@section('content')
    <div id='homedescription'>
        <h2 style="text-align: center; margin: 0 0 100px 0;" class="hometitle">Hoe werkt het?</h2>

        <div class="row" style="margin: 0 0 30px 0;">
            <div class="col-md-6">
                <h2 class="homesubtitle">Zoek verse huisbereide maaltijden bij hobbychefs thuis</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                    et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                    aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
                    culpa qui officia deserunt mollit anim id est laborum.
                </p>
            </div>
            <div class="col-md-5 pull-right">
                <img class="img-howitworks" src="/assets/images/zoekevent.png" alt="Zoek naar Apptite event">
            </div>
        </div>
        <div class="row">
            <div class="col-md-5 pull-left">
                <img class="img-howitworks" src="/assets/images/wordchef.png" alt="Word Apptite chef">
            </div>
            <div class="col-md-6">
                <h2 class="homesubtitle">Word Apptite chef</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                    et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                    aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
                    culpa qui officia deserunt mollit anim id est laborum.
                </p>
            </div>
        </div>
    </div>

@stop

@section('home-banner')
    <h2 style="text-align: center; margin: 50px 0 20px 0;" class="hometitle">Een unieke eetervaring</h2>

    <div class="banner-home">
        <a href="#myModal" data-toggle="modal">
            <div class="banner-home-overlay">
                <img class="play-button hvr-grow" src="/assets/images/play-button.png" alt="play button">
            </div>
        </a>
    </div>

    <!-- VIDEO MODAL -->
    <div id="myModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/itVh_KpfWco?rel=0?autoplay=1"
                            frameborder="0" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
@stop


