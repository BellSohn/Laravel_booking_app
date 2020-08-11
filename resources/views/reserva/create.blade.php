@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div id="client_warning"></div>
                    @if(session('message'))
                    <div class="alert alert-success">
                        {{ session('message')}}
                    </div>
                    @endif
                
                <div class="card-header">{{ __('crea una nueva Reserva') }}</div>                

                <div class="card-body">
                    <form method="POST" action="{{ route('reserva.saveBooking') }}" aria-label="{{ __('Register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="Client_Code" class="col-md-4 col-form-label text-md-right">{{ __('client_id') }}</label>

                            <div class="col-md-6">
                                <input id="client_id"   type="number" class="form-control{{ $errors->has('client_id') ? ' is-invalid' : '' }}" name="client_id" value="{{ old('client_id') }}" required autofocus>

                                @if ($errors->has('client_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('client_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                         <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                         <div class="form-group row">
                            <label for="surname" class="col-md-4 col-form-label text-md-right">{{ __('Surname') }}</label>

                            <div class="col-md-6">
                                <input id="surname" type="text" class="form-control{{ $errors->has('surname') ? ' is-invalid' : '' }}" name="surname" value="{{ old('surname') }}" required autofocus>

                                @if ($errors->has('surname'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('surname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="type" class="col-md-4 col-form-label text-md-right">{{ __('type') }}</label>

                            <div class="col-md-6">
                                <input id="type" type="text" class="form-control{{ $errors->has('type') ? ' is-invalid' : '' }}" name="type" value="{{ old('type') }}" required autofocus>

                                @if ($errors->has('type'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('type') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="room" class="col-md-4 col-form-label text-md-right">{{ __('room') }}</label>

                            <div class="col-md-6">
                                <input id="room" type="number" class="form-control{{ $errors->has('room') ? ' is-invalid' : '' }}" name="room" value="{{ old('room') }}" required>

                                @if ($errors->has('room'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('room') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="date_in" class="col-md-4 col-form-label text-md-right">{{ __('Date_In') }}</label>

                            <div class="col-md-6">
                                <input id="date_in" type="datetime" class="form-control{{ $errors->has('date_in') ? ' is-invalid' : '' }}" name="date_in" required placeholder="y.m.d">

                                @if ($errors->has('date_in'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('date_in') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="date_out" class="col-md-4 col-form-label text-md-right">{{ __('Date_Out') }}</label>

                            <div class="col-md-6">
                                <input id="date_out" type="datetime" class="form-control" name="date_out" required placeholder="y.m.d">
                            </div>
                        </div>
                        <label for="comments" class="col-md-4 col-form-label text-md-right">Comentarios</label>
                        <textarea class="form-control comment-textarea" id="comments" name="comments" required>
                            
                        </textarea>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary" id="btn_submit">
                                    {{ __('set a new Booking') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
