<form action="" method="post" class="container row justify-content-between mx-auto my-5">
    <div class="col-6">
        <h2 class="text-center mb-3">Formulaire du nouveau patient</h2>
        <?php foreach($colonneP as $tab): ?>
            <?php
                if($tab['Type'] == 'date')
                    $type = 'date';
                elseif(substr($tab['Type'],0 ,3) == 'int')
                    $type = 'number';
                else
                    $type = 'text';
            ?>

            <div class="row">
                <div class="mb-3">
                    <label for="<?= $tab['Field'] ?>" class="form-label"><?= ucwords($tab['Field']) ?></label>
                    <input id="<?= $tab['Field'] ?>" name="<?= $tab['Field'] ?>" type="<?= $type ?>" class="form-control" required>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <div class="col-4">
        <h2 class="text-center">Formulaire du nouveau rendez-vous</h2>

        <div class="my-3">
            <label for="dateHour" class="form-label">Date et Heure du rendez-vous</label>
            <input id="dateHour" name="dateHour" type="datetime-local" class="form-control" required>
        </div>
    </div>
    <div class="text-center">
        <button type="submit" class="col-3 btn btn-outline-dark my-3">Enregistrer</button>
    </div>
</form>