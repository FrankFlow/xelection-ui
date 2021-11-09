<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Sezioni') }} !!!
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 mb-4">
                    Sezioni chiuse per <strong>Sindaco</strong>: {{$sezioniChiuseSindaco}} | Sezioni chiuse per <strong>Lista</strong>: {{$sezioniChiuseLista}}
                </div>

                <div class="p-6 bg-white border-b border-gray-200 mb-4">

                    <div class="grid grid-cols-2 md:grid-cols-3 gap-4">

                        @foreach ($candidatiPersone as $candidato)
                            @if (!is_null($candidato->nome))
                                <div>
                                    <p class="text-xl md:text-2xl">
                                        {{ substr($candidato->nome, 0, 1) }}.
                                        {{  $candidato->cognome  }}
                                        <span class="font-bold text-blue-500 text-2xl md:text-4xl">{{ $candidato->sum }} </span>({{$candidato->percentuale}}%)
                                    </p>
                                </div>
                            @endif
                        @endforeach
                    </div>



                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-8 p-4 bg-gray-200 border-t-2 border-gray-400">

                        @foreach ($candidatiListe as $candidato)
                            @if (!is_null($candidato->nome))
                                <div>
                                    <div class="grid grid-cols-2">
                                        <div>
                                            <p class="text-xl md:text-2xl text-center">
                                                <img src="{{$candidato->path_image}}" class="h-12  mx-auto" />
                                            </p>
                                        </div>
                                        <div>
                                            <span class="font-bold text-blue-500 text-4xl">{{ $candidato->sum }}</span>
                                        </div>

                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>


                </div>

                <div class="w-full my-5 text-center text-3xl text-blue-500">Voti validi: {{$sommaVoti}}</div>

                <div class="grid grid-cols-1  md:grid-cols-3 gap-4 p-6">
                    @foreach ($sezioniLista as $sezione)



                        <div class="text-center">
                            <form action="/sezioni/{{ $sezione->id }}" method="get">
                                <button
                                    class="p-2 pl-5 pr-5   text-gray-100 text-2xl font-bold hover:bg-gray-500 rounded-lg focus:border-4

                                    @if ($sezione->chiusa === 1 && $sezione->chiusa_lista === 1)
                                    @if(in_array($sezione->id, $sezioniRosse))
                                        bg-red-500
                                            @else
                                        bg-green-500
                                        @endif
                                    @else
                                    @if(in_array($sezione->id, $sezioniRosse))
                                        bg-red-500
@else
                                        bg-blue-500
                                        @endif

                                    @endif

                                        w-full">
                                    {{ $sezione->numero }}
                                    @if ($sezione->votoPresente && $sezione->chiusa === 0 && $sezione->chiusa_lista === 0) dati parziali @endif
                                    @if ($sezione->chiusa === 1)<span class="text-sm">chiusa <strong>Sindaci</strong></span> @endif
                                    @if ($sezione->chiusa_lista === 1)<span class="text-sm"> / chiusa <strong>Lista</strong></span> @endif
                                </button>

                            </form>
                            <p class="text-left text-sm p-2 bg-gray-200 mt-2">
                                @foreach($sezione->voti as $candidato)
                                    <span class="text-red-500 font-bold">{{substr($candidato->candidato->cognome,0, 3)}}</span>: {{$candidato->voto}} <strong>|</strong>
                                @endforeach
                            </p>
                        </div>


                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
