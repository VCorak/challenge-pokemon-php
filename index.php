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
                <input type="text" id="input-id" name="pokemon" class="form-control" placeholder="Search pokemon by id or name" aria-label="Example text with button addon" aria-describedby="button-addon1">
            </div>
        </form>
    </div>
    <?php

    $pokemon_name = '';
    $pokemon_id = '';

    if (!empty($_GET["pokemon"])) {
        $url = "https://pokeapi.co/api/v2/pokemon/" . $_GET["pokemon"];
        $pokemonData = file_get_contents($url);
        $pokemonResults = json_decode($pokemonData, true);

        $pokemon_name = $pokemonResults['name'];
        $pokemon_id = $pokemonResults['id'];


    }

    ?>

<div class = "results-container">
    <h3><?php echo $pokemon_name ?></h3>
    <h3><?php echo $pokemon_id ?></h3>
</div>



</body>
</html>
