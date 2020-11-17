
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
                            
                            <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#inseriranexo" >
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-paperclip" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M4.5 3a2.5 2.5 0 0 1 5 0v9a1.5 1.5 0 0 1-3 0V5a.5.5 0 0 1 1 0v7a.5.5 0 0 0 1 0V3a1.5 1.5 0 1 0-3 0v9a2.5 2.5 0 0 0 5 0V5a.5.5 0 0 1 1 0v7a3.5 3.5 0 1 1-7 0V3z"/>
                                </svg>
                            </a>
                        </div>

         
                        <p id="exibiranexo"></p>

                        <!-- Modal -->

                        <div class="modal fade" id="inseriranexo" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Inserir anexo</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                            
                                <div class="form-group">
                                    <label for="formGroupExampleInput">Nome</label>
                                    <input type="text" class="form-control" id="nomeanexo" name="nomeanexo">
                                </div>
                                <div class="form-group">
                                    <label for="formGroupExampleInput2">Link</label>
                                    <input type="text" class="form-control" id="anexo" name="anexo">
                                </div>
                                
                            </div>
                            <div class="modal-footer">
                                <a class="btn btn-secondary" data-dismiss="modal" href="#">Cancelar</a>
                                <a class="btn btn-success" data-dismiss="modal" id="btninserir" href="#">Inserir anexo</a>
                            </div>
                            </div>
                        </div>
                        </div>
                        <!-- Fim modal -->

                        <button class="btn btn-success">Cadastrar</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection