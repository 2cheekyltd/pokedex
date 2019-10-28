<?php $pokemon = $data['data']; ?>
<!-- Returns the full profile of the Pokemon in question -->
<div class="default-width-container">
    <div class="profile">
        <div class="staticInfo left">
            <h1 class="title">
                <span class="idNumber">#{{ $pokemon['id'] }}</span>
                - {{ ucfirst($pokemon['name']) }}
            </h1>
        </div>
        <div class="staticInfo right">
            <div class="multiPart">
                <p>{{ $pokemon['weight'] }}<span>WEIGHT</span></p>
                <p>{{ $pokemon['height'] }}<span>HEIGHT</span></p>
            </div>
        </div>
        <div class="imgContainer">
            <img src="{{ $pokemon['sprites']->front_default }}" alt="{{ ucfirst($pokemon['name']) }}'s Picture"/>
        </div>
        <div class="infoContainer">
            <h1>Abilities</h1>
            <table>
                <thead>
                <tr>
                    <th>NAME</th>
                    <th>HIDDEN</th>
                    <th>SLOT</th>
                </tr>
                </thead>
                <tbody>
                @foreach($pokemon['abilities'] as $ability)
                    <tr>
                        <td>{{ $ability->ability->name }}</td>
                        <td>{{ ($ability->is_hidden)? 'Yes' : 'No' }}</td>
                        <td>{{ $ability->slot }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
