<?php

namespace App\Http\Controllers;

use App\Exceptions\MonException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\dao\ServiceFrais;
use Exception;
class FraisController extends Controller
{
    public function getFraisVisiteur() {
        $erreur = "";
        try {
            $id = Session::get('id');
            $servicesFrais = new ServiceFrais();
            $mesFrais = $servicesFrais->getFrais($id);
            return view( '/vues/listeFrais' ,compact( 'mesFrais', 'erreur'));
        } catch (Exception $e) {
            $erreur = $e->getMessage();
            return view('vues/error', compact('erreur'));
        }
    }
    public function updateFrais($id_frais) {
        $erreur = "";
        try {
            $serviceFrais = new ServiceFrais();
            $unFrais = $serviceFrais->getById($id_frais);
            $titreVue = "Modification d'une fiche de frais";
            return view('/vues/formFrais', compact('unFrais'));
        }catch (Exception $e) {
            throw new MonException($e->getMessage(), 5);
        }
    }

}
