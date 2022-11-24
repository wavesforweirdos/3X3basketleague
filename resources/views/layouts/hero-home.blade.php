<!-- ====== Hero Section Start -->
<div id="home" class="relative overflow-hidden bg-primary pt-[120px] md:pt-[130px] lg:pt-[160px]bg-contain"
    style="background-image: url('{{ Vite::asset('resources/images/hero/hero-image.png') }}'); background-position:top; background-repeat:no-repeat; background-size: cover;">
    <div class="container">
        <div class="-mx-4 flex flex-wrap items-center">
            <div class="w-full px-4">
                <div class="hero-content wow fadeInUp mx-auto max-w-[780px] text-center" data-wow-delay=".2s">
                    <h1
                        class="mb-8 text-3xl font-bold leading-snug text-white sm:text-4xl sm:leading-snug md:text-[45px] md:leading-snug">
                        Tu propia web de gestión para una liga 3X3 de baloncesto 
                    </h1>
                    <p
                        class="mx-auto mb-10 max-w-[600px] text-base text-white text-opacity-90 sm:text-lg sm:leading-relaxed md:text-xl md:leading-relaxed">
                        Diseña tu propio campeonato de baloncesto 3X3. Gestiona equipos, jugadores y árbitros y mantén siempre actualizados partidos y resultados. </p>
                    <ul class="mb-10 flex flex-wrap items-center justify-center">
                        <li>
                            <a href="{{route('entity.create')}}"
                                class="inline-flex items-center justify-center rounded-lg bg-white py-4 px-6 text-center text-base font-medium text-dark transition duration-300 ease-in-out hover:text-primary hover:shadow-lg sm:px-10">
                                Iniciar gestión
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="w-full px-4">
                <div class="wow fadeInUp relative z-10 mx-auto max-w-[845px]" data-wow-delay=".25s">
                    <div class="mt-16">
                        <img src="{{ Vite::asset('resources/images/hero/hero-image-black.png') }}" alt="hero"
                            class="bg-blend-screen mx-auto max-w-full rounded-t-xl rounded-tr-xl" />
                    </div>
                    <div class="absolute bottom-0 -left-9 z-[-1]">
                        @php
                            $figure = '<svg width="135" height="100" viewBox="0 0 134 106" fill="none" xmlns="http://www.w3.org/2000/svg">';
                            for ($j = 0; $j < 135; $j += 15) {
                                for ($i = 0; $i < 250; $i += 15) {
                                    $figure .= '<circle cx="' . $j . '" cy="' . $i . '" r="1.5" transform="rotate(-90 1.66667 104)" fill="white" />';
                                }
                            }
                            $figure .= '</svg>';
                            echo $figure;
                        @endphp
                    </div>
                    <div class="absolute -top-6 -right-6 z-[-1]">
                        @php
                            $figure = '<svg width="135" height="100" viewBox="0 0 134 106" fill="none" xmlns="http://www.w3.org/2000/svg">';
                            for ($j = 0; $j < 135; $j += 15) {
                                for ($i = 0; $i < 250; $i += 15) {
                                    $figure .= '<circle cx="' . $j . '" cy="' . $i . '" r="1.5" transform="rotate(-90 1.66667 104)" fill="white" />';
                                }
                            }
                            $figure .= '</svg>';
                            echo $figure;
                        @endphp
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ====== Hero Section End -->
