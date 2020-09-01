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
<div class="row justify-content-center">
<div class="col-md-8">
    <div class="card">
        <div class="card-header">Editar Conhecimento</div>
        <div class="card-body">
            <form method="POST" action="{{ route('incluirconhecimento') }}">
                @csrf
                <div class="form-group">
                    <label for="titulo">Título</label>
                    <input type="text" class="form-control" id="titulo" name="titulo" value="{{$conhecimento[0]->titulo}}">
                </div>
                <div class="form-group">
                    <label for="categoria">Categoria</label>
                    <select class="form-control" id="categoria" name='id_categoria'>
                    
                        <option value="{{$categoria}}">{{$categoria}}</option>
                    
                    </select>
                </div>

                <div class="form-group">
                    <label for="descricao">Descrição</label>
                    <!--<textarea class="form-control" id="descricao" rows="7" name="descricao"></textarea>-->
                    <textarea id="descricao" rows="20" name="descricao">{{$conhecimento[0]->descricao}}</textarea>
                </div>

                <div class="form-group">
                    <label for="anexos">Anexos</label>
                    <input type="file" class="form-control-file" id="anexos" multiple name="anexos">
                </div>

                <button type="submit" class="btn btn-primary">Cadastrar</button>

            </form>
        </div>
    </div>
</div>
</div>
</div>



@endsection