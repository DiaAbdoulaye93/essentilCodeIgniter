<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=yes">
    <title>Codeigniter 4 Crud Application</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<!--  -->
</head>

<body>
    <div class="container">

        <h2 class="text-center mt-4 mb-4">Liste des utilisitateurs</h2>

        <?php

        $session = \Config\Services::session();

        if ($session->getFlashdata('success')) {
            echo '
            <div class="alert alert-success">' . $session->getFlashdata("success") . '</div>
            ';
        }

        ?>
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col text-right">
                         <button type="button" class="btn mb-2  bg-success text-light" data-toggle="modal" data-target="#addModal">Nouvel utilisitateurs <i class="fa fa-user-plus"></i></button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered" id="userliste">
                        <tr>

                            <th>Nom</th>
                            <th>Email</th>
                            <th>Sexe</th>
                            <th>Action</th>
                        </tr>
                        <?php
                        if ($user_tabl) {
                            foreach ($user_tabl as $user) {
                                echo '
                                <tr>
                                 
                                    <td>' . $user["name"] . '</td>
                                    <td>' . $user["email"] . '</td>
                                    <td>' . $user["gender"] . '</td>
                                    <td> <a href="" class="btn btn-outline-success btn-sm"><i class="fa fa-pencil"></i></a>
                                    <a href="" class="btn btn-outline-danger btn-sm"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>';
                            }
                        }
                        ?>
                    </table>
                </div>
                <div>
                    <?php

                    if ($pagination_link) {
                        $pagination_link->setPath('liste');

                        echo $pagination_link->links();
                    }

                    ?>
                </div>
            </div>
        </div>

    </div>
    <!-- Modal Add Product-->

    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-center" id="exampleModalLabel">Ajouter un utilisateur </h4>
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
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                        <button type="submit" class="btn btn-success">Ajouter</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>
<style>
    .pagination li a {
        position: relative;
        display: block;
        padding: .5rem .75rem;
        margin-left: -1px;
        line-height: 1.25;
        color: #007bff;
        background-color: #fff;
        border: 1px solid #dee2e6;
    }

    .pagination li.active a {
        z-index: 1;
        color: #fff;
        background-color: #007bff;
        border-color: #007bff;
    }
</style>