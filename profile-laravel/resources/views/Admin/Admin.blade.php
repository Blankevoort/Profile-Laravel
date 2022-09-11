@extends('Layout\AdminLayout')

@section('title')
    Home
@endsection

@section('mainContent')
    <div>
        <a href="/lalaey/create">Upload Another Lalaey</a>
        @foreach ($lalaeys as $lalaey)
            <img src="{{ asset('Images/' . $lalaey->Image_Path) }}" alt="{{ $lalaey->Name }}">
            <audio controls>
                <source src="{{ asset('Lalaeys/' . $lalaey->Audio_Path) }}">
              Your browser does not support the audio element.
              </audio>
            <h1>Name: {{ $lalaey->Name }}</h1>
            <p>Lang: {{ $lalaey->Lang }}</p>
            <p>Type: {{ $lalaey->Type }}</p>
            <p>Description: {{ $lalaey->Description }}</p>
            <a href="lalaey/{{ $lalaey->id }}/edit">Edit This Lalaey</a>
            <form action="/lalaey/{{ $lalaey->id }}" method="POST">
                @csrf
                @method('delete')
                <button type="submit">Delete</button>
            </form>
        @endforeach
    </div>
@endsection
