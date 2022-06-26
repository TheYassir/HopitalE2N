<h1 class="text-center my-5">Liste des rendez-vous</h1>
<div class="container">
    <table class="table table-striped table-hover" id="listeRdv">
        <thead>
            <tr class="text-center">
                <th>IDENTIFIANT</th>
                <th>DATE ET HEURE</th>
                <th>LE PATIENT</th>
                <th>ACTION</th>
            </tr>
           
        </thead>
        <tbody>
            <?php foreach($data as $tab): ?>
                <tr class="text-center">
                    <td><?= $tab['id'] ?></td> 
                    <?php  
                        $timestamp = strtotime($tab['dateHour']); 
                        $newDate = date("d/m/Y à H:i", $timestamp ); 

                        $patient = $this->dbPatRepo->findOneById($tab['idPatients']);
                    ?>
                    <td>le <?= $newDate ?></td> 
                    <td><?= $patient['id'] ?> | <a href="?op=selectP&id=<?= $patient['id'] ?>"><?= ucwords($patient['lastname']) ?> <?= ucwords($patient['firstname']) ?></a></td> 
                    <td>
                        <a href="?op=selectR&id=<?= $tab['id'] ?>" class="btn btn-outline-primary"><i class="bi bi-eye-fill" ></i></a>
                        <a href="?op=deleteR&id=<?= $tab['id'] ?>" class="btn btn-outline-danger"><i class="bi bi-trash" onclick="return(confirm('Etes vous sur de supprimer le rendez-vous <?= $tab['id'] ?>'))"></i></a>

                    </td>
                </tr>
            <?php endforeach; ?>

        </tbody>
    </table>
    <div class="text-center my-5">
        <a href="?op=addR" class="btn btn-outline-dark"><i class="bi bi-person-plus"> Ajouter</i></a>
    </div>
</div>