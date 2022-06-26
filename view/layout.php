<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> <?= $title ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css"> 
    <!-- CDN DATATABLE -->
    <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
    <script type="text/javascript" language="javascript" src="/js/dataTable.js"></script>
    <!-- CDN DATATABLE -->
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <header>
      <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="/">Accueil</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="?op=readP">Patients</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="?op=readR">Rendez-vous</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="?op=addPatApp">Ajout Patient + RDV</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>
    <main class="mt-3" style="min-height: 83vh;">
      <?= $content ?>
    </main>
    <footer class="bg-black text-white text-center" style="height: 8vh; margin: 0 auto;">
      &copy;  2021 Yassir ARAS pour Wild Code School
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>