<?php

class database{

    protected $connector;
    protected $req;

    function __construct()
    {
        try {
            $this->connector = new PDO('mysql:host=localhost;dbname=db_nickname_corhayslip;charset=utf8', 'dbNicknameUser', '.Etml-');
        } catch (PDOException $e) {
            print("Erreur: " . $e);
            die('Erreur: ' + $e->getMessage());
        }
    }

    /*
    
    __construct() : créer un nouvel objet PDO et se connecter à la BD
    queryExecute($query) : permet de préparer et d’exécuter une requête de type simple (sans where)
    prepareExecute($query) : permet de préparer, de binder et d’exécuter une requête (select avec where ou insert, update et delete)
    fetchData($mode) : traiter les données pour les retourner par exemple en tableau associatif (avec PDO::FETCH_ASSOC)
    closeCursor() : vide le jeu d’enregistrement
    __destruct() : supprimer l’objet
    getAllTeachers() : récupère la liste de tous les enseignants de la BD
    getOneTeachers($id) : récupère la liste des informations pour 1 enseignant
    ... + tous les autres méthodes dont vous aurez besoin pour la suite (insertTeacher ... etc)

    */

    function queryExecute($query){
        $this->closeCursor();
        $this->req = $this->connector->query($query);
    }

    function prepareExecute($query, $params){
        $this->closeCursor();
        $this->req = $this->connector->prepare($query);

        //bind des paramètres
        foreach($params as $param){
            $this->req->bindValue($param["name"], $param["value"], $param["type"]);
        }

        $this->req->execute();

    }

    function fetchData($mode){
        $result = $this->req->fetchAll($mode);
        return $result;
    }

    function closeCursor(){
        if(isset($this->req)){
            $this->req->closeCursor();
        }
    }

    function __destruct()
    {
        $this->connector = null;
    }

    function getAllTeachers(){
        $this->queryExecute('SELECT t.teaName AS ln, t.teaFirstname AS fn, n.nickName AS nn FROM t_teacher t, t_nickname n WHERE t.idTeacher = n.idTeacher  ');
        return $this->fetchData(PDO::FETCH_ASSOC);
    }

    function getOneTecher($id){
        $query = "SELECT * FROM t_teacher WHERE idTeacher = :id";
        $params = array(array("name"=> "id", "value"=> $id, "type"=> PDO::PARAM_INT));

        $this->prepareExecute($query, $params);
        $this->fetchData(PDO::FETCH_ASSOC);

    }

    function getAllTeachNames(){
        $this->queryExecute('SELECT t.teaName AS ln, t.teaFirstname AS fn, n.nickName AS nn FROM t_teacher t, t_nickname n WHERE t.idTeacher = n.idTeacher  ');
        return $this->fetchData(PDO::FETCH_ASSOC);
    }

    function fetchTable(){
        $this->queryExecute('SELECT * FROM t_teacher');
        return $this->fetchData(PDO::FETCH_ASSOC);
    }

    function fetchNickTable(){
        $this->queryExecute('SELECT * FROM t_nickname');
        return $this->fetchData(PDO::FETCH_ASSOC);
    }

}

?>