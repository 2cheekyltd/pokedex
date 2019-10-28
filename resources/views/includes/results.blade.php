@forelse($data as $pokemon)
    <?php $pokemon = $pokemon['data']; ?>

    <div class="resultContainer row no-gutters align-items-center" id="pokemon-{{ $pokemon['id'] }}">

        <div class="col-2 imageContainer">
            <img src="{{ $pokemon['sprites']->front_default }}" alt="{{ ucfirst($pokemon['name']) }}'s Picture"/>
        </div>

        <div class="col-9 infoContainer">
            <p><span>#{{ $pokemon['id'] }}</span> {{ ucfirst($pokemon['name']) }}</p>
        </div>

        <div class="col-1 linkContainer">
            <a href="{{ route('pokemon.show', $pokemon['name']) }}">VISIT</a>
        </div>

    </div>

@empty

    <div class="noResults">
        <h1>SORRY!</h1>
        <p>Our researchers came back with nothing past this point =(</p>
    </div>

@endforelse
