<?php


    use Illuminate\Routing\Controller;
    use App\Models\Event;

    class FeedController extends Controller {

        public function feed(){
            $events = Event::all();
            return $events;
        }
    }
?>