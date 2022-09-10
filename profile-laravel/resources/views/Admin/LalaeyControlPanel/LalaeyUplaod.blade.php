@extends('layouts.app')

@section('mainContent')
    <div>
        <form action="/lalaey" method="POST">
            @csrf
            <input type="text" name="Name">
            <select name="Lang">
                <option value="EN">EN</option>
                <option value="FA">FA</option>
            </select>
            <select name="Type">
                <option value="Sad">Sad</option>
                <option value="Happy">Happy</option>
            </select>
            <input type="text" name="Description">
            <button type="submit">Submit</button>
        </form>
    </div>
@endsection
