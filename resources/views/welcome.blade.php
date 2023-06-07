@extends("layouts.main")
@section("content")
    <main>
        <section class="pt-4 bg-bg1 bg-cover h-screen">
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
                    <a href="{{auth()->user()?(auth()->user()->role->role_name === "pakar"?"/riwayatchat":"/ruangchat"):"/ruangchat"}}"
                       class="self-start  flex items-center gap-4 btn bg-[#EFF6E9] px-4">
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
                <div class="flex flex-col items-start w-1/3 text-white">
                    <h1 class="font-bold text-xl">Artikel Edukasi</h1>
                    <p>Baca berbagai informasi terbaru seputar agrikultur untuk meningkatkan pemahamanmu!</p>
                </div>
                <div class="flex gap-4 items-center flex-grow">
                    @if($artikels->count() > 3)
                        <div class="w-1/6 h-56 bg-[#EFF6E9] drop-shadow-lg rounded-xl">
                            <img src="/pic/{{$artikels[0]->gambar}}"
                                 class="rounded-t-xl h-36 w-full object-cover object-top"
                                 alt="">
                            <h2 class="font-medium px-2">{{$artikels[0]->judul}}</h2>
                            <div class="p-2">
                                <p class="text-xs">{!!substr($artikels[0]->deskripsi, 0, 45) !!}...</p>
                            </div>
                        </div>
                        <div class="w-1/4 bg-[#EFF6E9] flex flex-col gap-2 drop-shadow-lg pb-4 rounded-3xl">
                            <img src="/pic/{{$artikels[1]->gambar}}"
                                 class="rounded-t-xl h-36 w-full object-cover object-top"
                                 alt="">
                            <h2 class="font-medium px-2">{{$artikels[1]->judul}}</h2>
                            <div class="p-2">
                                <p class="text-xs">{!!substr($artikels[1]->deskripsi, 0, 99) !!}...</p>
                            </div>
                        </div>
                        <div class="w-1/6 h-56 bg-[#EFF6E9] drop-shadow-lg rounded-xl">
                            <img src="/pic/{{$artikels[2]->gambar}}"
                                 class="rounded-t-xl h-36 w-full object-cover object-top"
                                 alt="">
                            <h2 class="font-medium px-2">{{$artikels[2]->judul}}</h2>
                            <div class="p-2">
                                <p class="text-xs">{!!substr($artikels[1]->deskripsi, 0, 45) !!}...</p>
                            </div>
                        </div>
                        <div class="w-1/6 h-56 bg-[#EFF6E9] drop-shadow-lg rounded-xl">
                            <img src="/pic/{{$artikels[3]->gambar}}"
                                 class="rounded-t-xl h-36 w-full object-cover object-top"
                                 alt="">
                            <h2 class="font-medium px-2">{{$artikels[3]->judul}}</h2>
                            <div class="p-2">
                                <p class="text-xs">{!!substr($artikels[1]->deskripsi, 0, 45) !!}...</p>
                            </div>
                        </div>
                    @endif
                    <a href="/listartikel"
                       class="rounded-full w-10 h-10 border-2 border-white flex items-center justify-center text-white text-2xl">
                        &rsaquo;
                    </a>
                </div>
                <div class=></div>
            </div>
        </section>
        <section class="pt-4 bg-[#EFF6E9] h-screen flex items-center relative">
            <div class="flex justify-center w-full px-20 gap-8">
                @if(isset($diskusi) && $diskusi)
                    <div class="w-2/3 shadow p-8 rounded-xl flex flex-col justify-center">
                        <h1 class="text-2xl font-bold">Diskusi Pertanian Terbaru</h1>
                        <div class="">
                            <div class="flex">
                                <img src="/images/icon4.png" class="h-20" calt="">
                                <div class="text-black">
                                    <p class="text-xl">{{$diskusi->topic}}</p>
                                    <p>Oleh: <span
                                            class="font-bold">{{$diskusi->user->name[0].str_repeat('*',strlen($diskusi->user->name)-2).$diskusi->user->name[-1]}}</span>
                                    </p>
                                    @if($diskusi->diskusiKomens)
                                        <p class="text-blue-600">Dijawab
                                            oleh {{$diskusi->diskusiKomens->user->name}}</p>
                                    @endif
                                </div>
                            </div>
                            @if($diskusi->diskusiKomens)
                                <p class="text-xl">{{substr($diskusi->diskusiKomens->comment, 0, 200)}}...</p>
                            @endif
                        </div>
                    </div>
                @else
                    <img src="/images/object2.svg" class="w-2/3" alt="">
                @endif
                <div class="flex flex-col items-start gap-8">
                    <div>
                        <h2 class="text-2xl font-bold">Ruang Diskusi</h2>
                        <p>Diskusikan dan tanyakan permasalahan agrikultur kamu kepada ahli di SULTAN!</p>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold">Perluas jaringan dengan pengguna SULTAN lainnya.</h3>
                        <p>Buka forum diskusimu sendiri dan bangun komunitas pertanian bersama penggiat agrikultur.</p>
                    </div>
                    <a href="/ruangdiskusi" class="flex items-center gap-4 drop-shadow-lg btn bg-secondary px-4">
                        Mulai diskusi?
                        <img src="/images/arrow.png" class="h-8" alt="">
                    </a>
                </div>
            </div>
        </section>
        <section class="pt-4 bg-[#EFF6E9] h-screen flex flex-col px-8">
            <div class="p-8">
                <h2 class="font-bold text-3xl">Bantu Tani</h2>
                <p class="text-xl w-1/2">Fitur untuk membantu petani mencari investor dengan lebih mudah lewat
                    SULTAN!</p>
            </div>
            <div class="p-8 pb-12 bg-bg1 rounded-xl flex flex-col items-start h-[55vh] gap-8">
                <h2 class="font-bold text-3xl">Fitur Bantu Tani</h2>
                <p class="text-xl w-1/2">Nikmati kemudahan untuk berinvestasi dengan lebih mudah untuk pertanianmu di
                    Fitur Bantu Tani</p>
                <a href="/bantutani" class="flex items-center justify-between gap-8 px-8 btn btn-primary">
                    Menuju Bantu tani
                    <img src="/images/arrow_light.png" class="h-8" alt="">
                </a>
            </div>
        </section>
        <section class="p-8 bg-[#EFF6E9]">
            <div class="border-2 border-green p-4 rounded-xl">
                <h1 class="font-bold text-3xl mb-4">DISCLAIMER</h1>
                <p>
                    Investasi merupakan aktivitas berisiko tinggi. Investasi yang diberikan dapat mengalami kenaikan
                    atau
                    penurunan bahkan kegagalan tergantung kondisi dari pertanian tersebut. Harap membuat pertimbangan
                    yang
                    matang dan ekstra sebelum membuat keputusan untuk melakukan investasi. Lakukan diversifikasi
                    investasi,
                    hanya gunakan dana yang siap anda lepaskan (affors to loose) dan atau disimpan dalam jangka panjang.
                    SULTAN tidak memaksa pengguna untuk melakukan investasi disini. Semua keputusan investasi merupakan
                    keputusan independen oleh pengguna.
                    <br>
                    SULTAN sebagai penyelenggara urun dana yang mempertemukan antara investor dan petani bukanlah pihak
                    yang
                    menjalankan bisnis Dengan berinvestasi di SULTAN berarti anda sudah menyetujui syarat dan ketentuan
                    serta memahami semua kemungkinan risiko yang dapat terjadi termasuk risiko kehilangan sebagian atau
                    seluruh modal.
                    <br>
                    <br>
                    “INFORMASI DALAM LAYANAN INVESTASI INI PENTING UNTUK DIPERHATIKAN SECARA SEKSAMA. APABILA TERDAPAT
                    KERAGUAN SEBELUM MELAKUKAN INVESTASI DAPAT MELAKUKAN KONSULTASI DENGAN PENYELENGGARA”.
                    “ PIHAK YANG BERHUBUNGAN DENGAN KEGIATAN YANG ADA DIDALAM SINI, BAIK SENDIRI-SENDIRI MAUPUN
                    BERSAMA-SAMA
                    BERTANGGUNG JAWAB SEPENUHNYA ATAS KEBENARAN INFORMASI YANG TERCANTUM DALAM LAYANAN UTUN DANA
                    INI”</p>
                <div class="flex justify-end">
                    <a href="/document/Syarat ketentuan.pdf" class="border-2 border-green px-4 py-1 rounded-xl mt-2 flex items-center gap-1"><span class="material-icons">description</span>Syarat dan Ketentuan</a>
                </div>
            </div>
        </section>
    </main>
    <footer class="bg-green p-8 text-white">
        <div class="flex justify-between">
            <div class="flex w-1/3 items-center gap-4">
                <img src="/images/logo2.png" alt="">
                <h2 class="font-bold text-2xl w-2/3">SULTAN - Konsultasi dan Investasi Pertanian</h2>
            </div>
            <div class="flex flex-col gap-1">
                <a href="/">Beranda</a>
                <a href="{{auth()->user()?(auth()->user()->role->role_name === "pakar"?"/riwayatchat":"/ruangchat"):"/ruangchat"}}">Tanya
                    Ahli</a>
                <a href="/ruangdiskusi">Ruang Diskusi</a>
                <a href="/listartikel">Artikel</a>
                <a href="/me">Profile</a>
            </div>
            <div class="flex flex-col gap-1">
                <a href="/login">Akun</a>
                <a href="https://wa.me/">Pusat Bantuan</a>
            </div>
        </div>
        <p class="text-center mt-8">Copyright @ 2023 SULTAN, All rights reserved.</p>
    </footer>
@stop
