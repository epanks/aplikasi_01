<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Paketaccess;


class PaketaccessController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('cari')) {
            $data_paket = Paketaccess::where('nmpaket', 'LIKE', '%' . $request->cari . '%')->orWhere('kdsatker', 'LIKE', '%' . $request->cari . "%")->paginate(10);
            //$jmlpaket = Paketaccess::all();
            // $total = $data_paket->sum('pagurmp');
            // $avg_keu = $data_paket->avg('progres_keu');
            // $avg_fisik = $data_paket->avg('progres_fisik');
        } else {
            //$jmlpaket = Paketaccess::all();
            $data_paket = Paketaccess::paginate(10);
            // $total = $data_paket->sum('pagurmp');
            // $avg_keu = $data_paket->avg('progres_keu');
            // $avg_fisik = $data_paket->avg('progres_fisik');
        }

        //dd($data_paket);
        return view('paketaccess.index', compact('data_paket'));
    }

    public function create(Request $request)
    {
        Paketaccess::create($request->all());
        return redirect('/paket')->with('sukses', 'Data berhasil diinput');
    }

    public function edit($id)
    {
        $data_paket = Paketaccess::find($id);
        return view('paket/edit', compact('data_paket'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'progres_keu' => 'numeric|between:0,100',
            'progres_fisik' => 'numeric|between:0,100'
        ]);
        $data_paket = Paketaccess::find($id);
        $data_paket->update($request->all());
        return redirect('/satker')->with('sukses', 'Data berhasil diupdate');
    }

    public function delete($id)
    {
        $data_paket = Paketaccess::find($id);
        $data_paket->delete($data_paket);
        return redirect('/paket')->with('sukses', 'Data berhasil dihapus');
    }

    public function export_excel()
    {
        return Excel::download(new PaketExport, 'paket.xlsx');
    }
}
