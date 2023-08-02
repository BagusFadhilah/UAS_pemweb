@extends('admin.layouts.add')

@section('title', 'Create New Komik')

@section('content')
    <div class="row">
        <div class="col s12">
            <h1>Create New Komik</h1>
            <!-- Add form to create new komik and chapter here -->
            <form action="{{ route('admin.komik.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="input-field">
                    <input type="text" name="title" id="title" required>
                    <label for="title">Title</label>
                </div>
                <div class="input-field">
                    <textarea name="description" id="description" class="materialize-textarea"></textarea>
                    <label for="description">Description</label>
                </div>
                <div class="file-field input-field">
                    <div class="btn">
                        <span>Choose Cover Image</span>
                        <input type="file" name="cover_image">
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text">
                    </div>
                </div>

                <!-- Add form to create new chapter here -->
                <h4>Add New Chapter</h4>
                <div class="input-field">
                    <input type="text" name="chapter_title" id="chapter_title" required>
                    <label for="chapter_title">Chapter Title</label>
                </div>
                <div class="input-field">
                    <textarea name="chapter_content" id="chapter_content" class="materialize-textarea"></textarea>
                    <label for="chapter_content">Chapter Content</label>
                </div>
                <div class="input-field">
                    <input type="number" name="chapter_page_count" id="chapter_page_count" required>
                    <label for="chapter_page_count">Page Count</label>
                </div>
                <div class="file-field input-field">
                    <div class="btn">
                        <span>Choose Chapter Image</span>
                        <input type="file" name="chapter_image">
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
