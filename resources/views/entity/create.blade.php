@extends('layouts.basic')

@section('title', 'Entity | 3KLeague')
@section('navigation')
    @include('layouts.nav-home')
@endsection

@section('banner')
    <x-banner>
        Información necesaria
        <x-slot name='subtitle'>
            Rellena el formulario para registrar tu entidad
        </x-slot>
    </x-banner>
@endsection

@section('content')
    <!-- ====== Forms Section Start -->
    <!-- This is an example component -->
    <section class="bg-[#F4F7FF] py-14 lg:py-20 text-gray-600 body-font relative">
        <div class="container mx-auto">
            <div class="mt-10 md:mt-0 md:col-span-2 shadow bg-white overflow-hidden sm:rounded-md">
                <form action="{{ route('entity.store') }}" method="POST" class="px-10" enctype="multipart/form-data">
                    @csrf
                    <div class="">
                        <div class="px-2 py-8 sm:p-6">
                            {{-- Tehnical Director Info --}}
                            <div id="directorInfo">
                                <div class="col-span-6 sm:col-span-3 mt-12">
                                    <h4 class="block text-md font-medium text-gray-700">Información de la
                                        persona de contacto</h4>
                                    <hr class="mt-1 mb-5">
                                </div>
                                <div class="grid grid-cols-6 gap-6">

                                    <x-forms.input id='first_name' type='text' placeholder='Carles'>
                                        Nombre
                                    </x-forms.input>
                                    <x-forms.input id='last_name' type='text' placeholder='Esteve'>
                                        Primer apellido
                                    </x-forms.input>
                                    <x-forms.input id='phone' type='phone' placeholder='680379541'>
                                        Móvil
                                    </x-forms.input>
                                    <x-forms.select id='state'>
                                        <x-slot:message>
                                            Cargo
                                        </x-slot:message>
                                        <option value="1">Presidente</option>
                                        <option value="2">Director técnico</option>
                                    </x-forms.select>

                                </div>
                            </div>
                            {{-- Entity Info --}}
                            <div id="EntityInfo">
                                <div class="col-span-6 sm:col-span-3 mt-12">
                                    <h4 for="first-name" class="block text-md font-medium text-gray-700">Entidad</h4>
                                    <hr class="mt-1 mb-5">
                                </div>
                                <div class="grid grid-cols-6 gap-6 mb-2">

                                    <!-- Photo File Input -->
                                    <div x-data="{ photoName: null, photoPreview: null }"
                                        class="col-span-6 ml-2 sm:col-span-3 sm:row-span-3 md:mr-3 flex flex-col items-center justify-center">
                                        {{ csrf_field() }}
                                        <input id="image" name="image" type="file" class="hidden" x-ref="photo"
                                            x-on:change=" photoName = $refs.photo.files[0].name; const reader = new FileReader(); reader.onload = (e) => { photoPreview = e.target.result; }; reader.readAsDataURL($refs.photo.files[0]); ">

                                        <label class="block text-sm font-medium text-gray-700 text-center" for="photo">
                                            Logo
                                        </label>

                                        <div class="text-center flex flex-col justify-center items-center">
                                            <!-- Current Profile Photo -->
                                            <div class="mt-2 " x-show="! photoPreview">
                                                <img src="https://images.unsplash.com/photo-1531316282956-d38457be0993?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=700&q=80"
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
                                                Select New Photo
                                            </button>


                                        </div>
                                    </div>

                                    <x-forms.input id='entity_name' type='text' placeholder='U. B. Llefià'
                                        class='sm:row-span-1'>
                                        Nombre
                                    </x-forms.input>
                                    <x-forms.input id='foundation_year' type='number' placeholder='1978'>
                                        Año de fundación
                                    </x-forms.input>
                                    <x-forms.input id='entity_phone' type='tel' placeholder='685279187'>
                                        Móvil o teléfono
                                    </x-forms.input>
                                    <x-forms.input id='email' type='email' placeholder='info@entity.com'>
                                        Correo electrónico
                                    </x-forms.input>
                                    <x-forms.input id='web' type='url' placeholder='http://www.entity.com'  >
                                        Web
                                    </x-forms.input>
                                    <x-forms.input id='country' type='text' placeholder='Spain'>
                                        País
                                    </x-forms.input>
                                    <x-forms.input id='city' type='text' placeholder='Barcelona'>
                                        Ciudad
                                    </x-forms.input>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="saveInfo" class="flex gap-2 justify-center px-4 pb-5 bg-white text-center sm:px-6">
                        <button action="{{ route('entity') }}"
                            class="inline-flex items-center justify-center rounded py-3 px-10 text-base font-medium text-primary bg-primary bg-opacity-20 transition duration-300 ease-in-out hover:bg-opacity-80 hover:text-white">
                            Cancelar
                        </button>
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
