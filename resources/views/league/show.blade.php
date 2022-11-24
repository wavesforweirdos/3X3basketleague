@extends('layouts.basic')
@section('title', 'Entity Name | 3KLeague')
@section('navigation')
    @include('layouts.nav-entity')
@endsection

@section('banner')
    <x-banner>
        Liga 3X3 {{ $league->name }}
        <x-slot name='subtitle'>
            Toda la información sobre la liga
        </x-slot>
    </x-banner>
@endsection

@section('content')

    {{-- Inscripción para usuarios-jugadores/equipos --}}

    {{-- <div class="w-full m-2">
        <div class="wow fadeInUp relative overflow-hidden rounded bg-primary py-[60px] px-11 text-center lg:px-8"
            data-wow-delay=".1s">
            <h3 class="mb-2 text-2xl font-semibold text-white">
                ¡Participa en la liga!
            </h3>
            <p class="mb-8 text-base text-white">
                Inscripciones abiertas para la liga 3X3 <strong>{{ $league->name }}</strong>. Debes estar préviamente
                registrado y acceder desde tu área privada.
            </p>
            <div
                class="flex justify-center items-center mb-4 h-[50px] w-full cursor-pointer rounded bg-secondary text-center text-sm font-medium text-white transition duration-300 ease-in-out hover:bg-secondary-900 hover:shadow-lg active:bg-secondary-700">
                <a href="{{ route('signup') }}">
                    Inscribir equipo
                </a>
            </div>
            <div
                class="flex justify-center items-center mb-4 h-[50px] w-full cursor-pointer rounded bg-white text-center text-sm font-medium text-secondary-500 transition duration-300 ease-in-out hover:bg-opacity-70 hover:shadow-lg active:bg-opacity-40">
                <a href="{{ route('entity.create') }}">
                    Iniciar sesión
                </a>
            </div>

            <p class="text-sm font-medium text-white">
                Oh no! ¿No eres miembro aun?
                <a href="signup" class="text-secondary-900 hover:underline">
                    Regístrate
                </a>
            </p>

            <div>
                <span class="absolute top-0 right-0">
                    @php
                        $figure = '<svg width="46" height="46" viewBox="0 0 46 46" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">';
                        for ($j = 2; $j < 80; $j += 12) {
                            for ($i = 2; $i < 80; $i += 12) {
                                $figure .= '<circle cx="' . $j . '" cy="' . $i . '" r="1.4" transform="rotate(-90 1.4 38)" fill="white" fill-opacity="0.44" />';
                            }
                        }
                        $figure .= '</svg>';
                        echo $figure;
                    @endphp
                </span>
                <span class="absolute bottom-0 left-0">
                    @php
                        $figure = '<svg width="46" height="46" viewBox="0 0 46 46" fill="none"
                                xmlns="http://www.w3.org/2000/svg">';
                        for ($j = 2; $j < 80; $j += 12) {
                            for ($i = 2; $i < 80; $i += 12) {
                                $figure .= '<circle cx="' . $j . '" cy="' . $i . '" r="1.4" transform="rotate(-90 1.4 38)" fill="white" fill-opacity="0.44" />';
                            }
                        }
                        $figure .= '</svg>';
                        echo $figure;
                    @endphp
                </span>
            </div>
        </div>
    </div> --}}

    <section id="infoLeague" class="ud-contact relative py-20 md:py-[120px]">
        <div class="absolute top-0 left-0 z-[-1] h-[40%] w-full bg-[#f3f4fe] lg:h-[50%] xl:h-1/4"></div>
        <div class="container px-4">
            <div class="-mx-4 flex flex-wrap items-center">
                {{-- Entity Info --}}
                <div class="w-full p-5 lg:w-5/12 xl:w-4/12">
                    <div class="wow fadeInUp rounded-lg bg-white py-8 px-8 shadow-testimonial sm:py-12 sm:px-10 md:p-[60px] lg:p-10 lg:py-12 lg:px-10 2xl:p-[60px]"
                        data-wow-delay=".2s">
                        <h2 class="pb-6 wow fadeInUp text-[26px] font-bold leading-snug text-dark sm:text-3xl sm:leading-snug md:text-4xl md:leading-snug "
                            data-wow-delay=".1s">
                            {{ $entity->entity_name }} <span class="text-primary font-medium text-3xl text-opacity-30">|
                                {{ $entity->foundation_year }} {{ $entity->country }}</span>
                        </h2>
                        <div class="flex gap-4 flex-col">
                            <div id="entityInfo">
                                <p class="wow fadeInUp text-lg font-bold text-dark" data-wow-delay=".1s">
                                    Información de contacto:
                                </p>
                                <p class="wow fadeInUp text-base leading-relaxed text-body-color" data-wow-delay=".1s">
                                    {{ $entity->phone }} <br>
                                    {{ $entity->email }} <br>
                                    {{ $entity->web }}
                                </p>
                            </div>
                            <div id="contactInfo">
                                <p class="wow fadeInUp text-lg font-bold text-dark" data-wow-delay=".1s">
                                    Persona de contacto:
                                </p>
                                <p class="wow fadeInUp text-base leading-relaxed text-body-color" data-wow-delay=".1s">
                                    {{ $manager->first_name }} {{ $manager->last_name }} <br>
                                    {{ $manager->phone }} <br>
                                    {{ $manager->state }} <br>
                                </p>
                            </div>
                        </div>
                    </div>
                    {{-- League Info --}}
                </div>
                {{-- Entity Info End --}}

                {{-- League Info --}}
                <div class="w-full p-10 lg:w-7/12 xl:w-8/12">
                    <div class="ud-contact-content-wrapper">
                        <div class="ud-contact-title mb-10 lg:mb-[40px] p-2">
                            <span class="font-headingFont mb-5 text-base font-semibold text-dark">
                                LIGA 3X3
                            </span>
                            <h2 class="text-[35px] font-semibold">
                                {{ $league->name }} <br />
                            </h2>
                            <div class="text-dark text-md">
                                <p>
                                    Edad mínima: <strong>{{ $league->min_age }} años</strong>
                                </p>
                                <p>
                                    Máx. jugadores por equipo: <strong>{{ $league->max_players }}</strong>
                                </p>
                                <p>
                                    @php
                                        $gender = $league->team_gender;
                                        $strGender = 'Equipos <strong>';
                                        
                                        if (str_contains($gender, 'x') && str_contains($gender, 'm') && str_contains($gender, 'f')) {
                                            $strGender .= 'mixtos, masculinos o femeninos';
                                        } elseif (str_contains($gender, 'x') && str_contains($gender, 'm')) {
                                            $strGender .= 'mixtos o masculinos';
                                        } elseif (str_contains($gender, 'x') && str_contains($gender, 'f')) {
                                            $strGender .= 'mixtos o femeninos';
                                        } elseif (str_contains($gender, 'm') && str_contains($gender, 'f')) {
                                            $strGender .= 'masculinos o femeninos';
                                        } elseif (str_contains($gender, 'm')) {
                                            $strGender .= 'masculinos';
                                        } elseif (str_contains($gender, 'f')) {
                                            $strGender .= 'femeninos';
                                        }
                                        $strGender .= '</strong>';
                                        echo $strGender;
                                    @endphp
                                </p>

                                <ul>
                                    <li>Inscripciones hasta:
                                        <strong>{{ date('d/m/Y', strtotime($league->registration_day)) }}</strong></ol>
                                    <li>Fecha de inicio:
                                        <strong>{{ date('d/m/Y', strtotime($league->start_day)) }}</strong></ol>
                                    <li>Fecha de fin: <strong>{{ date('d/m/Y', strtotime($league->end_day)) }} </strong>
                                        </ol>
                                </ul>
                            </div>
                            <div id="editInfo" class="w-full flex flex-end py-3">
                                <a href="{{ route('league.edit', $league) }}"
                                    class="rounded bg-primary bg-opacity-20 py-2 px-5 text-xs font-medium text-primary text-center hover:bg-opacity-100 hover:text-white md:mr-4 lg:mr-2 xl:mr-4">
                                    Editar
                                </a>
                                <form action="{{ route('league.destroy', $league) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit"
                                        class="rounded bg-primary bg-opacity-20 py-2 px-5 text-xs font-medium text-primary text-center hover:bg-opacity-100 hover:text-white md:mr-4 lg:mr-2 xl:mr-4">
                                        Eliminar
                                    </button>
                                </form>
                            </div>
                        </div>
                        <div class="mb-12 flex flex-wrap justify-between lg:mb-0">
                            <div class="mb-8 flex w-[330px] max-w-full">
                                <div class="mr-6 text-[32px] text-primary">
                                    <svg width="29" height="35" viewBox="0 0 29 35" class="fill-current">
                                        <path
                                            d="M14.5 0.710938C6.89844 0.710938 0.664062 6.72656 0.664062 14.0547C0.664062 19.9062 9.03125 29.5859 12.6406 33.5234C13.1328 34.0703 13.7891 34.3437 14.5 34.3437C15.2109 34.3437 15.8672 34.0703 16.3594 33.5234C19.9688 29.6406 28.3359 19.9062 28.3359 14.0547C28.3359 6.67188 22.1016 0.710938 14.5 0.710938ZM14.9375 32.2109C14.6641 32.4844 14.2812 32.4844 14.0625 32.2109C11.3828 29.3125 2.57812 19.3594 2.57812 14.0547C2.57812 7.71094 7.9375 2.625 14.5 2.625C21.0625 2.625 26.4219 7.76562 26.4219 14.0547C26.4219 19.3594 17.6172 29.2578 14.9375 32.2109Z" />
                                        <path
                                            d="M14.5 8.58594C11.2734 8.58594 8.59375 11.2109 8.59375 14.4922C8.59375 17.7188 11.2187 20.3984 14.5 20.3984C17.7812 20.3984 20.4062 17.7734 20.4062 14.4922C20.4062 11.2109 17.7266 8.58594 14.5 8.58594ZM14.5 18.4297C12.3125 18.4297 10.5078 16.625 10.5078 14.4375C10.5078 12.25 12.3125 10.4453 14.5 10.4453C16.6875 10.4453 18.4922 12.25 18.4922 14.4375C18.4922 16.625 16.6875 18.4297 14.5 18.4297Z" />
                                    </svg>
                                </div>
                                <div>
                                    <h5 class="mb-6 text-lg font-semibold">Pista de juego</h5>
                                    <p class="text-base text-body-color">
                                        {{ $basket_court->street }} {{ $basket_court->number }},
                                        {{ $basket_court->zip_code }}
                                        {{ $basket_court->city }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- League Info End --}}
            </div>
        </div>
    </section>
@endsection
