@extends('layout')

@section('title', 'Cronologia Ordini')
@section('css', '/hw2/resources/css/storico.css')
@section('script', '/hw2/resources/js/storico.js')
@section('divClass', 'primary')
@section('sidebar')
    <a class='button' href="home_utente">Home</a>
    <a class='button' href="crea">Crea Evento</a>
    <a class='button' href="carrello" id='cart'>Carrello</a>
    <a class='button' href="logout">LogOut</a>
    <a class='button' href='presentazione'>About</a>
@endsection
@section('navHide')
<div id='modale'>
                        <div class='hide' id='popup'>
    <a class='hideButton' href="home_utente">Home</a>
    <a class='hideButton' href="crea">Crea Evento</a>
    <a class='hideButton' href="carrello" id='cart'>Carrello</a>
    <a class='hideButton' href="logout">LogOut</a>
    <a class='hideButton' href='presentazione'>About</a>
</div>
</div>
@endsection
@section('header')
@csrf
    <header id="title">
        <h1>Cronologia Ordini</h1>
    </header>
@endsection
@section('contenuti')
    <section class="corrente">
        <h4>Ordini Correnti</h4>
        <div class="content">
        </div>
    </section>
    <section class="passate">
        <h4>Ordini Precedenti</h4>
        <div class="content">
        </div>
    </section>
@endsection