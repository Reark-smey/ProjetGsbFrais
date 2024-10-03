<?php

namespace App\Http\Controllers;

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
            return view( '/vues/listeFrais'.$mesFrais ,compact( 'erreur'  ));
        } catch (Exception $e) {
            $erreur = $e->getMessage();
            return view('vues/error', compact('erreur'));
        }
    }
}
