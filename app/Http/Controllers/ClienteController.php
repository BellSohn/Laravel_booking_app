<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

use App\Client;

class ClienteController extends Controller
{
    
    public function __construct() {
        
        $this->middleware('auth');
    }
    
    
    
    public function create(){
                
        return view('cliente.create');       
        
    }
    
    
    
    public function EditCliente($id){
        
        $cliente = Client::findOrFail($id);
        if($cliente){

            return view('cliente.EditCliente',['cliente'=>$cliente]);
            
        }else{
            return redirect()->route('home');
        }
        
        
    }
    
    
    public function deleteCliente($id){
        
        $cliente = Client::findOrFail($id);
        if($cliente){
            $cliente->delete();
        }
        
        return redirect()->route('cliente.AllClientes');
        
    }
    
    
    public function UpdateCliente($id,Request $request){
        
        //validate the form
        $validateData = $this->validate($request,[
            'name'=>'required|string',
            'surname'=>'required|string',
            'address'=>'required|string',
            'telephone'=>'required|integer',
            'email'=>'required|email'
        ]);
        
        $cliente = Client::findOrFail($id);
        if($cliente){
            
            $cliente->name = $request->input('name');
            $cliente->surname = $request->input('surname');
            $cliente->address = $request->input('address');
            $cliente->telephone = $request->input('telephone');
            $cliente->email = $request->input('email');
            
            $cliente->update();
             
        }
        
       return redirect()->route('cliente.AllClientes')->with(array('message'=>'Client successfully updated!'));
        
    }

        
    public function AllClientes(){
        
        $allClientes = Client::orderBy('id','desc')->paginate(3);      
        return view('cliente.AllClientes',['allClientes'=>$allClientes]);
    }   
        
    public function saveClient(Request $request){
        
        if($request){           
            
            $validateDate = $this->validate($request,[
                'name'=>'required|min:5',
                'surname'=>'required|min:5',
                'address'=>'required',
                'telephone'=>'required',
                'email'=>'required'
            ]);
            
            //create the client object
            $newClient = new Client();
            
            $newClient->name = $request->input('name');
            $newClient->surname = $request->input('surname');
            $newClient->address = $request->input('address');
            $newClient->telephone = $request->input('telephone');
            $newClient->email = $request->input('email');
            
            $newClient->save();
            
            return redirect()->route('cliente.create')->with(array('message'=>'cliente creado con exito en la base de datos'));
            
            
            
            
            
        }
        
    }
    
    
    
    
    
    
}
