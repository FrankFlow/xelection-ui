<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="refresh" content="20;url=/home">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css?rand=') . time() }}">


    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://kit.fontawesome.com/72afc38311.js" crossorigin="anonymous"></script>

</head>

<body class="font-sans antialiased border-t-8 border-yellow-300 w-full">
<div class="container mx-auto p-6">

    <div class="grid grid-cols-4 ">
        <div class="col-span-4 lg:col-span-3"><h1 class="text-2xl lg:text-4xl font-bold text-red-500">Elezioni amministrative Comune di Manfredonia</h1></div>
        <div class="col-span-4 lg:col-span-1"><h1 class="text-2xl lg:text-4xl text-blue-700 lg:text-right font-bold">7 novembre 2021</h1><p class="lg:text-right text-sm text-black"><i class="text-red-500 text-2xl fas fa-spinner fa-spin mr-2"></i>Pagina in aggiornamento AUTOMATICO ogni 2 minuti</p></div>


    </div>


    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-8 mt-16">
        @foreach ($candidatiPersone as $candidato)
            <div>
                <div
                    class="rounded-full h-14 w-14 flex items-center justify-center bg-gray-300  z-10 relative ml-28 sm:ml-32  md:ml-28 lg:ml-28 xl:ml-32 2xl:ml-40 ">
                    {{$candidato->percentuale}}%</div>
                <img src="{{ $candidato->path_image }}" class=" -mt-12   w-full ">
                <p class="text-center font-bold mt-6 text-4xl">{{ $candidato->cognome }}</p>
                <p class="text-center text-blue-800 text-6xl font-bold border-b-4 pb-2 border-yellow-400">
                    {{ $candidato->sum }}</p>
            </div>
        @endforeach
    </div>
    <div class="w-full my-5 text-center text-3xl text-blue-500">Voti validi: {{$sommaVoti}}</div>

    <div class="grid grid-cols-2 gap-4 mt-12">
        <div>
            <div class="grid grid-cols-12 gap-4">
                <div class="">
                    <div class="border-b-2 border-gray-300">&nbsp;</div>
                </div>
                <div class=" ">
                    <p class="text-2xl font-bold">{{$sezioniChiuseSindaco}}</p>
                </div>
                <div class=" col-span-10 lg:col-span-6 md:col-span-8">
                    <p class=" text-xl mt-1">Sezioni chiuse per Sindaco</p>
                </div>
            </div>


            <div class="grid grid-cols-12 gap-4">
                <div class="">
                    <div class="border-b-2 border-gray-300">&nbsp;</div>
                </div>
                <div class=" ">
                    <p class="text-2xl font-bold">{{$sezioniChiuseLista}}</p>
                </div>
                <div class=" col-span-10 lg:col-span-6 md:col-span-8">
                    <p class=" text-xl mt-1 ">Sezioni chiuse per Lista</p>
                </div>
            </div>



        </div>
        <div class="float-right">
            <div class="flex flex-row-reverse">

                @foreach($candidatiListe as $candidato)
                    <div class="mr-2"><img src="{{$candidato->path_image}}" class="w-12 md:w-24"/>
                        <p class="text-2xl md:text-4xl mt-4 text-blue-800 font-bold text-center">{{$candidato->sum}}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>




    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-16 md:mt-0">

        <div>
            <div class="grid grid-cols-12 gap-4">
                <div class="">
                    <div class="border-b-8 border-gray-300">&nbsp;</div>
                </div>
                <div></div>
                <div class="col-span-10 lg:col-span-6 md:col-span-8">
                    <p class=" text-xl mt-4">Da scrutinare</p>
                </div>
            </div>


            <div class="grid grid-cols-12 gap-4 ">
                <div class="">
                    <div class="border-b-8 border-green-500">&nbsp;</div>
                </div>
                <div></div>
                <div class="col-span-10 lg:col-span-6 md:col-span-8">
                    <p class=" text-xl mt-4">Scrutinate (dati parziali)</p>
                </div>
            </div>
        </div>

        <div></div>

    </div>


    <div class="grid grid-cols-12 gap-4 mt-12">
        @foreach($sezioniLista as $sezione)
            <div class=" col-span-4 md:col-span-2  bg-gray-400 rounded p-4
                @if ($sezione->chiusa === 1 && $sezione->chiusa_lista === 1)
                bg-green-500
                @else

            @endif


                "><p class="text-4xl text-white font-bold text-center">{{$sezione->numero}}&nbsp;

                    @if ($sezione->votoPresente && $sezione->chiusa === 0 && $sezione->chiusa_lista === 0)<br><span class="text-base"> dati parziali</span> @endif
                    @if ($sezione->chiusa === 1 && $sezione->chiusa_lista === 1)<br><span class="text-base">chiusa</span> @endif

                </p></div>
        @endforeach
    </div>


</div>
<footer class="mt-4 bg-red-700">

    <div class="container mx-auto p-4">
        <p class="text-center text-white">2019 - {{date('Y')}} Xelection&copy; è un'applicazione realizzata da <a class="font-bold underline" href="https://sinkronia.it" target="_blank">Sinkronia</a></p>
    </div>

</footer>
</body>

</html>
