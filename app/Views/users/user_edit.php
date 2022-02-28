<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edit user</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>

    <div class="card push-top container col-md-6 ml-6">
        <div class="card-header bg-success">
            Modifier un utilisateur
        </div>
        <div class="card-body container">
            <form method="post" id="update" name="update" action="<?= site_url('/update-user') ?>">
                <div class="container col-md-6">
                <input type="hidden" name="id" id="id" value="<?php echo $user_obj['id']; ?>">
                    <div class="form-group">
                        <label>Nom Prénom</label>
                        <input type="text" class="form-control" name="name" placeholder="Salif Fall" value="<?php echo $user_obj['name']; ?>">
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control" name="email" placeholder="lazy@hotmail.com" value="<?php echo $user_obj['email']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Sex</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="sex" id="inlineRadio1" value="H" <?= $user_obj['gender'] == 'H' ? 'checked' : '' ?>>
                            <label class="form-check-label" for="inlineRadio1">Homme</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="sex" id="inlineRadio2" value="F"  <?= $user_obj['gender'] == 'F' ? 'checked' : '' ?>>
                            <label class="form-check-label" for="inlineRadio2">Femme</label>
                        </div>
                    </div>
                    <button type="button" class="btn btn-danger">Annuler</button>
                    <button type="submit" class="btn btn-success">Soumettre</button>
                </div>
            </form>
        </div>
</body>

</html>