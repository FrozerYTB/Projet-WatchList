<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<h1>Forum</h1>

<div class="messages">
    <!-- Ici, vous pouvez afficher les messages existants depuis la base de données -->
    <div class="message">
        <p>Utilisateur 1 : Ceci est un message sur le forum.</p>
    </div>
    <div class="message">
        <p>Utilisateur 2 : Un autre message sur le forum.</p>
    </div>
</div>

<h2>Poster un message</h2>
<form action="poster.php" method="post">
    <label for="username">Nom d'utilisateur :</label>
    <input type="text" id="username" name="username" required><br>
    <label for="message">Message :</label><br>
    <textarea id="message" name="message" rows="4" cols="50" required></textarea><br>
    <button type="submit">Poster</button>
</form>

</body>
</html>