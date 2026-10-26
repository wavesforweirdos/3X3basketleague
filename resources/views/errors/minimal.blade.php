@extends('layouts.basic')
@section('title', 'Error | 3KLeague')
@section('navigation')
    @include('layouts.nav-home')
@endsection
@section('banner')
    <x-banner>
        @yield('title')
        <x-slot name='subtitle'>
            &nbsp
        </x-slot>
    </x-banner>
@endsection
@section('content')

    <!-- ====== Error Section Start -->
    <section class="bg-white py-14 lg:py-20">
        <div class="container">
            <div class="-mx-4 flex flex-wrap">
                <div class="w-full px-4">
                    <div class="wow fadeInUp relative mx-auto max-w-[850px] overflow-hidden rounded-lg bg-white py-20 px-8 text-center shadow-lg sm:px-12 md:px-[60px]"
                        data-wow-delay=".2s">
                        <h2 class="mb-8 text-3xl font-bold text-dark sm:text-4xl lg:text-[40px] xl:text-[42px]">
                            Error @yield('code')
                        </h2>
                        <h3 class="mb-8 text-xl font-normal text-dark-700 md:text-2xl">
                            Page @yield('message')
                        </h3>
                        <ul class="flex flex-wrap justify-center">
                            <li>
                                <a href="{{route('home')}}"
                                    class="mx-2 my-1 inline-block rounded-md bg-primary py-3 px-6 text-base font-medium hover:text-dark hover:bg-[#f5f8ff] text-white">
                                    Inicio
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ====== Error Section End -->
@endsection
