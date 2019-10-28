<header>
    <div class="navbar-expand-lg navbar-dark bg-primary">
        <div class="row align-items-center no-gutters default-width-container">
            <div class="col-10">
                <a href="{{ route('home') }}">
                    <img src="{{ asset('images/pokeball.png') }}" height="75px" alt="Pokeball"/>
                </a>
            </div>
            <div class="col-2">
                <form class="form-inline my-2 my-lg-0" action="{{ route('search.post') }}" method="POST" class="search">
                    <input class="form-control mr-sm-2" type="text" name="searchTerm" placeholder="Search by either name or ID">
                    <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
                    {{ csrf_field() }}
                </form>
            </div>
        </div>
    </div>
</header>
