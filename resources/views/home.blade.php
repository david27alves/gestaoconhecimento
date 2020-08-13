@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">

    <div class="col-md-3">
        <div class="list-group">
            @foreach ($categorias as $categoria)
            <button type="button" class="list-group-item list-group-item-action">{{ $categoria->descricao }}</button>
            @endforeach
        </div>
    </div>

    <div class="col-md-9">
        <div class="card">
            <div class="card-header">
                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-rss" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M14 1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                    <path d="M5.5 12a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                    <path fill-rule="evenodd" d="M2.5 3.5a1 1 0 0 1 1-1c5.523 0 10 4.477 10 10a1 1 0 1 1-2 0 8 8 0 0 0-8-8 1 1 0 0 1-1-1zm0 4a1 1 0 0 1 1-1 6 6 0 0 1 6 6 1 1 0 1 1-2 0 4 4 0 0 0-4-4 1 1 0 0 1-1-1z"/>
                </svg>
                {{ __(' Recentes') }}</div>

                <ul class="list-group list-group-flush">
                    @foreach ($conhecimentos as $conhecimento)
                        <li class="list-group-item"><a href="#" class="badge badge-success">NFC-e</a> <a href="#">{{$conhecimento->titulo}}</a></li>
                    @endforeach
                </ul>
                
            </div>
        </div>        
    </div>
</div>
@endsection
