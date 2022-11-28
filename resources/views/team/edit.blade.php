@extends('layouts.basic')

@section('title', 'Entity | 3KLeague')
@section('navigation')
    @include('layouts.nav-home')
@endsection

@section('banner')
    <x-banner>
        Información necesaria
        <x-slot name='subtitle'>
            Escoge el nombre del equipo e inscribe a los jugadores
        </x-slot>
    </x-banner>
@endsection

@section('content')
    <!-- ====== Forms Section Start -->
    <!-- This is an example component -->
    <section class="bg-[#F4F7FF] py-14 lg:py-20 text-gray-600 body-font relative">
        <div class="container mx-auto">
            <div class="mt-10 md:mt-v0 md:col-span-2 shadow bg-white overflow-hidden sm:rounded-md">
                <form method="POST" action="{{ route('team.update', $team) }}" class="px-10">
                    @csrf
                    @method('put')
                    <div class="px-2 py-8 sm:p-6">
                        <h1
                            class="text-xl text-center font-bold leading-snug sm:text-xl sm:leading-snug md:text-[45px] md:leading-snug">
                            {{ $league->name }}
                        </h1>
                        {{-- Team Info --}}
                        <div id="TeamInfo">
                            <div class="col-span-6 sm:col-span-3 mt-12">
                                <h4 class="block text-md font-medium text-gray-700">Equipo</h4>
                                <hr class="mt-1 mb-5">
                            </div>
                            <div class="grid grid-cols-6 gap-6 mb-2">
                                <x-forms.input id='name' type='text' placeholder='los innombrables'
                                    class='sm:row-span-1' value="{{ old('name', $team->name) }}">
                                    Nombre del equipo
                                    @error('name')
                                        <small class="text-primary">*{{ $message }}</small>
                                    @enderror
                                </x-forms.input>
                                @component('components.forms.select')
                                    @slot('id')
                                        category_id
                                    @endslot
                                    @slot('class')
                                        sm:row-span-1
                                    @endslot
                                    @slot('message')
                                        Categoría
                                    @endslot
                                    @error('category_id')
                                        <small class="text-primary">*{{ $message }}</small>
                                    @enderror
                                    <option selected hidden value="{{ $team->category_id }}">{{ $category->name }}
                                        {{ $category->gender }}</option>
                                    @if (str_contains($league->team_gender, 'f'))
                                        <option value="1">Senior femenino</option>
                                        <option value="4">Junior femenino</option>
                                        <option value="7">Infantil femenino</option>
                                    @endif
                                    @if (str_contains($league->team_gender, 'm'))
                                        <option value="2">Senior masculino</option>
                                        <option value="5">Junior masculino</option>
                                        <option value="8">Infantil masculino</option>
                                    @endif
                                    @if (str_contains($league->team_gender, 'x'))
                                        <option value="3">Senior mixto</option>
                                        <option value="6">Junior mixto</option>
                                        <option value="9">Infantil mixto</option>
                                    @endif
                                @endcomponent
                            </div>
                            {{-- Players Info --}}
                            <div class="px-4 col-span-6 sm:col-span-3 mt-12">
                                <h4 class="block text-sm font-medium text-gray-700">Jugadores</h4>
                                <hr class="mb-4">
                            </div>
                            <div class="flex flex-col">
                                <?php $i = 0; ?>
                                @foreach ($players as $player)
                                    <label class='w-full text-sm font-medium text-gray-700 pt-3'>
                                        @if ($i <= 2)
                                            @error('first_name[' . $i . ']')
                                                <small class="text-primary">*{{ $message }}</small>
                                            @enderror
                                        @endif
                                    </label>
                                    <div class="w-full flex flex-col md:flex-row gap-2 justify-evenly items-center">
                                        <div class="">
                                            <p class="text-sm text-opacity-30">{{ 1 + $i }}</p>
                                        </div>
                                        <x-forms.input id='players[{{ $i }}][id]' type="number" class="hidden"
                                            value="{{ old('player[id]', $player->id) }}">
                                        </x-forms.input>
                                        <x-forms.input id='players[{{ $i }}][first_name]' type="text"
                                            placeholder="Nombre" value="{{ old('first_name', $player->first_name) }}" class="w-full md:w-1/3">
                                        </x-forms.input>
                                        <x-forms.input id='players[{{ $i }}][last_name]' type="text"
                                            placeholder="Primer apellido"
                                            value="{{ old('last_name', $player->last_name) }}" class="w-full md:w-1/3">
                                        </x-forms.input>
                                        <x-forms.input id='players[{{ $i }}][birthdate]' type='date'
                                            value="{{ old('birthdate', $player->birthdate) }}" class="w-full md:w-1/3">
                                        </x-forms.input>
                                        <x-forms.input id='players[{{ $i }}][email]' type='email'
                                            class="w-full" placeholder='correo@example.com'
                                            value="{{ old('email', $player->email) }}" class="w-full md:w-1/4">
                                        </x-forms.input>
                                        <form action="{{ route('player.destroy', $player) }}" method="POST"
                                            class="justify-center items-center align-middle text-center">
                                            @csrf
                                            @method('delete')
                                            <button type="submit">
                                                <i class="fa-solid fa-xmark hover:text-[#f3f4fe]"></i>
                                            </button>
                                        </form>
                                    </div>
                                    <?php $i++; ?>
                                @endforeach
                            </div>
                        </div>
                        <?php
                                    $restPlayers = $league->max_players - count($players);
                                    if ($restPlayers > 0){?>
                        <div class="px-4 col-span-6 sm:col-span-3 mt-12">
                            <h4 class="block text-sm font-medium text-gray-700">Más jugadores:</h4>
                            <hr class="mb-4">
                        </div>
                        <div class="px-4 grid grid-cols-6 gap-x-6 gap-y-2 mb-2">
                            <?php
                                for ($j=0; $j < $restPlayers; $j++) { ?>
                            <x-forms.input id='players[{{ $i }}][first_name]' type="text"
                                placeholder="Nombre" class="sm:row-span-1 sm:col-span-1">
                            </x-forms.input>
                            <x-forms.input id='players[{{ $i }}][last_name]' type="text"
                                placeholder="Primer apellido" class="sm:row-span-1 sm:col-span-1">
                            </x-forms.input>
                            <x-forms.input id='players[{{ $i }}][birthdate]' type='date'
                                class='sm:row-span-1 sm:col-span-1'>
                            </x-forms.input>
                            <x-forms.input id='players[{{ $i }}][email]' type='email'
                                placeholder='correo@example.com'>
                            </x-forms.input>

                            <?php $i++; }}
                                ?>
                        </div>
                    </div>
            </div>
            <div id="saveInfo" class="flex gap-2 justify-center p-6 bg-white text-center sm:px-6">
                {{-- <button action="{{ route('league') }}"
                        class="inline-flex items-center justify-center rounded py-3 px-10 text-base font-medium text-primary bg-primary bg-opacity-20 transition duration-300 ease-in-out hover:bg-opacity-80 hover:text-white">
                        Cancelar
                    </button> --}}
                <button type="submit"
                    class="inline-flex items-center justify-center rounded bg-primary py-3 px-12 text-base font-medium text-white transition duration-300 ease-in-out hover:bg-dark">
                    Guardar
                </button>
            </div>
            </form>
        </div>
        </div>
    </section>
    <!-- ====== Forms Section End -->
@endsection
@section('scripts')
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.0/dist/alpine.min.js" defer></script>
    <script src="https://cdn.jsdelivr.net/gh/alpine-collective/alpine-magic-helpers@0.3.x/dist/index.js"></script>
@endsection
