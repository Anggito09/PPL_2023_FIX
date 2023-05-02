@extends("layouts.main")
@section("content")
    <main class="h-screen pt-4 bg-bg1 bg-cover">
        @include("components.navbar")
        <div class="flex mx-8 mt-8 gap-8">
            <div class="bg-secondary w-1/4 py-4 rounded-xl">
                <div class="px-8 mb-8">
                    <div class="w-16 h-16 rounded-full border-2 border-green"></div>
                    <h2 class="capitalize font-bold text-xl">{{auth()->user()->name}}</h2>
                    <h3 class="capitalize">{{auth()->user()->role->role_name}}</h3>
                </div>
                <div class="flex flex-col gap-2">
                    <a href="/akunpetani" class="font-medium text-lg bg-secondary drop-shadow-lg py-1 px-8">Akun
                        Petani</a>
                    <a href="/akuninvestor" class="font-medium text-lg bg-secondary drop-shadow-lg py-1 px-8">Akun
                        Investor</a>
                    <a href="/akunpakar" class="font-medium text-lg bg-secondary drop-shadow-lg py-1 px-8">Akun
                        Pakar</a>
                    <a href="/listinvestasi" class="font-medium text-lg bg-secondary drop-shadow-lg py-1 px-8">Data Transaksi Investasi</a>
                </div>
            </div>
            <div class="bg-secondary w-3/4 flex flex-col gap-4 h-[80vh] overflow-y-scroll p-8 rounded-xl">
                <h1 class="font-bold text-xl">Akun Pakar</h1>
                <div>
                    @foreach($pakars as $pakar)
                        <div class="flex justify-between bg-primary px-4 py-2 rounded-xl">
                            <div class="flex items-center gap-4">
                                <img src="/images/icon4.png" alt="">
                                <div>
                                    <h2 class="font-bold text-xl">{{$pakar->name}}</h2>
                                    <h3>Pakar</h3>
                                </div>
                            </div>
                            <div class="flex flex-col items-end justify-end">
                                <a href="/editpakar/{{$pakar->id}}" class="btn btn-primary px-12">Edit</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
    </main>
@stop
