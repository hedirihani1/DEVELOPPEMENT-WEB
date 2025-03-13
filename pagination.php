<?php
// Tableau contenant 50 entreprises
$entreprises = [
    ['nom' => 'TechCorp', 'secteur' => 'Technologie', 'ville' => 'Paris'],
    ['nom' => 'FinSoft', 'secteur' => 'Finance', 'ville' => 'Londres'],
    ['nom' => 'GreenEnergy', 'secteur' => 'Énergie', 'ville' => 'Berlin'],
    ['nom' => 'AutoMeca', 'secteur' => 'Automobile', 'ville' => 'Madrid'],
    ['nom' => 'MediCare', 'secteur' => 'Santé', 'ville' => 'Rome'],
    ['nom' => 'BuildPro', 'secteur' => 'Construction', 'ville' => 'Amsterdam'],
    ['nom' => 'AgroFresh', 'secteur' => 'Agroalimentaire', 'ville' => 'Bruxelles'],
    ['nom' => 'WebNet', 'secteur' => 'Informatique', 'ville' => 'Dublin'],
    ['nom' => 'CloudSync', 'secteur' => 'Technologie', 'ville' => 'Zurich'],
    ['nom' => 'BankTrust', 'secteur' => 'Finance', 'ville' => 'New York'],
    ['nom' => 'SafeInsure', 'secteur' => 'Assurance', 'ville' => 'Lyon'],
    ['nom' => 'DigitalArt', 'secteur' => 'Créatif', 'ville' => 'Milan'],
    ['nom' => 'PharmaLife', 'secteur' => 'Pharmaceutique', 'ville' => 'Oslo'],
    ['nom' => 'SpeedLog', 'secteur' => 'Logistique', 'ville' => 'Stockholm'],
    ['nom' => 'RealEstatePro', 'secteur' => 'Immobilier', 'ville' => 'Lisbonne'],
    ['nom' => 'EcomStore', 'secteur' => 'E-commerce', 'ville' => 'Vienne'],
    ['nom' => 'DataSecure', 'secteur' => 'Cybersécurité', 'ville' => 'Copenhague'],
    ['nom' => 'InvestPlus', 'secteur' => 'Finance', 'ville' => 'Toronto'],
    ['nom' => 'CarMania', 'secteur' => 'Automobile', 'ville' => 'Los Angeles'],
    ['nom' => 'EduTech', 'secteur' => 'Éducation', 'ville' => 'Sydney'],
    ['nom' => 'Foodies', 'secteur' => 'Restauration', 'ville' => 'Tokyo'],
    ['nom' => 'TravelEasy', 'secteur' => 'Tourisme', 'ville' => 'Bangkok'],
    ['nom' => 'BioCare', 'secteur' => 'Santé', 'ville' => 'Séoul'],
    ['nom' => 'SportMax', 'secteur' => 'Sport', 'ville' => 'Pékin'],
    ['nom' => 'AutoDrive', 'secteur' => 'Transport', 'ville' => 'Singapour'],
    ['nom' => 'MediaOne', 'secteur' => 'Médias', 'ville' => 'Buenos Aires'],
    ['nom' => 'CleanEarth', 'secteur' => 'Environnement', 'ville' => 'Mexico'],
    ['nom' => 'RoboTech', 'secteur' => 'Technologie', 'ville' => 'San Francisco'],
    ['nom' => 'FinTrust', 'secteur' => 'Banque', 'ville' => 'Dubaï'],
    ['nom' => 'UrbanStyle', 'secteur' => 'Mode', 'ville' => 'Londres'],
    ['nom' => 'CryptoWorld', 'secteur' => 'Cryptomonnaies', 'ville' => 'Hong Kong'],
    ['nom' => 'SolarTech', 'secteur' => 'Énergie', 'ville' => 'Le Caire'],
    ['nom' => 'FastShip', 'secteur' => 'Logistique', 'ville' => 'Jakarta'],
    ['nom' => 'Wellness', 'secteur' => 'Bien-être', 'ville' => 'São Paulo'],
    ['nom' => 'TechAdvance', 'secteur' => 'Innovation', 'ville' => 'Tel Aviv'],
    ['nom' => 'AI Labs', 'secteur' => 'Intelligence Artificielle', 'ville' => 'Berlin'],
    ['nom' => 'GameWorld', 'secteur' => 'Jeux Vidéo', 'ville' => 'Montréal'],
    ['nom' => 'ConsultPro', 'secteur' => 'Consulting', 'ville' => 'Bruxelles'],
    ['nom' => 'DigitalBoost', 'secteur' => 'Marketing', 'ville' => 'Moscou'],
    ['nom' => 'GigaStore', 'secteur' => 'E-commerce', 'ville' => 'Shanghai'],
    ['nom' => 'OceanSave', 'secteur' => 'Environnement', 'ville' => 'Bangkok'],
    ['nom' => 'NanoMed', 'secteur' => 'Technologie médicale', 'ville' => 'Amsterdam'],
    ['nom' => 'EduSmart', 'secteur' => 'Éducation', 'ville' => 'Istanbul'],
    ['nom' => 'GreenTech', 'secteur' => 'Énergies Renouvelables', 'ville' => 'Oslo'],
    ['nom' => 'EconoMax', 'secteur' => 'Économie', 'ville' => 'Tokyo'],
    ['nom' => 'CyberShield', 'secteur' => 'Cybersécurité', 'ville' => 'New Delhi'],
    ['nom' => 'AeroSpace', 'secteur' => 'Aéronautique', 'ville' => 'Munich'],
    ['nom' => 'FoodChain', 'secteur' => 'Agroalimentaire', 'ville' => 'Rome'],
    ['nom' => 'FinCorp', 'secteur' => 'Finance', 'ville' => 'Paris']
];

// Nombre d'entreprises par page
$perPage = 10;

// Déterminer la page actuelle, avec validation
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
if ($page < 1) $page = 1;

// Déterminer l'index de départ
$startIndex = ($page - 1) * $perPage;

// Extraire les entreprises pour la page actuelle
$entreprisesPage = array_slice($entreprises, $startIndex, $perPage);

// Calcul du nombre total de pages
$totalPages = ceil(count($entreprises) / $perPage);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagination Dynamique</title>
</head>
<body>

    <h1>Liste des Entreprises Partenaires</h1>

    <table border="1">
        <tr>
            <th>Nom</th>
            <th>Secteur</th>
            <th>Ville</th>
        </tr>
        <?php foreach ($entreprisesPage as $entreprise): ?>
            <tr>
                <td><?= htmlspecialchars($entreprise['nom']) ?></td>
                <td><?= htmlspecialchars($entreprise['secteur']) ?></td>
                <td><?= htmlspecialchars($entreprise['ville']) ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <br>

    <!-- Navigation -->
    <?php if ($page > 1): ?>
        <a href="?page=<?= $page - 1 ?>">⬅ Précédent</a>
    <?php endif; ?>

    <?php if ($page < $totalPages): ?>
        <a href="?page=<?= $page + 1 ?>">Suivant ➡</a>
    <?php endif; ?>

</body>
</html>
