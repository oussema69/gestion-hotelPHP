<?php 
class Chambre {
    private $id;
    private $prix;
    private $categorie;
    private $etat;
    private $nbr_personne;
    private $image;
    
    public function __construct($id = null, $prix = null, $categorie = null, $etat = null, $nbr_personne = null, $image = null) {
        $this->id = $id;
        $this->prix = $prix;
        $this->categorie = $categorie;
        $this->etat = $etat;
        $this->nbr_personne = $nbr_personne;
        $this->image = $image;
    }
    
    
    // Getter and setter methods for each column
    
    public function getId() {
        return $this->id;
    }
    
    public function setId($id) {
        $this->id = $id;
    }
    
    public function getPrix() {
        return $this->prix;
    }
    
    public function setPrix($prix) {
        $this->prix = $prix;
    }
    
    public function getCategorie() {
        return $this->categorie;
    }
    
    public function setCategorie($categorie) {
        $this->categorie = $categorie;
    }
    
    public function getEtat() {
        return $this->etat;
    }
    
    public function setEtat($etat) {
        $this->etat = $etat;
    }
    
    public function getNbrPersonne() {
        return $this->nbr_personne;
    }
    
    public function setNbrPersonne($nbr_personne) {
        $this->nbr_personne = $nbr_personne;
    }
    
    public function getImage() {
        return $this->image;
    }
    
    public function setImage($image) {
        $this->image = $image;
    }
    //
    public function __selectionbyid($conn,$id){
        $sql = $conn->prepare("SELECT * FROM chambre where id=$id");
        $sql->execute();
        return $sql;

    }

    public function getAllChambres($conn, $filter = []) {
        $sql = "SELECT * FROM chambre";
        $params = [];
    
        if (isset($filter['categorie']) && !empty($filter['categorie'])) {
            $sql .= " WHERE categorie = ?";
            $params[] = $filter['categorie'];
        }
    
        if (isset($filter['prix_min']) && !empty($filter['prix_min'])) {
            if (empty($params)) {
                $sql .= " WHERE prix >= ?";
            } else {
                $sql .= " AND prix >= ?";
            }
            $params[] = $filter['prix_min'];
        }
    
        if (isset($filter['prix_max']) && !empty($filter['prix_max'])) {
            if (empty($params)) {
                $sql .= " WHERE prix <= ?";
            } else {
                $sql .= " AND prix <= ?";
            }
            $params[] = $filter['prix_max'];
        }
    
        if (isset($filter['nbr_personne']) && !empty($filter['nbr_personne'])) {
            $nbr_personne = intval($filter['nbr_personne']);
            $sql .= " WHERE nbr_personne = ?";
            $params[] = $nbr_personne;
        }
        
    
        $stmt = $conn->prepare($sql);
        $stmt->execute($params);
        return $stmt;
    }
    
    
}
?>