<!DOCTYPE html>
<html lang="efr" dir="ltr">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" type="text/css" media="screen" href="style.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />

    <title>PHP part7 exo1</title>
  </head>
  <body>
    <fieldset id="sec">
      <?php
      $r = '/^[A-Z][a-zÀ-ÖØ-öø-ÿ]+([ -][A-Z][a-zÀ-ÖØ-öø-ÿ]+)*$/';
      if (isset($_POST['lastname'])) {
        /* La fonction preg_match() va rechercher un schéma dans une chaine de caractères. */
        /* Elle va prendre en arguments le schéma de recherche (qui sera une regex dans notre cas)
         * ainsi que la chaine de caractère dans laquelle la recherche doit être faite et
         * elle va renvoyer la valeur 1 si le schéma recherché est trouvé dans la chaine de caractères ou
         * 0 dans le cas contraire.
         */
        if (preg_match($r, $_POST['lastname'])) {
          $lastname = htmlspecialchars($_POST['lastname']);
          /* Pour échapper le code HTML, il suffit d'utiliser la fonctionhtmlspecialcharsqui va transformer les chevrons des balises HTML<>en&lt;et&gt;respectivement.
            Cela provoquera l'affichage de la balise plutôt que son exécution.
            Le code HTML qui en résultera sera propre et protégé car les balises HTML insérées par le visiteur auront été échappées */
        } else {
          $errorlastname = 'Veuillez indiquer un nom de famille de la forme "Dupont" ';
        }
      } else {
        $errorlastname = 'Veuillez indiquer un nom de famille';
      }
      if (isset($_POST['firstname'])) {
        if (preg_match($r, $_POST['firstname'])) {
          $firstname = htmlspecialchars($_POST['firstname']);
        } else {
          $errorfirstname = 'Veuillez indiquer un prénom de la forme "Toto" ';
        }
      } else {
        $errorfirstname = 'Veuillez indiquer un nom prénom';
      }
      ?>
      <p class="<?php echo isset($lastname) ? 'success' : 'error' ?>"><p class="<?php echo isset($lastname) ? 'text-primary' : 'text-danger' ?>"><?php echo isset($lastname) ? $lastname : $errorlastname ?></p>
      <p class="<?php echo isset($firstname) ? 'success' : 'error' ?>"><p class="<?php echo isset($firstname) ? 'text-primary' : 'text-danger' ?>"><?php echo isset($firstname) ? $firstname : $errorfirstname ?></p>
    </fieldset>
  </body>
</html>
