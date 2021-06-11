@extends('layout')

@section('title', 'Carrello')
@section('css', '/hw2/resources/css/carrello.css')
@section('script', '/hw2/resources/js/carrello.js')
@section('divClass', 'primary')
@section('sidebar')
    <a class='button' href="home_utente">Home</a>
    <a class='button' href="crea">Crea Evento</a>
    <a class='button' href="storico">Storico</a>
    <a class='button' href="logout">LogOut</a>
    <a class='button' href='presentazione'>About</a>
@endsection
@section('navHide')
<div id='modale'>
                        <div class='hide' id='popup'>
                        <a class='hideButton' href="home_utente">Home</a>
    <a class='hideButton' href="crea">Crea Evento</a>
    <a class='hideButton' href="storico">Storico</a>
    <a class='hideButton' href="logout">LogOut</a>
    <a class='hideButton' href='presentazione'>About</a>
</div>
</div>
@endsection
@section('header')
    <header id="title">
        <h1>Eventi aggiunti al Carrello</h1>	
    </header>
@endsection
@section('contenuti')
    <div class="content">
    </div>
    <div class='checkout'>
    <input type='hidden' name='_token' value='{{ csrf_token() }}'>
    

    <button>Checkout</button>
    
    </div>
@endsection