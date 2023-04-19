@extends('layouts.default')
@section('content')

    <main>
        <form action="/investor/confirmation" method="POST" class="flex flex-col gap-2">
            @csrf
            <input type="text" name="name" id="name" placeholder="Nama Lengkap">
            <input type="tel" name="phone" id="phone" placeholder="Nomor Telepon">
            <select name="petani_id" id="petani_id">
                @foreach($petanis as $petani)
                    <option value="{{$petani->id}}">{{$petani->name}}</option>
                @endforeach
            </select>
            <input type="number" name="fund" id="fund" placeholder="Dana yang diinvestasikan">
            <input type="file" name="docs" id="docs" multiple>
            <button type="submit">Lanjutkan</button>
        </form>
    </main>

@stop
