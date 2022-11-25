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
                <form action="{{route('league.store')}}" method="POST" class="px-10">
                    @csrf
                    <div class="">
                        <div class="px-2 py-8 sm:p-6">
                            <h1 class="text-xl text-center font-bold leading-snug sm:text-xl sm:leading-snug md:text-[45px] md:leading-snug">
                            </h1>
                            {{-- League Info --}}
                            <div id="LeagueInfo">
                                <div class="col-span-6 sm:col-span-3 mt-12">
                                    <!-- Photo File Input -->
                                    <div x-data="{ photoName: null, photoPreview: null }"
                                        class="col-span-6 ml-2 sm:col-span-3 sm:row-span-3 md:mr-3 flex flex-col items-center justify-center">
                                        <input id="image" type="file" class="hidden" x-ref="photo"
                                            x-on:change=" photoName = $refs.photo.files[0].name; const reader = new FileReader(); reader.onload = (e) => { photoPreview = e.target.result; }; reader.readAsDataURL($refs.photo.files[0]); ">
                                        <div class="text-center flex flex-col justify-center items-center">
                                            <!-- Current Profile Photo -->
                                            <div class="mt-2 " x-show="! photoPreview">
                                                <img src="https://www.pngall.com/wp-content/uploads/5/Profile-PNG-File.png"
                                                    class="w-20 h-20 rounded-full shadow">
                                            </div>
                                            <!-- New Profile Photo Preview -->
                                            <div class="mt-2" x-show="photoPreview" style="display: none;">
                                                <span class="block w-20 h-20 rounded-full m-auto shadow"
                                                    x-bind:style="'background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url(\'' +
                                                    photoPreview + '\');'"
                                                    style="background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url('null');">
                                                </span>
                                            </div>
                                            <button type="button"
                                                class="m-2 inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:text-gray-500 focus:outline-none  focus:border-primary focus-visible:shadow-none  focus:ring-primary focus:shadow-outline-blue active:text-primary active:bg-gray-50 transition ease-in-out duration-150"
                                                x-on:click.prevent="$refs.photo.click()">
                                                Seleccionar archivo
                                            </button>
                                        </div>
                                    </div>
                                    <h4 class="block text-md font-medium text-gray-700">Liga</h4>
                                    <hr class="mt-1 mb-5">
                                </div>
                                <div class="grid grid-cols-6 gap-6 mb-2">
                                    <x-forms.input id='id_entities' type='number' placeholder='{{$entity}}'
                                        class='sm:row-span-1 hidden' value='{{$entity}}'>
                                        id_entities
                                        @error('id_entities')
                                            <small class="text-primary">*{{ $message }}</small>
                                        @enderror
                                    </x-forms.input>
                                    <x-forms.input id='name' type='text' placeholder='3X3 LLEFIÀ'
                                        class='sm:row-span-1' value='{{old("name")}}'>
                                        Nombre
                                        @error('name')
                                            <small class="text-primary">*{{ $message }}</small>
                                        @enderror
                                    </x-forms.input>
                                    <x-forms.input id='min_age' type='number' placeholder='0'
                                        class='sm:row-span-1' value='{{old("min_age")}}'>
                                        Edad mínima de los participantes
                                        @error('min_age')
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
                                            <legend id="team_gender" class="block text-sm font-medium text-gray-700">Géneros aceptados
                                                @error('team_gender')
                                                    <small class="text-primary">*{{ $message }}</small>
                                                @enderror
                                            </legend>
                                            <div
                                                class="col-span-6 sm:col-span-3 py-1 px-2 flex flex-row gap-2 align-middle">
                                                <x-forms.checkbox id='team_gender[f]' legend='Femenino'> </x-forms.checkbox>
                                                <x-forms.checkbox id='team_gender[m]' legend='Masculino'> </x-forms.checkbox>
                                                <x-forms.checkbox id='team_gender[x]' legend='Mixto'> </x-forms.checkbox>
                                            </div>
                                        </fieldset>
                                    </div>
                                    <x-forms.input id='registration_day' type='date'
                                        class='sm:row-span-1' value='{{old("registration_day")}}'>
                                        Fecha límite de registro de equipos
                                        @error('registration_day')
                                            <small class="text-primary">*{{ $message }}</small>
                                        @enderror
                                    </x-forms.input>
                                    <x-forms.input id='start_day' type='date'
                                        class='sm:row-span-1' value='{{old("start_day")}}'>
                                        Fecha de inicio
                                        @error('start_day')
                                            <small class="text-primary">*{{ $message }}</small>
                                        @enderror
                                    </x-forms.input>
                                    <x-forms.input id='end_day' type='date'
                                        class='sm:row-span-1' value='{{old("end_day")}}'>
                                        Fecha fin de liga
                                        @error('end_day')
                                            <small class="text-primary">*{{ $message }}</small>
                                        @enderror
                                    </x-forms.input>
                                </div>
                                {{-- Basket-Court Info --}}
                                <div class="px-4 col-span-6 sm:col-span-3 mt-12">
                                    <h4 for="first-name" class="block text-sm font-medium text-gray-700">Basket Court</h4>
                                    <hr class="mb-4">
                                </div>
                                <div class="px-4 grid grid-cols-6 gap-6 mb-2">
                                    <x-forms.input id='street' type='text'
                                        placeholder='Avinguda del Doctor Bassols' class='sm:row-span-1' value='{{old("street")}}'>
                                        Calle
                                        @error('street')
                                        <small class="text-primary">*{{ $message }}</small>
                                    @enderror
                                    </x-forms.input>
                                    <x-forms.input id='number' type='number' placeholder='10' value='{{old("number")}}'>
                                        Número
                                        @error('number')
                                        <small class="text-primary">*{{ $message }}</small>
                                    @enderror
                                    </x-forms.input>
                                    <x-forms.input id='zip_code' type='number' placeholder='08911' value='{{old("zip_code")}}'>
                                        Código postal
                                        @error('zip_code')
                                        <small class="text-primary">*{{ $message }}</small>
                                    @enderror
                                    </x-forms.input>
                                    <x-forms.input id='city' type='text' placeholder='Badalona' value='{{old("city")}}'>
                                        Ciudad
                                        @error('city')
                                        <small class="text-primary">*{{ $message }}</small>
                                    @enderror
                                    </x-forms.input>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div id="saveInfo" class="flex gap-2 justify-center p-6 bg-white text-center sm:px-6">
                        {{-- <button action="{{ route('entity.show') }}"
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
