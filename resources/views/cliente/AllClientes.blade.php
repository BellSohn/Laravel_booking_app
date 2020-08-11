@extends('layouts.app')

@section('content')
<div class="title">
    <h1>CLIENT INFO</h1>
</div>
<div class="clearfix"></div>
<div class="row">
    <div class="col-10">
        <table class="buttons_info table table-bordered table-primary">
            <tr>
                <th>Codigo cliente</th>
                <th>nombre</th>
                <th>surname</th>
               <th>direccion</th>
               <th>telefono</th>
               <th>E-mail</th>
               <th>Actions</th>
            </tr>
            @foreach($allClientes as $client)
            <tr>
                <td>{{ $client->id }}</td>
                <td>{{ $client->name }}</td>
                <td>{{ $client->surname }}</td>
                <td> {{ $client->address }}</td>
                <td>{{ $client->telephone }}</td>
                <td>{{ $client->email}}</td>
                <td><a href="{{ route('EditCliente',['id'=>$client->id])}}" class="btn btn-info">Edit</a>
                    <a href="#deleteModal{{ $client->id }}" class="btn btn-warning" data-toggle="modal">Delete</a></td>
                <div id="deleteModal{{ $client->id }}" class="modal fade"> 
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                        <h4 class="modal-title">¿are you sure?</h4>
                                    </div>
                                    <div class="modal-body">
                                        <p>do you really want to delete the client</p>
                                        <p class="text-info"></p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">cancel</button>
                                        <a href="{{ url('/delete-cliente/'.$client->id)}}" type="button" class="btn btn-danger">delete</a>
                                    </div>
                                </div>
                            </div>
                 </div>
                
            </tr>
            @endforeach
        </table>
        
    </div>
   
</div>
 <!--paginacion-->
    <div class="clearfix"></div>
    <div class="div_paginate">
        {{ $allClientes->links() }}
    </div>
    
@endsection




