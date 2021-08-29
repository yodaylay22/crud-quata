@extends('layouts.header')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                

                <div class="card-body">
                    <h3 class="card-title">{{ __('Trocar Senha') }}</h3>
                    <hr>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="row justify-content-center">
                            <div class="col-md-6">


                                <div class="form-group mb-4">
                                    <label class="control-label">Email:</label>
                                    <input placeholder="Email" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                              

                            </div>
                        </div>


                        <br>
                        <div class="form-group row mb-0 justify-content-center">
                            <div class="col-md-5 justify-content-center text-center">
                                <button type="submit" class="btn btn-block btn-success">
                                    {{ __('Enviar Recuperação de Senha') }}
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
