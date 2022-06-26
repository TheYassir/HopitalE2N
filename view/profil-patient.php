<h1 class="text-center my-3 fs-2">Profil du patient</h1>
<div class="container">
    <div class="card text-center col-11 col-md-8 mx-auto border border-primary">
        <div class="card-header">
            Numéro du patient : <?= $data['id'] ?>
        </div>
        <div class="card-body border border-start-0 border-end-0 border-primary">
            <h5 class="card-title">Mr/Mme <?= ucwords($data['lastname']) ?> <?= ucwords($data['firstname']) ?></h5>
            <p class="card-text">Né(e) le <?= $newDate ?></p>
            <div class="d-flex justify-content-around">
                <p class="card-text"> Téléphone : <?= $data['phone'] ?></p>
                <p class="card-text"> Email : <?= $data['mail'] ?></p>
            </div>
        </div>
        <div class="card-footer text-muted">
            <a href="?op=updateP&id=<?=$data['id']?>" class="btn btn-outline-primary">Modifier</a>
        </div>
    </div>

    <div class="d-flex justify-content-around my-4 row">
        <?php foreach($rdv as $tab): 
            if($tab['idPatients'] === $data['id']):
                $exist = true;
                $timestamp = strtotime($tab['dateHour']); 
                $newD = date("d/m/Y à H:i", $timestamp );
            ?>
                <div class="card text-center col-5 col-md-3 border border-success my-4">
                    <div class="card-header">
                        Rdv n°<?= $tab['id'] ?> 
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Rendez-vous le <?= $newD ?></h5>
                    </div>
                    <div class="card-footer text-muted">
                        <a href="/?op=selectR&id=<?= $tab['id'] ?>" class="btn btn-primary">Voir</a>
                    </div>
                </div>
             <?php endif; ?>
        <?php endforeach; ?>
    </div>
</div>