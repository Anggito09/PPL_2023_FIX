@extends("layouts.main")
@section("content")
    <main class="min-h-screen bg-primary pt-4">
        @include("components.navbar")
        <div class="mt-2 flex flex-col items-center">
            <h1 class="text-3xl font-bold mt-2">Investasi</h1>
            <p>Marilah mendukung produksi tani dan lakukan investasi jangka panjang bersama SULTAN!</p>
        </div>
        <div class="flex gap-4 rounded-xl w-full p-8">
            <div class="flex flex-col items-center justify-between gap-4 w-1/4 rounded-xl bg-secondary pb-4">
                <div class="flex flex-col items-center gap-2">
                    <img class="rounded-t-xl object-cover w-full h-60" src="/images/ilustration1.png" alt="">
                    <h2 class="text-xl font-bold">Persawahan</h2>
                    <p class="text-center text-xs px-4">Sawah adalah tanah yang digarap dan dialiri untuk tempat menanam
                        padi.</p>
                </div>
                <a href="/investasi" class="btn btn-secondary px-12">Investasi</a>
            </div>
            <div class="flex flex-col items-center justify-between gap-4 w-1/4 rounded-xl bg-secondary pb-4">
                <div class="flex flex-col items-center gap-2">
                    <img class="rounded-t-xl object-cover w-full h-60" src="/images/ilustration2.png" alt="">
                    <h2 class="text-xl font-bold">Tanaman Hias</h2>
                    <p class="text-center text-xs px-4">Tanaman hias mencakup semua tumbuhan, baik berbentuk terna,
                        merambat,
                        semak/perdu, ataupun pohon, yang sengaja ditanam orang sebagai komponen taman.</p>
                </div>
                <a href="/investasi" class="btn btn-secondary px-12">Investasi</a>
            </div>
            <div class="flex flex-col items-center justify-between gap-4 w-1/4 rounded-xl bg-secondary pb-4">
                <div class="flex flex-col items-center gap-2">
                    <img class="rounded-t-xl object-cover w-full h-60" src="/images/ilustration3.png" alt="">
                    <h2 class="text-xl font-bold">Hidroponik</h2>
                    <p class="text-center text-xs px-4">Hidroponik atau tirta tani adalah salah satu metode dalam
                        budidaya
                        menanam dengan memanfaatkan air tanpa menggunakan media tanah dengan menekankan pada pemenuhan
                        kebutuhan hara nutrisi bagi tanaman.</p>
                </div>
                <a href="/investasi" class="btn btn-secondary px-12">Investasi</a>
            </div>
            <div class="flex flex-col items-center justify-between gap-4 w-1/4 rounded-xl bg-secondary pb-4">
                <div class="flex flex-col items-center gap-2">
                    <img class="rounded-t-xl object-cover w-full h-60" src="/images/ilustration4.png" alt="">
                    <h2 class="text-xl font-bold">Perkebunan</h2>
                    <p class="text-center text-xs px-4">Hidroponik atau tirta tani adalah salah satu metode dalam
                        budidaya
                        menanam dengan memanfaatkan air tanpa menggunakan media tanah dengan menekankan pada pemenuhan
                        kebutuhan hara nutrisi bagi tanaman.</p>
                </div>
                <a href="/investasi" class="btn btn-secondary px-12">Investasi</a>
            </div>
        </div>
    </main>
@stop
