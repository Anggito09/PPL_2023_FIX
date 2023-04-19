@extends('layouts.default')
@section('content')

<main class="mx-12 mt-14 mb-10 flex flex-col">
    <div id="intro" class="flex items-center justify-between">
        <div class="w-7/12 flex flex-col gap-8 items-start">
            <div class="text-primary">
                <h1 class="text-2xl">
                    Halo! Selamat datang di
                    <span class="font-black">SULTAN</span>!
                </h1>
                <h2 class="text-xl">
                    Konsultan dan Investasi pertanian Indonesia
                </h2>
            </div>

            <p class="text-white w-9/12">
                SULTAN adalah website yang menyediakan kebutuhan para petani
                seperti konsultasi dan investasi pertanian. Tentunya dengan
                website SULTAN dapat memudahkan para petani agar hasil panen
                maksimal.
            </p>

            <a
                href="#"
                class="bg-white text-primary font-bold flex items-center justify-between px-6 rounded-full w-7/12 drop-shadow-xl hover:drop-shadow-2xl"
            >
                <span>Butuh konsultasi dengan ahlinya?</span>
                <img src="images/arrow.png" alt="" srcset=""/>
            </a>
        </div>
        <img src="images/illustration1.svg" class="w-4/12"></img>
    </div>
    <div
        id="artikel"
        class="my-56 flex gap-5 items-center justify-between"
    >
        <div class="flex gap-5">
            <div class="w-3 rounded-full bg-white"></div>
            <div>
                <div class="text-2xl font-black text-primary">
                    Artikel Edukasi
                </div>
                <div class="text-white w-72">
                    Baca berbagai informasi terbaru seputar agrikultur untuk
                    meningkatkan pemahamanmu!
                </div>
            </div>
        </div>
        <div class="flex w-10/12 gap-5 items-center">
            <div class="relative rounded-xl w-52">
                <img
                    src="images/artikel1.png"
                    class="rounded-xl opacity-30 object-cover"
                    alt=""
                    srcset=""
                />
            </div>
            <div class="relative rounded-xl">
                <img
                    src="images/artikel1.png"
                    class="rounded-xl"
                    alt=""
                    srcset=""
                />
                <div class="absolute bottom-0 p-5 bg-white  bg-opacity-80 text-primary rounded-b-xl">
                    <h1 class="text-lg font-bold">APA SIH MANFAAT EDAMAME?</h1>
                    <p class="text-sm">
                        Edamame sebenarnya adalah kacang kedelai. Perbedaanya dengan
                        ...
                    </p>
                </div>
            </div>
            <div class="relative rounded-xl w-52">
                <img
                    src="images/artikel1.png"
                    class="rounded-xl opacity-30 object-cover"
                    alt=""
                    srcset=""
                />
            </div>
            <div class="relative rounded-xl w-52">
                <img
                    src="images/artikel1.png"
                    class="rounded-xl opacity-30 object-cover"
                    alt=""
                    srcset=""
                />
            </div>
        </div>
    </div>
    <div id="diskusi" class="relative">
        <img
            src="images/illustration2.svg"
            class="absolute w-7/12"
            alt=""
            srcset=""
        />
        <div class="w-full pt-3">
            <div class="flex justify-end gap-5 p-8">
                <div class="w-3 rounded-full bg-white"></div>
                <div class="w-1/3">
                    <div class="text-2xl font-black text-primary">
                        Ruang Diskusi
                    </div>
                    <div class="text-white">
                        Diskusikan dan tanyakan permasalahan agrikultur kamu kepada
                        ahli di SULTAN!
                    </div>
                </div>
            </div>
            <div class="flex justify-end gap-5 bg-white rounded-xl p-8">
                <div class="w-1/3 flex flex-col gap-5">
                    <div class="text-xl font-black text-primary">
                        Perluas jaringan dengan pengguna SULTAN lainnya.
                    </div>
                    <div class="text-primary">
                        Buka forum diskusimu sendiri dan bangun komunitas pertanian
                        bersama penggiat agrikultur.
                    </div>
                    <a
                        href="#"
                        class="bg-white text-primary font-bold flex items-center justify-between px-6 rounded-full w-7/12 drop-shadow-md hover:drop-shadow-xl"
                    >
                        Mulai diskusi
                        <img
                            src="images/arrow.png"
                            class="h-10"
                            alt=""
                            srcset=""
                        />
                    </a>
                </div>
            </div>
        </div>
    </div>
</main>

@stop
