<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
         <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Quatá Crud</title>
        <link rel="shortcut icon" href="/img/favicon.png" />
        

        <script src="{{ asset('js/app.js') }}" defer></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        {{-- Data Table --}}
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.0/css/jquery.dataTables.css">
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.0/js/jquery.dataTables.js"></script>
        
        <style>
            body {
                font-family: 'Montserrat', sans-serif;
                background-color: #060818;
            }
            h1, h2, h3, h4, h5, h6 {
                color: #ebedf2;
            }
            .btn{
                font-size: 15px;
            }
            p {
                margin-top: 0;
                margin-bottom: 0.625rem;
                color: #ebedf2;
            }
            .card {
                border: 1px solid #0e1726;
                border-radius: 6px;
                background: #0e1726;
            }

            .form-group label, label {
                font-size: 15px;
                color: #acb0c3;
                letter-spacing: 1px;
            }

            .custom-control-input:disabled~.custom-control-label {
                color: #d3d3d3;
                cursor: no-drop;
            }

            .form-control:disabled, .form-control[readonly] {
                background-color:  #3b3f5c;
                cursor: no-drop;
                color: #d3d3d3;
            }

            .custom-control-input:disabled~.custom-control-label::before,
            .custom-control-input[disabled]~.custom-control-label::before {
                background-color:  #3b3f5c;
                cursor: no-drop;
            }

            .form-control {
                height: auto;
                border: 1px solid #1b2e4b;
                color: #009688;
                font-size: 15px;
                padding: 8px 10px;
                letter-spacing: 1px;
                height: calc(1.4em + 1.4rem + 2px);
                padding: .75rem 1.25rem;
                border-radius: 6px;
                background: #1b2e4b;
            }
            .form-control:focus {
                box-shadow: none;
                border-color: #3b3f5c;
                color: #25d5e4;
                background-color: #1b2e4b;
            }
            .form-control.form-control-lg {
                font-size: 19px;
                padding: 11px 20px;;
            }
            .form-control.form-control-sm {
                padding: 7px 16px;
                font-size: 13px;
            }

            .logo-quata {
                background-image: repeating-linear-gradient(45deg, #133A1D, #3C6042);
                color: #ffffff;
                background-size: 300% 100%;
                animation: bgAnim 5s ease infinite;
            }

            @-webkit-keyframes bgAnim{
                0%{background-position:0% 50%}
                50%{background-position:100% 50%}
                100%{background-position:0% 50%}
            }
            @-moz-keyframes bgAnim{
                0%{background-position:0% 50%}
                50%{background-position:100% 50%}
                100%{background-position:0% 50%}
            }
            @keyframes bgAnim{
                0%{background-position:0% 50%}
                50%{background-position:100% 50%}
                100%{background-position:0% 50%}
            }

        </style>
    </head>
    <body class="antialiased">
        

        <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #191E3A !important;">
            
            <button class="btn logo-quata">Quatá</button>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        
            <div class="collapse navbar-collapse" id="navbarColor02">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link ml-3 " href="{{ route('main') }}">Home<span class="sr-only">(current)</span></a>
                    </li>
                </ul>
            
                @guest
                    @if (Route::has('login'))
                        @if (!Route::is('login'))
                            <a class="btn btn-dark text-sm text-gray-700 underline" style="background-color: #0E1726 !important;" href="{{ route('login') }}">{{ __('Entrar') }}</a>
                        @endif
                    @endif

                    @if (Route::has('register'))
                        @if (!Route::is('register'))
                            <a class="btn btn-dark text-sm text-gray-700 underline ml-2" style="background-color: #0E1726 !important;" href="{{ route('register') }}">{{ __('Cadastrar-se') }}</a>
                        @endif
                    @endif
                @else
                    <div class="dropdown">
                        <a id="navbarDropdown" class="btn btn-dark text-sm text-gray-700 underline " style="background-color: #0E1726 !important;" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}&nbsp;&nbsp;<i class="far fa-ellipsis-v"></i>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                <i class="fal fa-sign-out-alt"></i>&nbsp;&nbsp;{{ __('Sair') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </div>
                @endguest
                
                
            </div>
        </nav>

        
        <main class="py-5">
            @yield('content')
        </main>

    </body>
</html>

<script>

$(document).ready(function () {
	
	$(function () {
		$('[data-toggle="popover"]').popover()
	});

	$(function () {
		$('[data-toggle="tooltip"]').tooltip()
	});

	$('.tabelaDataTable').DataTable({
		responsive: true,
		dom: '<"html5buttons"B>lTfgitp',
		buttons: [
			{ extend: 'copy' },
			{ extend: 'csv' },
			{ extend: 'excel', title: 'ExampleFile' },
			{ extend: 'pdf', title: 'ExampleFile' },

			{
				extend: 'print',
				customize: function (win) {
					$(win.document.body).addClass('white-bg');
					$(win.document.body).css('font-size', '10px');

					$(win.document.body).find('table')
						.addClass('compact')
						.css('font-size', 'inherit');
				}
			}
		],
		"lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "Todos"]],
		"language": {
			"lengthMenu": "Mostrando _MENU_ registros por página",
			"zeroRecords": "Nenhum registro disponível",
			"info": "Mostrando página _PAGE_ de _PAGES_ (_TOTAL_ registros)",
			"infoEmpty": "Mostrando página 0 de 0 (0 registros)",
			"infoFiltered": "(filtrado de _MAX_ registros)",
			"search": "Buscar:",
			"paginate": {
				"first": "Primeira",
				"previous": "Anterior",
				"next": "Próximo",
				"last": "Última"
			}
		}
	});
});

</script>