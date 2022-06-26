<h1 class="text-center my-5"><?= $title ?></h1>
<div class="container">
    <form method="post" action="" class="col-8 mx-auto">

        <?php foreach($fields as $tab): ?>
            <?php 
                if($tab['Type'] == 'datetime'):
                    $type = 'datetime-local';
            ?>
            <div class="row">
                <div class="mb-3">
                    <label for="<?= $tab['Field'] ?>" class="form-label">Date et Heure du rendez-vous</label>
                    <input id="<?= $tab['Field'] ?>" name="<?= $tab['Field'] ?>" type="<?= $type ?>" class="form-control" value="<?= ($op === 'updateR') ? $values[$tab['Field']] : ''; ?>" required>
                </div>
            </div>
            <?php else: ?>
                <select class="form-select" name="idPatients">
                    <?php foreach($patients as $patient): ?>
                        <option value="<?= $patient['id'] ?>"><?= ucwords($patient['lastname']) ?> <?= ucwords($patient['firstname']) ?></option>
                    <?php endforeach; ?>
                </select>
                
            <?php endif ?>
        <?php endforeach; ?>

        <div class="text-center my-3 mb-5">
            <button type="submit" class="btn btn-outline-dark"><?= ($op == 'updateR') ? "Modifier" : "Enregistrer"; ?></button>
        </div>

    </form>
</div>