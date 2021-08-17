@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Notificaciones</div>
                <div class="card-body">
                    <h3>No leidas</h3>
                    <hr>
                    <ul class="list-group">
                        @foreach ($unreadNotifications as $notification)
                            <li class="list-group-item">
                                <a href="{{ $notification->data['link'] }}">{{ $notification->data['text'] }}</a>
                                <form action="{{ route('notifications.read', $notification->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button class="btn btn-danger btn-xs">X</button>
                                </form>
                            </li>
                        @endforeach
                    </ul>


                    <h3>Leidas</h3>
                    <hr>
                    <ul class="list-group">
                        @foreach ($readNotifications as $notification)
                            <li class="list-group-item">
                                <a href="{{ $notification->data['link'] }}">{{ $notification->data['text'] }}</a>
                                <form action="{{ route('notifications.destroy', $notification->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-xs">X</button>
                                </form>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
