<!-- resources/views/auth/login.blade.php -->

@extends('layouts.app')

@section('title', 'Registreer')

@section('content')
    <div>
        @if ($errors->any())
            <div>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('register') }}" method="POST">
            @csrf
            <div>
                <label for="fullname">Voor- + Familienaam</label>
                <input type="text" name="full_name" id="full_name" required>
            </div>

            <div>
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" required>
            </div>

            <div>
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" required>
            </div>

            <button type="submit">Login</button>
        </form>

        <p>Don't have an account? <a href="{{ route('register') }}">Register here</a>.</p>
    </div>
@endsection






