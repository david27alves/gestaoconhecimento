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
                <div class="card-header">Cadastrar Conhecimento</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('incluirconhecimento') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="titulo">Título</label>
                            <input type="text" class="form-control" id="titulo" name="titulo">
                        </div>
                        <div class="form-group">
                            <label for="categoria">Categoria</label>
                            <select class="form-control" id="categoria" name='id_categoria'>
                            @foreach($categorias as $categoria)
                                <option value="{{$categoria->id}}">{{$categoria->descricao}}</option>
                            @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="descricao">Descrição</label>
                            <textarea id="descricao" rows="20" name="descricao"></textarea>
                        </div>

                        <input type="hidden" id="usuario" name="id_usuario" value="{{ auth()->user()->id }}">

                        <div class="form-group">
                            <label for="anexos">Anexos</label>
                            <input type="file" class="form-control-file" name="anexos[]" multiple>
                        </div>

                        <button type="submit" class="btn btn-primary">Cadastrar</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection