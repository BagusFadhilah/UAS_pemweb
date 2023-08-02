<!-- resources/views/komik/index.blade.php -->

@extends('admin.layouts.app')

@section('title', 'Komik List')

@section('content')
    <div class="row">
        @foreach ($komiks as $komik)
            <div class="col s12 m6 l4">
                <div class="card">
                    <div class="card-image">
                        <!-- Tautan ke halaman komik berdasarkan ID -->
                        <a href="{{ route('komik.show', $komik->id) }}">
                            <img src="{{ asset('storage/' . $komik->cover_image) }}" alt="{{ $komik->title }}">
                        </a>
                    </div>
                    <div class="card-content">
                        <!-- Tautan ke halaman komik berdasarkan ID -->
                        <a href="{{ route('komik.show', $komik->id) }}" class="card-title">{{ $komik->title }}</a>
                        <p>{{ $komik->description }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
