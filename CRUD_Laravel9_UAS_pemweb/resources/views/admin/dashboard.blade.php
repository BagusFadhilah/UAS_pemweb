@extends('admin.layouts.add')

@section('title', 'Admin Dashboard')

@section('content')
    <div class="row">
        <div class="col s12">
            <h1>Admin Dashboard</h1>
            <a href="{{ route('admin.komik.create') }}" class="btn waves-effect waves-light">Add New Komik</a>
        </div>
    </div>

    <div class="row">
        <div class="col s12">
            <h2>Komik List</h2>
            <table>
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Cover Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($komiks as $komik)
                        <tr>
                            <td>{{ $komik->title }}</td>
                            <td>
                                @if ($komik->cover_image)
                                    <img src="{{ asset('storage/' . $komik->cover_image) }}" alt="{{ $komik->title }}" style="max-width: 100px;">
                                @else
                                    No Image
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('komik.show', ['id' => $komik->id]) }}" class="btn waves-effect waves-light">View</a>
                                <a href="{{ route('admin.komik.edit', ['id' => $komik->id]) }}" class="btn waves-effect waves-light">Edit</a>
                                <form action="{{ route('admin.komik.destroy', ['id' => $komik->id]) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn waves-effect waves-light" onclick="return confirm('Are you sure you want to delete this komik?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
