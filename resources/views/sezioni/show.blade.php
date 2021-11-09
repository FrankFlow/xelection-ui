<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-4xl text-gray-800 leading-tight">

            Sezione n. {{ $votiListaCandidato[1]->sezione->numero }}
        </h2>
        <p class="text-sm"><a href="{{env('APP_URL') . '/sezioni/singole/' . $votiListaCandidato[1]->sezione->slug}}" target="_blank">URL RAPPRESENTANTE: {{env('APP_URL') . '/sezioni/singole/' . $votiListaCandidato[1]->sezione->slug}}</a></p>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @if (Session::has('msg'))
                    <div class="bg-red-500 text-white text-3xl p-4">
                        {{ Session::get('msg') }}
                    </div>
                @endif

                <form action="/sezioni" method="post">
                    @csrf
                    <div class="grid grid-cols-2 gap-4 p-4">
                        @foreach ($votiListaCandidato as $voto)
                            <div class="mb-4">
                                <p class="text-2xl">{{ substr($voto->candidato->nome, 0, 1) }}.
                                    {{ $voto->candidato->cognome }}
                                </p>
                                <input type="text" name="candidato_{{ $voto->id }}" value="{{ $voto->voto }}"
                                       class="block mt-1 w-full rounded-md border-gray-400 text-3xl text-right" />
                            </div>
                        @endforeach
                    </div>

                    <div class="w-full mb-8 p-4">
                        <label for="remember_me" class="inline-flex items-center">
                            <input @if ($votiListaCandidato[1]->sezione->chiusa) checked @endif id="remember_me" name="chiusa" value="1" type="checkbox"
                                   class="rounded border-gray-600 text-blue-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                   name="remember">
                            <span class="ml-2 text-2xl ">sezione chiusa per <strong>sindaci</strong> </span>
                        </label>
                    </div>


                    <!-- LISTE -->

                    <div class="p-4 bg-gray-400">
                        <div class="grid grid-cols-2 gap-4">
                            @foreach ($votiLista as $voto)
                                <div class="mb-4">
                                    <p class="text-2xl">
                                        <img src="{{ $voto->candidato->path_image }}" class="h-7 mr-2 float-left">

                                        {{ $voto->candidato->cognome }}
                                    </p>
                                    <input type="text" name="candidato_{{ $voto->id }}" value="{{ $voto->voto }}"
                                           class="block mt-1 w-full rounded-md border-gray-400 text-3xl text-right" />
                                </div>
                            @endforeach
                        </div>
                        <div class="w-full mb-8 ">
                            <label for="remember_me_2" class="inline-flex items-center">
                                <input @if ($votiListaCandidato[1]->sezione->chiusa_lista) checked @endif id="remember_me_2" name="chiusa_lista" value="1"
                                       type="checkbox"
                                       class="rounded border-gray-600 text-blue-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                       name="remember">
                                <span class="ml-2 text-2xl ">sezione chiusa per <strong>liste</strong></span>
                            </label>
                        </div>

                    </div>
                    <!-- END LISTE -->



                    <div class="w-full mt-4 mb-4 text-center p-4">
                        <button type="submit"
                                class="p-2 pl-5 pr-5 bg-blue-500 text-gray-100 text-2xl font-bold hover:bg-gray-500 rounded-lg focus:border-4 border-blue-300 w-full">Aggiorna
                            sezione n. {{ $votiListaCandidato[1]->sezione->numero }}</button>
                    </div>
                    <input type="hidden" name="sezione_id" value="{{ $votiListaCandidato[1]->sezione->id }}" />
                </form>
            </div>
        </div>
    </div>


</x-app-layout>


