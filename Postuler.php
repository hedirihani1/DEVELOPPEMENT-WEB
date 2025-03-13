<?php
// Vérifier si un fichier a été envoyé
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["cv"])) {
    $file = $_FILES["cv"];
    
    // Dossier de destination
    $uploadDir = "C:\Users\hedir\Desktop\WEB4ALL\LESCV";
    
    // Vérifier que le fichier a bien été téléchargé sans erreur
    if ($file["error"] !== UPLOAD_ERR_OK) {
        die("Erreur lors du téléversement.");
    }

    // Vérifier le type du fichier (seulement PDF)
    $fileType = mime_content_type($file["tmp_name"]);
    if ($fileType !== "application/pdf") {
        die("Seuls les fichiers PDF sont acceptés.");
    }

    // Vérifier la taille du fichier (max 2 Mo)
    if ($file["size"] > 2 * 1024 * 1024) {
        die("Le fichier est trop volumineux (maximum 2 Mo).");
    }

    // Sécuriser le nom du fichier
    $safeFileName = htmlspecialchars(basename($file["name"]));
    $targetFile = $uploadDir . $safeFileName;

    // Vérifier si le dossier existe, sinon le créer
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    // Déplacer le fichier vers le dossier CVS
    if (move_uploaded_file($file["tmp_name"], $targetFile)) {
        echo "Fichier téléversé avec succès : " . $safeFileName;
    } else {
        echo "Erreur lors du déplacement du fichier.";
    }
} else {
    echo "Aucun fichier envoyé.";
}
?>
