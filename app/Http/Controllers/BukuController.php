<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BukuModel;

class BukuController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this -> BukuModel = new BukuModel();
    }

    public function getAllData()
    {
        $data = [
            'buku'=>$this -> BukuModel -> getAllData()
        ];
        return view('v_home',$data);
    }

    public function displayPageAddBuku()
    {
        return view('v_add');
    }

    public function insertBuku()
    {
        Request()->validate([
            'kode_buku'=>'required|unique:tbl_buku,kode_buku',
            'nama_buku'=>'required',
            'tipe_buku'=>'required',
            'penulis_buku'=>'required',
            'foto_buku'=>'required|mimes:jpg,jpeg,bmp,png|max:2000'
        ],[
            'kode_buku.required'=>'Wajib Diisi!!!',
            'kode_buku.unique'=>'Kode Buku Ini Telah Ada!!!',
            'nama_buku.required'=>'Wajib Diisi!!!',
            'tipe_buku.required'=>'Wajib Diisi!!!',
            'penulis_buku.required'=>'Wajib Diisi!!!',
            'foto_buku.required'=>'Wajib Diisi!!!',
            'foto_buku.mimes'=>'Format Foto : jpg,jpeg,bmp,png',
            'foto_buku.max'=>'Max 2 MB'
        ]);

        $file = Request()->foto_buku;
        $fileName = strtotime('now') . '.' . $file->extension();
        $file->move(public_path('foto'), $fileName);

        try {
            $data = [
                'kode_buku'=>Request()->kode_buku,
                'nama_buku'=>Request()->nama_buku,
                'tipe_buku'=>Request()->tipe_buku,
                'penulis_buku'=>Request()->penulis_buku,
                'foto_buku'=>$fileName
            ];
            $this->BukuModel->addBuku($data);
            return redirect()->route('daftar buku')->with('success','Data Berhasil Ditambahkan !!!');
        } catch (\Exception $ex) {
            return redirect()->route('daftar buku')->with('error',"Data Gagal Ditambahkan");
        }
    }

    public function displayPageDetailBuku(Request $request)
    {
        if(!$this -> BukuModel -> getDetailBuku($request->id_buku)){
            abort(404);
        }
        $data = [
            'buku'=>$this->BukuModel->getDetailBuku($request->id_buku)
        ];
        return view('v_detail',$data);
    }

    public function displayPageEditBuku(Request $request)
    {
        $id_buku = $request->id_buku;
        $data = [
            'buku'=>$this->BukuModel->getDetailBuku($id_buku)
        ];
        return view('v_edit',$data);
    }

    public function updateBuku(Request $request)
    {
        $id_buku = $request->id_buku;
        $kode_buku = $request->kode_buku;
        $nama_buku = $request->nama_buku;
        $tipe_buku = $request->tipe_buku;
        $penulis_buku = $request->penulis_buku;
        $foto_buku = $request->foto_buku;

        $check = $this->BukuModel->checkKodeBuku($kode_buku);
        if($check->jumlah > 1){
            return back()->with('error','Kode Buku Ini Telah Dipakai');
        }

        Request()->validate([
            'kode_buku'=>'required',
            'nama_buku'=>'required',
            'tipe_buku'=>'required',
            'penulis_buku'=>'required',
            'foto_buku'=>'mimes:jpg,jpeg,bmp,png|max:2000'
        ],[
            'kode_buku.required'=>'Wajib Diisi!!!',
            'nama_buku.required'=>'Wajib Diisi!!!',
            'tipe_buku.required'=>'Wajib Diisi!!!',
            'penulis_buku.required'=>'Wajib Diisi!!!',
            'foto_buku.mimes'=>'Format Foto : jpg,jpeg,bmp,png',
            'foto_buku.max'=>'Max 2 MB'
        ]);

        try {
            if($foto_buku <> ""){
                $buku = $this->BukuModel->getDetailBuku($id_buku);
                unlink(public_path('foto').'/'.$buku->foto_buku);

                $file = $foto_buku;
                $fileName = strtotime("now") . '.' . $file->extension();
                $file->move(public_path('foto'), $fileName);
    
                $data = [
                    'kode_buku'=>$kode_buku,
                    'nama_buku'=>$nama_buku,
                    'tipe_buku'=>$tipe_buku,
                    'penulis_buku'=>$penulis_buku,
                    'foto_buku'=>$fileName
                ];
    
                $this->BukuModel->updateBuku($id_buku,$data);
            }else{
                $data = [
                    'kode_buku'=>$kode_buku,
                    'nama_buku'=>$nama_buku,
                    'tipe_buku'=>$tipe_buku,
                    'penulis_buku'=>$penulis_buku,
                ];
                $this->BukuModel->updateBuku($id_buku,$data);
            }
            return redirect()->route('daftar buku')->with('success','Data Berhasil Diperbarui');
        } catch (\Throwable $th) {
            return redirect()->route('daftar buku')->with('error',"Data Gagal Diperbarui");
        }
    }

    public function deleteBuku($id_buku)
    {
        try {
            $buku = $this->BukuModel->getDetailBuku($id_buku);
            if($buku->foto_buku <> ""){
                unlink(public_path('foto').'/'.$buku->foto_buku);
            }
    
            $this->BukuModel->deleteBuku($id_buku);
            return redirect()->route('daftar buku')->with('success','Data Berhasil Dihapus !!!');
        } catch (\Throwable $th) {
            return redirect()->route('daftar buku')->with('error',"Data Gagal Dihapus");
        }

    }
}
