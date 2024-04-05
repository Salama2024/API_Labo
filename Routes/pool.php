<?php
header('Content-Type: Application/json');
require("./Controllers/Pool.php");
$data = array();
$url = explode('/', $_SERVER['REQUEST_URI']);
// print_r($url);
$url_path1 = $url[3];
// càd localhost/TP_LABO/Api
$url_path2 = $url[4];
if ($url_path1 == "pool") {
    //get all
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        // Afficher les inscriptions
        if ($url_path2 == "get_pool") {
            $data["response"] = get_all_Pool();
            echo json_encode($data);
        } elseif ($url_path2 == "compter") {
            $data["response"] = compter_pool();
            echo json_encode($data);
        }
        // Afficher un seul 
    } elseif ($_SERVER["REQUEST_METHOD"] == "GET") {
        if ($url_path2 == "get_one") {
            $data["response"] = get_one_pool();
            echo json_encode($data);
    }
}
}
