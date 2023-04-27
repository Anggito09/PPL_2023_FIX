@extends("layouts.main")
@section("content")
<main class="w-full min-h-screen bg-dark-green flex items-center justify-center">
    <iframe src="{{$file}}" class="w-full h-screen"></iframe>
</main>
@stop
