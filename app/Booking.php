<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
   
    protected $table = 'bookings';   
       
    
    public function user(){
        
        return $this->belongsTo('App\User','user_id');
    }
    
    public function clients(){
        
        return $this->belongsTo('App\Client','client_id');
    }
    
    
}
