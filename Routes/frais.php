<?php
header('Content-Type: Application/json');
require("./Controllers/Frais.php");
$data = array();
$url = explode('/', $_SERVER['REQUEST_URI']);
// print_r($url);
$url_path1 = $url[3];
// càd localhost/TP_LABO/Api
$url_path2 = $url[4];
if ($url_path1 == "frais") {
    //get all
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        // Afficher les Frais
        if ($url_path2 == "get_frais") {
            $data["response"] = get_all_frais();
            echo json_encode($data);
        } elseif ($url_path2 == "compter") {
            $data["response"] = compter_frais();
            echo json_encode($data);
        }
        // Afficher un seul Etudiant
    } elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
        if ($url_path2 == "get_one") {
            $data["response"] = get_one_frais();
            echo json_encode($data);
            // Enregistrement
        } elseif ($url_path2 == "enregistrer") {
            $data["response"] =Enregistrer_Frais();
            echo json_encode($data);
            // Modification
        } elseif ($url_path2 == "modifier") {
            $data["response"] = Modifier_Frais();
            echo json_encode($data);
            //Suppressions
        } elseif ($url_path2 == "supprimer") {
            $data["response"] = Supprimer_Frais();
            echo json_encode($data);
        }
    }
}
