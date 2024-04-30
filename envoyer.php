<?php
// Vérifier si les champs nom, email et message ont été soumis via POST
if(isset($_POST['nom']) && isset($_POST['email']) && isset($_POST['message'])) {
    // Récupérer les valeurs soumises dans les champs nom, email et message
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $message = $_POST['message'];




    // Adresse email du destinataire du message
    $destinataire = "adresse-email-du-destinataire@example.com";

    // Sujet du message contenant le nom de l'expéditeur
    $sujet = "Nouveau message de la part de ".$nom;

    // Corps du message contenant le nom, l'email et le message de l'expéditeur
    $contenu = "Nom : ".$nom."\n";
    $contenu .= "Email : ".$email."\n\n";
    $contenu .= "Message : \n".$message;

    // En-têtes du message, contenant l'adresse email de l'expéditeur et son nom
    $entetes = "From: ".$nom." <".$email.">\r\n";
    $entetes .= "Reply-To: ".$email."\r\n";
    $entetes .= "X-Mailer: PHP/".phpversion();


    // Envoyer le message par email et afficher un message de confirmation ou d'erreur
    if(mail($destinataire, $sujet, $contenu, $entetes)) {
        echo "Votre message a bien été envoyé.";
    } else {
        // echo "destinataire: $destinataire <br>";
        // echo "sujet: $sujet <br>";
        // echo "contenu: $contenu <br>";
        // echo "entetes: $entetes <br><br>";
        echo "Une erreur est survenue lors de l'envoi de votre message.<br>";
        echo "Vérifiez si votre serveur de mail est bien configuré<br>";
        echo "ou dans le code php, vérifiez qu'une adress email valable a été attribué à la variable  \$destinataire";
        
    }
}
?>