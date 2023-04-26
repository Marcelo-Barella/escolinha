@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Lista de Pessoas') }}
                <button type="button" class="btn btn-sm btn-outline-info" data-toggle="modal" data-target="#insertPessoaModal">
                    Inserir
                </div>

                <div class="card-body">
                    @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif
                    @if (isset($pessoas))  {{-- Caso não encontre nenhuma pessoa --}}
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">CPF</th>
                                    <th scope="col">Nome</th>
                                    <th scope="col">Endereço</th>
                                    <th scope="col">Gênero</th>
                                    <th scope="col">Telefone</th>
                                    <th scope="col">Contato</th>
                                    <th scope="col">Grupo</th>
                                </tr>
                            </thead>
                            <tbody>                            
                                @foreach ($pessoas as $pessoa)
                                <tr>
                                    <th scope="row">{{ $pessoa->CPF }}</th>
                                    <td>{{ $pessoa->NOME }}</td>
                                    <td>{{ $pessoa->ENDERECO }}</td>
                                    <td>{{ $pessoa->SEXO }}</td>
                                    <td>{{ $pessoa->TELEFONE }}</td>
                                    <td>{{ $pessoa->CONTATO }}</td>
                                    <td>{{ $pessoa->GRUPO }}</td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-outline-primary" data-toggle="modal" data-target="#updatePessoaModal{{ $pessoa->CPF }}">
                                            Editar
                                        </button>
                                        <button type="button" class="btn btn-sm btn-outline-danger" onclick="deletePessoa({{ $pessoa->CPF }}, '{{ $pessoa->NOME }}')">Excluir</button>
                                    </td>
                                </tr>
                                <div class="modal fade" id="updatePessoaModal{{ $pessoa->CPF }}" tabindex="-1" role="dialog" aria-labelledby="updatePessoaModalLabel{{ $pessoa->CPF }}" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="updatePessoaModalLabel{{ $pessoa->CPF }}">Atualizar Usuário</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="POST" action="{{ url('/pessoas/'.$pessoa->CPF) }}">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="form-group">
                                                        <label for="name">Nome:</label>
                                                        <input type="text" class="form-control" name="name" value="{{ $pessoa->NOME }}" required autofocus>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="endereco">Endereço:</label>
                                                        <input type="text" class="form-control" name="endereco" value="{{ $pessoa->ENDERECO }}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="telefone">Telefone:</label>
                                                        <input type="text" class="form-control" name="telefone" value="{{ $pessoa->TELEFONE }}" required>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                        <button type="submit" id="atualizar_pessoa" class="btn btn-primary">Atualizar</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach                               
                            </tbody>                   
                        </table>
                        {{ $pessoas->links('pagination::bootstrap-4') }} 
                    @endif 
                    <div class="modal fade" id="insertPessoaModal" tabindex="-1" role="dialog" aria-labelledby="insertPessoaModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="insertPessoaModalLabel">Inserir Pessoa</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="POST" action="{{ url('/pessoas/'.$pessoa->CPF) }}">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="form-group">
                                                        <label for="name">CPF:</label>
                                                        <input type="number" class="form-control" name="cpf" value="" required autofocus>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="name">Nome:</label>
                                                        <input type="text" class="form-control" name="nome" value="" autofocus>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="endereco">Endereço:</label>
                                                        <input type="text" class="form-control" name="endereco" value="" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="telefone">Telefone:</label>
                                                        <input type="text" class="form-control" name="telefone" value="" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="contato">Contato:</label>
                                                        <input type="text" class="form-control" name="contato" value="" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="grupo">Grupo:</label>
                                                        <input type="text" class="form-control" name="grupo" value="" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="genero">Gênero:</label>
                                                        <input type="text" class="form-control" name="genero" value="" required>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                        <button type="submit" id="inserir_pessoa" class="btn btn-primary">Inserir</button>
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
    <script src="{{ asset('js/pessoas.js') }}"></script>
@endsection