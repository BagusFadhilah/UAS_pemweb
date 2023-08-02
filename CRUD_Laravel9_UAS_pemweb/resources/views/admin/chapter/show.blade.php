@extends('admin.layouts.add')

@section('title', 'Chapter: '.$chapter->title)

@section('content')
    <div class="row">
        <div class="col s12">
            <h1>Chapter: {{ $chapter->title }}</h1>
            <p>Chapter Number: {{ $chapter->chapter_number }}</p>
            <p>Content: {{ $chapter->content }}</p>
            <p>Page Count: {{ $chapter->page_count }}</p>
            <img src="{{ $chapter->image }}" alt="Chapter Image" width="300">
            <img src="{{ asset('storage/' . $chapter->image) }}" alt="{{ $chapter->title }}">
        </div>
    </div>
@endsection
