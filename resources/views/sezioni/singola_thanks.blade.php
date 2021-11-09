<x-singola-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-4xl text-gray-800 leading-tight">

        </h2>
    </x-slot>

    @if (Session::has('msg'))
        <div class="bg-green-500 text-white text-3xl p-4 text-center">
            {{ Session::get('msg') }}
        </div>
    @endif

    <div class="mt-8">
        <p class="text-center"><a href="/sezioni/singole/{{$slug}}" class="underline font-bold text-3xl">Torna alla tua sezione</a></p>
    </div>


</x-singola-layout>
