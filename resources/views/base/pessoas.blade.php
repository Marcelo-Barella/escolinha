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
                                    <th scope="col">Id</th>
                                    <th scope="col">CPF</th>
                                    <th scope="col">Nome</th>
                                    <th scope="col">Endereço</th>
                                    <th scope="col">Gênero</th>
                                    <th scope="col">Telefone</th>
                                    <th scope="col">Grupo</th>
                                </tr>
                            </thead>
                            <tbody>                            
                                @foreach ($pessoas as $pessoa)
                                <tr>
                                    <th scope="row">{{ $pessoa->id }}</th>
                                    <td>{{ $pessoa->cpf }}</td>
                                    <td>{{ $pessoa->nome }}</td>
                                    <td>{{ $pessoa->endereco }}</td>
                                    <td>{{ $pessoa->sexo }}</td>
                                    <td>{{ $pessoa->telefone }}</td>
                                    <td>{{ $pessoa->grupo }}</td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-outline-primary" data-toggle="modal" data-target="#updatePessoaModal{{ $pessoa->id }}">
                                            Editar
                                        </button>
                                        <button type="button" class="btn btn-sm btn-outline-danger" onclick="deletePessoa({{ $pessoa->id }}, '{{ $pessoa->nome }}')">Excluir</button>
                                    </td>
                                </tr>
                                <div class="modal fade" id="updatePessoaModal{{ $pessoa->id }}" tabindex="-1" role="dialog" aria-labelledby="updatePessoaModalLabel{{ $pessoa->id }}" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="updatePessoaModalLabel{{ $pessoa->id }}">Atualizar Usuário</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="POST" action="{{ url('/pessoas/'.$pessoa->id) }}">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="form-group">
                                                        <label for="name">CPF:</label>
                                                        <input type="number" class="form-control" name="cpf" value="{{ $pessoa->cpf }}" required autofocus>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="name">Nome:</label>
                                                        <input type="text" class="form-control" name="nome" value="{{ $pessoa->nome }}" required autofocus>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="endereco">Endereço:</label>
                                                        <input type="text" class="form-control" name="endereco" value="{{ $pessoa->endereco }}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="telefone">Telefone:</label>
                                                        <input type="text" class="form-control" name="telefone" value="{{ $pessoa->telefone }}">
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
                                                <form method="POST" action="{{ url('/pessoas') }}">
                                                    @csrf
                                                    @method('POST')
                                                    <div class="form-group">
                                                        <label for="cpf">CPF:</label>
                                                        <input type="number" class="form-control" name="cpf" value="" required autofocus>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="nome">Nome:</label>
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
                                                        <label for="grupo">Grupo:</label>
                                                        <br>
                                                        <input type="radio" name="grupo" id="grupo_aluno" value="A"> Aluno
                                                        <input type="radio" name="grupo" id="grupo_prof" value="P"> Professor
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="sexo">Gênero:</label>
                                                        <br>
                                                        <input type="radio" name="sexo" id="gen_masc" value="M"> Masculino
                                                        <input type="radio" name="sexo" id="gen_femin" value="F"> Feminino
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
