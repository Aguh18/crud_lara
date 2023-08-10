

@extends('layouts.main')

@include('partials.navbar')

@section('container')
@foreach ($books as $book)

<h2>{{$book['title']}}</h2>
<img src="{{ Storage::url('public/posts/').$book['image'] }}" class="rounded" style="width: 150px">
<p>{{$book['description']}} </p>
<form method="post" action="/delete/{{$book['id']}}">
    @csrf
    @method('delete')
    <button type="submit">Delete</button>
</form>
<form method="get" action="/update/{{$book['id']}}">
<button type="submit">edit</button>
</form>
<hr>


@endforeach

@endsection
