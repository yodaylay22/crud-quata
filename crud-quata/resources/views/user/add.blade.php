@extends('layouts.header')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card" >

                <div class="card-body">
                    <h3 class="card-title">Cadastrar Usuário</h3>
                    <form method="POST" action="{{ route('add') }}">
                        @csrf

                        <div class="row justify-content-center">
                            <div class="col-md-8">

                                <div class="form-group mb-4">
                                    <label class="control-label ">Nome:</label>
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group mb-4">
                                    <label class="control-label">Email:</label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group mb-4">
                                    <label class="control-label">Senha:</label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group mb-4">
                                    <label class="control-label ">Nível de acesso:</label>
                                    <select id="role" class="form-control @error('role') is-invalid @enderror" name="role">
                                        <option value="0">Básico</option>
                                        <option value="1">Admin</option>
                                        <option value="2">Desenvolvedor</option>
                                    </select>
                                    @error('role')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group mb-4">
                                    <label class="control-label ">Status:</label>
                                    <select id="status" class="form-control @error('status') is-invalid @enderror" name="status">
                                        <option value="1">Ativo</option>
                                        <option value="0">Inativo</option>
                                    </select>
                                    @error('status')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group mb-4">
                                    <label class="control-label">Idade:</label>
                                    <input id="idade" min="1" step="1"  onkeydown="if(event.key==='.'){event.preventDefault();}" onpaste="let pasteData = event.clipboardData.getData('text'); if(pasteData){pasteData.replace(/[^0-9]*/g,'');} " type="number" class="form-control @error('idade') is-invalid @enderror" name="idade" required>
                                    @error('idade')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group mb-4">
                                    <label class="control-label">Saldo:</label>
                                    <input id="saldo" type="number" class="form-control @error('saldo') is-invalid @enderror" name="saldo" required>
                                    @error('saldo')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group mb-4">
                                    <label class="control-label">Observação:</label>
                                    
                                    <textarea id="observacao" class="form-control @error('observacao') is-invalid @enderror" name="observacao" rows="3"></textarea>
                                    
                                </div>

                            </div>
                        </div>
                
                        <br>
                        <div class="form-group row mb-0 justify-content-center">
                            <div class="col-md-4 justify-content-center">
                                <button type="submit" class="btn btn-block btn-success">
                                    {{ __('Enviar') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection