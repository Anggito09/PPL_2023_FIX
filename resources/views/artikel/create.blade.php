@extends("layouts.main")
@section("content")
    <main class="h-screen pt-4 bg-bg1 bg-cover">
        @include("components.navbar")
        <div class="mx-8 mt-8">
            @if($errors->any())
                {{ implode('', $errors->all('<div>:message</div>')) }}
            @endif
            <div class="bg-secondary p-8 rounded-xl">
                <form method="POST" enctype="multipart/form-data" class="flex flex-col gap-2">
                    @csrf
                    <input type="text" name="judul" id="judul" placeholder="Judul Artikel" class="form-input w-full">
                    <textarea name="deskripsi" id="deskripsi" cols="30" rows="10"></textarea>
                    <input type="file" name="gambar" id="gambar" class="form-input w-full">
                    <button type="submit" class="btn btn-primary">Post</button>
                </form>
            </div>
        </div>
    </main>
    <script src="https://cdn.tiny.cloud/1/4ebwjo76emty4khw8dasbwdvkzwj6v8jy7qulx3gonyaix45/tinymce/6/tinymce.min.js"
            referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: 'textarea#deskripsi',
            plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage tinycomments tableofcontents footnotes mergetags autocorrect typography inlinecss',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
            tinycomments_mode: 'embedded',
        });
    </script>
@stop
