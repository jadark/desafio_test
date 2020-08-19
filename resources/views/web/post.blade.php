@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-md-center">
        <div class="col col-lg-8">

        	<h1>{{ $post->name }}</h1>
            <p>Autor: {{$post->user->name}} </p>
            <div class="row">
                <div class="col col-md-12">
                    {{-- Comentarios --}}
                    <div class="be-comment-block">
                        <h1 class="comments-title">Comentarios ({{count($post->comments)}})</h1>
                        @if (count($post->comments))
                            @foreach($post->comments as $key => $comment)
                                <div class="be-comment">
                                    <div class="be-img-comment">
                                        <img src="https://bootdey.com/img/Content/avatar/avatar{{$key+1}}.png" alt="" class="be-ava-comment">
                                    </div>
                                    <div class="be-comment-content">
                                        <span class="be-comment-name">{{ $comment->user->name }}</span>
                                        <p class="be-comment-text">{{ $comment->content }}</p>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="alert alert-secondary">No existen comentarios para esta publicación</div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                    @auth
                        @if ($post->hasCommentLoggedUser)
                        @if(session('info'))
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="alert alert-success">
                                            {{ session('info') }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="alert alert-warning">Ya ha realizado un comentario en esta publicación</div>
                                    </div>
                                </div>
                            </div>
                        @endif
                        @else
                            @if(count($errors))
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="alert alert-success">
                                                <ul>
                                                    @foreach($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            <form id="formComment" method="POST" action=" {{ route('storeComment') }} ">
                                <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                                <input type="hidden" name="publication_id" id="publication" value="{{ $post->id }}">
                                <input type="hidden" name="publication_slug" id="publication" value="{{ $post->slug }}">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Agregar Comentarios:</label>
                                    <textarea class="form-control" required name="content" id="commentUser" aria-describedby="emailHelp" cols="30" rows="10"></textarea>
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" name="terms" class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">Acepto términos y condiciones</label>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Envíar Comentario</button>
                                </div>
                            </form>
                        @endif
                    @else
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="alert alert-primary">Para comentar debe estar registrado</div>
                                </div>
                            </div>
                        </div>
                    @endauth
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
