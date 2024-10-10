<?php

namespace App\dao;

use App\Models\Frais;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use App\Exceptions\MonException;

class ServiceFrais
{
    public function getFrais($id) {
        try {
            $lesFrais = DB::table('frais')
                ->select()
                ->where('id_visiteur','=', $id)
                ->orderby ('anneemois', 'ASC')
                ->get();
            return $lesFrais;
        }catch(QueryException $e){
            throw new MonException($e->getMessage(), 5);
        }
    }
    public function getById($id_frais)
    {
        try {
            $unFrais = DB::table('frais')
                ->select()
                ->where('id_frais','=', $id_frais)
                ->first();

            return $unFrais ;
        } catch(\Illuminate\Database\QueryException $e){
            throw new MonException($e->getMessage(), 5);
    }
    }
    public function updateFrais($id_frais, $anneemois, $nbjustificatifs){
        try {
            $aujourdhui = date("Y-m-d H:i:s");
            DB::table('frais')->where('id_frais', $id_frais)
                ->update([
                    'datemodification'=>$aujourdhui,
                    'anneemois'=>$anneemois,
                    'nbjustificatifs'=>$nbjustificatifs,
                ]);
        } catch (\Illuminate\Database\QueryException $e) {
            throw new MonException($e->getMessage(), 5);
        }

    }
}
