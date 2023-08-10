@extends('layouts.main')

@include('partials.navbar')


@section('container')

<form action="/input" method="POST" enctype="multipart/form-data">
    @csrf

    <div>
        <label for="title">Judul:</label>
        <input type="text" name="title" id="title" required>
    </div>

    <div>
        <label for="description">Deskripsi:</label>
        <textarea name="description" id="description" required></textarea>
    </div>

    <div>
        <label for="image">Gambar:</label>
        <input type="file" name="image" id="image" required>
    </div>

    <button type="submit">Simpan</button>
</form>


@endsection
