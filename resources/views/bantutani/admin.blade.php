@extends("layouts.main")
@section("content")
    <main class="bg-bg1 min-h-screen pt-4">
        @include("components.navbar")
        <div class="flex flex-col items-center gap-4 mt-8">
            <div class="flex flex-col items-center">
                <h1 class="font-bold text-3xl">Bantu Tani</h1>
                <p>Nikmati kemudahan untuk berinvestasi dengan lebih mudah untuk pertanianmu di Fitur Bantu Tani.</p>
            </div>
            <div class="flex flex-col items-center gap-4 w-2/3 h-[65vh] overflow-y-scroll bg-secondary p-8 rounded-xl">
                <h2 class="text-xl font-bold">DATA INVESTASI PERSAWAHAN</h2>
                <table class="w-full border-separate border-spacing-1">
                    <thead>
                    <tr>
                        <th class="border-b-2 border-green">Nama</th>
                        <th class="border-b-2 border-green">No HP</th>
                        <th class="border-b-2 border-green">Tanggal dan Waktu</th>
                        <th class="border-b-2 border-green">Nominal</th>
                        <th class="border-b-2 border-green">Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($investasis as $investasi)
                        <tr>
                            <td class="text-center bg-primary p-2 rounded-s-xl ">{{$investasi->name}}</td>
                            <td class="text-center bg-primary p-2 ">{{$investasi->phone}}</td>
                            <td class="text-center bg-primary p-2 ">{{$investasi->created_at}}</td>
                            <td class="text-center bg-primary p-2 rounded-e-xl ">{{$investasi->fund}}</td>
                            <td class="text-center">
                                <a class="flex justify-center" href="/confirm/{{$investasi->id}}">
                                    <div class="text-xl w-8 h-8 rounded-full border-2 border-green">
                                        @if($investasi->confirmed)
                                            &check;
                                        @endif
                                    </div>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </main>
@stop
