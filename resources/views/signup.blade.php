@extends('layouts.basic')

@section('title', 'Registro | 3KLeague')
@section('navigation')
    @include('layouts.nav-home')
@endsection

@section('banner')
    <x-banner>
        Regístrate
        <x-slot name='subtitle'>
            En tu área privada, podrás gestionar tu entidad y crear tu liga
        </x-slot>
    </x-banner>
@endsection

@section('content')
    <!-- ====== Forms Section Start -->
    <section class="bg-[#F4F7FF] py-14 lg:py-20">
        <div class="container">
            <div class="-mx-4 flex flex-wrap">
                <div class="w-full px-4">
                    <div class="wow fadeInUp relative mx-auto max-w-[525px] overflow-hidden rounded-lg bg-white py-14 px-8 text-center sm:px-12 md:px-[60px]"
                        data-wow-delay=".15s">
                        <div class="w-60 max-w-full px-4 mx-auto pb-8">
                            <a href="/" class="navbar-logo block w-full py-5">
                                <img src="{{ Vite::asset('resources/images/logo/logo.svg') }}" alt="logo"
                                    class="w-full" />
                            </a>
                        </div>
                        <form id="signup-form" method="POST">
                            <div class="mb-6">
                                <input type="text" placeholder="Nombre"
                                    class="border-[#E9EDF4] w-full rounded-md border bg-[#FCFDFE] py-3 px-5 text-base text-body-color placeholder-[#ACB6BE] outline-none transition focus:border-primary focus-visible:shadow-none" />
                            </div>
                            <div class="mb-6">
                                <input type="email" placeholder="Correo electrónico"
                                    class="border-[#E9EDF4] w-full rounded-md border bg-[#FCFDFE] py-3 px-5 text-base text-body-color placeholder-[#ACB6BE] outline-none transition focus:border-primary focus-visible:shadow-none" />
                            </div>
                            <div class="mb-6">
                                <input type="password" placeholder="Contraseña"
                                    class="border-[#E9EDF4] w-full rounded-md border bg-[#FCFDFE] py-3 px-5 text-base text-body-color placeholder-[#ACB6BE] outline-none transition focus:border-primary focus-visible:shadow-none" />
                            </div>
                            <div class="mb-10">
                                <input type="submit" name="signup" value="Registrar"
                                    class="border-primary w-full cursor-pointer rounded-md border bg-primary py-3 px-5 text-base text-white transition duration-300 ease-in-out hover:shadow-md" />
                            </div>
                        </form>
                        <p class="mb-6 text-base text-[#adadad]">Regístrate con</p>
                        <ul class="mb-12 flex justify-between w-full">
                            <li class="w-full px-2">
                                <a href="javascript:void(0)"
                                    class="flex h-11 items-center justify-center rounded-md bg-[#4064AC] transition hover:bg-opacity-90">
                                    <svg width="10" height="17" viewBox="0 0 10 20" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M9.29878 8H7.74898H7.19548V7.35484V5.35484V4.70968H7.74898H8.91133C9.21575 4.70968 9.46483 4.45161 9.46483 4.06452V0.645161C9.46483 0.290323 9.24343 0 8.91133 0H6.89106C4.70474 0 3.18262 1.80645 3.18262 4.48387V7.29032V7.93548H2.62912H0.747223C0.359774 7.93548 0 8.29032 0 8.80645V11.129C0 11.5806 0.304424 12 0.747223 12H2.57377H3.12727V12.6452V19.129C3.12727 19.5806 3.43169 20 3.87449 20H6.47593C6.64198 20 6.78036 19.9032 6.89106 19.7742C7.00176 19.6452 7.08478 19.4194 7.08478 19.2258V12.6774V12.0323H7.66596H8.91133C9.2711 12.0323 9.54785 11.7742 9.6032 11.3871V11.3548V11.3226L9.99065 9.09677C10.0183 8.87097 9.99065 8.6129 9.8246 8.35484C9.76925 8.19355 9.52018 8.03226 9.29878 8Z"
                                            fill="white" />
                                    </svg>
                                    <span class="px-4 text-white font-medium text-sm">Facebook</span>
                                </a>
                            </li>
                            <li class="w-full px-2">
                                <a href="javascript:void(0)"
                                    class="flex h-11 items-center justify-center border border-gray-300 rounded-md bg-white transition hover:bg-opacity-20">
                                    <svg width="20" height="20" viewBox="0 0 25 25"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill="#EA4335"
                                            d="M5.266 9.765A7.077 7.077 0 0 1 12 4.909c1.69 0 3.218.6 4.418 1.582L19.91 3C17.782 1.145 15.055 0 12 0 7.27 0 3.198 2.698 1.24 6.65l4.026 3.115Z" />
                                        <path fill="#34A853"
                                            d="M16.04 18.013c-1.09.703-2.474 1.078-4.04 1.078a7.077 7.077 0 0 1-6.723-4.823l-4.04 3.067A11.965 11.965 0 0 0 12 24c2.933 0 5.735-1.043 7.834-3l-3.793-2.987Z" />
                                        <path fill="#4A90E2"
                                            d="M19.834 21c2.195-2.048 3.62-5.096 3.62-9 0-.71-.109-1.473-.272-2.182H12v4.637h6.436c-.317 1.559-1.17 2.766-2.395 3.558L19.834 21Z" />
                                        <path fill="#FBBC05"
                                            d="M5.277 14.268A7.12 7.12 0 0 1 4.909 12c0-.782.125-1.533.357-2.235L1.24 6.65A11.934 11.934 0 0 0 0 12c0 1.92.445 3.73 1.237 5.335l4.04-3.067Z" />
                                    </svg>
                                    <span class="px-4 text-#adadad font-medium text-sm">Google</span>
                                </a>
                            </li>
                        </ul>
                        <p class="mb-4 text-base text-[#adadad]">
                            Al crear una cuenta, acepta nuestros términos de
                            <a href="javascript:void(0)" class="text-primary hover:underline">
                                privacidad
                            </a>
                            y
                            <a href="javascript:void(0)" class="text-primary hover:underline">
                                política
                            </a>
                        </p>

                        <p class="text-base text-[#adadad]">
                            ¿Ya tienes una cuenta?
                            <a href="{{route('signin')}}" class="text-primary hover:underline">
                                Inicia sesión
                            </a>
                        </p>

                        <div>
                            <span class="absolute top-1 right-1">
                                @php
                                    $figure = '<svg width="40" height="40" viewBox="0 0 40 40" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">';
                                    for ($j = 2; $j < 80; $j += 12) {
                                        for ($i = 2; $i < 80; $i += 12) {
                                            $figure .= '<circle cx="' . $j . '" cy="' . $i . '" r="1.5" transform="rotate(-90 1.4 38)" fill="#F49B38" />';
                                        }
                                    }
                                    $figure .= '</svg>';
                                    echo $figure;
                                @endphp
                            </span>
                            <span class="absolute left-1 bottom-1">
                                @php
                                    $figure = '<svg width="29" height="40" viewBox="0 0 29 40" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">';
                                    for ($j = 2; $j < 80; $j += 12) {
                                        for ($i = 2; $i < 80; $i += 12) {
                                            $figure .= '<circle cx="' . $j . '" cy="' . $i . '" r="1.5" transform="rotate(-90 1.4 38)" fill="#F49B38" />';
                                        }
                                    }
                                    $figure .= '</svg>';
                                    echo $figure;
                                @endphp
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ====== Forms Section End -->
@endsection
