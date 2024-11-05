@extends('layouts.app')

@section('title', 'Profiel')

@section('content')
    <div>
        @if(Auth::check())
            <h1>Succes!</h1>
        @else
            <h1>Faal!</h1>
        @endif
    </div>
@endsection
