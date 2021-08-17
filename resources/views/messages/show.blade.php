@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card">
                <div class="card-header">Mensaje</div>

                <div class="card-body">
                   <p>{{ $message->body }}</p>
                   <small>Enviado por {{ $message->sender->name }}</small>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
