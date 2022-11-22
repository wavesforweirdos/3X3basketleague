@extends('layouts.basic')

@section('title', 'Editar entidad | 3KLeague')
@section('navigation')
    @include('layouts.nav-home')
@endsection

@section('banner')
    <x-banner>
        Editar información
        <x-slot name='subtitle'>
            Canviar los datos que deben ser modificados
        </x-slot>
    </x-banner>
@endsection

@section('content')
    <!-- ====== Forms Section Start -->
    <!-- This is an example component -->
    <section class="bg-[#F4F7FF] py-14 lg:py-20 text-gray-600 body-font relative">
        <div class="container mx-auto">
            <div class="mt-10 p-10 md:mt-0 md:col-span-2 shadow bg-white overflow-hidden sm:rounded-md">
                <form action="{{ route('entity.update') }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="">
                        <div class="px-2 py-8 sm:p-6">
                            {{-- Tehnical Director Info --}}
                            <div id="directorInfo">
                                <div class="col-span-6 sm:col-span-3 mt-12">
                                    <h4 for="first-name" class="block text-md font-medium text-gray-700">Información de la
                                        persona de contacto</h4>
                                    <hr class="mt-1 mb-5">
                                </div>
                                <div class="grid grid-cols-6 gap-6">

                                    <x-forms.input id='first_name' type='text' value='{{ old("first_name", $manager->first_name) }}'>
                                        Nombre
                                        @error('first_name')
                                            <small class="text-primary">*{{ $message }}</small>
                                        @enderror
                                    </x-forms.input>
                                    <x-forms.input id='last_name' type='text' value='{{ old("last_name", $manager->last_name) }}'>
                                        Primer apellido
                                        @error('last_name')
                                            <small class="text-primary">*{{ $message }}</small>
                                        @enderror
                                    </x-forms.input>
                                    <x-forms.input id='phone' type='phone' value='{{ old("phone", $manager->phone) }}'>
                                        Móvil
                                        @error('phone')
                                            <small class="text-primary">*{{ $message }}</small>
                                        @enderror
                                    </x-forms.input>
                                    <x-forms.select id='state'>
                                        <x-slot:message>
                                            Cargo
                                        </x-slot:message>
                                        <option hidden value="{{ $manager->state }}" selected style="text-transform: capitalize">
                                            {{ old("state", $manager->state) }}</option>
                                        <option value="1">Presidente</option>
                                        <option value="2">Director técnico</option>
                                    </x-forms.select>

                                </div>
                            </div>
                            {{-- Entity Info --}}
                            <div id="EntityInfo">
                                <div class="col-span-6 sm:col-span-3 mt-12">
                                    <h4 for="first-name" class="block text-md font-medium text-gray-700">Información de la
                                        entidad</h4>
                                    <hr class="mt-1 mb-5">
                                </div>
                                <div class="grid grid-cols-6 gap-6 mb-2">

                                    <!-- Photo File Input -->
                                    <div x-data="{ photoName: null, photoPreview: null }"
                                        class="col-span-6 ml-2 sm:col-span-3 sm:row-span-3 md:mr-3 flex flex-col items-center justify-center">
                                        <input id="image" type="file" class="hidden" x-ref="photo"
                                            x-on:change=" photoName = $refs.photo.files[0].name; const reader = new FileReader(); reader.onload = (e) => { photoPreview = e.target.result; }; reader.readAsDataURL($refs.photo.files[0]); ">

                                        <label class="block text-sm font-medium text-gray-700 text-center" for="photo">
                                            Logotipo
                                        </label>

                                        <div class="text-center flex flex-col justify-center items-center">
                                            <!-- Current Profile Photo -->
                                            <div class="mt-2 " x-show="! photoPreview">
                                                @if (str_contains($entity->photo, 'https://'))
                                                <img src="{{ $entity->photo }}" alt="image"
                                                class="w-20 h-20 rounded-full shadow" />
                                            @else
                                                <img src="{{ Vite::asset('\public\storage\images\entities/' . $entity->photo) }}" alt="image"
                                                class="w-20 h-20 rounded-full shadow" />
                                            @endif
{{-- 
                                                <img src="{{ $entity->photo }}" class="w-20 h-20 rounded-full shadow"> --}}
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

                                    <x-forms.input id='entity_name' type='text' value='{{ old("entity_name", $entity->entity_name) }}'
                                        class='sm:row-span-1'>
                                        Nombre
                                        @error('entity_name')
                                            <small class="text-primary">*{{ $message }}</small>
                                        @enderror
                                    </x-forms.input>
                                    <x-forms.input id='foundation_year' type='number'
                                    value='{{ old("foundation_year", $entity->foundation_year) }}'>
                                        Año de fundación
                                        @error('foundation_year')
                                            <small class="text-primary">*{{ $message }}</small>
                                        @enderror
                                    </x-forms.input>
                                    <x-forms.input id='entity_phone' type='tel' value='{{ old("entity_phone", $entity->phone) }}'>
                                        Móvil o teléfono
                                        @error('entity_phone')
                                            <small class="text-primary">*{{ $message }}</small>
                                        @enderror
                                    </x-forms.input>
                                    <x-forms.input id='email' type='email' value='{{ old("email", $entity->email) }}'>
                                        Correo electrónico
                                        @error('email')
                                            <small class="text-primary">*{{ $message }}</small>
                                        @enderror
                                    </x-forms.input>
                                    <x-forms.input id='web' type='text' value='{{ old("web", $entity->web) }}'>
                                        Web
                                    </x-forms.input>
                                    <x-forms.input id='country' type='text' value='{{ old("country", $entity->country) }}'>
                                        País
                                        @error('country')
                                            <small class="text-primary">*{{ $message }}</small>
                                        @enderror
                                    </x-forms.input>
                                    <x-forms.input id='city' type='text' value='{{ old("city", $entity->city) }}'>
                                        Ciudad
                                        @error('city')
                                            <small class="text-primary">*{{ $message }}</small>
                                        @enderror
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
