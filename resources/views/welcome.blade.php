@extends("layouts.main")
@section("content")
    <main>
        <section class="pt-4 bg-bg1 h-screen">
            @include("components.navbar")
            <div class="px-8 mt-8 flex justify-between items-center">
                <div class="w-1/2 flex flex-col gap-4">
                    <h1 class="text-2xl font-bold flex flex-col">
                        <span>Hi! Selamat datang di SULTAN!</span>
                        <span>Konsultan dan investasi pertanian Indonesia.</span>
                    </h1>
                    <p><span class="font-bold">SULTAN</span> adalah website yang menyediakan kebutuhan
                        para petani seperti konsultasi dan investasi pertanian. Tentunya
                        dengan website <span class="font-bold">SULTAN</span> dapat memudahkan para petani agar
                        hasil panen maksimal.</p>
                    <a href="/" class="flex items-center justify-between btn bg-[#EFF6E9] px-4">
                        Butuh konsultasi dengan ahlinya?
                        <img src="/images/arrow.png" class="h-8" alt="">
                    </a>
                </div>
                <img src="/images/object1.svg" class="h-[70vh]" alt="">
            </div>
        </section>
        <section class="pt-4 bg-[#EFF6E9] h-screen flex items-center relative">
            <img src="/images/bg2.png" class="absolute top-0 bottom-0 m-auto" alt="">
            <div class="flex items-center gap-4 px-20" style="z-index: 99">
                <div class="flex flex-col items-start w-1/4 text-white">
                    <h1 class="font-bold text-xl">Artikel Edukasi</h1>
                    <p>Baca berbagai informasi terbaru seputar agrikultur untuk meningkatkan pemahamanmu!</p>
                </div>
                <div class="flex gap-4 items-center flex-grow">
                    <div class="w-1/4 h-64 bg-[#EFF6E9] drop-shadow-lg rounded-xl"></div>
                    <div class="w-1/4 bg-[#EFF6E9] flex flex-col gap-2 drop-shadow-lg pb-4 rounded-3xl">
                        <img src="/images/ilustration5.png" class="rounded-t-xl h-36 w-full object-cover object-top"
                             alt="">
                        <h2 class="font-medium px-2">APA SIH MANFAAT
                            EDAMAME?</h2>
                        <p class="text-xs px-2">Edamame sebenarnya adalah kacang kedelai. Perbedaanya dengan kacang
                            kedelai adalah edamame
                            dipanen saat ...</p>
                    </div>
                    <div class="w-1/4 h-64 bg-[#EFF6E9] drop-shadow-lg rounded-xl"></div>
                    <div class="w-1/4 h-64 bg-[#EFF6E9] drop-shadow-lg rounded-xl"></div>
                </div>
                <div class=></div>
            </div>
        </section>
        <section class="pt-4 bg-[#EFF6E9] h-screen flex items-center relative">
            <div class="flex items-center justify-center w-full px-20 gap-8">
                <img src="/images/object2.svg" class="w-2/3" alt="">
                <div class="flex flex-col items-start gap-8">
                    <div>
                        <h2 class="text-2xl font-bold">Ruang Diskusi</h2>
                        <p>Diskusikan dan tanyakan permasalahan agrikultur kamu kepada ahli di SULTAN!</p>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold">Perluas jaringan dengan pengguna SULTAN lainnya.</h3>
                        <p>Buka forum diskusimu sendiri dan bangun komunitas pertanian bersama penggiat agrikultur.</p>
                    </div>
                    <a href="/" class="flex items-center justify-between drop-shadow-lg btn bg-secondary px-4">
                        Butuh konsultasi dengan ahlinya?
                        <img src="/images/arrow.png" class="h-8" alt="">
                    </a>
                </div>
            </div>
        </section>
        <section class="pt-4 bg-[#EFF6E9] h-screen flex flex-col px-8">
                <div class="p-8">
                    <h2 class="font-bold text-3xl">Bantu Tani</h2>
                    <p class="text-xl w-1/2">Fitur untuk membantu petani mencari investor dengan lebih mudah lewat SULTAN!</p>
                </div>
                <div class="p-8 pb-12 bg-bg1 rounded-xl flex flex-col items-start h-[55vh] gap-8">
                    <h2 class="font-bold text-3xl">Fitur Bantu Tani</h2>
                    <p class="text-xl w-1/2">Nikmati kemudahan untuk berinvestasi dengan lebih mudah untuk pertanianmu di Fitur Bantu Tani</p>
                    <a href="/bantutani" class="flex items-center justify-between gap-8 px-8 btn btn-primary">
                        Menuju Bantu tani
                        <img src="/images/arrow_light.png" class="h-8" alt="">
                    </a>
                </div>
        </section>
    </main>
@stop
