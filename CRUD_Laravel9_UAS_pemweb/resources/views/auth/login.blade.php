@extends('admin.layouts.app')

@section('title', 'Login')

@section('content')
    <div class="row">
        <div class="col s12">
            <h1>Login</h1>
            <!-- Add login form here -->
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="input-field">
                    <input type="email" name="email" id="email" required>
                    <label for="email">Email</label>
                </div>
                <div class="input-field">
                    <input type="password" name="password" id="password" required>
                    <label for="password">Password</label>
                </div>
                <button type="submit" class="btn waves-effect waves-light">Login</button>
            </form>
        </div>
    </div>
@endsection
