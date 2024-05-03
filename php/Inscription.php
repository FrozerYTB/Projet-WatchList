<?php
// Connexion à la base de données (à adapter selon votre configuration)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "inscription";

// Création de la connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérification de la connexion
if ($conn->connect_error) {
    die("La connexion à la base de données a échoué : " . $conn->connect_error);
}

// Vérification du formulaire d'inscription
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];
    $pseudo = $_POST['pseudo'];
    $password_verify = $_POST['password_verify']; // Champ ajouté

    // Vérification de l'e-mail
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<p style='color:red;'>L'adresse e-mail saisie n'est pas valide.</p>";
    } else {
        // Vérification si l'e-mail est déjà utilisé
        $check_email_query = "SELECT * FROM users WHERE email='$email'";
        $result = $conn->query($check_email_query);
        if ($result->num_rows > 0) {
            echo "<p style='color:red;'>Cette adresse e-mail est déjà utilisée.</p>";
        }
    }

    // Vérification du pseudo
    $check_pseudo_query = "SELECT * FROM users WHERE pseudo='$pseudo'";
    $result = $conn->query($check_pseudo_query);
    if ($result->num_rows > 0) {
        echo "<p style='color:red;'>Ce pseudo est déjà utilisé.</p>";
    }

    // Vérification si les mots de passe correspondent
    if ($password != $password_confirm) {
        echo "<p style='color:red;'>Les mots de passe ne correspondent pas.</p>";
    }

    // Vérification si les mots de passe sont identiques
    if ($password != $password_verify) {
        echo "<p style='color:red;'>La vérification du mot de passe a échoué.</p>";
    }

    // Si tout est bon, inscrire l'utilisateur
    if (empty($error_message)) {
        // Hasher le mot de passe
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Insérer l'utilisateur dans la base de données
        $insert_user_query = "INSERT INTO users (email, password, pseudo) VALUES ('$email', '$hashed_password', '$pseudo')";
        if ($conn->query($insert_user_query) === TRUE) {
            echo "<p style='color:green;'>Inscription réussie !</p>";
            // Redirection vers une page de succès ou de connexion
            // header("Location: success.php");
            exit;
        } else {
            echo "Erreur lors de l'inscription : " . $conn->error;
        }
    }
}

// Fermer la connexion à la base de données
$conn->close();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
</head>
<body>
    <h2>Inscription</h2>
    <img src="images/Groupinscription.png" alt="Inscription">
    <form action="inscription.php" method="post">
        <label for="pseudo">Pseudo:</label><br>
        <input type="text" id="pseudo" name="pseudo" required><br>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br>
        <label for="password">Mot de passe:</label><br>
        <input type="password" id="password" name="password" required><br>
        <label for="password_confirm">Vérification du mot de passe:</label><br>
        <input type="password" id="password_confirm" name="password_confirm" required><br><br>
        <input type="submit" value="S'inscrire">
    </form>
</body>
</html>