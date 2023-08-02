@extends('admin.layouts.add')

@section('title', 'Edit Komik')

@section('content')
    <div class="row">
        <div class="col s12">
            <h1>Edit Komik</h1>
            <!-- Edit form for the selected komik -->
            <form action="{{ route('admin.komik.update', ['id' => $komik->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="input-field">
                    <input type="text" name="title" id="title" value="{{ $komik->title }}" required>
                    <label for="title">Title</label>
                </div>
                <div class="input-field">
                    <textarea name="description" id="description" class="materialize-textarea">{{ $komik->description }}</textarea>
                    <label for="description">Description</label>
                </div>
                <div class="input-field">
                    <input type="file" name="cover_image" id="cover_image">
                    <label for="cover_image">Cover Image</label>
                </div>
                @if ($komik->cover_image)
                    <img src="{{ asset('storage/' . $komik->cover_image) }}" alt="{{ $komik->title }}" style="max-width: 200px;">
                @else
                    No Image
                @endif
                <button type="submit" class="btn waves-effect waves-light">Update</button>
            </form>
            <!-- Add Chapter button -->
            <a href="{{ route('admin.chapter.create', ['komik_id' => $komik->id]) }}" class="btn waves-effect waves-light">Add Chapter</a>
        </div>
    </div>
@endsection
