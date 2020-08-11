<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    //
    protected $table = 'clients';
    
    
    public function bookings(){
        
        return $this->hasMany('App\Booking')->orderBy('id','desc');
    }
    
}
