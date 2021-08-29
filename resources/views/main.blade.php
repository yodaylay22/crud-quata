

    @extends('layouts.header')

    @section('content')

        {{-- <pre>
        @php
            print_r($usuarios);
        @endphp
        </pre> --}}

        
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
        
                    <div class="card" style="background: #f1f1f1;">
        
                        <div class="card-body">
                            <h3 class="card-title" style="color: #000000;">Usuários</h3>
                            <hr>
                            <div class="col-md-4 justify-content-left">
                                <a href="{{ route('add') }}" class="btn btn-primary">Cadastrar</a>
                            </div>
                            <div id="div-tabela-resultados" class="table-responsive p-5">
                                <table hidden class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th colspan="1">Usuário</th>
                                            <th colspan="1">Nivel de Acesso</th>
                                            <th colspan="1">Status</th>
                                            <th colspan="1">Opções</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                            
                                        <tr>
                                            <td>Carlos</td>
                                            <td>Admin</td>
                                            <td>Ativo</td>
                                            
                                            <td>
                                        
                                                <a href="" class="btn btn-cyan btn-xs" target="_blank"><i class="fas fa-info" style="width:40px; height: 40px;"></i></a>
                                        
                                                <a href="" class="btn btn-yellow btn-xs"><i class="fas fa-user-edit" style="width:40px; height: 40px;"></i></a>
                                        
                                                <a href="" class="btn btn-danger btn-xs" ><i class="fas fa-trash-alt"></i style="width:40px; height: 40px;"></a>
                                                
                                            </td>
                                        </tr>
        
                                       
                                    </tbody>
                                </table>

                                <table class="table table-bordered table-hover text-center tabelaDataTable">
                                    <thead>
                                        <tr>
                                           
                                            <th>Nome</th>
                                            <th>E-mail</th>
                                            <th>Nível</th>
                                            <th>Idade</th>
                                            <th>Saldo</th>
                                            <th>Opções</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($usuarios as $usuario)
                                        <tr class="">
                                            
                                            <td>{{$usuario->nome}} </td>
                                            <td>{{$usuario->email}} </td>
                                            <td>{{$usuario->role}} </td>
                                            <td>{{$usuario->idade}} </td>
                                            <td>{{$usuario->saldo}} </td>
                                            <td>

                                                <a href="/view/{{$usuario->id}}" class="btn btn-info btn-xs" target="_blank"><i class="fas fa-info"></i></a>
                                                @auth
                                                    <a href="/edit/{{$usuario->id}}" class="btn btn-warning btn-xs"><i class="fas fa-user-edit"></i></a>
                                            
                                                    <a href="" class="btn btn-danger btn-xs"><i class="fas fa-trash-alt"></i></a>
                                                @endauth
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
 
    @endsection