<?php

/**
 * ETML
 * Auteur : Cindy Hardegger
 * Date: 22.01.2019
 * Controler pour gérer les pages classiques
 * 
 * Version 2.0
 * Auteur: CHP
 * Date: 19.11.2019
 * Description: Adatation du site au projet 042-GesProj2
 * 
 */

include_once 'model/database.php';

class HomeController extends Controller
{

    /**
     * Dispatch current action
     *
     * @return mixed
     */
    public function display()
    {
        if (isset($_POST["action"])) {
            $action = $_POST['action'] . "Action";
        } else {
            $action = "listAction";
        }

        return call_user_func(array($this, $action));
    }

    /**
     * Display Index Action
     *
     * @return string
     */
    private function indexAction()
    {

        $view = file_get_contents('view/page/home/index.php');

        ob_start();
        eval('?>' . $view);
        $content = ob_get_clean();

        return $content;
    }

    /**
     * Rechercher les données et les passe à la vue (en liste)
     *
     * @return string
     */
    private function listAction()
    {

        // Instancie le modèle et va chercher les informations
        $db = new database();

        //table est le nom des boutons submit qui ont chacun une valeure différente (voir view/menu.php)
        if (isset($_POST["table"])) {

            switch ($_POST["table"]) {
                case 'fetchConsByPrint':
                    $table = $db->fetchConsByPrint();
                    break;

                case 'fetchConsByCons':
                    $table = $db->fetchConsByCons();
                    break;

                case 'fetchFastest':
                    $table = $db->fetchFastest();
                    break;

                case 'fetchBestResolution':
                    $table = $db->fetchBestResolution();
                    break;

                case 'fetchByBrand':
                    if (!isset($_POST["brandNames"]) || empty($_POST["brandNames"])) {
                        $_POST["brandNames"] = "Epson";
                    }
                    $table = $db->fetchByBrand($_POST["brandNames"]);
                    break;

                case 'fetchByPriceEvo':
                    if (!isset($_POST["brandNames"]) || empty($_POST["brandNames"])) {
                        $_POST["brandNames"] = "Epson";
                    }
                    $table = $db->fetchByPriceEvo($_POST["brandNames"]);
                    break;

                case 'fetchByBrandPrice':
                    if (!isset($_POST["brandNames"]) || empty($_POST["brandNames"])) {
                        $_POST["brandNames"] = "Epson";
                    }
                    $table = $db->fetchByBrandPrice($_POST["brandNames"]);
                    break;

                case 'filter':
                    if (!isset($_POST["spec"]) || empty($_POST["spec"])) {
                        $_POST["spec"] = "weight";
                    }

                    if (!isset($_POST["order"]) || empty($_POST["order"])) {
                        $_POST["order"] = "<";
                    }

                    $table = $db->fetchFilteredSpecs($_POST["spec"], $_POST["order"]);
                break;

                case 'fetchBestSales':
                    $table  = $db->fetchBestSales();
                break;


                default:
                    $table = $db->fetchBestSales();
                    break;
            }
        } else {
            $table = $db->fetchBestSales();
        }


        // Charge le fichier pour la vue
        $view = file_get_contents('view/page/home/table.php');


        // Pour que la vue puisse afficher les bonnes données, il est obligatoire que les variables de la vue puisse contenir les valeurs des données
        // ob_start est une méthode qui stoppe provisoirement le transfert des données (donc aucune donnée n'est envoyée).
        ob_start();
        // eval permet de prendre le fichier de vue et de le parcourir dans le but de remplacer les variables PHP par leur valeur (provenant du model)
        eval('?>' . $view);
        // ob_get_clean permet de reprendre la lecture qui avait été stoppée (dans le but d'afficher la vue)
        $content = ob_get_clean();

        return $content;
    }
}
