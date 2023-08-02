@extends('admin.layouts.app')

@section('content')
    <h1>Welcome to My App</h1>
    <h2>List of Komiks</h2>
    <ul>
        @foreach ($komiks as $komik)
            <li>{{ $komik->title }}</li>
        @endforeach
        <a href="{{ route('komik.index') }}" class="waves-effect waves-light btn">See Komik List</a>
    </ul>
@endsection
