@extends('layouts.basic')

@section('title', 'Log In | 3KLeague')
@section('navigation')
    @include('layouts.nav-home')
@endsection

@section('banner')
    <x-banner>
        Welcom to Your League
        <x-slot name='subtitle'>
            Access to your league to manage it
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
                            <a href="index.html" class="navbar-logo block w-full py-5">
                                <img src="{{ Vite::asset('resources/images/logo/logo.svg') }}" alt="logo"
                                    class="w-full" />
                            </a>
                        </div>
                        <form>
                            <div class="mb-6">
                                <input type="email" placeholder="Email"
                                    class="bordder-[#E9EDF4] w-full rounded-md border bg-[#FCFDFE] py-3 px-5 text-base text-body-color placeholder-[#ACB6BE] outline-none transition focus:border-primary focus-visible:shadow-none" />
                            </div>
                            <div class="mb-6">
                                <input type="password" placeholder="Password"
                                    class="bordder-[#E9EDF4] w-full rounded-md border bg-[#FCFDFE] py-3 px-5 text-base text-body-color placeholder-[#ACB6BE] outline-none transition focus:border-primary focus-visible:shadow-none" />
                                {{-- <svg @click="show = !show" :class="{ 'hidden': !show, 'block': show }"
                                    class="h-4 text-purple-700" fill="none" xmlns="http://www.w3.org/2000/svg"
                                    viewbox="0 0 576 512">
                                    <path fill="currentColor"
                                        d="M572.52 241.4C518.29 135.59 410.93 64 288 64S57.68 135.64 3.48 241.41a32.35 32.35 0 0 0 0 29.19C57.71 376.41 165.07 448 288 448s230.32-71.64 284.52-177.41a32.35 32.35 0 0 0 0-29.19zM288 400a144 144 0 1 1 144-144 143.93 143.93 0 0 1-144 144zm0-240a95.31 95.31 0 0 0-25.31 3.79 47.85 47.85 0 0 1-66.9 66.9A95.78 95.78 0 1 0 288 160z">
                                    </path>
                                </svg>

                                <svg @click="show = !show" :class="{ 'block': !show, 'hidden': show }"
                                    class="h-4 text-purple-700" fill="none" xmlns="http://www.w3.org/2000/svg"
                                    viewbox="0 0 640 512">
                                    <path fill="currentColor"
                                        d="M320 400c-75.85 0-137.25-58.71-142.9-133.11L72.2 185.82c-13.79 17.3-26.48 35.59-36.72 55.59a32.35 32.35 0 0 0 0 29.19C89.71 376.41 197.07 448 320 448c26.91 0 52.87-4 77.89-10.46L346 397.39a144.13 144.13 0 0 1-26 2.61zm313.82 58.1l-110.55-85.44a331.25 331.25 0 0 0 81.25-102.07 32.35 32.35 0 0 0 0-29.19C550.29 135.59 442.93 64 320 64a308.15 308.15 0 0 0-147.32 37.7L45.46 3.37A16 16 0 0 0 23 6.18L3.37 31.45A16 16 0 0 0 6.18 53.9l588.36 454.73a16 16 0 0 0 22.46-2.81l19.64-25.27a16 16 0 0 0-2.82-22.45zm-183.72-142l-39.3-30.38A94.75 94.75 0 0 0 416 256a94.76 94.76 0 0 0-121.31-92.21A47.65 47.65 0 0 1 304 192a46.64 46.64 0 0 1-1.54 10l-73.61-56.89A142.31 142.31 0 0 1 320 112a143.92 143.92 0 0 1 144 144c0 21.63-5.29 41.79-13.9 60.11z">
                                    </path>
                                </svg> --}}
                            </div>
                            <div class="mb-10">
                                <input type="submit" value="Sign In"
                                    class="bordder-primary w-full cursor-pointer rounded-md border bg-primary py-3 px-5 text-base text-white transition duration-300 ease-in-out hover:shadow-md" />
                            </div>
                        </form>
                        <p class="mb-6 text-base text-[#adadad]">Connect With</p>
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
                                    class="flex h-11 items-center justify-center border border-gray-300 rounded-md bg-red-400 transition hover:bg-opacity-20">
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
                        <a href="javascript:void(0)" class="mb-2 inline-block text-base text-[#adadad] hover:text-primary">
                            Forget Password?
                        </a>
                        <p class="text-base text-[#adadad]">
                            Not a member yet?
                            <a href="signup.html" class="text-primary hover:underline">
                                Sign Up
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
