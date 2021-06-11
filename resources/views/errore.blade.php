@extends('layout')

@section('title', 'Errore')
@section('css', '/hw2/resources/css/crea.css')
@section('script', '')
@section('divClass', 'primary')
@section('sidebar')
    <a class='button' href="home"> Home </a>
@endsection
@section('contenuti')
    <div class="content">
        <em> Non hai effettuato il login! </em>
    </div>
@endsection