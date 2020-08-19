@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-md-center">
        <div class="col col-lg-8">

        	<h1>Lista de Publicaciones</h1>
            <div class="row">
                @foreach($posts as $post)
                <div class="col col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                        <h5 class="card-title">{{ $post->name }}</h5>
                        <a href="{{route('post', $post->slug)}}" class="btn btn-primary">Leer más</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="row justify-content-md-center">
                <div class="col-md-auto">
                    {{ $posts->render() }}
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
