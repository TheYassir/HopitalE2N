<?php

namespace Controller;

class Controller
{
    private $dbAppRepo;
    private $dbPatRepo;

    public function __construct()
    {
        $this->dbPatRepo = new \Model\PatientRepository;
        $this->dbAppRepo = new \Model\AppointmentRepository;
    }

    public function render($layout, $template, $parameters = [])
    {
        extract($parameters);

        ob_start();

        require "view/$template";

        $content = ob_get_clean(); 

        ob_start();

        require "view/$layout";

        return ob_end_flush();
    }

    public function index()
    {
        $op = isset($_GET['op']) ? $_GET['op'] : NULL;

        if($op === "readP") {
            $this->readP();
        } elseif($op === "readR"){
            $this->readR();
        } elseif($op === "deleteP"){
            $this->deleteP($_GET['id']);
        } elseif($op === "deleteR"){
            $this->deleteR($_GET['id']);
        } elseif($op === "addP" || $op ==="updateP"){
            $this->saveP($op);
        } elseif($op === "addR" || $op ==="updateR"){
            $this->saveR($op);
        } elseif($op === "selectP") {
            $id = $_GET["id"];
            $this->selectP($id);
        } elseif($op === "selectR") {
            $id = $_GET["id"];
            $this->selectR($id);
        } elseif($op === "addPatApp") {
            $this->savePatApp();
        } else {
            $this->render('layout.php', 'home.php', [
                'title' => 'Bienvenue à l\'hopital'
            ]);
        }        
    }

    public function redirect($url)
    {
        header("location: $url");
    }

    public function readP()
    {
        $data = $this->dbPatRepo->findAll();
        $this->render('layout.php', 'liste-patients.php', [
            'title' => 'Liste des Patients',
            'data' => $data,
            'fields' => $this->dbPatRepo->getfields(),
            'id' => "id" . ucfirst($this->dbPatRepo->table)
        ]);
    }

    public function selectP($id)
    {
        $data = $this->dbPatRepo->findOneById($id);
        $rdv = $this->dbAppRepo->findAll();
        
        $timestamp = strtotime($data['birthdate']); 
        $newDate = date("d/m/Y", $timestamp );

        $this->render('layout.php', 'profil-patient.php', [
            'title' => "Patient n°$id",
            'data' => $data,
            'newDate'=> $newDate,
            'rdv' => $rdv
        ]);
    }

    public function deleteP($id)
    {
        $this->dbPatRepo->deleteById($id);
        $this->redirect("/?op=readP");
    }

    public function saveP($op)
    {
        if ($op === "addP"){
            $title = "Ajout de patient";
        } elseif ($op === "updateP"){
            $title = "Modification d'un patient";
        }

        $id = isset($_GET['id']) ? $_GET['id'] : NULL;

        $values = ($op === 'updateP') ? $this->dbPatRepo->findOneById($id) : '';

        if($_POST)
        {
            $this->dbPatRepo->save();

            ($op === 'updateP') ? $this->redirect("/?op=selectP&id=$id") : $this->redirect('/?op=readP');;
        }

        $this->render('layout.php', 'ajout-patient.php', [
            'title' => "$title",
            'fields' => $this->dbPatRepo->getfields(),
            'values' => $values,
            'op' => $op
        ]);
    }

    public function readR()
    {
        $data = $this->dbAppRepo->findAll();

        $this->render('layout.php', 'liste-rendezvous.php', [
            'title' => 'Liste des rendez-vous',
            'data' => $data,
        ]);
    }

    public function deleteR($id)
    {
        $this->dbAppRepo->deleteById($id);
        $this->redirect("/?op=readR");
    }

    public function selectR($id)
    {
        $data = $this->dbAppRepo->findOneById($id);

        $timestamp = strtotime($data['dateHour']); 
        $newDate = date("d/m/Y à H:i", $timestamp );

        $patient = $this->dbPatRepo->findOneById($data['idPatients']);
        $this->render('layout.php', 'rendezvous.php', [
            'title' => "Rendez-vous n°$id",
            'data' => $data,
            'newDate' => $newDate,
            'patient' => $patient
        ]);
    }

    public function saveR($op)
    {
        if ($op === "addR"){
            $title = "Ajouter un rendez-vous";
        } elseif ($op === "updateR"){
            $title = "Modification d'un rendez-vous";
        }

        $id = isset($_GET['id']) ? $_GET['id'] : NULL;

        $values = ($op === 'updateR') ? $this->dbAppRepo->findOneById($id) : '';

        if($_POST)
        {
            $this->dbAppRepo->save();

            ($op === 'updateR') ? $this->redirect("/?op=selectR&id=$id") : $this->redirect('/?op=readR');;
        }

        $this->render('layout.php', 'ajout-rendezvous.php', [
            'title' => "$title",
            'fields' => $this->dbAppRepo->getfields(),
            'patients'=> $this->dbPatRepo->findAll(),
            'values' => $values,
            'op' => $op
        ]);
    }

    public function savePatApp()
    {
        $title = "Ajout Patient et RDV" ;

        if($_POST)
        {
            $this->dbPatRepo->save();
            
            $id = $this->dbPatRepo->lastId();
            $id = implode($id);
            $this->dbAppRepo->save2($id);

            $this->redirect('/?op=readP');;
        }

        $this->render('layout.php', 'ajout-patient-rendez-vous.php', [
            'title' => "$title",
            'colonneR' => $this->dbAppRepo->Getfields(),
            'colonneP'=> $this->dbPatRepo->Getfields(),
        ]);
    }


}