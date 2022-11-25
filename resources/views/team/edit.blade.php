@extends('layouts.basic')

@section('title', 'Entity | 3KLeague')
@section('navigation')
    @include('layouts.nav-home')
@endsection

@section('banner')
    <x-banner>
        Información necesaria
        <x-slot name='subtitle'>
            Rellena el formulario para crear una nueva liga
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
                    <div class="">
                        <div class="px-2 py-8 sm:p-6">
                            <h1 class="text-xl text-center font-bold leading-snug sm:text-xl sm:leading-snug md:text-[45px] md:leading-snug">
                                {{ $entity->entity_name }}
                            </h1>
                            {{-- League Info --}}
                            <div id="LeagueInfo">
                                <div class="col-span-6 sm:col-span-3 mt-12">
                                    <h4 class="block text-md font-medium text-gray-700">Liga</h4>
                                    <hr class="mt-1 mb-5">
                                </div>
                                <div class="grid grid-cols-6 gap-6 mb-2">
                                    <x-forms.input id='league_name' type='text' placeholder='3X3 LLEFIÀ'
                                        class='sm:row-span-1' value='{{old("league_name")}}'>
                                        Nombre
                                        @error('league_name')
                                            <small class="text-primary">*{{ $message }}</small>
                                        @enderror
                                    </x-forms.input>
                                    <x-forms.input id='age' type='number' placeholder='16' min='0'
                                        class='sm:row-span-1'>
                                        Edad mínima de los participantes
                                        @error('age')
                                        <small class="text-primary">*{{ $message }}</small>
                                    @enderror
                                    </x-forms.input>
                                    <x-forms.input id='max_players' type='number' placeholder='16' min='3'
                                        class='sm:row-span-1' value='{{old("max_players")}}'>
                                        Máximo de jugadores por equipo
                                        @error('max_players')
                                            <small class="text-primary">*{{ $message }}</small>
                                        @enderror
                                    </x-forms.input>
                                    <div class="col-span-6 sm:col-span-3">
                                        <fieldset>
                                            <legend id="gender" class="block text-sm font-medium text-gray-700">Género del equipo
                                            </legend>
                                            <div
                                                class="col-span-6 sm:col-span-3 py-1 px-2 flex flex-row gap-2 align-middle">
                                                <x-forms.checkbox id='f' legend='Femenino'> </x-forms.checkbox>
                                                <x-forms.checkbox id='m' legend='Masculinp'> </x-forms.checkbox>
                                                <x-forms.checkbox id='mix' legend='Mixto'> </x-forms.checkbox>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>
                                {{-- Basket-Court Info --}}
                                <div class="px-4 col-span-6 sm:col-span-3 mt-12">
                                    <h4 for="first-name" class="block text-sm font-medium text-gray-700">Basket Court</h4>
                                    <hr class="mb-4">
                                </div>
                                <div class="px-4 grid grid-cols-6 gap-6 mb-2">
                                    <x-forms.input id='court_street' type='text'
                                        placeholder='Avinguda del Doctor Bassols' class='sm:row-span-1' value='{{old("court_street")}}'>
                                        Calle
                                        @error('court_street')
                                        <small class="text-primary">*{{ $message }}</small>
                                    @enderror
                                    </x-forms.input>
                                    <x-forms.input id='court_num' type='number' placeholder='10' value='{{old("court_num")}}'>
                                        Número
                                        @error('court_num')
                                        <small class="text-primary">*{{ $message }}</small>
                                    @enderror
                                    </x-forms.input>
                                    <x-forms.input id='court_zip_code' type='number' placeholder='08911' value='{{old("court_zip_code")}}'>
                                        Código postal
                                        @error('court_zip_code')
                                        <small class="text-primary">*{{ $message }}</small>
                                    @enderror
                                    </x-forms.input>
                                    <x-forms.input id='court_city' type='text' placeholder='Badalona' value='{{old("court_city")}}'>
                                        Ciudad
                                        @error('court_city')
                                        <small class="text-primary">*{{ $message }}</small>
                                    @enderror
                                    </x-forms.input>
                                </div>
                            </div>
                        </div>

                    </div>
                </form>
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
            </div>
        </div>
    </section>
    <!-- ====== Forms Section End -->
@endsection
@section('scripts')
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.0/dist/alpine.min.js" defer></script>
    <script src="https://cdn.jsdelivr.net/gh/alpine-collective/alpine-magic-helpers@0.3.x/dist/index.js"></script>
@endsection
