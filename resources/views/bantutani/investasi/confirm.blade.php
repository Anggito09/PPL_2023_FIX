@extends("layouts.main")
@section("content")
    <main class="min-h-screen bg-primary pt-4">
        @include("components.navbar")
        <div class="mt-2 flex flex-col items-center">
            <h1 class="text-3xl font-bold mt-2">Syarat dan Ketentuan</h1>
            <p>Nikmati kemudahan untuk berinvestasi dengan lebih mudah untuk pertanianmu di Fitur Bantu Tani. Apa saja sih keuntungan Bantu Tani di SULTAN?</p>
        </div>
        <div class="flex flex-col gap-4 items-center mt-2 bg-secondary mx-8 rounded-xl p-8">
            <h2 class="text-xl font-bold">Syarat dan Ketentuan Umum Investasi SULTAN</h2>
            <ol class="list-decimal px-8">
                <li>
                    "Investor" adalah individu atau entitas yang memberikan dana sebagai modal investasi kepada petani
                    dalam bidang
                    pertanian. Telah terdaftar sebagai investor di sistem SULTAN.
                </li>
                <li> "Petani" adalah individu atau kelompok yang berkecimpung dalam kegiatan pertanian dan telah
                    terdaftar sebagai
                    petani di sistem SULTAN.
                </li>
                <li> Pihak yang akan menggunakan sistem SULTAN untuk melakukan investasi telah memenuhi persyaratan yang
                    ditentukan
                    oleh pihak SULTAN.
                </li>
                <li> Segala proses investasi baik di dalam sistem SULTAN maupun di luar sistem SULTAN harus dijalani dan
                    penuhi agar
                    proses Investasi terlindungi dan tidak merugikan pihak - pihak yang ada.
                </li>
                <li> Pihak - pihak yang tidak memenuhi dan melanggar syarat dan ketentuan Investasi yang telah
                    disepakati akan
                    mendapat sanksi seperti pembekuan akun ataupun pembekuan dana investasi.
                </li>
                <li> Transaksi dilakukan melalui nomor WhatsApp yang tertera.
                </li>
                <li> Syarat dan Ketentuan lengkap dapat di baca di dokumen Syarat & Ketentuan Umum Investasi SULTAN.
                    Harap dicermati
                    segala syarat & ketentuan yang tertera.
                </li>
            </ol>

            <a href="/investasiconfirm" class="btn btn-primary px-12">Lanjutkan</a>
        </div>
    </main>
@stop
