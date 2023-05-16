@extends("layouts.main")
@section("content")
    <main class="h-screen pt-4 bg-bg1 bg-cover">
        @include("components.navbar")
        <div class="flex flex-col items-center gap-4 mt-8 w-full">
            <div class="flex flex-col px-4 items-center w-full">
                <h1 class="font-bold text-3xl">Tanya Ahli</h1>
                <p>Solusi konsultasi budidaya dan investasi terpercaya langsung dengan para ahlinya di Sultan</p>
                <div class="bg-secondary flex flex-col gap-2 p-4 w-full mt-8 rounded-xl mb-8">
                    <div class="flex self-end gap-2 bg-primary rounded-full">
                        <a href="/" class="px-8 py-2 bg-green text-white rounded-full">Pengajuan</a>
                        <a href="/" class="px-8 py-2">Chat</a>
                    </div>
                    <div class="flex flex-col gap-2">
                        @foreach($transaksis as $transaksi)
                            <div class="flex justify-between items-center p-4 bg-primary rounded-xl">
                                <h2 class="w-1/4">Paket Premium</h2>
                                <h2 class="w-1/4">{{$transaksi->user->id}}</h2>
                                <h2 class="w-1/4 text-center">{{$transaksi->status?$transaksi->created_at:"-"}}</h2>
                                <div class="w-1/4 flex justify-end">
                                    <a href="/activatechat/{{$transaksi->id}}" class="btn btn-primary px-4">
                                        {{$transaksi->status?"Nonaktifkan":"Aktifkan"}}
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </main>
@stop
