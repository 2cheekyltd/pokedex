<head>
    @include('layouts.head')
</head>
<div class="default-width-container">
    <form action="{{ route('search.post') }}" method="POST" class="search">
        <input type="text" name="searchTerm" placeholder="Search by either name or ID"/>
        <button><i class="fas fa-search"></i></button>
        {{ csrf_field() }}
    </form>
</div>
