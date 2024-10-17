<?php

namespace App\dao;

use App\Models\Frais;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use App\Exceptions\MonException;

class ServiceHorsForfait
{
    public function getHorsForfait($id) {
        try {
            $lesHorsforfait = DB::table('fraishorsforfait')
                ->select()
                ->where('id_fraisforfait','=', $id)
                ->orderby ('id_fraisforfait', 'ASC')
                ->get();
            return $lesHorsforfait;
        }catch(QueryException $e){
            throw new MonException($e->getMessage(), 5);
        }
    }

    public function getById($id_HorsForfait)
    {
        try {
            $unFrais = DB::table('fraishorsforfait')
                ->select()
                ->where('id_fraisforfait','=', $id_HorsForfait)
                ->first();

            return $unFrais ;
        } catch(\Illuminate\Database\QueryException $e){
            throw new MonException($e->getMessage(), 5);
        }
    }
}
