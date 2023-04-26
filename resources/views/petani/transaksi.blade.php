@extends("layouts.main")
@section("content")
    <main class="h-screen pt-4 bg-bg1">
        @include("components.navbar")
        <div class="flex mx-8 mt-8 gap-8">
            <div class="bg-secondary w-1/4 py-4 rounded-xl">
                <div class="px-8 mb-8">
                    <div class="w-16 h-16 rounded-full border-2 border-green"></div>
                    <h2 class="capitalize font-bold text-xl">{{auth()->user()->name}}</h2>
                    <h3 class="capitalize">{{auth()->user()->role->role_name}}</h3>
                </div>
                <div class="flex flex-col gap-2">
                    <a href="/listbantutani" class="font-medium text-lg bg-secondary drop-shadow-lg py-1 px-8">Data Transaksi Akun</a>
                    <a href="/listinvestasi" class="font-medium text-lg bg-secondary drop-shadow-lg py-1 px-8">Data Transaksi Investasi</a>
                </div>
            </div>
            <div class="bg-secondary w-3/4 flex flex-col items-center gap-8 p-8 rounded-xl h-[78vh] overflow-y-scroll">
                <h1 class="font-bold text-3xl w-full">Data Transaksi Investasi</h1>
                <table class="w-full">
                    <thead class="border-b-2 border-green">
                    <tr>
                        <th>Tanggal dan Waktu</th>
                        <th>Status</th>
                        <th>Nominal</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($investasis as $investasi)
                        <tr>
                            <td class="text-center">{{$investasi->created_at}}</td>
                            <td class="text-center">{{$investasi->confirmed?"Lunas":"Belum Lunas"}}</td>
                            <td class="text-center">{{$investasi->fund}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </main>
@stop
