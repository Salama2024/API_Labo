<?php
require_once("./Models/Fix.php");
//enregistrement
$retour = array();
function Enregistrer_Fix()
{
    $idOpt = isset($_POST["idOpt"]) ? $_POST["idOpt"] = htmlspecialchars($_POST["idOpt"]) : $_POST["idOpt"] = trim($_POST["idOpt"]);
    $idProm = isset($_POST["idProm"]) ? $_POST["idProm"] = htmlspecialchars($_POST["idProm"]) : $_POST["idProm"] = trim($_POST["idProm"]);
    $idFrais = isset($_POST["idFrais"]) ? $_POST["idFrais"] = htmlspecialchars($_POST["idFrais"]) : $_POST["idFrais"] = trim($_POST["idFrais"]);
    $idAnnee = isset($_POST["idAnnee"]) ? $_POST["idAnnee"] = htmlspecialchars($_POST["idAnnee"]) : $_POST["idAnnee"] = trim($_POST["idAnnee"]);
    $montant = isset($_POST["montant"]) ? $_POST["montant"] = htmlspecialchars($_POST["montant"]) : $_POST["montant"] = trim($_POST["montant"]);

    //appel model nregistrement agent
    return Fix::Enregistrer_Fix($idOpt, $idProm, $idFrais, $idAnnee, $montant);
}
//suppression
function Supprimer_Fix()
{
    $id = $_POST['id'];
    $idOpt = $_POST["idOpt"];
    $idProm = $_POST["idProm"];
    $idFrais = $_POST["idFrais"];
    $idAnnee = $_POST["idAnnee"];
    return Inscription::Supprimer_Inscription($id, $idOpt, $idProm, $idEt, $idAnnee);
}
//modification
function Modifier_Fix()
{
    $id = isset($_POST["id"]) ? $_POST["id"] = htmlspecialchars($_POST["id"]) : $_POST["id"] = trim($_POST["id"]);
    $idOpt = isset($_POST["idOpt"]) ? $_POST["idOpt"] = htmlspecialchars($_POST["idOpt"]) : $_POST["idOpt"] = trim($_POST["idOpt"]);
    $idProm = isset($_POST["idProm"]) ? $_POST["idProm"] = htmlspecialchars($_POST["idProm"]) : $_POST["idProm"] = trim($_POST["idProm"]);
    $idFrais = isset($_POST["idFrais"]) ? $_POST["idFrais"] = htmlspecialchars($_POST["idFrais"]) : $_POST["idFrais"] = trim($_POST["idFrais"]);
    $idAnnee = isset($_POST["idAnnee"]) ? $_POST["idAnnee"] = htmlspecialchars($_POST["idAnnee"]) : $_POST["idAnnee"] = trim($_POST["idAnnee"]);
    $montant = isset($_POST["montant"]) ? $_POST["montant"] = htmlspecialchars($_POST["montant"]) : $_POST["montant"] = trim($_POST["montant"]);


    return Fix::Modifier_Fix($idOpt, $idProm, $idEt, $idAnnee, $montant);
}
function get_all_fix()
{
    return Fix::get_all_fix();
}
function compter_fix()
{
    return Fix::compter_fix();
}
function get_one_fix()
{
    $id = isset($_GET["id"]) ? $_POST["id"] = htmlspecialchars($_POST["id"]) : $_POST["id"] = trim($_POST["id"]);

    return fix::get_one_fix($id);
}
