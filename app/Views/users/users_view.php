<?= $this->extend("admin_template/index") ?>
<?= $this->section("content") ?>
<div class="container">

    <h2 class="text-center mt-4 mb-4">Liste des utilisitateurs</h2>

    <?php

    $session = \Config\Services::session();
    ?><script>
        $(function() {
            <?php if (session()->has("success")) { ?>
                Swal.fire({
                    icon: 'success',
                    title: 'Great!',
                    text: '<?= session("success") ?>'
                })
            <?php } if (session()->has("error")){ ?>
                 Swal.fire({
                    icon: 'error',
                    title: 'Oups!',
                    text: '<?= session("error") ?>'
                })
                <?php }?>
        });
    </script>
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col text-right">
                     <button type="button" class="btn mb-2  bg-success text-light" data-toggle="modal" data-target="#addModal">Nouvel utilisitateur <i class="fa fa-user-plus"></i></button>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered" id="userliste">
                    <thead>
                        <tr>

                            <th>Nom</th>
                            <th>Email</th>
                            <th>Sexe</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($user_table) {
                            foreach ($user_table as $user) {
                                echo '
                                <tr>
                                 
                                    <td>' . $user["name"] . '</td>
                                    <td>' . $user["email"] . '</td>
                                    <td>' . $user["gender"] . '</td>
                                    <td> <a href="/edituser?id=' . $user['id'] . '"  class="btn btn-outline-success btn-sm"><i class="fa fa-pencil"></i></a>
                                    <a  href="delete/' . $user['id'] . '" class="btn btn-outline-danger btn-sm"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>';
                            }
                        }
                        ?>
                    </tbody>
                </table>
                <tfoot class="bg-primary" style="background-color:red">
                    <div class="float-right"><?php

                                                if ($pagination_link) {
                                                    $pagination_link->setPath('liste');

                                                    echo $pagination_link->links();
                                                }
                                                ?>
                    </div>
                </tfoot>
            </div>

        </div>
    </div>
</div>

</div>
<!-- Modal Add Product-->

<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h4 class="modal-title text-center text-light" id="exampleModalLabel">Ajouter un utilisateur </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" id="addname" name="addname" action="<?= site_url('/adduser') ?>">
                <div class="modal-body">

                    <div class="form-group">
                        <label>Nom Prénom</label>
                        <input type="text" class="form-control" name="nom" placeholder="Salif Fall">
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control" name="email" placeholder="lazy@hotmail.com">
                    </div>
                    <div class="form-group">
                        <label>Sex</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="sex" id="inlineRadio1" value="H">
                            <label class="form-check-label" for="inlineRadio1">Homme</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="sex" id="inlineRadio2" value="F">
                            <label class="form-check-label" for="inlineRadio2">Femme</label>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn bg-danger text-light" data-dismiss="modal">Fermer</button>
                    <button type="submit" class="btn bg-success text-light">soumettre</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
<!-- <style>
    .pagination li a {
        position: relative;
        display: block;
        padding: .5rem .75rem;
        margin-left: -1px;
        line-height: 1.25;
        color: #4ebfa6;
        background-color: #fff;
        border: 1px solid #dee2e6;
    }

    .pagination li.active a {
        z-index: 1;
        color: #fff;
        background-color: #4ebfa6;
        border-color: #4ebfa6;
    }
</style> -->