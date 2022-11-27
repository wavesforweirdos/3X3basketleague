@extends('layouts.basic')
@section('title', 'Entity Name | 3KLeague')
@section('navigation')
    @include('layouts.nav-entity')
@endsection

@section('banner')
    <x-banner>
        Liga 3X3 {{ $league->name }}
        <x-slot name='subtitle'>
            Calendario y resultados
        </x-slot>
    </x-banner>
@endsection

@section('content')

    <!-- ===== Game Info -->
    <section id="infoGame" class="overflow-x-auto pt-20 pb-10">
        <div class="container">
            <div class="-mx-4 flex flex-wrap">
                <div class="w-full px-4">
                    <div class="mx-auto mb-[60px] max-w-[620px] text-center lg:mb-20">
                        <span class="mb-2 block text-lg font-semibold text-primary">
                            Partidos
                        </span>
                        <h2 class="mb-4 text-3xl font-bold text-dark sm:text-4xl md:text-[40px]">
                            Historial de partidos
                        </h2>
                        <p class="text-lg leading-relaxed text-body-color sm:text-xl sm:leading-relaxed">
                            A continuación se muestran los últimos partidos disputados de la {{ $league->name }}
                        </p>
                    </div>
                </div>
            </div>
            <div class=" bg-white flex items-center justify-center overflow-x-scroll lg:overflow-hidden p-4">
                <div class="w-full lg:w-5/6">
                    <div class="bg-white my-6 font-sans">
                        <table class="min-w-max w-full shadow-md rounded table-auto">
                            <thead>
                                <tr
                                    class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal justify-center text-center">
                                    <th class="py-3 px-6 text-center">Hora y fecha</th>
                                    <th class="py-3 px-6 text-right">Local</th>
                                    <th class="py-3 px-6 text-center">Pts</th>
                                    <th class="text-center"></th>
                                    <th class="py-3 px-6 text-center">Pts</th>
                                    <th class="py-3 px-6 text-left">Visitante</th>
                                    <th class="py-3 px-6 text-center">Árbitro</th>
                                    <th class="py-3 px-6 text-center">Duración</th>
                                    <th class="py-3 px-6 text-center">Estado</th>
                                    <th class="pr-2 text-center"></th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-600 text-sm font-light">
                                @foreach ($games->sortByDesc('start_time') as $game)
                                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                                        {{-- fecha y hora del partido --}}
                                        <td class="py-3 px-6 text-left whitespace-nowrap">
                                            <div class="flex items-center justify-center">
                                                <input>{{ $game->start_time }}>
                                            </div>
                                        </td>
                                        {{-- equipo local --}}
                                        <td class="py-3 px-6 text-right">
                                            <div class="flex items-center justify-end">
                                                <input class="font-medium">{{ $game->id_teams_local }}>
                                            </div>
                                        </td>
                                        {{-- puntos equipo local --}}
                                        <td class="py-3 px-6 text-center">
                                            <div class="flex items-center justify-center">
                                                <input
                                                    class="font-bold text-2xl 
                                                @if ($game->score_local > $game->score_visiting) text-primary @endif
                                                ">{{ $game->score_local }}>
                                            </div>
                                        </td>
                                        {{-- separación visual --}}
                                        <td class="stext-center">
                                            <div class="flex justify-center">
                                                <span class="font-medium">-</span>
                                            </div>
                                        </td>
                                        {{-- puntos equipo visitante --}}
                                        <td class="py-3 px-6 text-center">
                                            <div class="flex items-center justify-center">
                                                <input
                                                    class="font-bold text-2xl 
                                                @if ($game->score_visiting > $game->score_local) text-primary @endif
                                                ">{{ $game->score_visiting }}>
                                            </div>
                                        </td>
                                        {{-- equipo visitante --}}
                                        <td class="py-3 px-6 text-left">
                                            <div class="flex items-center">
                                                <input class="font-medium">{{ $game->id_teams_visiting }}>
                                            </div>
                                        </td>
                                        {{-- árbitro --}}
                                        <td class="py-3 px-6 text-center">
                                            <div class="flex items-center justify-center">
                                                <input>{{ $game->id_referees }}>
                                            </div>
                                        </td>
                                        {{-- duración --}}
                                        <td class="py-3 px-6 text-center">
                                            <div class="flex items-center justify-center">
                                                <input>{{ $game->duration }}>
                                            </div>
                                        </td>

                                        <td class="py-3 px-6 text-center">
                                            @switch($game->state)
                                                @case(0)
                                                    <input class="bg-purple-200 text-purple-600 py-1 px-3 rounded-full text-xs">En
                                                        juego>
                                                @break

                                                @case(1)
                                                    <input
                                                        class="bg-green-200 text-green-600 py-1 px-3 rounded-full text-xs">Finalizado>
                                                @break

                                                @case(2)
                                                    <input
                                                        class="bg-yellow-200 text-yellow-600 py-1 px-3 rounded-full text-xs">Aplazado>
                                                @break

                                                @case(3)
                                                    <input
                                                        class="bg-red-200 text-red-600 py-1 px-3 rounded-full text-xs">Suspendido>
                                                @break

                                                @default
                                            @endswitch
                                        </td>
                                        <td class="pr-2  text-center font-light">
                                            <div class="flex item-center justify-center">
                                                <button title="Ver acta o minuto a minuto" class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="1.5" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="1.5"
                                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                    </svg>
                                                </button>
                                                <button title="Editar registro" class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="1.5"
                                                            d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                    </svg>
                                                </button>
                                                <button title="Eliminar registro" class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="1.5"
                                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                    </svg>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- Añadir un equipo --}}
    <section id="newGame"
        class="relative z-20 overflow-hidden 
        <?php
            $lenght = count($teams);
            if (!$lenght){
        ?>
            pb-20 lg:pb-[120px]">
        <?php
            }else{ echo'pb-20 lg:pb-[120px]">';}?>
        <div class="container">
            <div class="-mx-4 flex flex-wrap">
                <div class="w-full px-4">
                    <div class="mx-auto max-w-[620px] text-center">
                        <div class="w-full flex gap-4 justify-center items-center">
                            <a href="{{ route('team.create', $league) }}"
                                class="mt-10 inline-block rounded-full border border-primary bg-transparent py-4 px-11 text-center text-base font-medium text-primary transition duration-300 ease-in-out hover:border-primary hover:bg-primary hover:text-white">
                                Agregar partido
                            </a>
                            <a href="{{ route('team.create', $league) }}"
                                class="mt-10 inline-block rounded-full border border-primary bg-transparent py-4 px-11 text-center text-base font-medium text-primary transition duration-300 ease-in-out hover:border-primary hover:bg-primary hover:text-white">
                                Ver todos
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
@endsection
