@extends('templates.main')
@section('body_content')

    @if(isset($data['data']))
        @include('includes.pokeprofile')
    @else
        @include('includes.poke404')
    @endif

@endsection
