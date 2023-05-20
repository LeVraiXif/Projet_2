<?php include "assets/database/profil.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <head>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


</head>

    <title>Document</title>
</head>
<body>
    <?php
    if ($_SESSION['role'] === 'admin') {
        echo "<a href='#' class='toggle-ban-user' data-id='{$user_id}' data-banned='{$banned}' data-firstname='{$first_name}'>" . ($banned ? 'Débannir' : 'Bannir') . " cet utilisateur</a>";
    }
    ?>
    <!-- Modal de confirmation -->
<div class="modal" tabindex="-1" role="dialog" id="confirmationModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Confirmation</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p id="confirmationText"></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" id="confirmToggleBan">Oui</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Non</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal de succès -->
<div class="modal" tabindex="-1" role="dialog" id="successModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <5 class="modal-title">Succès</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">×</span>
</button>
</div>
<div class="modal-body">
<p id="successText"></p>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
</div>
</div>

  </div>
</div>

<div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card mt-5">
                    <div class="card-header">
                        Profil utilisateur
                    </div>
                    <div class="card-body">
                        <h5 class="card-title" id="userFullName">Nom et Prénom</h5>
                        <div class="mb-3">
                            <label for="userBio" class="form-label">À propos de vous :</label>
                            <textarea class="form-control" id="userBio" rows="3"></textarea>
                        </div>
                        <button type="button" class="btn btn-primary">Enregistrer</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

    <script src="assets/js/profil.js"></script>
</body>

</html>
