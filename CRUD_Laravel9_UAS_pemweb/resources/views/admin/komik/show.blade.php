@extends('admin.layouts.add')

@section('title', $komik->title)

@section('content')
    <div class="row">
        <div class="col s12">
            <h1>{{ $komik->title }}</h1>
            <p>{{ $komik->description }}</p>
            <img src="{{ asset('storage/' . $komik->cover_image) }}" alt="{{ $komik->title }}" style="max-width: 300px;">
        </div>
    </div>
@endsection
