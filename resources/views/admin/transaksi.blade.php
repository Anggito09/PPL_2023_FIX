@extends("layouts.main")
@section("content")
    <main class="h-screen pt-4 bg-bg1 bg-cover">
        @include("components.navbar")
        <div class="flex mx-8 mt-8 gap-8">
            @include("admin.sidebar")
            <div class="bg-secondary w-3/4 flex flex-col items-center gap-8 p-8 rounded-xl h-[78vh] overflow-y-scroll">
                <h1 class="font-bold text-3xl w-full">Data Transaksi</h1>
                <table class="w-full">
                    <thead class="border-b-2 border-green">
                    <tr>
                        <th>Tanggal dan Waktu</th>
                        <th>Keterangan</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($transaksis as $transaksi)
                        <tr>
                            <td class="text-center">{{$transaksi->created_at}}</td>
                            <td class="text-center">{{$transaksi->paket->nama}}</td>
                            <td class="text-center">{{\Carbon\Carbon::now()->diffInDays($transaksi->created_at)<$transaksi->paket->durasi && $transaksi->status?"aktif":"tidak aktif"}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </main>
@stop
