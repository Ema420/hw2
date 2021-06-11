<?php

    use Illuminate\Routing\Controller;
    use App\Models\User;

    class LoginController extends Controller {

        /*public function login(){
            if(session('user_id') != null){
                return redirect('home_utente')->with('user', $user);
            } else {
                $old_username = Request::old('login_username');
                return view('home')->with('old_username', $old_username);
            }
        }*/

        public function checkLogin(){
            $user = User::where('username', request('login_username'))->first();
            
            if(!$user){
                $errore = 'username non trovato';
                return redirect('home/'.$errore)->withInput();
            }
            
            if(request('login_password')==null){
                $errore = 'inserisci password';
                return redirect('home/'.$errore)->withInput();
            }
            if(Hash::check(request('login_password'),$user->password)){
                Session::put('user_id', $user->id);
                return redirect('home_utente')->with('user', $user)->with('csrf_token',csrf_token());
            } else {
                $errore = 'password non corretta';
                return redirect('home/'.$errore)->withInput();
            }
             
        }

        public function logout(){
            Session::flush();
            return redirect('home');
        }
    }
?>