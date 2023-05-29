@extends("layouts.main")
@section("content")
    <main class="h-screen pt-4 bg-bg1 bg-cover">
        @include("components.navbar")
        <h1 class="font-bold text-3xl text-center py-3">ARTIKEL</h1>
        <div class="bg-secondary mx-4 p-4 rounded-xl flex flex-col items-center">
            <div class="w-full bg-primary rounded-xl px-4 py-2 flex items-center justify-between">
                <h2 class="font-bold">Data Artikel</h2>
                <a href="/listartikel" class="px-4 py-2 bg-secondary rounded-xl">&lsaquo; Kembali</a>
            </div>
            <h1 class="my-4 font-bold text-2xl">{{$artikel->judul}}</h1>
            <img src="/pic/{{$artikel->gambar}}" alt="">
            <div class="w-full mt-2 text-justify">
                {!! $artikel->deskripsi !!}
            </div>
        </div>
    </main>
@stop

