<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $name = htmlspecialchars(trim($_POST["name"]));
    $email = htmlspecialchars(trim($_POST["email"]));
    $message = htmlspecialchars(trim($_POST["message"]));

    // Validation simple (ajoutez d'autres validations si nécessaire)
    if (!empty($name) && !empty($email) && !empty($message) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        
        // Préparer l'email
        $to = "roltossou@hotmail.fr"; 
        $subject = "Nouveau message de contact de $name";
        $body = "Nom: $name\nEmail: $email\n\nMessage:\n$message";
        $headers = "From: $email";

        // Envoyer l'e-mail
        if (mail($to, $subject, $body, $headers)) {
            echo "Merci, votre message a été envoyé avec succès.";
        } else {
            echo "Erreur : Le message n'a pas pu être envoyé.";
        }
    } else {
        echo "Veuillez remplir tous les champs correctement.";
    }
} else {
    echo "Méthode de requête invalide.";
}
?>
