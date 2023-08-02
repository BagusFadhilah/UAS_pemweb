<!-- resources/views/chapter/index.blade.php -->

@extends('admin.layouts.app')

@section('title', 'Chapter List')

@section('content')
    <div class="row">
        @foreach ($chapters as $chapter)
            <div class="col s12 m6 l4">
                <div class="card">
                    <div class="card-content">
                        <span class="card-title">{{ $chapter->title }}</span>
                        <p>Chapter Number: {{ $chapter->chapter_number }}</p>
                        <p>Page Count: {{ $chapter->page_count }}</p>
                    </div>
                    <div class="card-action">
                        <!-- Tautan ke halaman chapter berdasarkan ID -->
                        <a href="{{ route('chapter.show', ['komik_id' => $chapter->komik_id, 'chapter_id' => $chapter->id]) }}">Read Chapter</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
