@extends("layouts.main")
@section("content")
    <main class="h-screen pt-4 bg-bg1 bg-cover">
        @include("components.navbar")
        <div class="flex flex-col items-center gap-4 mt-8 w-full">
            <div class="flex flex-col px-4 items-center w-full">
                <h1 class="font-bold text-3xl">Tanya Ahli</h1>
                <p>Solusi konsultasi budidaya dan investasi terpercaya langsung dengan para ahlinya di Sultan</p>
                <div class="flex w-full mt-8 gap-8">
                    <div class="w-1/3 flex flex-col gap-2 bg-secondary p-8 rounded-xl">
                        @if($active || auth()->user()->role->role_name === "pakar")
                            @include("chat.sidebar_active")
                        @else
                            @include("chat.sidebar_nonactive")
                        @endif
                    </div>
                    <div class="flex-grow flex flex-col gap-2 bg-secondary p-8 rounded-xl">
                        <form action="/ruangdiskusi" class="w-full">
                            <input type="text" class="w-full border-2 border-dark-green bg-secondary rounded-full"
                                   name="gelar" id="gelar" value="{{$gelar}}"
                                   placeholder="Cari pakar sesuai bidang yang anda inginkan ...">
                        </form>
                        @if($pakars->count() === 0)
                            <h1 class="text-center">Belum ada pakar yang terdaftar</h1>
                        @endif
                        <div class="flex flex-wrap">
                            @foreach($pakars as $pakar)
                                <div class="w-1/4 p-1">
                                    <div
                                        class="p-4 bg-primary flex flex-col items-center gap-2 border-2 border-green rounded-lg">
                                        <div class="flex gap-2 items-center">
                                            <img src="/{{$pakar->dp?$pakar->dp:"images/icon4.png"}}"
                                                 class="bg-secondary rounded border-2 border-green h-20 w-20 object-cover"
                                                 alt="">
                                            <a @if($active) href="/startchat/{{$pakar->id}}"
                                               @endif class="btn px-4 bg-secondary">Chat</a>
                                        </div>
                                        <table class="w-full">
                                            <tr>
                                                <td class="w-1/3 font-bold align-bottom">Nama</td>
                                                <td class="align-bottom">: {{$pakar->name}}</td>
                                            </tr>
                                            <tr>
                                                <td class="w-1/3 font-bold align-bottom">Gelar</td>
                                                <td class="align-bottom">: {{$pakar->gelar}}</td>
                                            </tr>
                                        </table>
                                        <a href="/profile/{{$pakar->id}}" class="self-end">Selengkapnya..</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="flex gap-1 self-center">
                            @for($i = 1; $i <= $n; $i++)
                                <a href="/ruangdiskusi?page={{$i}}"
                                   class="px-2 rounded-full @if($i == $page || !$page) bg-green text-white @else bg-primary @endif">{{$i}}</a>
                            @endfor
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@stop
