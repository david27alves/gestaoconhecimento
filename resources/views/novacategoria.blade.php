@extends('layouts.app')

@section('content')

<div class="container">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                @foreach($errors->all() as $error)
                    <strong>{{ $error }}</strong> 
                @endforeach
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            

        @endif
    

        <form class="form-inline" method="post" action="{{ route('incluircategoria') }}">

            @csrf
            <div class="form-group mb-2">
                <label for="staticEmail2" class="col-sm-2 col-form-label">Categoria</label>
            </div>
            <div class="form-group mx-sm-3 mb-2">                
                <input type="text" class="form-control" id="categoria" name="descricao" >
            </div>
            <button type="submit" class="btn btn-primary mb-2">Cadastrar</button>

        </form>
   
</div>

@endsection