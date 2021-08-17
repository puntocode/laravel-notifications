@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3>POST</h3>

                </div>
            </div>
            <div class="card-body">
                <a href="{{ route('posts.create') }}" class="btn btn-primary">Crear Post</a>
                @foreach ($posts as $post)
                    <div class="panel">
                        <div class="panel-heading">
                            {{ $post->title }}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
