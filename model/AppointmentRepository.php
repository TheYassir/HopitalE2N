<?php

namespace Model;

class AppointmentRepository
{
    private $db;
    public $table = "`appointments`";

    public function getDb()
    {
        if(!$this->db)
        {
            try
            {
                $xml = simplexml_load_file('app/config.xml');

                try
                {

                    $this->db = new \PDO("mysql:host=" . $xml->host . ";dbname=" . $xml->db, $xml->user, $xml->password, [
                        \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION
                    ]);

                }
                catch(\PDOException $e)
                {
                    echo "Message : " . $e->getMessage();
                }
            }
            catch(\Exception $e)
            {
                echo "Message : " . $e->getMessage();
            }
        }

        return $this->db;
    }
    
    public function findAll()
    {   
        $q = $this->getDb()->query("SELECT * FROM " . $this->table);
        $r = $q->fetchAll(\PDO::FETCH_ASSOC);
        return $r; 
    }

    public function findOneById(int $id)
    {
        $q = $this->getDB()->query("SELECT * FROM " . $this->table . " WHERE `id` = $id");
        $r = $q->fetch(\PDO::FETCH_ASSOC);
        return $r;
    }

    public function deleteById(int $id)
    {
        $q = $this->getDb()->query("DELETE FROM " . $this->table . " WHERE `id` = $id");
    }

    public function save()
    {
        if (isset($_GET['id'])){
            $q = $this->getDb()->query("UPDATE `appointments` SET `dateHour`='$_POST[dateHour]',`idPatients`='$_POST[idPatients]' WHERE `id`='$_GET[id]'");
        } else {
            $q = $this->getDb()->query("INSERT INTO `appointments`(`id`, `dateHour`, `idPatients`) VALUES (NULL,'$_POST[dateHour]','$_POST[idPatients]')");
        }   
    }
    
    public function save2($id)
    {
        $q = $this->getDb()->query("INSERT INTO `appointments`(`id`, `dateHour`, `idPatients`) VALUES (NULL,'$_POST[dateHour]','$id')");   
    }

    public function Getfields()
    {
        $q = $this->getDb()->query("DESC "  . $this->table);
        $r = $q->fetchAll(\PDO::FETCH_ASSOC);
        return array_splice($r, 1);
    }
}