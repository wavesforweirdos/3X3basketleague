<!-- ====== Hero Section Start -->
<div id="home" class="relative overflow-hidden bg-primary pt-[120px] md:pt-[130px] lg:pt-[160px]bg-contain">
    <div class="container">
        <div class="-mx-4 flex flex-wrap items-center">
            <div class="w-full px-4">
                <div class="hero-content wow fadeInUp mx-auto max-w-[780px] text-center" data-wow-delay=".2s">
                    <h1
                        class="mb-8 text-3xl font-bold leading-snug text-white sm:text-4xl sm:leading-snug md:text-[45px] md:leading-snug">
                        {{ $slot}}
                    </h1>
                    <p
                        class="mx-auto mb-10 max-w-[600px] text-base text-white text-opacity-50 sm:text-lg sm:leading-relaxed md:text-xl md:leading-relaxed">
                        {{ $subtitle }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ====== Hero Section End -->
