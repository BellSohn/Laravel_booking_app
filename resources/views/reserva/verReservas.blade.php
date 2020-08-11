@extends('layouts.app')

@section('content')
<div class="title">
    <h1>BOOKING INFO</h1>
</div>
<div class="clearfix"></div>
<div class="row">
    
    <div class="col-10">
        
        <table buttons_info class="buttons_info table table-bordered table-secondary">
            <tr>
                <th>Booking Id</th>
                <th>Cliente id</th>
                <th>Cliente name</th>
                <th>Cliente surname</th>
                <th>booking type</th>
                <th>Room Number</th>
                <th>Date in</th>
                <th>Date out</th>
                <th>Comments</th>
                <th>Actions</th>
            </tr>
            @foreach($reservas as $reserva)
            <tr>
                <td>{{ $reserva->id }}</td>
                <td>{{ $reserva->client_id }}</td>
                <td>{{ $reserva->name }}</td>
                <td>{{ $reserva->surname }}</td>
                <td>{{ $reserva->type }}</td>
                <td>{{ $reserva->room }}</td>
                <td>{{ $reserva->date_in }}</td>
                <td>{{ $reserva->date_out}}</td>
                <td>{{ $reserva->comments}}</td>
                <td><a href="{{ route('editReserva',['id'=>$reserva->id])}}" class="btn btn-info">Edit</a>
                    <a href="#deleteModal{{$reserva->id}}" class="btn btn-warning" data-toggle="modal">Delete</a></td>
                 <div id="deleteModal{{ $reserva->id }}" class="modal fade"> 
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                        <h4 class="modal-title">¿are you sure?</h4>
                                    </div>
                                    <div class="modal-body">
                                        <p>do you really want to delete the booking</p>
                                        <p class="text-info"></p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">cancel</button>
                                        <a href="{{ url('/delete-booking/'.$reserva->id)}}" type="button" class="btn btn-danger">delete</a>
                                    </div>
                                </div>
                            </div>
                 </div>
                
                
            </tr>
            @endforeach
            
        </table>
        
        
    </div>
   
    
    
</div>
 <div class="clearfix"></div>
    <!--pagination-->
    <div class="div_paginate">
        {{$reservas->links()}}
    </div>
    



@endsection
