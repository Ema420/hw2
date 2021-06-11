@extends('layout')

@section('title', 'HomeUtente')
@section('css', '/hw2/resources/css/home_utente.css')
@section('script', '/hw2/resources/js/home_utente.js')
@section('divClass', 'primary')
@section('sidebar')
    <a class='button' href="crea">Crea Evento</a>
    <a class='button' href="storico">Storico</a>
    <a class='button' href="carrello" id='cart'>Carrello </a>
    <a class='button' href="logout">LogOut</a>
    <a class='button' href='presentazione'>About</a>
@endsection
@section('navHide')
<div id='modale'>
                        <div class='hide' id='popup'>
    <a class='hideButton' href="crea">Crea Evento</a>
    <a class='hideButton' href="storico">Storico</a>
    <a class='hideButton' href="carrello" id='cart'>Carrello </a>
    <a class='hideButton' href="logout">LogOut</a>
    <a class='hideButton' href='presentazione'>About</a>
</div>
</div>
@endsection
@section('username', $user->username)
@section('contenuti')
    <div class="content">
        <input type='hidden' name='_token' value='{{ $csrf_token }}'>
    </div>
@endsection