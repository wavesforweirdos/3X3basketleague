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
                <form action="{{route('league/create')}}" method="POST" class="px-10">
                    <div class="">
                        <div class="px-2 py-8 sm:p-6">
                            {{-- League Info --}}
                            <div id="LeagueInfo">
                                <div class="col-span-6 sm:col-span-3 mt-12">
                                    <h4 for="first-name" class="block text-md font-medium text-gray-700">League</h4>
                                    <hr class="mt-1 mb-5">
                                </div>
                                <div class="grid grid-cols-6 gap-6 mb-2">
                                    <x-forms.input id='league-name' type='text' placeholder='3X3 LLEFIÀ'
                                        class='sm:row-span-1'>
                                        Name
                                    </x-forms.input>
                                    <x-forms.input id='age' type='number' placeholder='16' min='0'
                                        class='sm:row-span-1'>
                                        Minimum age
                                    </x-forms.input>
                                    <x-forms.input id='players' type='number' placeholder='16' min='3'
                                        class='sm:row-span-1'>
                                        Maxim players
                                    </x-forms.input>
                                    <div class="col-span-6 sm:col-span-3">
                                        <fieldset>
                                            <legend class="block text-sm font-medium text-gray-700">Team gender
                                            </legend>
                                            <div
                                                class="col-span-6 sm:col-span-3 py-1 px-2 flex flex-row gap-2 align-middle">
                                                <x-forms.checkbox id='f' legend='Female'> </x-forms.checkbox>
                                                <x-forms.checkbox id='m' legend='Mascle'> </x-forms.checkbox>
                                                <x-forms.checkbox id='mix' legend='Mix'> </x-forms.checkbox>
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
                                    <x-forms.input id='court-street' type='text'
                                        placeholder='Avinguda del Doctor Bassols' class='sm:row-span-1'>
                                        Street
                                    </x-forms.input>
                                    <x-forms.input id='court-num' type='number' placeholder='10'>
                                        Street number
                                    </x-forms.input>
                                    <x-forms.input id='court-zipcode' type='number' placeholder='08911'>
                                        Zip Code
                                    </x-forms.input>
                                    <x-forms.input id='court-city' type='text' placeholder='Badalona'>
                                        City
                                    </x-forms.input>
                                </div>
                            </div>
                        </div>

                    </div>
                </form>
                <div class="px-4 pb-5 bg-white text-center sm:px-6">
                    <button type="submit"
                        class="inline-flex items-center justify-center rounded bg-primary py-4 px-12 text-base font-medium text-white transition duration-300 ease-in-out hover:bg-dark">
                        Save
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
