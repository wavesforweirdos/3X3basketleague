@extends('layouts.basic')
@section('title', 'Entity Name | 3KLeague')
@section('navigation')
    @include('layouts.nav-entity')
@endsection

@section('banner')
    <x-banner>
        Bienvenido a tu área privada
        <x-slot name='subtitle'>
            Aquí podrás gestionar tus datos, crear ligas y mucho más...
        </x-slot>
    </x-banner>
@endsection

@section('content')

    {{-- Entity Info --}}
    <section id="infoEntity" class="pt-20 pb-10 lg:pt-[120px] lg:pb-20">
        <div class="container">
            <div class="-mx-4 w-full flex flex-wrap gap-6 justify-center items-center">
                <div class="wow fadeInUp overflow-hidden rounded mb-4 w-1/4" data-wow-delay=".1s">
                    @if ($entity->photo)
                        @if (str_contains($entity->photo, 'https://'))
                            <img src="{{ $entity->photo }}" alt="image"
                                class="object-cover object-center h-auto rounded-full" />
                        @else
                            <img src="{{ Vite::asset('\public\storage\images\entities/' . $entity->photo) }}" alt="image"
                                class="object-cover object-center h-auto rounded-full" />
                        @endif
                    @else
                        <img src="https://149368894.v2.pressablecdn.com/wp-content/uploads/2019/09/iStock-1018999828.jpg"
                            alt="image" class="object-cover object-center h-auto rounded-full"/>
                    @endif

                </div>
                <div class="flex">
                    <div id="info">
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
                            <div id="editInfo" class="w-full flex flex-end">
                                <a href="{{ route('entity.edit', $entity) }}"
                                    class="rounded bg-primary bg-opacity-20 py-2 px-5 text-xs font-medium text-primary text-center hover:bg-opacity-100 hover:text-white md:mr-4 lg:mr-2 xl:mr-4">
                                    Editar
                                </a>
                                <form action="{{ route('entity.destroy', $entity) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit"
                                        class="rounded bg-primary bg-opacity-20 py-2 px-5 text-xs font-medium text-primary text-center hover:bg-opacity-100 hover:text-white md:mr-4 lg:mr-2 xl:mr-4">
                                        Eliminar
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- Entity Info Section End --}}

    {{-- Leagues Info --}}
    {{-- Añadir una liga --}}
    <section id="newLeague" class="relative z-20 overflow-hidden bg-[#f3f4fe] pt-20 pb-20 lg:pt-[120px] lg:pb-[120px]">
        <div class="container">
            <div class="-mx-4 flex flex-wrap">
                <div class="w-full px-4">
                    <div class="mx-auto max-w-[620px] text-center">
                        {{-- <span class="mb-2 block text-lg font-semibold text-primary">
                            Nueva liga
                        </span> --}}
                        <h2 class="mb-4 text-3xl font-bold text-dark">
                            ¿Estás pensando en crear una nueva liga?
                        </h2>
                        <p class="text-lg leading-relaxed text-body-color sm:text-xl sm:leading-relaxed">
                            ¡Estás en el lugar correcto! Te queda sólo un último paso: rellena un breve cuestionario y ¡a
                            disfrutar!
                        </p>
                        <div class="w-full">
                            <a href="{{ route('league.create', $entity) }}"
                                class="mt-10 inline-block rounded-full border border-primary bg-transparent py-4 px-11 text-center text-base font-medium text-primary transition duration-300 ease-in-out hover:border-primary hover:bg-primary hover:text-white">
                                Crear liga
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Existen ligas asociadas a esta entidad --}}
    <?php
        $lenght = count($leagues);
        if ($lenght){
    ?>
    <section id="oldLeagues" class="pt-20 pb-20 lg:pt-[120px] lg:pb-[120px]">
        <div class="container">
            <div class="-mx-4 flex flex-wrap">
                <div class="w-full px-4">
                    <div class="mx-auto mb-[60px] max-w-[620px] text-center lg:mb-20">
                        <span class="mb-2 block text-lg font-semibold text-primary">
                            Ligas
                        </span>
                        <h2 class="mb-4 text-3xl font-bold text-dark sm:text-4xl md:text-[40px]">
                            Competiciones creadas
                        </h2>
                        <p class="text-lg leading-relaxed text-body-color sm:text-xl sm:leading-relaxed">
                            En esta sección encontrarás todas las ligas gestionadas por {{ $entity->entity_name }}
                        </p>
                    </div>
                </div>
            </div>
            <div class="-mx-4 flex flex-wrap">
                @foreach ($leagues as $league)
                    <div class="w-full px-4 md:w-1/2 lg:w-1/3">
                        <div class="wow fadeInUp group mb-10" data-wow-delay=".1s">
                            <div class="mb-8 overflow-hidden rounded">
                                <a href="{{ route('league.show', $league) }}" class="block">
                                    <img src="
                                    <?php
                                    $league->logo ? ($src = $league->logo) : ($src = fake()->imageUrl($width = 250, $height = 250, $league->name));
                                    echo $src;
                                    ?>" alt="image"
                                        class="w-full transition group-hover:rotate-6 group-hover:scale-125" />
                                </a>
                            </div>
                            <div>
                                <span
                                    class="mb-5 inline-block rounded bg-primary py-1 px-4 text-center text-xs font-semibold leading-loose text-white">
                                    @php
                                        $date = strftime('%b %e, %Y', strtotime($league->start_day));
                                        echo $date;
                                    @endphp
                                </span>
                                <h3>
                                    <a href="{{ route('league.show', $league) }} "
                                        class="mb-4 inline-block text-xl font-semibold text-dark hover:text-primary sm:text-2xl lg:text-xl xl:text-2xl">
                                        {{ $league->name }} 3X3</a>
                                </h3>
                                <p class="text-base text-body-color">
                                    Edad mínima: {{ $league->min_age }} años
                                </p>
                                <p class="text-base text-body-color">
                                    Máx. jugadores por equipo: {{ $league->max_players }}
                                </p>
                                <p class="text-base text-body-color">
                                    @php
                                        $gender = $league->team_gender;
                                        $strGender = 'Equipos ';
                                        
                                        if (str_contains($gender, 'x') && str_contains($gender, 'm') && str_contains($gender, 'f')) {
                                            $strGender .= 'mixtos, masculinos y femeninos';
                                        } elseif (str_contains($gender, 'x') && str_contains($gender, 'm')) {
                                            $strGender .= 'mixtos y masculinos';
                                        } elseif (str_contains($gender, 'x') && str_contains($gender, 'f')) {
                                            $strGender .= 'mixtos y femeninos';
                                        } elseif (str_contains($gender, 'm') && str_contains($gender, 'f')) {
                                            $strGender .= 'masculinos y femeninos';
                                        } elseif (str_contains($gender, 'm')) {
                                            $strGender .= 'masculinos';
                                        } elseif (str_contains($gender, 'f')) {
                                            $strGender .= 'femeninos';
                                        }
                                        echo $strGender;
                                    @endphp
                                </p>
                                <div id="editLeague" class="w-full flex flex-row pt-3">
                                    @php
                                        
                                        $today = new DateTime();
                                        $start_day = new DateTime($league->start_day);
                                        $end_day = new DateTime($league->end_day);
                                        
                                        $diff = $start_day->diff($today); //diferencia entre el dia actual y el inicio de la liga
                                        $leagueDiff = $end_day->diff($today); //diferencia entre el inicio de la liga y el fin de esta
                                        
                                        if ($diff->invert && $diff->format('%d') >= 14) {
                                            //Quedan más de 2 semanas para que empiece el torneo, aun se pueden inscribir (Inscribir equipo)
                                            $button =
                                                '<a href="/team/create/' .
                                                $entity->id .
                                                '" class="rounded bg-primary bg-opacity-20 py-2 px-5 text-xs font-medium text-primary text-center hover:bg-opacity-100 hover:text-white md:mr-4 lg:mr-2 xl:mr-4">
                                                    Inscribir equipo
                                                    </a>';
                                            echo $button;
                                        } elseif ($leagueDiff->invert && $diff->format('%d') < 14) {
                                            //Ha empezado la liga por lo que los equipos ya estan inscritos (Ver equipos) y el calendario de partidos esta establecido (Ver calendario)
                                            $button =
                                                ' <a href="/team/create/' .
                                                $entity->id .
                                                '" class="rounded bg-primary bg-opacity-20 py-2 px-5 text-xs font-medium text-primary text-center hover:bg-opacity-100 hover:text-white md:mr-4 lg:mr-2 xl:mr-4">
                                                    Ver equipos
                                                    </a>
                                                <a href="/team/create/' .
                                                $entity->id .
                                                '" class="rounded bg-primary bg-opacity-20 py-2 px-5 text-xs font-medium text-primary text-center hover:bg-opacity-100 hover:text-white md:mr-4 lg:mr-2 xl:mr-4">
                                                    Ver calendario
                                                    </a>
                                                ';
                                            echo $button;
                                        } elseif (!$leagueDiff->invert) {
                                            //La liga ya ha terminado por lo que podemos ver la clasificacion final (Ver clasificacion) y el resultado de los partidos (Ver resultados)
                                            $button =
                                                '<a href="/team/create/' .
                                                $entity->id .
                                                '" class="rounded bg-primary bg-opacity-20 py-2 px-5 text-xs font-medium text-primary text-center hover:bg-opacity-100 hover:text-white md:mr-4 lg:mr-2 xl:mr-4">
                                            Ver calendario </a>
                                            <a href="/team/create/' .
                                                $entity->id .
                                                '" class="rounded bg-primary bg-opacity-20 py-2 px-5 text-xs font-medium text-primary text-center hover:bg-opacity-100 hover:text-white md:mr-4 lg:mr-2 xl:mr-4">
                                            Ver clasificacion </a>';
                                            echo $button;
                                        }
                                    @endphp
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <?php
        }
    ?>

@endsection
