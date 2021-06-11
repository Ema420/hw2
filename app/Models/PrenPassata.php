<?php
    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class PrenPassata extends Model{
        protected $table = 'pren_passata';

        protected $fillable = [
            'user_id',
            'event_id',
            'created_at',
            'updated_at'
        ];

        public function users(){
            return $this->hasMany("App\Models\User");
        }
    
        public function events(){
            return $this->hasMany("App\Models\Event");
        }
    }

    
?>