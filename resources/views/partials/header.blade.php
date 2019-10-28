<header>
    <div class="navbar-expand-lg navbar-dark bg-primary">
        <div class="row align-items-center no-gutters default-width-container">
            <div class="col-10">
                <a href="{{ route('home') }}">
                    <img src="{{ asset('images/pokemon.png') }}" height="75px" alt="Pokemon Logo"/>
                </a>
            </div>
            <div class="col-4 offset-md-4">
                    <form class="form-inline my-2 my-lg-0" action="{{ route('search.post') }}" method="POST">
                        <input class="form-control" type="text" name="searchTerm"
                               placeholder="Search That Pokemon!">
                        <button class="btn btn-secondary" type="submit"><i class="fas fa-search"></i></button>
                        {{ csrf_field() }}
                    </form>
            </div>
        </div>
    </div>
</header>
