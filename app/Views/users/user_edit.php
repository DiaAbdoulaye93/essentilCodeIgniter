<?= $this->extend("admin_template/index") ?>
<?= $this->section("content") ?>
<div class="container ml-8"><br>
    <div class="card push-top shadow mb-5 bg-white rounded">
        <div class="card-header bg-success">
            Modifier un utilisateur
        </div>
        <div class="card-body ">
            <form method="post" id="update" name="update" action="<?= site_url('/update-user') ?>">
                
                    <input type="hidden" name="id" id="id" value="<?php echo $_GET['id']; ?>">
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
                            <input class="form-check-input" type="radio" name="sex" id="inlineRadio2" value="F" <?= $user_obj['gender'] == 'F' ? 'checked' : '' ?>>
                            <label class="form-check-label" for="inlineRadio2">Femme</label>
                        </div>
                    </div>
                    <button type="button" class="btn btn-danger">Annuler</button>
                    <button type="submit" class="btn btn-success">Soumettre</button>
              
            </form>
        </div>
    </div>
</div>  
    <?= $this->endSection() ?>