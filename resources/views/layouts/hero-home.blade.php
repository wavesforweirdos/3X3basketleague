<!-- ====== Hero Section Start -->
<div id="home" class="relative overflow-hidden bg-primary pt-[120px] md:pt-[130px] lg:pt-[160px]bg-contain"
    style="background-image: url('{{ Vite::asset('resources/images/hero/hero-image.png') }}'); background-position:top; background-repeat:no-repeat; background-size: cover;">
    <div class="container">
        <div class="-mx-4 flex flex-wrap items-center">
            <div class="w-full px-4">
                <div class="hero-content wow fadeInUp mx-auto max-w-[780px] text-center" data-wow-delay=".2s">
                    <h1
                        class="mb-8 text-3xl font-bold leading-snug text-white sm:text-4xl sm:leading-snug md:text-[45px] md:leading-snug">
                        Your Own 3X3 Basketball League Managment
                    </h1>
                    <p
                        class="mx-auto mb-10 max-w-[600px] text-base text-white text-opacity-50 sm:text-lg sm:leading-relaxed md:text-xl md:leading-relaxed">
                        Design your own 3X3 basketball championship. Manage teams and players and always keep match
                        results up to date. </p>
                    <ul class="mb-10 flex flex-wrap items-center justify-center">
                        <li>
                            <a href="signup"
                                class="inline-flex items-center justify-center rounded-lg bg-white py-4 px-6 text-center text-base font-medium text-dark transition duration-300 ease-in-out hover:text-primary hover:shadow-lg sm:px-10">
                                Start Managment
                            </a>
                        </li>
                        {{-- <li>
                            <a href="signup target="_blank
                                class="flex items-center py-4 px-6 text-base font-medium text-white transition duration-300 ease-in-out hover:opacity-70 sm:px-10">
                                Start Managment
                                <span class="pl-2">
                                    <svg width="20" height="8" viewBox="0 0 20 8" class="fill-current">
                                        <path
                                            d="M19.2188 2.90632L17.0625 0.343819C16.875 0.125069 16.5312 0.0938193 16.2812 0.281319C16.0625 0.468819 16.0312 0.812569 16.2188 1.06257L18.25 3.46882H0.9375C0.625 3.46882 0.375 3.71882 0.375 4.03132C0.375 4.34382 0.625 4.59382 0.9375 4.59382H18.25L16.2188 7.00007C16.0312 7.21882 16.0625 7.56257 16.2812 7.78132C16.375 7.87507 16.5 7.90632 16.625 7.90632C16.7812 7.90632 16.9375 7.84382 17.0312 7.71882L19.1875 5.15632C19.75 4.46882 19.75 3.53132 19.2188 2.90632Z" />
                                    </svg>
                                </span>
                            </a>
                        </li> --}}
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
