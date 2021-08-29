

    @extends('layouts.header')

    @section('content')
        
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
        
                    <div class="card" style="background: #f1f1f1;">
        
                        <div class="card-body">
                            <h3 class="card-title" style="color: #000000;">Usuários</h3>
                            <hr>
                            <div class="col-md-4 justify-content-left pl-5">
                                <a href="{{ route('add') }}" class="btn btn-primary"><i class="fas fa-user-plus"></i>&nbsp;&nbsp;Cadastrar</a>
                            </div>
                            <br>
                            <div id="div-tabela-resultados" class="table-responsive pl-5 pr-5">

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
                                            <td>
                                                @php
                                                    switch ($usuario->role) {
                                                        case 0:
                                                            echo '<span class="badge bg-secondary text-white">Básico</span>';
                                                            break;
                                                        case 1:
                                                            echo '<span class="badge bg-danger text-white">Admin</span>';
                                                            break;
                                                        case 2:
                                                            echo '<span class="badge bg-warning">Desenvolvedor</span>';
                                                            break;
                                                        default:
                                                            echo '<span class="badge bg-secondary text-white">Básico</span>';
                                                            break;
                                                    }    
                                                @endphp
                                            
                                            </td>
                                            <td>{{$usuario->idade}} anos</td>
                                            <td>@php 
                                                    
                                                    echo 'R$ '.number_format($usuario->saldo, 2, ",", ".");
                                                
                                                @endphp </td>
                                            <td>

                                                <a href="/view/{{$usuario->id}}" style="width: 42px;" class="btn btn-info btn-xs"><i class="fas fa-info"></i></a>
                                                @auth
                                                    <a href="/edit/{{$usuario->id}}" style="width: 42px;" class="btn btn-warning btn-xs"><i class="fas fa-user-edit"></i></a>
                                            
                                                    <a href="javascript:void(0)" style="width: 42px;" onclick="deletarUsuario({{$usuario->id}}, '{{$usuario->nome}}')" class="btn btn-danger btn-xs"><i class="fas fa-trash-alt"></i></a>
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
        
        <script>

            function deletarUsuario(id, nome){
                
                Swal.fire({
                    title: 'Deseja deletar '+nome+'?',
                    text: "Você não pode reverter isso!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    cancelButtonText: 'Cancelar',
                    confirmButtonText: 'Deletar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        
                        

                        $.ajax({
                            url: "{{ route('delete') }}",
                            type: "post",
                            data: {"id":id,"nome":nome},
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
                                        title: 'Usuário deletado com sucesso!',
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
                        });

                    }
                })


            }
            



        </script>

    @endsection