<h1 class="text-center my-5"><?= $title ?></h1>
<div class="container">
    <form method="post" action="" class="col-8 mx-auto">

        <?php foreach($fields as $tab): ?>
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
                    <input id="<?= $tab['Field'] ?>" name="<?= $tab['Field'] ?>" type="<?= $type ?>" class="form-control" value="<?= ($op === 'updateP') ? $values[$tab['Field']] : ''; ?>" required>
                </div>
            </div>
        <?php endforeach; ?>

        <div class="text-center my-3 mb-5">
            <button type="submit" class="btn btn-outline-dark"><?= ($op == 'updateP') ? "Modifier" : "Enregistrer"; ?></button>
        </div>

    </form>
</div>