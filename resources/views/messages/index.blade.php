@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            @if (session()->has('flash'))
                <div class="alert alert-success">{{ session('flash') }}</div>
            @endif

            <div class="card">
                <div class="card-header">Enviar mensaje</div>

                <div class="card-body">
                   <form action="{{ route('message.store') }}" method="POST">
                        @csrf
                       <div class="form-group {{ $errors->has('message') ? 'border-danger' : '' }}">
                           <select name="user_id"  class="form-control">
                               <option value="">-- Selecciona un Usuario --</option>
                               @foreach ($users as $user)
                                   <option value="{{ $user->id }}">{{ $user->name }}</option>
                               @endforeach
                           </select>
                           {!! $errors->first('user_id', '<span class=text-danger>:message</span>') !!}

                       </div>
                       <div class="form-group {{ $errors->has('message') ? 'has-error' : '' }}">
                           <textarea name="message" class="form-control" placeholder="Mensaje"></textarea>
                           {!! $errors->first('message', '<span class=text-danger>:message</span>') !!}
                       </div>
                       <button class="btn btn-primary btn-block mt-4">Enviar</button>
                   </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
