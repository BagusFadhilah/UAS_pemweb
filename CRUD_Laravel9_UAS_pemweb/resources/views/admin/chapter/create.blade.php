<!-- resources/views/admin/chapter/create.blade.php -->

@extends('admin.layouts.add')

@section('title', 'Add New Chapter')

@section('content')
    <div class="row">
        <div class="col s12">
            <h1>Add New Chapter to {{ $komik->title }}</h1>
            <!-- Add form to create new chapter here -->
            <form action="{{ route('admin.chapter.store', ['komik_id' => $komik->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="input-field">
                    <input type="text" name="title" id="title" required>
                    <label for="title">Title</label>
                </div>
                <div class="input-field">
                    <input type="number" name="chapter_number" id="chapter_number" required>
                    <label for="chapter_number">Chapter Number</label>
                </div>
                <div class="input-field">
                    <textarea name="content" id="content" class="materialize-textarea"></textarea>
                    <label for="content">Content</label>
                </div>
                <div class="input-field">
                    <input type="number" name="page_count" id="page_count">
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
                <button type="submit" class="btn waves-effect waves-light">Create</button>
            </form>
        </div>
    </div>
@endsection
