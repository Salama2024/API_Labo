<?php

require_once("./Config.php");

class Frais
{
    public $response = array();

    public static function Enregistrer_Frais($desFrais)
    {
        $data = get_connection();
        $response = array(); // Définir $response comme un tableau
        if ($data->query("INSERT INTO frais (desFrais) VALUES ('$desFrais')")) {
            $response["message"] = "Enregistrement réussi";
            $response["Dernier_Enregistrement"] = self::get_last();
            return $response;
        } else {
            $response["message"] = "Échec d'enregistrement";
            return $response;
        }
    }

    public static function Supprimer_Frais($id)
    {
        $data = get_connection();
        $response = array(); // Définir $response comme un tableau
        if ($data->query("DELETE FROM frais WHERE id = '$id'")) {
            $response["message"] = "Suppression réussie";
            return $response;
        } else {
            $response["message"] = "Échec de suppression";
            return $response;
        }
    }

    public static function Modifier_Frais($id, $desFrais)
    {
        $data = get_connection();
        $response = array(); // Définir $response comme un tableau
        if ($data->query("UPDATE frais SET desFrais = '$desFrais' WHERE id = '$id'")) {
            $response["message"] = "Modification réussie";
            return $response;
        } else {
            $response["message"] = "Échec de modification";
            return $response;
        }
    }

    public static function get_all_Frais()
    {
        $data = get_connection();
        $donnees = $data->query("SELECT * FROM frais ORDER BY id DESC")->fetchAll();
        if (count($donnees) > 0) {
            return $donnees;
        } else {
            $response["message"] = "Aucune donnée disponible";
            return $response;
        }
    }

    public static function compter_frais()
    {
        $data = get_connection();
        $donnees = $data->query("SELECT COUNT(id) as total FROM frais")->fetchAll();
        if (count($donnees) > 0) {
            return $donnees;
        } else {
            $response["message"] = "Aucune donnée disponible";
            return $response;
        }
    }

    public static function get_one_frais($id)
    {
        $data = get_connection();
        $donnees = $data->query("SELECT * FROM frais WHERE id='$id'")->fetchAll();
        if (count($donnees) > 0) {
            return $donnees;
        } else {
            $response["message"] = "Aucune donnée disponible";
            return $response;
        }
    }

    public static function get_last()
    {
        $data = get_connection();
        $donnees = $data->query("SELECT * FROM frais ORDER BY id DESC LIMIT 1")->fetchAll();
        if (count($donnees) > 0) {
            return $donnees;
        }
    }
}
