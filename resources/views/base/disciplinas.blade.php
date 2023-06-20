@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Lista de Disciplinas') }}
                    <div class="float-right col-md-2">
                    <button style="border:none" type="button" class="btn btn-sm btn-outline-dark" data-toggle="modal" data-target="#insertDisciplinaModal">
                    <i class="fa fa-plus" aria-hidden="true"></i> Cadastrar
                    </div>

                <div class="card-body">
                    @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif
                    @if (isset($disciplinas))  {{-- Caso não encontre nenhuma disciplina --}}
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Descrição</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>                            
                                @foreach ($disciplinas as $disciplina)
                                <tr>
                                    <th scope="row">{{ $disciplina->id }}</th>
                                    <td>{{ $disciplina->descricao }}</td>
                                    <td>
                                    <button style="border:none" type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#updateDisciplinaModal{{ $disciplina->id }}">
                                        <i class="fa fa-pencil" aria-hidden="true" style="font-size: 15px;"></i>
                                        </button>
                                        <button style="border:none" type="button" class="btn btn-outline-danger" onclick="deleteDisciplina({{ $disciplina->id }}, '{{ $disciplina->descricao }}')">
                                        <i class="fa fa-trash" aria-hidden="true" style="font-size: 15px"></i>
                                    </td>
                                </tr>
                                <div class="modal fade" id="updateDisciplinaModal{{ $disciplina->id }}" tabindex="-1" role="dialog" aria-labelledby="updateDisciplinaModalLabel{{ $disciplina->id }}" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="updateDisciplinaModalLabel{{ $disciplina->id }}">Atualizar Disciplina</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="POST" action="{{ url('/disciplinas/'.$disciplina->id) }}">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="form-group">
                                                        <label for="name">Descrição:</label>
                                                        <input type="text" class="form-control" name="descricao" value="{{ $disciplina->descricao }}" required autofocus>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                        <button type="submit" id="atualizar_disciplina" class="btn btn-primary">Atualizar</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach                               
                            </tbody>                   
                        </table>
                        {{ $disciplinas->links('pagination::bootstrap-4') }} 
                    @endif 
                    <div class="modal fade" id="insertDisciplinaModal" tabindex="-1" role="dialog" aria-labelledby="insertDisciplinaModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="insertDisciplinaModalLabel">Inserir Disciplina</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="POST" action="{{ url('/disciplinas') }}">
                                                    @csrf
                                                    @method('POST')
                                                    <div class="form-group">
                                                        <label for="descricao">Descrição:</label>
                                                        <input type="text" class="form-control" name="descricao" value="" required autofocus>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                        <button type="submit" id="inserir_disciplina" class="btn btn-primary">Inserir</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>  
                </div>
            </div>
        </div>
    </div>

</div>

@endsection

@section('scripts')
    {{-- A função asset() é uma função do Laravel que gera uma URL completa para um arquivo localizado em sua pasta public --}}
    <script src="{{ asset('js/disciplinas.js') }}"></script>
@endsection
