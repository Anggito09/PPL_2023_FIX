@extends("layouts.main")
@section("content")
    <main class="min-h-screen bg-primary pt-4">
        @include("components.navbar")
        <div class="mt-2 flex flex-col items-center">
            <h1 class="text-3xl font-bold mt-2">Investasi</h1>
            <p>Marilah mendukung produksi tani dan lakukan investasi jangka panjang bersama SULTAN!</p>
        </div>
        <div class="flex justify-center mt-2">
            <form action="/investasi" method="post" enctype="multipart/form-data" class="flex flex-col gap-4 w-2/3 items-center bg-secondary rounded-xl p-8">
                <h2 class="font-bold text-xl">Form Pendaftaran</h2>
                @csrf
                <input class="form-input w-2/3" type="text" name="name" id="name" placeholder="Nama">
                <p class="text-red-400 text-sm">{{$errors->has("name") ? "*".$errors->first("name") : ""}}</p>
                <input class="form-input w-2/3" type="text" name="phone" id="phone" placeholder="Nomor Telepon">
                <p class="text-red-400 text-sm">{{$errors->has("phone") ? "*".$errors->first("phone") : ""}}</p>
                <select class="form-input w-2/3" name="tani_id" id="tani_id">
                    <option value disabled selected>Pilih Petani</option>
                    @foreach($petanis as $petani)
                        <option value="{{$petani->id}}">{{$petani->name}}:{{$petani->fund}}</option>
                    @endforeach
                </select>
                <p class="text-red-400 text-sm">{{$errors->has("tani_id") ? "*".$errors->first("tani_id") : ""}}</p>
                <input class="form-input w-2/3" type="number" name="fund" id="fund" placeholder="Dana yang diinvestasikan">
                <p class="text-red-400 text-sm">{{$errors->has("fund") ? "*".$errors->first("fund") : ""}}</p>
                <input class="form-input w-2/3" type="file" name="docs" id="docs">
                <button type="submit" class="btn btn-primary px-12">Lanjutkan</button>
            </form>
        </div>
    </main>
@stop
