@extends('admin.layouts.app')

@section('title', $chapter->title)

@section('content')
    <div class="row">
        <div class="col s12">
            <h1>{{ $chapter->title }} - Chapter {{ $chapter->chapter_number }}</h1>
            <p>Content: {{ $chapter->content }}</p>
            <img src="{{ $chapter->image }}" alt="{{ $chapter->title }}" style="max-width: 300px;">
            <img src="{{ asset('storage/' . $chapter->image) }}" alt="{{ $chapter->title }}">
        </div>
    </div>
@endsection
