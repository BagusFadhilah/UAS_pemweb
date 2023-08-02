@extends('admin.layouts.add')

@section('title', 'Edit Chapter')

@section('content')
    <div class="row">
        <div class="col s12">
            <h1>Edit Chapter</h1>
            <!-- Add form to edit chapter here -->
            <form action="{{ route('admin.chapter.update', ['komik_id' => $komik->id, 'chapter_id' => $chapter->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="input-field">
                    <input type="text" name="title" id="title" value="{{ $chapter->title }}" required>
                    <label for="title">Title</label>
                </div>
                <div class="input-field">
                    <input type="number" name="chapter_number" id="chapter_number" value="{{ $chapter->chapter_number }}" required>
                    <label for="chapter_number">Chapter Number</label>
                </div>
                <div class="input-field">
                    <textarea name="content" id="content" class="materialize-textarea">{{ $chapter->content }}</textarea>
                    <label for="content">Content</label>
                </div>
                <div class="input-field">
                    <input type="number" name="page_count" id="page_count" value="{{ $chapter->page_count }}">
                    <label for="page_count">Page Count</label>
                </div>
                <div class="file-field input-field">
                    <div class="btn">
                        <span>Choose Chapter Image</span>
                        <input type="file" name="image">
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text">
                    </div>
                </div>
                <button type="submit" class="btn waves-effect waves-light">Update</button>
            </form>
        </div>
    </div>
@endsection
