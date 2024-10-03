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
                ->select('montantvalide', 'montantvalide')
                ->where('id'.'=', $id)
                ->orderby ('periodevalide', 'ASC')
                ->first();
            return $lesFrais;
        }catch(QueryException $e){
            throw new MonException($e->getMessage(), 5);
        }
    }
}
