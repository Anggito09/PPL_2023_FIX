@extends("layouts.main")
@section("content")
    <main class="min-h-screen bg-bg1 pt-4">
        @include("components.navbar")
        <div class="mt-2 flex flex-col items-center">
            <h1 class="text-3xl font-bold mt-2">Bantu Tani</h1>
            <p class="w-1/2 text-center">Nikmati kemudahan untuk berinvestasi dengan lebih mudah untuk pertanianmu di Fitur Bantu Tani. Apa saja sih keuntungan Bantu Tani di SULTAN?</p>
        </div>
        <div class="flex flex-col items-center gap-4 rounded-xl w-full p-8">
            <div class="flex gap-4 justify-center w-1/2 gap-4">
                <div class="bg-secondary p-8 rounded-xl flex flex-col items-center w-1/3">
                    <img src="/images/icon1.png" alt="">
                    <p class="w-2/3 text-xl font-medium text-center">Membantu memudahkan para petani</p>
                </div>
                <div class="bg-secondary p-8 rounded-xl flex flex-col items-center w-1/3">
                    <img src="/images/icon2.png" alt="">
                    <p class="w-2/3 text-xl font-medium text-center">Mendapatkan profit yang pasti</p>
                </div>
                <div class="bg-secondary p-8 rounded-xl flex flex-col items-center w-1/3">
                    <img src="/images/icon3.png" alt="">
                    <p class="text-xl font-medium text-center">Investasi berlaku jangka panjang</p>
                </div>
            </div>
            <a href="/daftartani" class="btn btn-primary px-12">Daftar Tani</a>
        </div>
    </main>
@stop
