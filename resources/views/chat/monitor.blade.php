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
                        <a href="/ruangchat" class="px-8 py-2">Pengajuan</a>
                        <a href="/monitor/chat" class="px-8 py-2 bg-green text-white rounded-full">Chat</a>
                    </div>
                    <div class="flex flex-col gap-2">
                        @foreach($datas as $data)
                        <div class="bg-primary p-4 flex gap-4 items-center rounded-xl">
                            <span class="w-8 h-8 @if($data["status"] == 'active') bg-lime-400 @else bg-red-600 @endif rounded-full"></span>
                            <div class="flex-grow flex justify-between">
                                <span class="w-1/3 font-bold">{{$data["petani"]}}</span>
                                <span class="w-1/3 text-center">{{$data["status"]}}</span>
                                <span class="w-1/3 text-end font-bold">{{$data["pakar"]}}</span>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </main>
@stop
