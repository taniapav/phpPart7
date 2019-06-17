<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" type="text/css" media="screen" href="style.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />

    <title>PHP part7 exo1</title>
  </head>
  <body>
  <fieldset id="sec">
    <legend>Information personnelles</legend>
    <!-- L'attribut action sert à définir la page appelée par le formulaire
    et grâce à lui on définit le nom de la page ciblé 'user.php'
    C'est cette page user.php qui recevra les données du formulaire
    et qui sera chargée de les traiter. -->
  <form method="post" action="user.php">
    <label for="lastname">Entrez votre nom :</label>
    <input type="texte" name="lastname" id="lastname" placeholder="Ex : Dupon" maxlength="20" required autocomplete="on" autofocus/><br>

    <label for="prenom">Entrez votre prénom :</label>
    <input type="text" name="firstname" id="firstname" placeholder="Ex : Toto" maxlength="20" required autocomplete="on" /><br>
    <input type="submit" name="submit" value="envoyer" class="btn"/>
  </form>
  </fieldset>
  </body>
</html>
