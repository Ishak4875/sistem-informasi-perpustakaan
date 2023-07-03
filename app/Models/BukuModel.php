<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class BukuModel extends Model
{
    public function getAllData()
    {
        return DB::table('tbl_buku')
            ->paginate(5);
    }

    public function getDetailBuku($id_buku)
    {
        return DB::table('tbl_buku')
            ->where('id_buku',$id_buku)
            ->first();
    }

    public function insertBuku($data)
    {
        DB::table('tbl_buku')
            ->insert($data);
    }

    public function updateBuku($id_buku,$data)
    {
        DB::table('tbl_buku')
            ->where('id_buku',$id_buku)
            ->update($data);
    }

    public function checkKodeBuku($kode_buku)
    {
        return DB::table('tbl_buku')
            ->select(DB::raw('count(kode_buku) as jumlah'))
            ->where('tbl_buku.kode_buku','=',$kode_buku)
            ->first();
    }

    public function deleteBuku($id_buku)
    {
        return DB::table('tbl_buku')
            ->where('id_buku',$id_buku)
            ->delete();
    }
}
