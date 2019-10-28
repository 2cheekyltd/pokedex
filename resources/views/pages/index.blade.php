@extends('templates.main')
@section('body_content')
    <div class="default-width-container">
        <div class="resultsContainer">
            @include('includes.results')
        </div>
        <div class="loader">
            <i class="fas fa-cog fa-spin"></i>
        </div>
    </div>
@endsection
