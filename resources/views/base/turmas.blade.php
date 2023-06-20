@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Lista de Turmas') }}
                <div class="float-right col-md-2">
                    <button style="border:none" type="button" class="btn btn-sm btn-outline-dark" data-toggle="modal" data-target="#insertTurmaModal">
                    <i class="fa fa-plus" aria-hidden="true"></i> Cadastrar
                    </div>

                <div class="card-body">
                    @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif
                    @if (isset($turmas))  {{-- Caso não encontre nenhuma turma --}}
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th  class="text-center" scope="col">Id</th>
                                    <th  class="text-center" scope="col">Ano</th>
                                    <th  class="text-center" scope="col">Turno</th>
                                    <th  class="text-center" scope="col">Sala</th>
                                    <th  class="text-center" scope="col">Grau</th>
                                    <!-- <th  class="text-center" scope="col">Disciplinas</th> -->
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>                            
                                @foreach ($turmas as $turma)
                                <tr>
                                    <th  class="text-center" scope="row">{{ $turma->id }}</th>
                                    <td  class="text-center">{{ $turma->ano }}</td>
                                    <td  class="text-center">{{ $turma->turno }}</td>
                                    <td  class="text-center">{{ $turma->sala }}</td>
                                    <td  class="text-center">{{ $turma->grau }}</td>
                                    <!-- <td class="text-center">
                                        <button style="border:none" type="button" class="btn btn-sm btn-outline-dark">
                                            <a href="{{ url('/') }}" style="color:black" ><i class="fas fa-eye" aria-hidden="true"></i></a>
                                        </button>
                                    </td> -->
                                    <td>
                                    <button style="border:none" type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#updateTurmaModal{{ $turma->id }}">
                                        <i class="fa fa-pencil" aria-hidden="true" style="font-size: 15px;"></i>
                                        </button>
                                        <button style="border:none" type="button" class="btn btn-outline-danger" onclick="deleteTurmas({{ $turma->id }}, '{{ $turma->nome }}')">
                                        <i class="fa fa-trash" aria-hidden="true" style="font-size: 15px"></i>

                                    </td>
                                </tr>
                                <div class="modal fade" id="updateTurmaModal{{ $turma->id }}" tabindex="-1" role="dialog" aria-labelledby="updateTurmaModalLabel{{ $turma->id }}" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="updateTurmaModalLabel{{ $turma->id }}">Atualizar Turma</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="POST" action="{{ url('/turmas/'.$turma->id) }}">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="form-group">
                                                        <label for="name">Ano:</label>
                                                        <input type="number" class="form-control" name="ano" value="{{ $turma->ano }}" required autofocus>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="name">Turno:</label>
                                                        <input type="text" class="form-control" name="turno" value="{{ $turma->turno }}" required autofocus>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="endereco">Sala:</label>
                                                        <input type="text" class="form-control" name="sala" value="{{ $turma->sala }}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="telefone">Grau:</label>
                                                        <input type="text" class="form-control" name="grau" value="{{ $turma->grau }}">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                        <button type="submit" id="atualizar_turma" class="btn btn-primary">Atualizar</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach                               
                            </tbody>                   
                        </table>
                        {{ $turmas->links('pagination::bootstrap-4') }} 
                    @endif 
                    <div class="modal fade" id="insertTurmaModal" tabindex="-1" role="dialog" aria-labelledby="insertTurmaModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="insertTurmaModalLabel">Inserir Turma</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="POST" action="{{ url('/turmas') }}">
                                                    @csrf
                                                    @method('POST')
                                                    <div class="form-group">
                                                        <label for="ano">Ano:</label>
                                                        <input type="number" class="form-control" name="ano" value="" required autofocus>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="turno">Turno:</label>
                                                        <input type="text" class="form-control" name="turno" value="" autofocus>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="sala">Sala:</label>
                                                        <input type="text" class="form-control" name="sala" value="" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="grau">Grau:</label>
                                                        <input type="text" class="form-control" name="grau" value="" required>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                        <button type="submit" id="inserir_turma" class="btn btn-primary">Inserir</button>
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
    <script src="{{ asset('js/turmas.js') }}"></script>
    <link href="{{ asset('css\crud.css') }}" rel="stylesheet">
@endsection
