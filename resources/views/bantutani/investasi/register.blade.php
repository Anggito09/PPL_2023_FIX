@extends("layouts.main")
@section("content")
    <div id="listPetani" tabindex="-1"
         class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full h-[70vh] overflow-y-scroll rounded-lg">
            <div class="relative bg-white p-8 rounded-lg shadow dark:bg-gray-700">
                <div class="flex flex-col gap-2">
                    @foreach($petanis as $tani)
                        <div class="flex bg-primary px-4 py-2 rounded-xl w-full">
                            <div class="flex items-center gap-4 w-1/4">
                                <div>
                                    <img class="w-16 h-16 rounded-full border-2 border-green object-fit"
                                         src="/{{$tani->user->dp}}">
                                    <h2 class="font-bold text-xl">{{$tani->name}}</h2>
                                </div>
                            </div>
                            <div class="flex flex-col flex-grow">
                                <h3 class="font-bold">Deskripsi Petani:</h3>
                                <p>{{$tani->descpetani}}</p>
                                <h3 class="font-bold">Deskripsi Lahan:</h3>
                                <p>{{$tani->desclahan}}</p>
                                <h3 class="font-bold">Dana yang dibutuhkan:</h3>
                                <p>Rp.{{$tani->fund}}</p>
                                <a href="/berkastani/{{$tani->id}}" class="self-start bg-secondary border px-4 py-1 rounded-lg">file</a>
                                <button class="px-4 py-2 bg-green text-white rounded" data-modal-hide="listPetani" onclick="selectTani('{{$tani->id}}','{{$tani->name}}')">Pilih</button>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <main class="min-h-screen bg-primary pt-4">
        @include("components.navbar")
        <div class="mt-2 flex flex-col items-center">
            <h1 class="text-3xl font-bold mt-2">Investasi</h1>
            <p>Marilah mendukung produksi tani dan lakukan investasi jangka panjang bersama SULTAN!</p>
        </div>
        <div class="flex justify-center mt-2">
            <form action="/investasi" method="post" enctype="multipart/form-data"
                  class="flex flex-col gap-4 w-2/3 items-center bg-secondary rounded-xl p-8">
                <h2 class="font-bold text-xl">Form Pendaftaran</h2>
                @csrf
                <input class="form-input w-2/3" type="text" name="name" id="name" placeholder="Nama">
                <p class="text-red-400 text-sm">{{$errors->has("name") ? "*".$errors->first("name") : ""}}</p>
                <input class="form-input w-2/3" type="text" name="phone" id="phone" placeholder="Nomor Telepon">
                <p class="text-red-400 text-sm">{{$errors->has("phone") ? "*".$errors->first("phone") : ""}}</p>
                <button data-modal-target="listPetani" data-modal-toggle="listPetani"
                        class="flex items-center justify-between capitalize form-input w-2/3" id="petani" type="button">
                    Pilih petani <span class="material-symbols-outlined">arrow_drop_down</span>
                </button>
                <select class="hidden form-input w-2/3" name="tani_id" id="tani_id">
                    <option value disabled selected>Pilih Petani</option>
                    @foreach($petanis as $petani)
                        <option value="{{$petani->id}}">{{$petani->name}}</option>
                    @endforeach
                </select>
                <p class="text-red-400 text-sm">{{$errors->has("tani_id") ? "*".$errors->first("tani_id") : ""}}</p>
                <input class="form-input w-2/3" type="number" name="fund" id="fund"
                       placeholder="Dana yang diinvestasikan">
                <p class="text-red-400 text-sm">{{$errors->has("fund") ? "*".$errors->first("fund") : ""}}</p>
                <input class="form-input w-2/3" type="file" name="docs" id="docs">
                <button type="submit" class="btn btn-primary px-12">Lanjutkan</button>
            </form>
        </div>
    </main>
    <script>
        function selectTani(id, name){
            $("#tani_id").val(id);
            $("#petani").html(`${name} <span class="material-symbols-outlined">arrow_drop_down</span>`);
        }
    </script>
@stop
