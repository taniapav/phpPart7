<?php
$patternName = '%^([A-Z]{1}[a-zÀ-ÖØ-öø-ÿ]+)([- ]{1}[A-Z]{1}[a-zÀ-ÖØ-öø-ÿ]+){0,1}$%';
// Je créé un tableau qui va contenir mes erreurs.
$formErrors = array();

// On vérifie le nombre de lignes dna sle tableau POST qui contient toutes les données saisies dans notre formulaire.
if (count($_POST) > 0) {
    // On vérifie que la variable $_POST['lastname'] existe ET n'est pas vide.
    if (!empty($_POST['lastname'])) {
        // Je vérifie que ma variable est conforme à ma regex patternName.
        if (preg_match($patternName, $_POST['lastname'])) {
            // Je stocke $_POST['lastname'] dans une variable.
            $lastname = htmlspecialchars($_POST['lastname']);
        } else {
            // Si la saisie utilisatuer ne correspond pas à la regex on va stocker une erreur lastname dans notre tableau d'erreurs
            $formErrors['lastname'] = 'Vôtre nom de famille est incorrect';
        }
    } else {
        // On va réutiliser notre erreur lastname parce que les deux ne peuvent pas exister en même temps.
        $formErrors['lastname'] = 'Veuillez renseigner votre nom de famille';
    }

    if (!empty($_POST['firstname'])) {
        if (preg_match($patternName, $_POST['firstname'])) {
            $firstname = htmlspecialchars($_POST['firstname']);
        } else {
            $formErrors['firstname'] = 'Vôtre prénom est incorrect';
        }
    } else {
        $formErrors['firstname'] = 'Veuillez renseigner votre prénom';
    }

    if (!empty($_POST['title'])) {
        if ($_POST['title'] === 'Monsieur' || $_POST['title'] === 'Madame') {
            $title = $_POST['title'];
        } else {
            $formErrors['title'] = 'Vôtre civilité est incorrecte';
        }
    } else {
        $formErrors['title'] = 'Veuillez renseigner votre civilité';
    }
}
?>

<!DOCTYPE html>
<html lang="fr" dir="ltr">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Exercice 6 part 7 PHP</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootswatch/4.3.1/journal/bootstrap.min.css" />
    </head>
    <body>
        <div class="container">
            <?php
            // On affiche le formulaire si rien a été envoyé ou qu'il y a une erreur dans la saisie.
            if (count($_POST) == 0 || count($formErrors) > 0) {
                ?>
                <form method="POST" action="index.php">
                    <div class="form-group">
                        <label for="lastname">Nom de famille</label>
                        <?php /* On donne en valeur à notre input ce qui a été saisi par l'utilisateur. Ca permet à l'utilisateur de ne pas ressaisir ses données en cas d'erreur.
                         *   isset($_POST['lastname']) ? $_POST['lastname'] : '' Si $_POST['lastname'] existe (?) alors on affiche $_POST['lastname'] (:) sinon on n'affiche rien.
                         */ ?>
                        <input type="text" name="lastname" class="form-control" id="lastname" placeholder="Dupont" value="<?= isset($_POST['lastname']) ? $_POST['lastname'] : '' ?>" required />
                        <?php
                        // On affiche une alerte qui contient le texte de l'erreur s'il y en a une.
                        if (isset($formErrors['lastname'])) {
                            ?>
                            <div class="alert-danger">
                                <p><?= $formErrors['lastname'] ?></p>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="form-group">
                        <label for="firstname">Prénom</label>
                        <input type="text" name="firstname" class="form-control" id="firstname" placeholder="Jean" value="<?= isset($_POST['firstname']) ? $_POST['firstname'] : '' ?>" required />
                        <?php if (isset($formErrors['firstname'])) { ?>
                            <div class="alert-danger">
                                <p><?= $formErrors['firstname'] ?></p>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="form-group">
                        <label for="title">Civilité</label>
                        <select name="title" class="form-control" id="title" required>
                            <option disabled selected>Veuillez faire un choix !</option>
                            <option value="Monsieur" <?= isset($_POST['title']) && $_POST['title'] == 'Monsieur' ? 'selected' : '' ?>>Monsieur</option>
                            <option value="Madame" <?= isset($_POST['title']) && $_POST['title'] == 'Madame' ? 'selected' : '' ?>>Madame</option>
                        </select>
                        <?php if (isset($formErrors['title'])) { ?>
                            <div class="alert-danger">
                                <p><?= $formErrors['title'] ?></p>
                            </div>
                        <?php } ?>
                    </div>
                    <input type="submit" name="submit" value="Envoyer" class="btn btn-primary" />
                </form>
                <?php
                /* On affiche une alerte verte pour prévenir l'utilisateur que tout c'est bien passé
                 * On affiche les variables lastname firstname et title car elles contiennent la saisie de l'utilisateur si tout c'est bien passé.
                 * On a ajouté un bouton de retour au formulaire pour simplifier la navigation. */
            } else {
                ?>
                <div class="alert-success">
                    <p>Vos données ont bien été envoyées.</p>
                </div>
                <div class="jumbotron well">
                    <p>Titre : <?= $title ?></p>
                    <p>Nom : <?= $firstname ?></p>
                    <p>Prénom : <?= $lastname ?></p>
                </div>
                <a href="index.php" title="Retour vers le formulaire" class="btn btn-info">Ajouter un nouvel utilisateur.</a>
            <?php } ?>

        </div>
    </body>
</html>
