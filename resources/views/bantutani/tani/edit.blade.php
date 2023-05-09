@extends("layouts.main")
@section("content")
    <main class="min-h-screen bg-bg1 bg-cover pt-4">
        @include("components.navbar")
        <div class="mt-2 flex flex-col items-center">
            <h1 class="text-3xl font-bold mt-2">Bantu Tani</h1>
            <p class="w-1/2 text-center">Nikmati kemudahan untuk berinvestasi dengan lebih mudah untuk pertanianmu di Fitur Bantu Tani. Apa saja sih keuntungan Bantu Tani di SULTAN?</p>
        </div>
        <div class="flex flex-col items-center gap-2 rounded-xl w-full mt-2">
            <form action="/edittani/{{$tani->id}}" enctype="multipart/form-data" method="post" class="rounded-xl flex flex-col items-center bg-secondary gap-4 p-4 px-48 w-2/3">
                <h2 class="font-bold text-xl">Form Pendaftaran</h2>
                @csrf
                <input class="form-input w-full" type="text" name="name" id="name" placeholder="Nama" value="{{$tani->name}}">
                <p class="text-red-400 text-sm">{{$errors->has("name") ? "*".$errors->first("name") : ""}}</p>
                <input class="form-input w-full" type="text" name="phone" id="phone" placeholder="Nomor Telepon" value="{{$tani->phone}}">
                <p class="text-red-400 text-sm">{{$errors->has("phone") ? "*".$errors->first("phone") : ""}}</p>
                <input class="form-input w-full" type="text" name="descpetani" id="descpetani" placeholder="Deskripsi Petani" value="{{$tani->descpetani}}">
                <p class="text-red-400 text-sm">{{$errors->has("descpetani") ? "*".$errors->first("descpetani") : ""}}</p>
                <input class="form-input w-full" type="text" name="desclahan" id="desclahan" placeholder="Deskripsi Lahan" value="{{$tani->desclahan}}">
                <p class="text-red-400 text-sm">{{$errors->has("desclahan") ? "*".$errors->first("desclahan") : ""}}</p>
                <input class="form-input w-full" type="number" name="fund" id="fund" placeholder="Dana yang dibutuhkan" value="{{$tani->fund}}">
                <p class="text-red-400 text-sm">{{$errors->has("fund") ? "*".$errors->first("fund") : ""}}</p>
                <input class="form-input w-full" type="file" name="docs" id="docs">
                <button type="submit" class="btn btn-primary px-12">Simpan</button>
            </form>
        </div>
    </main>
@stop

