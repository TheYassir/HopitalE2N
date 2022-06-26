<h1 class="text-center my-5">Liste des patients</h1>
<div class="container">
    <table class="table table-striped table-hover" id="listePatient">
        <thead>
            <tr class="text-center">
                <th>ID</th>
                <?php foreach($fields as $colonne): ?>
                    <th><?= strtoupper($colonne['Field']); ?></th>
                <?php endforeach; ?>
                <th>ACTION</th>
            </tr>
           
        </thead>
        <tbody>
            <?php foreach($data as $tab): ?>
                <tr class="text-center">
                    <td><?= implode('</td><td>',$tab); ?></td> 
                    <td>
                        <a href="?op=selectP&id=<?= $tab['id'] ?>" class="btn btn-outline-primary"><i class="bi bi-eye-fill" ></i></a>
                        <a href="?op=deleteP&id=<?= $tab['id'] ?>" class="btn btn-outline-danger"><i class="bi bi-trash" onclick="return(confirm('Etes vous sur de supprimer le patient <?=$tab['id'];?>'))"></i></a>
                    </td>
                </tr>
            <?php endforeach; ?>

        </tbody>
    </table>
    <div class="text-center my-5">
        <a href="?op=addP" class="btn btn-outline-dark"><i class="bi bi-person-plus"> Ajouter</i></a>
    </div>
</div>