<?php

require_once("./Config.php");
class Pool
{
    public $response = array();

    // AFFICHER TOUT
    public static function get_all_Pool()
    {
        $data = get_connection();
        $donnees = $data->query("SELECT * FROM fraisview")->fetchAll();
        // ORDER BY Promotion DESC
        if (count($donnees) > 0) {
            return $donnees;
        } else {
            $response["message"] = "Aucune donnée disponible";
            return $response;
        }
    }

    // COMPTER TOUTES LES INSCRIPTIONS SE TROUVANT DANS LA BASE DE DONNEES
    public static function compter_Pool()
    {
        $data = get_connection();
        $donnees = $data->query("SELECT COUNT(id) as total FROM fraisview")->fetchAll();
        if (count($donnees) > 0) {
            return $donnees;
        } else {
            $response["message"] = "Aucune donnée disponible";
            return $response;
        }
    }

    // SELECTIONNER UN 
    public static function get_one_Pool($id)
    {
        $data = get_connection();
        $donnees = $data->query("SELECT * FROM fraisview WHERE desOption='$id'")->fetchAll();
        if (count($donnees) > 0) {
            return $donnees;
        } else {
            $response["message"] = "Aucune donnée disponible";
            return $response;
        }
    }

    // DENIER ENREGISTREMENT
    public static function get_last()
    {
        $data = get_connection();
        $donnees = $data->query("SELECT * FROM fraisview ORDER BY desOption DESC LIMIT 1")->fetchAll();
        if (count($donnees) > 0) {
            return $donnees;
        }
    }
}
