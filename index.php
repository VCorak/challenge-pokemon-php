<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pokedex php</title>

    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
</head>
<body>


<div class="container">


    <div class="search-container">
        <form class="search-container col-md-5 col-sm-5">
            <div class="input-group mb-3">
                <button class="btn btn-outline-secondary" type="submit" id="button-addon1">Search</button>
                <input type="text" id="input-id" name="term" class="form-control" placeholder="Search pokemon by id or name" aria-label="Example text with button addon" aria-describedby="button-addon1">
            </div>
        </form>
    </div>
    
    <?php

    $pokemon_name = '';
    $pokemon_id = '';
    $pokemon_image = '';
    $pokemon_moves = '';
    $pokemon_type = '';


        if ($_GET['term'] ?? '') {
            $url = "https://pokeapi.co/api/v2/pokemon/" . $_GET["term"];
            $pokemonData = file_get_contents($url);
            $pokemonResults = json_decode($pokemonData, true);

            $pokemon_name = $pokemonResults['name'];
            $pokemon_id = $pokemonResults['id'];
            $pokemon_image = $pokemonResults['sprites']['other']['dream_world']['front_default'];
            $pokemon_moves = array_slice($pokemonResults['moves'], 0, 4);
            $pokemon_move0 = $pokemon_moves[0]['move']['name'];
            $pokemon_move1 = $pokemon_moves[1]['move']['name'];
            $pokemon_move2 = $pokemon_moves[2]['move']['name'];
            $pokemon_move3 = $pokemon_moves[3]['move']['name'];
            $pokemon_type = $pokemonResults['types'][0]['type']['name'];


        }


    $pokemon_abilities = '';

    if ($_GET['term'] ?? '') {
        $ability_url = "https://pokeapi.co/api/v2/ability/" . $_GET["term"];
        $abilityData = file_get_contents($ability_url);
        $abilityResults = json_decode($abilityData, true);

        $pokemon_abilities = $abilityResults['effect_entries'][1]['effect'];

    }


    $pokemon_evolution = '';

    if ($_GET['term'] ?? '') {
        $evo_url = "https://pokeapi.co/api/v2/pokemon-species/" . $_GET["term"];
        $evoData = file_get_contents($evo_url);
        $evoResults = json_decode($evoData, true);

        $pokemon_evolution = $evoResults['evolves_from_species']['name'];

    }






    ?>


<div class = "results-container">
    <img src='<?php echo $pokemon_image ?>'>
    <h3><?php echo ucwords($pokemon_name) ?></h3>
    <h3><?php echo $pokemon_id ?></h3>
    <h3 id="pokemon_types"><?php echo ucfirst($pokemon_type)?></h3>
    <h3 id="pokemon_types"><?php echo ucfirst($pokemon_evolution)?></h3>
    <p><?php echo ucfirst($pokemon_abilities) ?></p>

</div>



</body>
</html>
