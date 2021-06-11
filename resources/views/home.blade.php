@extends('layout')

@section('title', 'Home')
@section('css', '/hw2/resources/css/homepage.css')
@section('script', '/hw2/resources/js/homepage.js')
@section('divClass', 'row')

@section('contenuti')
<p>
    Management Event è il sito dove puoi trovare e gestire tutti gli eventi dell'Italia. Puoi prenotare, salvare e condividere gli eventi con gli amici.
    Puoi scegliere tra Sport, Musica e Teatro. E se sei registrato avrai tante funzionalità in più.
</p>
<div>
<div class="content">
    <p>
        <img src=".\img1.jpeg">
    </p>
                            
    <h2>Sport</h2>
    <span>Tutti gli eventi sportivi dal Calcio al Tennis, e anche quelli più estremi...</span>

                            
</div>
<div class="content">
    <p>
        <img src=".\img3.jpg">
    </p>
                    
    <h2>Teatro</h2>
    <span>Scopri tutte le rappresentazioni teatrali...</span>
                            
</div>	
                        
<div class="content">
    <p>
        <img src=".\img2.jpg">
    </p>
    <h2>Musica</h2>
    <span>Trova tutti i concerti più adatti a te...</span>
                            
                            
</div>
</div>
<div class='row'>
    <div class='content'>
        <img src="login.png">
        <button class='button' onclick='openLogin()'>Accedi</button>
        <em>
            Se sei già registrato clicca "Accedi" per accedere.
        </em>
    </div>
    @if($errore)
        <article id='login' class='modale'>
    @else
        <article id='login' class='hide'>
    @endif

            <div class='popup'>
                <h2>Inserisci le tue credenziali!</h2>
                <form name='login' method='post' action="{{ route('login') }}">
                    <input type='hidden' name='_token' value='{{ $csrf_token }}'>
                            
                    <label> Username <input type='text' name='login_username' value="{{ old('login_username') }}"></input></label>
                    <label> Password <input type='password' name='login_password'></input></label>
                    @if($errore)
                        <em>{{ $errore }}</em>
                    @endif
                    <label> &nbsp <input type='submit' value='Accedi' id='accedi'></input></label>
                </form>
            </div>
        </article>
        <div class='content'>
            <img src="register.png">
                        
            <button class='button' onclick='openSignIn()'>Registrati</button>
                                
            <em>Registrati per usufruire di tutti i servizi!
            </em>
        </div>
        <article id='signin' class='hide'>
            <div class='popup'>
                <h2>Compila tutti i campi per registrarti e usufruire dei vantaggi!</h2>
                <form name='signin' method='post' action="{{ route('signup') }}">
                    <input type='hidden' name='_token' value='{{ $csrf_token }}'>

                    <label> Nome <input type='text' name='name'></input></label>
                    <label> Cognome <input type='text' name='surname'></input></label>
                    <label> Email <input type='text' name='email'></input></label>
                    <label> Username <input type='text' name='username'></input></label>
                    <label> Password <input type='password' name='password'></input></label>
                    <label> Conferma Password <input type='password' name='password_confirm'></input></label>
                    <label> Acconsento al trattamento dei dati personali <input type='checkbox' name='allow[]' value='ok'></input></label>
                    <label> &nbsp <input type='submit' value='Registrati' id='registrati'></input></label>
                </form>
            </div>
        </article>
</div>
@endsection


