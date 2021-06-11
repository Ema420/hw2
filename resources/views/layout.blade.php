<html>
    <head>
        <title>@yield('title')</title>
        <link rel="stylesheet" href=@yield('css')>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="preconnect" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css2?family=Acme&family=Dosis:wght@300;500;800&family=Staatliches&display=swap" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css2?family=Lexend:wght@300;500;800&display=swap" rel="stylesheet">
		<script src=@yield('script') defer></script>
    </head>
    <body>
        <header>
        <div class=@yield('divClass')>
                <nav>
                    @section('sidebar')
                    <a class='button'>Home</a>
                    <a class='button' onclick='openLogin()'>Login</a>
                    <a class='button' href='presentazione'>About</a>
                    @show
                    <button onclick='openNav()'><img src='234.png' class='hideNav' id='nav'></img>
                    @section('navHide')
                    <div id='modale'>
                        <div class='hide' id='popup'>
                        <a class='hideButton'>Home</a>
                        <a class='hideButton' onclick='openLogin()'>Login</a>
                        <a class='hideButton' href='presentazione'>About</a>
</div>
</div>
                    @show
                </nav>
                
                <div id="flex-right">
                    @section('header')
                    <header id="title">
                        <div id="overlay"></div>
                        <h1>
                        Benvenuto @yield('username') in Management Events!
                        </h1>
                
                    </header>
                    @show
                   
                    <section>
                    @section('contenuti')
                    
                    @show
                    </section>
                    
        </header>
        <footer>
            <strong>Emanuele Gurrieri O46001995</strong>
            <strong>Progetto Web Programming A.A. 2020/2021</strong>
        </footer>
    </body>
</html>