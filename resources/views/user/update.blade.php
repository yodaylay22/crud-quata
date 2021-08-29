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
                                    <input id="nome" type="text" class="form-control @error('nome') is-invalid @enderror" name="nome" value="{{ $user->nome }}" required autocomplete="nome" autofocus>
                                    @error('nome')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group mb-4">
                                    <label class="control-label">Email:</label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group mb-4">
                                    <label class="control-label">Nova Senha:</label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="senha" autocomplete="new-password">
                                    <span><small>(Não altere para manter a senha atual)</small></span>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group mb-4">
                                    <label class="control-label ">Nível de acesso:</label>
                                    <select id="role" class="form-control @error('role') is-invalid @enderror" name="role">
                                        <option @php if($user->role == 0){echo "selected";} @endphp value="0">Básico</option>
                                        <option @php if($user->role == 1){echo "selected";} @endphp value="1">Admin</option>
                                        <option @php if($user->role == 2){echo "selected";} @endphp value="2">Desenvolvedor</option>
                                    </select>
                                    @error('role')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group mb-4">
                                    <label class="control-label">Idade:</label>
                                    <input id="idade" min="1" step="1" value="{{ $user->idade }}" onkeydown="if(event.key==='.'){event.preventDefault();}" onpaste="let pasteData = event.clipboardData.getData('text'); if(pasteData){pasteData.replace(/[^0-9]*/g,'');} " type="number" class="form-control @error('idade') is-invalid @enderror" name="idade" required>
                                    @error('idade')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group mb-4">
                                    <label class="control-label">Saldo:</label>
                                    <input id="saldo" type="number" step="0.01" value="{{ $user->saldo }}" class="form-control @error('saldo') is-invalid @enderror" name="saldo" required>
                                    @error('saldo')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group mb-4">
                                    <label class="control-label">Observação:</label>
                                    
                                    <textarea id="observacao" class="form-control @error('observacao') is-invalid @enderror" name="observacao" rows="3">{{ $user->observacao }}</textarea>
                                    
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

<script>

    $('#mainform').submit(function(e){
        e.preventDefault();

        var data = $(this).serialize();
        console.log(data);
        $.ajax({
            url: "{{ route('edit.do') }}",
            type: "post",
            data: data,
            dataType: "json",
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            success: function(response){
                console.log(response)
                if(response.success === false){
                    //alert(response.message)
                    Swal.fire({
                        icon: 'error',
                        title: response.message,
                        showConfirmButton: true
                    })
                }else{

                
                    Swal.fire({
                        icon: 'success',
                        title: 'Usuário editado com sucesso!',
                        showConfirmButton: false,
                        timer: 1500
                    }).then((result) => {
                        window.location.href= "{{ route('main') }}"    
                    })

                    
                }
            },
            error: function(response){
                console.log(response);
            }
        })


    });

</script>

@endsection