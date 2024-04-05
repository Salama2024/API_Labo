<?php

require_once("./Config.php");

class Fix
{
    public $response = array();
    public static function enregistrer_Fix($idOpt, $idProm, $idFrais, $idAnnee, $montant)
    {
        $data = get_connection();
        $response = array(); // Définir $response comme un tableau
        if ($data->query("INSERT INTO fixation_frais(idOpt, idProm, idFrais, idAnnee, montant) VALUES ('$idOpt', '$idProm', '$idFrais', '$idAnnee', '$montant')")) {
            $response["message"] = "Enregistrement réussi";
            $response["Dernier_Enregistrement"] = self::get_last();
            return $response;
        } else {
            $response["message"] = "Échec d'enregistrement";
            return $response;
        }
    }

    // SUPPRIMER FRAIS
    public static function Supprimer_Fix($id, $idOpt, $idProm, $idFrais, $idAnnee)
    {
        $data = get_connection();
        $response = array(); // Initialisez $response
        if ($data->query("DELETE FROM fixation_frais WHERE id = '$id' AND idOpt = '$idOpt' AND idProm = '$idProm' AND idFrais = '$idFrais' AND idAnnee = '$idAnnee'")) {
            $response["message"] = "Suppression reussie";
            return $response;
        } else {
            $response["message"] = "Echec de suppression";
            return $response;
        }
    }

    // MODIFIER INSC
    public static function Modifier_Fix($id, $idOpt, $idProm, $idFrais, $idAnnee, $montant)
    {
        $data = get_connection();
        $response = array(); // Définir $response comme un tableau
        if ($data->query("UPDATE fixation_frais SET idOpt = '$idOpt', idProm='$idProm', idFrais='$idFrais',idAnnee='$idAnnee', montant='$montant' WHERE id = '$id' AND idOpt = '$idOpt' AND idProm = '$idProm' AND idFrais = '$idFrais' AND idAnnee = '$idAnnee'")) {
            $response["reussite"] = "Modification reussie";
            return $response;
        } else {
            $response["message"] = "Echec d'enregisrement";
            return $response;
        }
    }

    // AFFICHER TOUT LES FRAIS FIXES
    public static function get_all_Fix()
    {
        $data = get_connection();
        $donnees = $data->query("SELECT * FROM fixation_frais ORDER BY id DESC")->fetchAll();
        if (count($donnees) > 0) {
            return $donnees;
        } else {
            $response["message"] = "Aucune donnée disponible";
            return $response;
        }
    }

    // COMPTER LES FIXATIONS SE TROUVANT DANS LA BASE DE DONNEES
    public static function compter_fix()
    {
        $data = get_connection();
        $donnees = $data->query("SELECT COUNT(id) as total FROM fixation_frais")->fetchAll();
        if (count($donnees) > 0) {
            return $donnees;
        } else {
            $response["message"] = "Aucune donnée disponible";
            return $response;
        }
    }

    // SELECTIONNER UNE SEULE FIXATION
    public static function get_one_fix($id)
    {
        $data = get_connection();
        $donnees = $data->query("SELECT * FROM fixation_frais WHERE id='$id'")->fetchAll();
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
        $donnees = $data->query("SELECT * FROM fixation_frais ORDER BY id DESC LIMIT 1")->fetchAll();
        if (count($donnees) > 0) {
            return $donnees;
        }
    }
}
