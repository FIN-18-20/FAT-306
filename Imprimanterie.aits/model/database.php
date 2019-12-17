<?php

class database{

    protected $connector;
    protected $req;

    function __construct()
    {
        try {
            $this->connector = new PDO('mysql:host=localhost;dbname=printer;charset=utf8', 'root', 'root');
        } catch (PDOException $e) {
            print("Erreur: " . $e);
            die('Erreur: ' + $e->getMessage());
        }
    }

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

    function fetchTable(){
        $this->queryExecute('SELECT * FROM t_printer');
        return $this->fetchData(PDO::FETCH_ASSOC);
    }

    function fetchBrandTable(){
        $this->queryExecute('SELECT * FROM t_brand');
        return $this->fetchData(PDO::FETCH_ASSOC);
    }

    function fetchByBrand($braName){
        $query="SELECT t_brand.braName AS 'Marque', t_printer.priModel AS 'Modèle', t_printer.priPrice AS 'Prix (chf)', t_printer.priSpeedColor AS 'Vitesse d\'impression couleur (ppm)', t_printer.priSpeedBW AS 'Vitesse d\'impression NB (ppm)', t_printer.priResolutionX AS 'Résolution Scanner (dpi)', t_printer.priDoubleSided AS 'Recto/verso', t_printer.priHeight AS 'Hauteur (mm)', t_printer.priDepth AS 'Profondeur (mm)', t_printer.priWidth AS 'Largeur (mm)', t_printer.priWeight AS 'Poids (kg)', t_printer.priDate AS 'Date'
        FROM t_printer
        RIGHT JOIN t_brand ON t_printer.idBrand = t_brand.idBrand
        WHERE t_brand.braName = :braName
        ORDER BY t_brand.braName ASC;";

        $params = array(array("name"=> "braName", "value"=> $braName, "type"=> PDO::PARAM_STR));

        $this->prepareExecute($query, $params);
        return $this->fetchData(PDO::FETCH_ASSOC);
    }

    function fetchByBrandModel($braName){
        $query="SELECT t_manufacturer.manName AS 'Constructeur', t_printer.priModel AS 'Modèle'
        FROM t_printer RIGHT JOIN t_brand ON t_printer.idBrand = t_brand.idBrand RIGHT JOIN t_manufacturer ON t_brand.idManufacturer = t_manufacturer.idManufacturer
        WHERE t_manufacturer.manName = :braName
        ORDER BY t_manufacturer.manName ASC";

        $params = array(array("name"=> "braName", "value"=> $braName, "type"=> PDO::PARAM_STR));

        $this->prepareExecute($query, $params);
        return $this->fetchData(PDO::FETCH_ASSOC);
    }

    function fetchByBrandPrice($braName){
        $query="SELECT t_manufacturer.manName AS 'Constructeur', t_printer.priModel AS 'Modèle', t_printer.priPrice AS 'Prix (chf)', t_brand.braName AS 'Marque'
        FROM t_printer
        RIGHT JOIN t_brand ON t_printer.idBrand = t_brand.idBrand
        RIGHT JOIN t_manufacturer ON t_brand.idManufacturer = t_manufacturer.idManufacturer
        WHERE t_manufacturer.manName = :braName
        ORDER BY t_manufacturer.manName ASC";

        $params = array(array("name"=> "braName", "value"=> $braName, "type"=> PDO::PARAM_STR));

        $this->prepareExecute($query, $params);
        return $this->fetchData(PDO::FETCH_ASSOC);
    }

    function fetchConsByPrint(){
        $query="SELECT t_printer.priModel AS 'Modèle', t_consumable.conModel AS 'Cartouche', t_consumable.conPrice AS 'Prix (CHF)'
        FROM t_printer
        RIGHT JOIN uses ON t_printer.idPrinter = uses.idPrinter
        RIGHT JOIN t_consumable ON uses.idConsumable = t_consumable.idConsumable
        ORDER BY t_printer.priModel ASC;";

        $this->queryExecute($query);
        return $this->fetchData(PDO::FETCH_ASSOC);
    }

    function fetchConsByCons(){
        $query="SELECT t_printer.priModel AS 'Modèle', t_consumable.conModel AS 'Cartouche'
        FROM t_printer
        RIGHT JOIN uses ON t_printer.idPrinter = uses.idPrinter
        RIGHT JOIN t_consumable ON uses.idConsumable = t_consumable.idConsumable
        ORDER BY t_printer.priModel ASC;";

        $this->queryExecute($query);
        return $this->fetchData(PDO::FETCH_ASSOC);
    }

    function fetchBestResolution(){
        $query="SELECT t_printer.priModel AS 'Modèle', t_printer.priResolutionX AS 'Résolution Scanner'
        FROM t_printer
        ORDER BY t_printer.priResolutionX DESC;";

        $this->queryExecute($query);
        return $this->fetchData(PDO::FETCH_ASSOC);
    }

    function fetchFastest(){
        $query="SELECT t_printer.priModel AS 'Modèle', t_printer.priSpeedBW AS 'Vitesse d\'impression NB (ppm)', t_printer.priSpeedColor AS 'Vitesse d\'impression couleur (ppm)'
        FROM t_printer
        ORDER BY t_printer.priSpeedBW DESC;";

        $this->queryExecute($query);
        return $this->fetchData(PDO::FETCH_ASSOC);
    }

    function fetchFilteredSpecs($spec, $direction){

        //switch pour Croissant/Décroissant
        switch($direction){
            case '<':
                $order = 'ASC';
            break;

            case '>':
                $order = 'DESC';
            break;

            default:
            $order = 'ASC';
        }

        //switch pour le spec
        switch($spec){
            case 'weight':
                $query = "SELECT priModel AS 'Modèle',priPrice AS 'Prix',priSpeedColor AS 'Vitesse d\'impression couleurs',priSpeedBW AS 'Vitesse d\'impression noir et blanc',priResolutionX AS 'Resolution scanner',priDoubleSided AS 'Recto-verso',priHeight AS 'Hauteur',priDepth AS 'Profondeur',priWidth AS 'Largeur',priWeight AS 'Poids',priDate AS 'Date' FROM t_printer ORDER BY t_printer.priWeight";
                $query .= " $order;";
            break;

            case 'height':
                $query = "SELECT t_printer.priModel AS 'Modele', (t_printer.priHeight*t_printer.priWidth*t_printer.priDepth / 1000) AS 'Taille (cm3)' FROM t_printer ORDER BY (t_printer.priHeight*t_printer.priWidth*t_printer.priDepth / 1000)";
                $query .= " $order;";
            break;

            case 'price':
                $query = "SELECT priModel AS 'Modèle',priPrice AS 'Prix' FROM t_printer ORDER BY Prix ";
                $query .= $order;
                //utile que pour suivre à la lettre le CDC
                //$query .= " LIMIT 3;";
            break;

            default:
            $query = "SELECT priModel AS 'Modèle',priPrice AS 'Prix',priSpeedColor AS 'Vitesse d\'impression couleurs',priSpeedBW AS 'Vitesse d\'impression noir et blanc',priResolutionX AS 'Resolution scanner',priDoubleSided AS 'Recto-verso',priHeight AS 'Hauteur',priDepth AS 'Profondeur',priWidth AS 'Largeur',priWeight AS 'Poids',priDate AS 'Date' FROM t_printer ORDER BY t_printer.priWeight";
            $query .= " $order;";
        break;

            }

            //retour de la requête
            $this->queryExecute($query);
            return $this->fetchData(PDO::FETCH_ASSOC);
    }


}

?>