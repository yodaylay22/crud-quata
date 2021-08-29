@extends('layouts.header')

@section('content')

    @php
        
        // echo "<pre>";
        // print_r($user);
        // echo "</pre>";
        // exit();

    @endphp

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card" >

                <div class="card-body">
                    <h3 class="card-title">Editar Usuário</h3>
                    <hr>
                    <form method="POST" action="" id="mainform">
                        @csrf

                        <input type="hidden" name="id" value="{{ $id }}">

                        <div class="row justify-content-center">
                            <div class="col-md-8">

                                <div class="form-group mb-4">
                                    <label class="control-label ">Nome:</label>
                                    <input readonly id="nome" type="text" class="form-control @error('nome') is-invalid @enderror" name="nome" value="{{ $user->nome }}" required autocomplete="nome" autofocus>
                                    @error('nome')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group mb-4">
                                    <label class="control-label">Email:</label>
                                    <input readonly id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group mb-4">
                                    <label class="control-label ">Nível de acesso:</label>
                                    <input readonly id="role" type="text" class="form-control @error('nome') is-invalid @enderror" value="@php if($user->role == 0){echo "Básico";} if($user->role == 1){echo "Admin";} if($user->role == 2){echo "Desenvolvedor";} @endphp">
                                    @error('role')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group mb-4">
                                    <label class="control-label">Idade:</label>
                                    <input readonly id="idade" min="1" step="1" value="{{ $user->idade }}" onkeydown="if(event.key==='.'){event.preventDefault();}" onpaste="let pasteData = event.clipboardData.getData('text'); if(pasteData){pasteData.replace(/[^0-9]*/g,'');} " type="number" class="form-control @error('idade') is-invalid @enderror" name="idade" required>
                                    @error('idade')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group mb-4">
                                    <label class="control-label">Saldo:</label>
                                    <input id="saldo" readonly type="number" step="0.01" value="{{ $user->saldo }}" class="form-control @error('saldo') is-invalid @enderror" name="saldo" required>
                                    @error('saldo')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group mb-4">
                                    <label class="control-label">Observação:</label>
                                    
                                    <textarea readonly id="observacao" class="form-control @error('observacao') is-invalid @enderror" name="observacao" rows="3">{{ $user->observacao }}</textarea>
                                    
                                </div>

                            </div>
                        </div>
                
                        <br>
                        <div class="form-group row mb-0 justify-content-center">
                            <div class="col-md-4 justify-content-center">
                                <a href="{{ route('main') }}" class="btn btn-block btn-danger">
                                    Voltar
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection