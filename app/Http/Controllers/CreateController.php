<?php
use Illuminate\Support\Facades\Storage;
    use Illuminate\Http\Request;   
    use Illuminate\Routing\Controller;
    use App\Models\User;
    use App\Models\Event;
    use App\Models\Carrello;


    class CreateController extends Controller{

        public function random(){
            $json = Http::get("https://app.ticketmaster.com/discovery/v2/events.json?size=10&apikey=".env('TICKETMASTER_APIKEY'));

            if($json->failed()){
                abort(500);
            } else {
                return $json['_embedded']['events'];
            }
        }

        public function search($query){
            $json = Http::get('https://app.ticketmaster.com/discovery/v2/events.json', [
                'size' => 10,
                'keyword' => $query,
                'apikey' => env("TICKETMASTER_APIKEY")
            ]);

            if($json->failed()){
                abort(500);
            } else {
                return response()->json($json['_embedded']['events']);
            }
        }

        public function create(){
            $session_id = session('user_id');
            $user = User::find($session_id);
            if(!isset($user)){
                return redirect('errore');
            } else {
                return view('create')->with('csrf_token', csrf_token())->with('ok', false)->with('exist', false);
            }
        }

        public function save(){
            $session_id = Session::get('user_id');
           
            $event = Event::where('id', request('id'))->first();
            if($event==null){
                $newEvent = new Event;
                $newEvent->id = request('id');
                $newEvent->name = request('name');
                $newEvent->data = request('data');
                $newEvent->prezzo = request('prezzo');
                $newEvent->citta = request('citta');
                $newEvent->image = request('image');
                $newEvent->save();
            
                return view('create')->with('ok', true)->with('exist', false)->with('csrf_token', csrf_token());
            } else {
                return view('create')->with('exist', true)->with('ok', false)->with('csrf_token', csrf_token());
            }
            
        }

        public function insertCart(Request $request){

            

            $date_now = new DateTime(date("Y-m-d"));
            $event = Event::where('id', request('id'))->first();
            if($event == null){
                $newEvent = new Event;
                $newEvent->id = request('id');
                $newEvent->name = request('name');
                $newEvent->data = request('data');
                $newEvent->prezzo = request('prezzo');
                $newEvent->citta = request('citta');
                $newEvent->image = request('image');
                $newEvent->save();
            }
            $cart = Carrello::all()->where('user_id', Session::get('user_id'))->last();
            
            if($cart){
                $diff = date_diff($cart->created_at, $date_now);
            }

            if(!$cart || $diff->days >= 7){
                $newCart = new Carrello;
                $newCart->user_id = Session::get('user_id');
                $newCart->event_id = request('id');
                $newCart->save();
                return response()->json($newCart);
            } else {
                $newCart = new Carrello;
                $newCart->id = $cart->id;
                $newCart->user_id = $cart->user_id;
                $newCart->event_id = request('id');
                $newCart->save();
                return response()->json($newCart);
            }
            
        }

        public function removeFromCart(){

            $session_id = session('user_id');
            $max_id = Carrello::where('user_id', $session_id)->max('id');
            $remove = Carrello::where('user_id', $session_id)->where('id', $max_id)->where('event_id',request('id'))->delete();
        
            return $remove;

        }
    }
?>