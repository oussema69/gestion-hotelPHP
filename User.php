<?php
require 'connection.php';
class User {
    public $id;
    public $nom;
    public $prenom;
    public $email;
    public $password;
    public $telephone;
    public $role;
    public $image;


    public function __construct($id = null, $nom = null, $prenom = null, $email = null, $password = null, $telephone = null, $role = null,$image=null) {
        $this->id = $id;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->email = $email;
        $this->password = $password;
        $this->telephone = $telephone;
        $this->role = $role;
        $this->role = $image;

    }

    

    public function getId() {
        return $this->id;
    }

    public function getNom() {
        return $this->nom;
    }

    public function getPrenom() {
        return $this->prenom;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getTelephone() {
        return $this->telephone;
    }
    public function getRole() {
        return $this->role;
    }
    public function getIole() {
        return $this->image;
    }

    public function __selection($conn){
        $sql = $conn->prepare("SELECT * FROM user where role=1");
        $sql->execute();
        return $sql;

    }


    public function __selectionClient($conn){
        $sql = $conn->prepare("SELECT * FROM user where role=2");
        $sql->execute();
        return $sql;

    }


    
    public function insert($conn) {
        $st = $conn->prepare("INSERT INTO user (nom, prenom, email, password, telephone,role,image) VALUES (?, ?, ?, ?, ?,?,?)");
        
        $st->execute(array($this->nom, $this->prenom, $this->email, $this->password, $this->telephone,$this->role,$this->image));
    }

    public function __selectionbyid($conn,$id){
        $sql = $conn->prepare("SELECT * FROM user where id=$id");
        $sql->execute();
        return $sql;

    }


    public function __selectionbyidClient($conn,$id){
        $sql = $conn->prepare("SELECT * FROM user where id=$id and role=1");
        $sql->execute();
        return $sql;

    }
    public function __selectionbyemailClient($conn, $email){
        $sql = $conn->prepare("SELECT * FROM user WHERE email = :email");
        $sql->bindParam(':email', $email);
        $sql->execute();
        return $sql;
    }
    



    public function update ($conn,$id){
        $st=$conn->prepare("update user set nom=?,prenom=?,email=?,password=?,telephone=? where id=$id");
        $st->execute(array($this->nom,$this->prenom,$this->email,$this->password,$this->telephone));
    }
    public function delete ($conn,$id){
        $st=$conn->prepare("delete from user where id=$id");
        $st->execute();


        
    }

   
}


?>