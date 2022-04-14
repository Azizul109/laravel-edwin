@extends('layouts.app')

@section('content')
    <h2>This is contact page</h2>

    @foreach($peoples as $people)
        <li>{{$people}}</li>
    @endforeach
@endsection

