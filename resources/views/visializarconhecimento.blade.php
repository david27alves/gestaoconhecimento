@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-9">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">{{$conhecimento[0]->titulo}}</h2>

                    <div class="btn-group position-absolute" style="right: 10px; top: 10px;" role="group">
                        <button id="" type="button" class="btn" data-toggle="dropdown" >
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-three-dots-vertical" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                            </svg>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                            <a class="dropdown-item" href="/conhecimento/editar/{{$conhecimento[0]->id}}">Editar</a>
                            <a class="dropdown-item" href="#">Compartilhar</a>
                            
                            @if(Auth::user()->id == $conhecimento[0]->user->id)
                                <a class="dropdown-item" data-toggle="modal" data-target="#excluirconhecimento" href="#">Excluir</a>
                                          
                            @else
                                <a class="dropdown-item disabled">Excluir</a>
                            @endif
                        </div>
                    </div>

                    <h6 class="card-subtitle mb-2 text-muted">
                        <div class="media">
                            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAYAAABzenr0AAADsklEQVRYR63XdwincxwH8NeZGWXGnRWZiSJ/kGRlJMqI0+FynSI7skpmnGzJzChd54pkZkUJ2WVE6cqR7BHK3r2v76Pnfvc83+e5zqd+f/z6fcb795nv7xTjZXUciL2xAzbHGvgHP+ADvIln8QR+GuN6ygilzXAOZuIPPIc38CG+L/ZrYgvshD2xHO7BVfi4FqMGYGWcj3PxMm7A4/h9AHTsDsKZBdAcXFHAL2HaB2ATPIB1cHJJ6YhkLaYS3wFyEz7D4fh00kkXgG3wDF7HrFLfLrv0wMblh/fwVQ/CtTAX22NfLGjrTQLIP38JT+IE/DXhNPqn4qxW8Kj8jWtxIX7tALIC7ir9sWs7E20Aqd2L+KSkazJ4/N6Mkyq1+BkX4+oeEA9hbezR9EQbwKU4Bjv2pD0dnu4fIweULE7qJvhbuB2X58cGQEbtfRxSabh08nljouNeHN2jmxjzsWWy3QC4FduW1PTFuL+UZgyG17Bzj2Jips/S5KflSzbcFyX9qVGfPFgyNAbAq9ilojgdd2BqAByJ27D+wJK5E8eNiY78kUMruquUsZ0ZAGmI9QYM4uvsslrHYLikTENNN1t1YQAkXY80XVmx2A9PjYmO/fH0gG6mbq8A+CbNUDq3ZrM0JUhJTxwAcGxuRADkwh1cDk3NJqU6fmQGsv+zMWuSmPMDINcts5ma1CSLKCXIgarJ19gH7wzoJea8AIjB6SNKEH/Ry1muSa7nLSMylUM3JwBeKf8+TTEkOVYLsXyP4p/YtOvsduhfht0DIFtwg9IHQwDy+3U4o0fx+kJExvjJxV0QACEKOZXZBb+NsEwPZHK6JMusjxe09VctpZ8RAKuVVZyahAUNSS7atz1KU/HlkAPMKH0yrTlGGZuc4d0Ky635SI1DSLtk60nG06GUmDlWL6RcDYA0V6jSEXi0Ej3MJmz3qB6d+8pRy27pk5Q8PsKiP28TktCpHJtw/u8mrBM4cxudcLuavIvcglzPSVa1Lt7GjbgyTtoAVsTzpb4JlpHKdISCzca0EbVtq4QB311qnXMf/48hlzCPm/hfDEC+b1jIQuoTo1MQrrgsEpKa5ZXeCUkJKY3vRdJFy7cqr590+7IGb+JkvDO6IaN5wv0nfQ+TZOJhbPc/gPilENHD2v+8loHmt9QsJPSCMporLWUdfix1v6i8GRbVfFLGPE43KkDSiAEVm9otSIzUPZzvmvIs68U+BkBjnO4N08knhDNNlS0ayYPko/KwCRPKp+uFtASQfwFMNb0ytvWaBAAAAABJRU5ErkJggg==" class="mr-2">
                            <div class="media-body">
                                <p class="mt-0">{{ $conhecimento[0]->user->name }}</br>em <a href="categoria/{{ $conhecimento[0]->categoria->id }}" style="text-decoration: none; color: #6c757d">{{ $conhecimento[0]->categoria->descricao }}</a></p>
                                
                            </div>
                            <p data-toggle="tooltip" data-placement="top" title="{{$conhecimento[0]->created_at}}">{{ $conhecimento[0]->created_at->format('d/m/Y') }}</p>
                        </div>
                    </h6>
                    <p class="card-text">{!! $conhecimento[0]->descricao !!}</p>

                </div>
            </div>
            </br>
            <div class="card">
            <div class="card-body">
            <h6 class="card-title">Anexos</h6> 
            <ul class="list-group">
                <li class="list-group-item"><a href="{{ $conhecimento[0]->anexo }}" target="_blank">{{$conhecimento[0]->nomeanexo}}</a></li>
            </ul>

            </div>
            </div>
            
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="excluirconhecimento" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Exclusão</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Deseja realmente excluir esse conhecimento?
      </div>
      <div class="modal-footer">
        <a class="btn btn-secondary" data-dismiss="modal" href="#">Cancelar</a>
        <a class="btn btn-danger" href="/conhecimento/deletar/{{$conhecimento[0]->id}}">Excluir</a>
      </div>
    </div>
  </div>
</div>

@endsection