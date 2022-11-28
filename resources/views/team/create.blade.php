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
                <form action="{{ route('team.store') }}" method="POST" class="px-10">
                    @csrf
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
                                <x-forms.input id='id_leagues' type='number' placeholder="{{ $league->id }}"
                                    class='sm:row-span-1 hidden' value="{{ $league->id }}">
                                    id_entities
                                </x-forms.input>
                                <x-forms.input id='name' type='text' placeholder='los innombrables'
                                    class='sm:row-span-1' value="{{ old('name') }}">
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
                                <h4 class="block text-sm font-medium text-gray-700">Jugadores
                                    <span class="text-gray-300 font-normal text-xs">(Se necesitan mínimo 3 jugadores por
                                        equipo)</span>
                                </h4>
                                <hr class="mb-4">
                            </div>
                            <div class="flex flex-col">
                                @for ($i = 0; $i < $league->max_players; $i++)
                                    <label class='text-sm font-medium text-gray-700 pt-3 col-span-6'>
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
                                        <x-forms.input id='first_name[]' type="text" placeholder="Nombre" class="w-full md:w-1/3">
                                        </x-forms.input>
                                        <x-forms.input id='last_name[]' type="text" placeholder="Primer apellido" class="w-full md:w-1/3">
                                        </x-forms.input>
                                        <x-forms.input id='birthdate[]' type='date' class="w-full md:w-1/3">
                                        </x-forms.input>
                                        <x-forms.input id='email[]' type='email' placeholder='correo@example.com' class="w-full md:w-1/4">
                                        </x-forms.input>
                                    </div>
                                @endfor
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
