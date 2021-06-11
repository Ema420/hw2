<?php
    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class Carrello extends Model {
        protected $table = 'carrello';

        protected $fillable = [
            'user_id',
            'event_id'
        ];

        public function events(){
            return $this->hasMany("App\Models\Event");
        }

        public function user(){
            return $this->belongsTo("App\Models\User");
        }


    }
?>