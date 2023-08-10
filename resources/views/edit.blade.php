@extends('layouts.main')

@include('partials.navbar')


@section('container')

<form action="/update/{{$id['id']}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('put')

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
        <input type="file" name="image" id="image" >
    </div>

    <button type="submit">Simpan</button>
</form>


@endsection
