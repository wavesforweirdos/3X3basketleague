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
            <div class="mt-10 md:mt-0 md:col-span-2 shadow bg-white overflow-hidden sm:rounded-md">
                <form action="" method="POST" class="px-10">
                    @csrf
                    <div class="px-2 py-8 sm:p-6">
                        <h1 class="text-xl text-center font-bold leading-snug sm:text-xl sm:leading-snug md:text-[45px] md:leading-snug">
                            {{ $league->name }}
                        </h1>
                        {{-- Team Info --}}
                        <div id="TeamInfo">
                            <div class="col-span-6 sm:col-span-3 mt-12">
                                <h4 class="block text-md font-medium text-gray-700">Equipo</h4>
                                <hr class="mt-1 mb-5">
                            </div>
                            <div class="grid grid-cols-6 gap-6 mb-2">
                                <x-forms.input id='id_leagues' type='number' placeholder='{{$league}}'
                                class='sm:row-span-1 hidden' value='{{$league}}'>
                                    id_entities
                                    @error('id_leagues')
                                        <small class="text-primary">*{{ $message }}</small>
                                    @enderror
                                </x-forms.input>
                                <x-forms.input id='name' type='text' placeholder='los innombrables'
                                class='sm:row-span-1' value='{{old("name")}}'>
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
                                            <option value="1">Senior femenino</option>
                                            <option value="2">Senior masculino</option>
                                            <option value="3">Senior mixto</option>
                                            <option value="4">Junior femenino</option>
                                            <option value="5">Junior masculino</option>
                                            <option value="6">Junior mixto</option>
                                            <option value="7">Infantil femenino</option>
                                            <option value="8">Infantil masculino</option>
                                            <option value="9">Infantil mixto</option>
                                        @enderror
                                    @endcomponent
                            </div>
                            {{-- Players Info --}}
                            <div class="px-4 col-span-6 sm:col-span-3 mt-12">
                                <h4 class="block text-sm font-medium text-gray-700">Jugadores</h4>
                                <hr class="mb-4">
                            </div>
                            <div class="px-4 grid grid-cols-6 gap-x-6  gap-y-2 mb-2">
                                @for ($i = 0; $i < $league->max_players; $i++)
                                    <label class='text-sm font-medium text-gray-700 pt-3 col-span-6'>Jugador {{1+$i}}</label>
                    
                                    <x-forms.input id='first_name_{{1+$i}}' type='text'
                                    placeholder='Nombre' class='row-span-1 sm:col-span-1' value='{{old("first_name_{{1+$i}}")}}'>
                                        @error('first_name_{{1+$i}}')
                                            <small class="text-primary">*{{ $message }}</small>
                                        @enderror
                                    </x-forms.input>
                                    <x-forms.input id='last_name_{{1+$i}}' type='text'
                                        placeholder='Primer apellido' class='sm:row-span-1 sm:col-span-1' value='{{old("last_name_{{1+$i}}")}}'>
                                        @error('last_name_{{1+$i}}')
                                            <small class="text-primary">*{{ $message }}</small>
                                        @enderror
                                    </x-forms.input>
                                    <x-forms.input id='birthdate_{{1+$i}}' type='date'
                                        class='sm:row-span-1 sm:col-span-1' value='{{old("birthdate_{{1+$i}}")}}'>
                                        @error('birthdate_{{1+$i}}')
                                            <small class="text-primary">*{{ $message }}</small>
                                        @enderror
                                    </x-forms.input>
                                    <x-forms.input id='email_{{1+$i}}' type='email_{{1+$i}}' placeholder='correo@example.com' value='{{old("email_{{1+$i}}")}}'>
                                        @error('email_{{1+$i}}')
                                        <small class="text-primary">*{{ $message }}</small>
                                        @enderror
                                    </x-forms.input>

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
