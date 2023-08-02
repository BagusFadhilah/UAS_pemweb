@extends('admin.layouts.app')

@section('title', $komik->title)

@section('content')
    <div class="row">
        <div class="col s12">
            <h1>{{ $komik->title }}</h1>
            @if ($komik->cover_image)
                <img src="{{ asset('storage/' . $komik->cover_image) }}" alt="{{ $komik->title }}" style="max-width: 300px;">
            @else
                No Image
            @endif
            <p>{{ $komik->description }}</p>
        </div>
    </div>

    <div class="row">
        <div class="col s12">
            <h2>Chapters</h2>
            <ul>
                @foreach ($chapters as $chapter)
                    <li>
                        <a href="{{ route('chapter.show', ['komik_id' => $komik->id, 'chapter_id' => $chapter->id]) }}">
                            Chapter {{ $chapter->chapter_number }}: {{ $chapter->title }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
