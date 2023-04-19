@extends('layouts.default')
@section('content')

    <main>
        <form action="/daftartani" method="POST" class="flex flex-col gap-2">
            @csrf
            <input type="text" name="name" id="name" placeholder="Nama Lengkap">
            <input type="tel" name="phone" id="phone" placeholder="Nomor Telepon">
            <input type="text" name="farmerdesc" id="farmerdesc" placeholder="Deskripsi Petani">
            <input type="text" name="landdesc" id="landdesc" placeholder="Deskripsi Lahan">
            <input type="number" name="fund" id="fund" placeholder="Dana yang dibutuhkan">
            <input type="file" name="docs" id="docs" multiple>
            <button type="submit">Simpan</button>
        </form>
    </main>

@stop
