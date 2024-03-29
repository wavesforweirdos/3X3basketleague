@extends('layouts.basic')

@section('title', 'Entity | 3KLeague')
@section('navigation')
    {{ $entity = '' }}
    @include('layouts.nav-simply2')
@endsection

@section('banner')
    <x-banner>
        Liga 3X3 {{ $league->name }}
        <x-slot name='subtitle'>
            Agregar partido al calendario (con o sin resultados)
        </x-slot>
    </x-banner>
@endsection

@section('content')

    <!-- ===== Game Info -->
    <section id="infoGame" class="overflow-x-auto pt-20 pb-10">
        <div class="container">
            <div class=" bg-white flex items-center justify-center overflow-x-scroll lg:overflow-hidden p-4">
                <div class="w-full lg:w-5/6">
                    <div class="bg-white my-6 font-sans">
                        <form method="POST" action="{{ route('game.store') }}">
                            @csrf
                            <table class="min-w-max w-full shadow-md rounded table-auto">
                                <thead>
                                    <tr
                                        class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal justify-center text-center">
                                        <th class="py-3 text-center">Hora y fecha</th>
                                        <th class="py-3 text-right">Local</th>
                                        <th class="py-3 text-center">Pts</th>
                                        <th class="text-center"></th>
                                        <th class="py-3 text-center">Pts</th>
                                        <th class="py-3 text-left">Visitante</th>
                                        <th class="py-3 text-center">Árbitro</th>
                                        <th class="py-3 text-center">Duración</th>
                                        <th class="py-3 text-center">Estado</th>
                                    </tr>
                                </thead>
                                <tbody class="text-gray-600 text-sm font-light">
                                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                                        <input id="league_id" name="league_id" value="{{ $league->id }}" type="hidden">
                                        {{-- fecha y hora del partido --}}
                                        <td class="py-3 text-left whitespace-nowrap">
                                            <div class="flex items-center justify-center">
                                                <input id="start_time" name="start_time" type="datetime-local"
                                                    value="{{ old('start_time') }}">
                                                @error('start_time')
                                                    <small class="text-primary text-lg pl-1">*</small>
                                                @enderror
                                            </div>
                                        </td>
                                        {{-- equipo local --}}
                                        <td class="py-3 text-right">
                                            <div class="flex items-center justify-end">
                                                <label for="id_teams_local"></label> <select id="id_teams_local"
                                                    name="id_teams_local">
                                                    @foreach ($league->teams as $team)
                                                        <option value="{{ $team->id }}">{{ $team->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('id_teams_local')
                                                    <small class="text-primary text-lg pl-1">*</small>
                                                @enderror
                                            </div>
                                        </td>
                                        {{-- puntos equipo local --}}
                                        <td class="py-3 text-center">
                                            <div class="flex items-center justify-center">
                                                <input id="score_local" name="score_local" type="number"
                                                    class="font-bold text-lg text-center" value="{{ old('score_local') }}">
                                            </div>
                                        </td>
                                        {{-- separación visual --}}
                                        <td class="stext-center">
                                            <div class="flex justify-center">
                                                <span class="font-medium">-</span>
                                            </div>
                                        </td>
                                        {{-- puntos equipo visitante --}}
                                        <td class="py-3 text-center">
                                            <div class="flex items-center justify-center">
                                                <input id="score_visiting" name="score_visiting" type="number"
                                                    class="font-bold text-lg text-center"
                                                    value="{{ old('score_visiting') }}">
                                            </div>
                                        </td>
                                        {{-- equipo visitante --}}
                                        <td class="py-3 text-right">
                                            <div class="flex items-center justify-end">
                                                <label for="id_teams_visiting"></label> <select id="id_teams_visiting"
                                                    name="id_teams_visiting">
                                                    @foreach ($league->teams as $team)
                                                        <option value="{{ $team->id }}">{{ $team->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('id_teams_visiting')
                                                    <small class="text-primary text-lg pl-1">*</small>
                                                @enderror
                                            </div>
                                        </td>
                                        {{-- árbitro --}}
                                        <td class="py-3 text-right">
                                            <div class="flex items-center justify-end">
                                                <label for="id_referees"></label> <select id="id_referees"
                                                    name="id_referees">
                                                    @foreach ($referees as $referee)
                                                        <option value="{{ $referee->id }}">{{ $referee->first_name }}
                                                            {{ $referee->last_name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('id_referees')
                                                    <small class="text-primary text-lg pl-1">*</small>
                                                @enderror
                                            </div>
                                        </td>
                                        {{-- duración --}}
                                        <td class="py-3 text-center">
                                            <div class="flex items-center justify-center">
                                                <input id="duration" name="duration" type="time"
                                                    value="{{ old('duration') }}">
                                            </div>
                                        </td>
                                        {{-- estado --}}
                                        <td class="py-3 text-center">
                                            <div class="flex items-center  justify-center">
                                                @component('components.forms.select')
                                                    @slot('id')
                                                        state
                                                    @endslot
                                                    @slot('class')
                                                        text-right w-full
                                                    @endslot
                                                    @slot('message')
                                                    @endslot
                                                    @error('id_referees')
                                                        <small class="text-primary text-lg pl-1">*</small>
                                                    @enderror
                                                    <option class="py-1 px-3 rounded-full text-xs text-center w-2/3"
                                                        value="0">
                                                        En juego</option>
                                                    <option
                                                        class="py-1 px-3 rounded-full text-xs text-center w-2/3"value="1">
                                                        Finalizado</option>
                                                    <option class="py-1 px-3 rounded-full text-xs text-center w-2/3"
                                                        value="2">
                                                        Aplazado</option>
                                                    <option class=" py-1 px-3 rounded-full text-xs  text-center w-2/3"
                                                        value="3">
                                                        Suspendido</option>
                                                @endcomponent
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div id="saveInfo" class="flex gap-2 justify-center p-6 pt-10 bg-white text-center sm:px-6">
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
            </div>
        </div>
    </section>
@endsection
