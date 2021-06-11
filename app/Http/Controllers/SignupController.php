<?php

    use Illuminate\Routing\Controller;
    use App\Models\User;

    class SignupController extends Controller{

        public function create(){
           $request = request();
           
           if($this->countError($request) === 0){
                $newUser = User::create([
                    'username' => $request->username,
                    'name' => $request->name,
                    'surname' => $request->surname,
                    'password' => Hash::make($request->password),
                    'email' => $request->email
                ]);
                if($newUser){
                    Session::put('user_id', $newUser->id);
                    return redirect('home_utente');
                } else {
                    return redirect('home')->withInput();
                }
            } else {
                return redirect('home')->withInput();

           }
        }

        public function checkUsername($query){
            $exist = User::where('username', $query)->exists();
            return ['exists' => $exist];
        }

        public function checkEmail($query){
            $exist = User::where('email', $query)->exists();
            return ['exists' => $exist];            
        }

        private function countError($data){
            $error = array();

            //CheckUsername
            $username = User::where('username',$data['username'])->first();
            if(isset($username)){
                $error[] = 'Username già in uso';
            }

            if(strlen($data['password']) < 8){
                $error[] = 'password troppo corta';
            }

            if(strcmp($data['password'], $data['password_confirm']) != 0){
                $error[] = 'le password non coincidono';
            }

            if(!filter_var($data['email'], FILTER_VALIDATE_EMAIL)){
                $error[] = 'email non valida';
            } else {
                $email = User::where('email', $data['email'])->first();
                if($email !== null){
                    $error[] = 'email gia utilizzata';
                }
            }

            return count($error);
        }
    }
?>