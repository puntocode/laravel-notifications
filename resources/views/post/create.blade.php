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
                <a href="{{ route('posts.index') }}" class="btn btn-secondary">Volver</a>
                <form action="{{ route('posts.store') }}" class="mt-5" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="">Titulo</label>
                        <input type="text" name="title" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Body</label>
                        <textarea name="body" class="form-control" cols="30" rows="10" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Enviar</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
