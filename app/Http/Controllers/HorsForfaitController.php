<?php

namespace App\Http\Controllers;

use App\dao\ServiceFrais;
use App\Exceptions\MonException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\dao\ServiceHorsForfait;
use App\Models\HorsForfait;
use Exception;
class HorsForfaitController extends Controller
{
    public function getHorsForfait() {

        $erreur = Session::get('erreur');
        Session::forget('erreur');
        try {
            $id = Session::get('id');
            $servicesHorsForfait = new ServiceHorsForfait();
            $mesHorsForfait = $servicesHorsForfait->getHorsForfait($id);
            return view( '/vues/listeHorsForfait' ,compact( 'mesHorsForfait', 'erreur'));
        } catch (Exception $e) {
            $erreur = $e->getMessage();
            return view('vues/error', compact('erreur'));
        }
    }
}
