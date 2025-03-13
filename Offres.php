<?php
// Nombre d'offres par page
$perPage = 6;

// Déterminer la page actuelle
$page = isset($_GET['page']) ? max(1, intval($_GET['page'])) : 1;
$startIndex = ($page - 1) * $perPage;

// Récupération des offres avec pagination
$sql = "SELECT id, entreprise, titre, duree FROM offres LIMIT :startIndex, :perPage";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':startIndex', $startIndex, PDO::PARAM_INT);
$stmt->bindValue(':perPage', $perPage, PDO::PARAM_INT);
$stmt->execute();
$offres = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Nombre total d'offres pour la pagination
$totalOffres = $pdo->query("SELECT COUNT(*) FROM offres")->fetchColumn();
$totalPages = ceil($totalOffres / $perPage);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web4All - Offres</title>
    <link rel="stylesheet" href="Style1.css">
    <script src="Script.js" defer></script>
</head>
<body>
    <header>
        <div class="logo">
            <img src="images/WEB4ALL__4_-removebg-preview.png" alt="Web4All Logo">
        </div>
        <nav>
            <ul class="nav-links">
                <li><a href="Accueil.html">Accueil</a>&nbsp;||&nbsp;</li>
                <li><a href="Offres.php">Offres</a>&nbsp;||&nbsp;</li>
                <li><a href="Wishlist.html">Ma Liste</a>&nbsp;||&nbsp;</li>
                <li><a href="Contact.html">Contact</a>&nbsp;||&nbsp;</li>
                <li><a href="Entreprise.html">Entreprises</a>&nbsp;||&nbsp;</li>
                <li><a href="OffresGestion.html">Gérer les Offres</a>&nbsp;||&nbsp;</li>
                <li><a href="Dashboard.html">Statistiques</a>&nbsp;||&nbsp;</li>
                <li><a href="Pilote.html">Pilotes</a>&nbsp;||&nbsp;</li>
                <li><a href="Etudiant.html">Étudiants</a></li>
                <li class="btn"><a href="Connexion.html">Connexion</a></li>
                <li class="btn"><a href="Inscription.html">Inscription</a></li>
            </ul>
            <div class="burger">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </nav>
    </header>

    <section class="entreprises">
        <h1>Les entreprises qui recrutent</h1>
        <div class="entreprise-list">
            <?php foreach ($offres as $offre): ?>
                <div class="entreprise-card">
                    <h2><?= htmlspecialchars($offre['entreprise']) ?></h2>
                    <p><?= htmlspecialchars($offre['titre']) ?> - <?= htmlspecialchars($offre['duree']) ?></p>
                    <a href="Postuler.html" class="btn-main">Postuler</a>
                    <a href="Wishlist.html" class="btn-main">Enregistrer</a>
                </div>
            <?php endforeach; ?>
        </div>
    </section>

    <div class="pagination">
        <?php if ($page > 1): ?>
            <a href="?page=<?= $page - 1 ?>" class="btn-pagination">⬅ Précédent</a>
        <?php endif; ?>

        <span>Page <?= $page ?> sur <?= $totalPages ?></span>

        <?php if ($page < $totalPages): ?>
            <a href="?page=<?= $page + 1 ?>" class="btn-pagination">Suivant ➡</a>
        <?php endif; ?>
    </div>

    <footer>
        <p>2025 - Tous droits réservés - Web4All</p>
    </footer>
</body>
</html>
