<?php
// Récupération des données envoyées par le formulaire
$type = $_POST['type_hotel'];
$piscine = $_POST['piscine'];

// Liste simulée d'hôtels côté serveur
$hotels = [
    [ "nom" => "Hôtel Flakin",   "type" => "Standard", "piscine" => "Sans Piscine" ],
    [ "nom" => "Hôtel KOE",   "type" => "Standard", "piscine" => "Sans Piscine" ],
    [ "nom" => "Hôtel Prestige",   "type" => "Standard", "piscine" => "Sans Piscine" ],
    [ "nom" => "Hôtel Bon Sejour",     "type" => "VIP", "piscine" => "Avec Piscine" ],
    [ "nom" => "Hôtel Diarra", "type" => "VIP",      "piscine" => "Sans Piscine" ],
    [ "nom" => "Hôtel Zind Naaba",    "type" => "Diamant",  "piscine" => "Avec Piscine" ],
    [ "nom" => "Hôtel Loba",      "type" => "VIP",      "piscine" => "Sans Piscine" ],
];

// Filtrage selon les critères
$resultats = array_filter($hotels, function($hotel) use ($type, $piscine) {
    return $hotel["type"] === $type && $hotel["piscine"] === $piscine;
});
?>

<!DOCTYPE html>
<html>
<head>
  <title>Résultats de votre réservation</title>
</head>
<body>
  <h2>Résultats pour un hôtel "<?php echo htmlspecialchars($type); ?>" avec<?php echo $piscine === "oui" ? "" : "out"; ?> piscine :</h2>

  <?php if (count($resultats) > 0): ?>
    <ul>
      <?php foreach ($resultats as $hotel): ?>
        <li><?php echo htmlspecialchars($hotel['nom']); ?> (<?php echo $hotel['type']; ?>, <?php echo $hotel['piscine'] === 'oui' ? 'avec piscine' : 'sans piscine'; ?>)</li>
      <?php endforeach; ?>
    </ul>
  <?php else: ?>
    <p><b>Aucun hôtel ne correspond à vos critères.</b></p>
  <?php endif; ?>

  <br><a href="index.html">🔙 Retour au formulaire</a>
</body>
</html>
