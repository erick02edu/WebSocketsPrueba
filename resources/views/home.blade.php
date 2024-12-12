<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Scripts -->
    @viteReactRefresh
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body data-bs-theme="dark">
    <div id="appDashboard"></div>

    <script>
        window.Contactos=@json($Contactos);
        window.mensajes=@json($mensajes);
        window.user=@json($user)
    </script>

</body>
</html>


{{-- @extends('layouts.app')

@section('content')
<div class="container-fluid h-100">
    <div class=" row row-cols-1 row-cols-md-2 h-100">
        <div class="col p-0 d-none d-md-inline ">
            @foreach ($Contactos as $contact )
                <div class="w-100 py-4 border px-5">
                    <strong>
                        {{ $contact->name }}
                    </strong>
                </div>
            @endforeach
        </div>
        <div class="col border border-red pb-5">
            <div class="d-flex flex-column gap-2 h-100 w-100 justify-content-between">
                <div class="border border-red h-100 w-100 d-flex flex-column px-2 py-3">
                    <h3 class="">
                        Chat con
                    </h3>

                    @foreach ($mensajes as $mensaje )

                        @if($mensaje->idEmisor== (auth()->user()->id) )
                            <div class="d-flex w-50 px-2 rounded-3  align-self-start border-3 py-3 bg-danger text-white">
                                <div>
                                    {{ $mensaje->mensaje }}
                                </div>
                            </div>
                        @else
                            <div class="d-flex w-50 px-2 rounded-3  align-self-end border-3 py-3 bg-warning text-white">
                                <div>
                                   {{ $mensaje->mensaje }}
                                </div>
                            </div>
                        @endif


                    @endforeach

                </div>

                <div class="">
                    <div class="">
                        <form id="chat-form" class="w-100 d-flex flex-nowrap">
                            @csrf

                            <div class="pe-2" style="width: 90%">
                                <input type="text" name="mensaje" id="mensaje" placeholder="Ingresa tu mensaje" class="form-control w-100 rounded-2">
                                <input type="hidden" value={{ 1 }} name="idChat" id="idChat"  readonly/>
                                <input type="hidden" value={{ auth()->user()->id }} name="idEmisor" id="idEmisor"  readonly/>
                            </div>

                            <div class="d-flex justify-content-center" style="width: 10%">
                                <button type="submit" class="btn btn-primary rounded-4">
                                    Send
                                </button>
                            </div>
                        </form>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('chat-form').addEventListener('submit', async function (event) {
        event.preventDefault(); // Evita que se recargue la página

        // Obtiene los valores de los campos
        const mensaje = document.getElementById('mensaje').value;
        const idChat = document.getElementById('idChat').value;
        const idEmisor = document.getElementById('idEmisor').value;

        // Construye el cuerpo de la petición
        const data = {
            mensaje: mensaje,
            idChat: idChat,
            idEmisor: idEmisor,
        };

        try {
            const response = await fetch('/api/sendMessage', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(data),
            });

            if (response.ok) {
                const result = await response.json();
                console.log('Mensaje enviado con éxito:', result);

                document.getElementById('mensaje').value = '';
            } else {
                console.error('Error al enviar el mensaje:', response.statusText);
            }
        } catch (error) {
            console.error('Error en la solicitud:', error);
        }
    });
</script>

@endsection --}}
