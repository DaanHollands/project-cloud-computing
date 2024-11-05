@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <div class="flex-center">
        <div class="content">
            <div class="title m-b-md">
                Laravel
            </div>
            @guest()
                <div class="links">
                    <a href="{{ route('login') }}">Login</a>
                    <a href="{{ route('register') }}">Register</a>
                </div>
            @endguest
            @auth()
                <div>
                    <a href="{{ route('logout') }}">Logout</a>
                </div>
            @endauth
        </div>
    </div>
@endsection


