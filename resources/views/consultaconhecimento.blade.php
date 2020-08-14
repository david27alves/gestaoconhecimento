@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-9">
           
        
        <div class="col-md-12">
        <div class="card">
            <div class="card-header">               
                {{ __(' Resultados') }}</div>

                <ul class="list-group list-group-flush">
                    @foreach ($conhecimentos as $conhecimento)
                        <li class="list-group-item"><a href="/conhecimento/{{$conhecimento->id}}">{{$conhecimento->titulo}}</a></li>
                    @endforeach
                </ul>
                
            </div>
        </div>        
    </div>
            
        </div>
    </div>
</div>


@endsection