<?php
class Reserver {
    public $id;
    public $id_client; // should reference the Client class
    public $id_chambre; // should reference the Chambre class
    public $date_deb;
    public $date_fin;

    function __construct($id=null, $id_client=null, $id_chambre=null, $date_deb=null, $date_fin=null) {
        $this->id = $id;
        $this->id_client = $id_client;
        $this->id_chambre = $id_chambre;
        $this->date_deb = $date_deb;
        $this->date_fin = $date_fin;
    }
    public function insert($conn) {
        $st = $conn->prepare("INSERT INTO reserver (id_client, id_chambre, date_deb,date_fin) VALUES (?, ?, ?, ?)");
        
        $st->execute(array($this->id_client, $this->id_chambre, $this->date_deb, $this->date_fin));
    }
}
?>