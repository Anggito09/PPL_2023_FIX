@extends("layouts.main")
@section("content")
    <main class="h-screen pt-4 bg-bg1 bg-cover">
        @include("components.navbar")
        <div class="flex mx-8 mt-8 gap-8">
            @include("petani.sidebar")
            <div class="bg-secondary w-3/4 flex flex-col items-center gap-8 p-8 rounded-xl h-[78vh] overflow-y-scroll">
                <h1 class="font-bold text-3xl w-full">Data Transaksi Investasi</h1>
                <table class="w-full">
                    <thead class="border-b-2 border-green">
                    <tr>
                        <th>Tanggal dan Waktu</th>
                        <th>Nominal</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($tanis as $tani)
                        <tr>
                            <td class="text-center">
                                <a href="/bantutani/{{$tani->id}}">{{$tani->created_at}}</a>
                            </td>
                            <td class="text-center">
                                <a href="/bantutani/{{$tani->id}}">{{$tani->fund}}</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </main>
@stop
