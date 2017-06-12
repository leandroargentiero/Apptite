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
                <p>Maak een account aan en zoek naar Apptite events bij jou in de buurt en reserveer je plaats bij de
                    Apptite chef. Ga naar de locatie op de afgesproken datum en tijd. Schuif aan tafel en geniet van een
                    lekker verse huisbereide maaltijd in goed gezelschap. Goede ervaring gehad? Laat het dan zeker en
                    weten aan de Apptite chef door een review achter te laten op zijn profiel pagina.
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
                <p>Registreer je op het platform en plaats je beste gerechten in je kookboek. Vanuit je kookboek kan je
                    een Apptite event publiceren waarop andere Apptiters kunnen reserveren om bij jou aan tafel te
                    schuiven. Tover je eettafel om tot een huiskamerrestaurant en geef je gasten een unieke eetervaring.
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


