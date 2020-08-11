<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Booking;
use App\Client;

class ReservaController extends Controller
{
    
        public function __construct() {
            $this->middleware('auth');
        }


        
    public function create(){
        //este controller se usa para cargar el formulario
        
        return view('reserva.create');
    }
    
    
     public function searchClient($id){
        
        $searchClient = Client::where('id',$id)->first();
        
        if($searchClient){
            return response()->json([
             'cliente'=>$searchClient,
              'message'=>'cliente existe'      
              ]);
        }else{
            return response()->json(['message'=>'cliente no existe']);
        }
        
        if($searchClient->id != $id){
          
            return response()->json(['message'=>'El cliente no existe en la db']);
        }
        
    }
    
    public function verReservas(){
        
        $reservas = Booking::orderBy('id','desc')->paginate(3);
        
        
        
        return view('reserva.verReservas',['reservas'=>$reservas]);
        
        
        
    }
    
   /*metodo para establecer el formulario de modificación de reserva*/
        public function editReserva($id){
            
            $reserva = Booking::findOrFail($id);
            if($reserva){
                
                return view('reserva.editReserva',array('reserva'=>$reserva));
                
            }else{
                return redirect()->route('home');
            }
      }

      
      public function updateBooking($id,Request $request){
          
          //validar el formulario
          $validate = $this->validate($request,[
              'name'=>'required|string',
              'surname'=>'required|string',
              'type'=>'required|string',
              'room'=>'required|integer|min:99',
              'date_in'=>'required|date',
              'date_out'=>'required|date',
              'comments'=>'string'
          ]);
          
         $booking = Booking::findOrFail($id);
         if($booking){
             
             $booking->name = $request->input('name');
             $booking->surname = $request->input('surname');
             $booking->type = $request->input('type');
             $booking->room = $request->input('room');
             $booking->date_in = $request->input('date_in');
             $booking->date_out = $request->input('date_out');
             $booking->comments = $request->input('comments');
             
             
             $booking->update();
         }
         
         return redirect()->route('reserva.verReservas')->with(array('message'=>'the booking was updated!'));
          
      }
      
      
      public function deleteBooking($id){
          
          $booking = Booking::findOrFail($id);
          if($booking){
             // var_dump($booking);
              $booking->delete();
          }
          return redirect()->route('reserva.verReservas')->with(array('message'=>'the booking was deleted'));
          
      }
    



    public function saveBooking(Request $request){
        
        if($request){
            //var_dump($request);
            $user_id = \Auth::user()->id;
            
            //validar los datos
            $validate = $this->validate($request,[
                'client_id'=>'required|integer',
                'name'=>'required|string',
                'surname'=>'required|string',
                'type'=>'required|string',
                'room'=>'required|integer|min:99',
                'date_in'=>'required|date',
                'date_out'=>'required|date',
                'comments'=>'required|string'
            ]);
            
            //Crear el objeto y seterarlo
            
            $newBooking = new Booking();
            
            $newBooking->user_id = $user_id;
            $newBooking->client_id = $request->input('client_id');
            $newBooking->name = $request->input('name');
            $newBooking->surname = $request->input('surname');
            $newBooking->type = $request->input('type');
            $newBooking->room = $request->input('room');
            $newBooking->date_in = $request->input('date_in');
            $newBooking->date_out = $request->input('date_out');
            $newBooking->comments = $request->input('comments');
            
            //guardar el objeto en la db
            $newBooking->save();
            
            return redirect()->route('reserva.create')->with(['message'=>'La reserva se ha guardado con exito']);
            
        }
        
        
        
    }
    
    
}
