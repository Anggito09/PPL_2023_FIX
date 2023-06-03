@extends("layouts.main")
@section("content")
    <main class="h-screen pt-4 bg-bg1 bg-cover">
        @include("components.navbar")
        <h1 class="font-bold text-3xl text-center py-3">ARTIKEL</h1>
        <div class="bg-secondary h-[calc(100%-5rem)] mx-4 p-4 rounded-xl overflow-y-scroll">
            <div class="bg-primary rounded-xl px-4 py-2 flex items-center justify-between">
                <h2 class="font-bold">Data Artikel</h2>
                @if(auth()->user()->role->role_name === "admin" || auth()->user()->role->role_name === "pakar")
                    <a href="/createartikel" class="px-4 py-2 bg-secondary rounded-xl">Tambah Data</a>
                @endif
            </div>
            <table class="w-full mt-8">
                <tr>
                    <th class="border-b-2 border-e-2 w-1/6 border-green">Tanggal</th>
                    <th class="border-b-2 border-e-2 w-1/6 border-green">Gambar</th>
                    <th class="border-b-2 border-e-2 border-green w-1/2">Judul</th>
                    <th class="border-b-2 border-green w-1/4">Opsi</th>
                </tr>
                @foreach($artikels as $artikel)
                    <tr>
                        <td class="text-center">{{$artikel->created_at}}</td>
                        <td class="text-center"><img src="/pic/{{$artikel->gambar}}" alt=""></td>
                        <td class="text-center">{{$artikel->judul}}</td>
                        <td class="flex justify-center py-10 gap-2">
                            <a href="/artikel/{{$artikel->id}}"
                               class="w-10 h-10 bg-primary flex items-center justify-center rounded-xl"><span
                                    class="material-symbols-outlined">visibility</span></a>
                            @if(auth()->user()->role->role_name === "admin" || auth()->user()->role->role_name === "pakar")
                                <a href="/editartikel/{{$artikel->id}}"
                                   class="w-10 h-10 bg-primary flex items-center justify-center rounded-xl"><span
                                        class="material-symbols-outlined">edit</span></a>
                                <a href="/deleteartikel/{{$artikel->id}}"
                                   class="w-10 h-10 bg-primary flex items-center justify-center rounded-xl"><span
                                        class="material-symbols-outlined">delete</span></a>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </main>
@stop
