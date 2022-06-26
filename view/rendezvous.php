<div class="container my-3 d-flex justify-content-around" >
    <div class="card text-center col-8 border border-success">
        <div class="card-header">
        Numéro du rendez-vous : <?= $data['id'] ?>
        </div>
        <div class="card-body border border-start-0 border-end-0 border-success">
            <h5 class="card-title my-4">Rendez-vous le <?= $newDate ?></h5>
            <div class="d-flex justify-content-around">
                <p>Patient :</p>
                <a href="/?op=selectP&id=<?=$patient['id']?>" class="card-text">
                    <p class="card-text"><?= $patient['lastname']?> <?= $patient['firstname'] ?></p>
                </a>
            </div>

        </div>
        <div class="card-footer text-muted">
            <a href="?op=updateR&id=<?=$data['id']?>" class="btn btn-outline-success">Modifier</a>
        </div>
    </div>
</div>