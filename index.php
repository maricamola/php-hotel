<?php
//Partiamo da questo array di hotel. https://www.codepile.net/pile/OEWY7Q1G
// Stampare tutti i nostri hotel con tutti i dati disponibili.
// Prima stampate in pagina i dati, senza preoccuparvi dello stile. (push)
// Dopo aggiungete Bootstrap e mostrate le informazioni con una tabella. (altro push)
// Bonus: aggiungere un form ad inizio pagina che tramite una richiesta POST permetta di filtrare gli hotel che hanno un parcheggio.


$hotels = [

  [
    'name' => 'Hotel Belvedere',
    'description' => 'Hotel Belvedere Descrizione',
    'parking' => true,
    'vote' => 4,
    'distance_to_center' => 10.4
  ],
  [
    'name' => 'Hotel Futuro',
    'description' => 'Hotel Futuro Descrizione',
    'parking' => true,
    'vote' => 2,
    'distance_to_center' => 2
  ],
  [
    'name' => 'Hotel Rivamare',
    'description' => 'Hotel Rivamare Descrizione',
    'parking' => false,
    'vote' => 1,
    'distance_to_center' => 1
  ],
  [
    'name' => 'Hotel Bellavista',
    'description' => 'Hotel Bellavista Descrizione',
    'parking' => false,
    'vote' => 5,
    'distance_to_center' => 5.5
  ],
  [
    'name' => 'Hotel Milano',
    'description' => 'Hotel Milano Descrizione',
    'parking' => true,
    'vote' => 2,
    'distance_to_center' => 50
  ],
];
// var_dump($hotels);
// var_dump($hotels[0]['name'], $hotels[0]['description'], $hotels[0]['parking'], $hotels[0]['vote'], $hotels[0]['distance_to_center']);

//Controlliamo se l'utente ha compilato il form
if (isset($_POST['search'])) {
  $search = strtolower(trim($_POST['search'])); // puliamo la stringa di ricerca (strtolower per convertire in minuscolo)

  if ($search === 'parking') {
    // se l'utente cerca "parking", filtriamo l'array di hotel per quelli che hanno il campo "parking" a true 
    $hotels = array_filter($hotels, function ($hotel) {
      return $hotel['parking'];
    });
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap.min.css'
    integrity='sha512-SbiR/eusphKoMVVXysTKG/7VseWii+Y3FdHrt0EpKgpToZeemhqHeZeLWLhJutz/2ut2Vw1uQEj2MbRF+TVBUA=='
    crossorigin='anonymous' />
  <title>PHP Hotel</title>
</head>

<body>

  <div class="container mt-4">
    <span>
      <h2 class="text-center m-4">Choose a hotel based on your needs!</h2>
    </span>

    <div>
      <form method="post"> <label for="search" class="form-label">Type 'parking' for hotels with parking</label>
        <div class="input-group mb-3"> <input type="text" class="form-control" id="search" name="search"
            placeholder="Parking"> <button class="btn btn-outline-secondary" type="submit">Search</button>
        </div>
      </form>
    </div>


    <table class="table">
      <thead>
        <tr>
          <th scope="col">Name</th>
          <th scope="col">Description</th>
          <th scope="col">Parking</th>
          <th scope="col">Vote</th>
          <th scope="col">Distance to center</th>
        </tr>
      </thead>
      <tbody>
        <?php // prima prendo l'array($hotels) poi l'elemento che viene ciclato($hotel)
        foreach ($hotels as $hotel) { ?>
        <tr>
          <td><?php echo $hotel['name']; ?></td>
          <td><?php echo $hotel['description']; ?></td>
          <td><?php echo $hotel['parking'] ? 'Yes' : 'No'; ?></td>
          <td><?php echo $hotel['vote']; ?></td>
          <td><?php echo $hotel['distance_to_center']; ?> km</td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>

</body>

</html>