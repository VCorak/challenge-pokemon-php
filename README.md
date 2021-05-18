Title: The pokemon challenge - PHP style
Repository: challenge-pokemon-php

Type of Challenge: Learning

Duration: 2 days

Deployment strategy : NA

Team challenge : solo

Learning objectives
Starting with PHP
To be able to write a simple condition and a simple loop
To know how to access external resources (API)
To know where to search for PHP documentation


#Timeline

First I need to read documentation because I do not even know how to start, so starting from basics.
- I managed to start localhost, still do not have virtual host but at least I can see what is going on in browser...
- do I need to write html? I need. How? 
  - I added basic search form with button input
- writing basic styling with css
- fetch the data from API
  - had some issues with fetching data. Got error: "Warning: file_get_contents(): Unable to find the wrapper "https" - did you forget to enable it when you configured PHP?"
    and had to edit my php.ini file. Uncommented line extension=openssl and added line extension_dir = "ext". 
    And it worked, but have to consult with coach if this is right solution.
    
- after some googling and trying different solutions I can finally understand this piece of code:

if ($_GET['term'] ?? '') {
$url = "https://pokeapi.co/api/v2/pokemon/" . $_GET["term"];
$pokemonData = file_get_contents($url);
$pokemonResults = json_decode($pokemonData, true);
        }

- found out that this double ?? actually replaces isset($_GET['term]) ? $_GET['term] : ''; - that part after ? which has to be true


- display results
    - manage to display name and id for now...to be continued tomorrow...



