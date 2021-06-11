@extends('layout')

@section('title', 'Crea Evento')
@section('css', '/hw2/resources/css/crea.css')
@section('script', '/hw2/resources/js/crea.js')
@section('divClass', 'primary')
@section('sidebar')
    <a class='button' href="home_utente">Home</a>
    <a class='button' href="storico">Storico</a>
    <a class='button' href="carrello" id='cart'>Carrello </a>
    <a class='button' href="logout">LogOut</a>
    <a class='button' href='presentazione'>About</a>
@endsection
@section('navHide')
<div id='modale'>
                        <div class='hide' id='popup'>
    <a class='hideButton' href="home_utente">Home</a>
    <a class='hideButton' href="storico">Storico</a>
    <a class='hideButton' href="carrello" id='cart'>Carrello </a>
    <a class='hideButton' href="logout">LogOut</a>
    <a class='hideButton' href='presentazione'>About</a>
</div>
</div>
@endsection
@section('header')
    <header id="title">
        <h1>Crea il tuo evento</h1>	
    </header>
@endsection

@section('contenuti')
@if($ok)
    <em> Evento inserito correttamente!</em>
@endif
@if($exist)
    <em> ID già in uso!</em>
@endif
    <div class="content">
    <form name='create' method='post' action="{{ route('crea') }}">
        <input type='hidden' name='_token' value='{{ $csrf_token }}'>
        <label> Id <input type='text' name='id' placeholder='Valore numerico'></input></label><br>
        <label> Nome <input type='text' name='name'></input></label><br>
        <label> Data <input type='date' name='data'></input></label><br>
        <label> Prezzo <input type='text' name='prezzo'></input></label><br>
        <label> Citta <input type='text' name='citta'></input></label><br>
        <label> Image <input type='file' id='img' name='image' accept='image/*'></input></label><br>
        <label> &nbsp <input type='submit' value='Inserisci' id='inserisci'></input></label><br>
    </form>
    </div>
@endsection