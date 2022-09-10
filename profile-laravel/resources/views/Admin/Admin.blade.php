@extends('layouts.app')

@section('mainContent')
    <div>
        <a href="lalaey/create">Upload Another Lalaey</a>
        @foreach ($lalaeys as $lalaey)
            <h1>Name: {{ $lalaey->Name }}</h1>
            <p>Lang: {{ $lalaey->Lang }}</p>
            <p>Type: {{ $lalaey->Type }}</p>
            <p>Description: {{ $lalaey->Description }}</p>
        @endforeach
    </div>
@endsection
