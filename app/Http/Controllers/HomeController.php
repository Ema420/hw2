<?php

    use Illuminate\Http\Request;   
    use Illuminate\Routing\Controller;
    use App\Models\User;
    use App\Models\Carrello;
    use App\Models\Event;
    use App\Models\PrenCorrente;
    use App\Models\PrenPassata;


    class HomeController extends Controller {
        public function index(){
            $session_id = session('user_id');
            $user = User::find($session_id);
            if(!isset($user)){
                return redirect('errore');
            } else {
                return view('home_utente')->with('user', $user)->with('csrf_token', csrf_token());
            }
        }

        public function check($errore){
            $session_id = session('user_id');
            $user = User::find($session_id);
            if(!isset($user)){
                
                return view('home')
                    ->with('csrf_token', csrf_token())
                    ->with('errore',$errore);
            } else {
                return redirect('home_utente')->with('user', $user);
            }
        }

        public function feed(){
            $events = Event::all();
            return $events;
        }

        public function indexCart(){
            $session_id = session('user_id');
            $user = User::find($session_id);
            if(!isset($user)){
                return redirect('errore');
            } else {
            return view('carrello')->with('user', $user);
            }
        }

        public function showCart(){
            $session_id = session('user_id');
            $max_id = Carrello::where('user_id', $session_id)->max('id');
            $carts = Carrello::all()->where('user_id', $session_id)->where('id', $max_id);
            
            foreach($carts as $cart){
                $eventArray[] = Event::where('id', $cart->event_id)->first();
            }
            return $eventArray;
        }

        public function checkOut(Request $request){
            
            $session_id =Session::get('user_id');

            foreach($request->all() as $idEvent){
                
                $newPren = new PrenCorrente;
                $newPren->user_id = $session_id;
                $newPren->event_id = $idEvent;
                $newPren->save();
                $remove = Carrello::where('event_id', $idEvent)->where('user_id', $session_id)->delete();
                
            }
            return response()->json(['ok' => true]);
        }

        
        
        public function prenCorrente(){

            $eventArray = array();
            $prenCorrente = PrenCorrente::all()->where('user_id', Session::get('user_id'));

            //Controllo data se sono passati 7 giorni aggiunge a prenPassata
            $date_now = new DateTime(date("Y-m-d"));
            
            foreach($prenCorrente as $idEvent){
                if(date_diff($date_now, $idEvent->created_at)->days <= 7){
                    $eventArray[] = Event::where('id', $idEvent->event_id)->first();
                } else {
                    $res = PrenCorrente::where('event_id', $idEvent->event_id)->delete();
                    if($res){
                        $prenPassata = new prenPassata;
                        $prenPassata->user_id = Session::get('user_id');
                        $prenPassata->event_id = $idEvent->event_id;
                        $prenPassata->created_at = $idEvent->created_at;
                        $prenPassata->save();
                    }
                }
                
            }

            return response()->json($eventArray);

        }

        public function prenPassata(){

            $eventArray = array();
            $prenPassata = PrenPassata::all()->where('user_id', Session::get('user_id'));
            
            foreach($prenPassata as $idEvent){
                $eventArray[] = Event::where('id', $idEvent->event_id)->first();
            }

            return response()->json($eventArray);

        }

        public function showStorico(){
            $session_id = session('user_id');
            $user = User::find($session_id);
            if(!isset($user)){
                return redirect('errore');
            } else {
                return view('storico')->with('crsf_token', csrf_token());
            }
        }
    }
?>