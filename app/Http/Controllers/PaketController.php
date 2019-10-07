<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Excel;
use App\Exports\PaketExport;
// use Maatwebsite\Excel\Facades\Excel;
use App\Paket;

class PaketController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('cari')) {
            $data_paket = Paket::where('nmpaket', 'LIKE', '%' . $request->cari . '%')->orWhere('kdsatker', 'LIKE', '%' . $request->cari . "%")->paginate(10);
            $jmlpaket = Paket::all();
            $total = $data_paket->sum('pagurmp');
            $avg_keu = $data_paket->avg('progres_keu');
            $avg_fisik = $data_paket->avg('progres_fisik');
        } else {
            $jmlpaket = Paket::all();
            $data_paket = Paket::paginate(10);
            $total = $data_paket->sum('pagurmp');
            $avg_keu = $data_paket->avg('progres_keu');
            $avg_fisik = $data_paket->avg('progres_fisik');
        }
        return view('paket.index', compact('data_paket', 'total', 'avg_keu', 'avg_fisik', 'jmlpaket'));
    }

    public function create(Request $request)
    {
        Paket::create($request->all());
        return redirect('/paket')->with('sukses', 'Data berhasil diinput');
    }

    public function edit($id)
    {
        $data_paket = Paket::find($id);
        return view('paket/edit', compact('data_paket'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'progres_keu' => 'numeric|between:0,100',
            'progres_fisik' => 'numeric|between:0,100'
        ]);
        $data_paket = Paket::find($id);
        $data_paket->update($request->all());
        return redirect('/paket')->with('sukses', 'Data berhasil diupdate');
    }

    public function delete($id)
    {
        $data_paket = Paket::find($id);
        $data_paket->delete($data_paket);
        return redirect('/paket')->with('sukses', 'Data berhasil dihapus');
    }

    public function export_excel()
    {
        return Excel::download(new PaketExport, 'paket.xlsx');
    }

    public function importExport()
    {
        return view('importExport');
    }

    public function downloadExcel($type)
    {
        $data = Paket::get()->toArray();

        return Excel::create('itsolutionstuff_example', function ($excel) use ($data) {
            $excel->sheet('mySheet', function ($sheet) use ($data) {
                $sheet->fromArray($data);
            });
        })->download($type);
    }
    public function importExcel(Request $request)
    {
        $request->validate([
            'import_file' => 'required'
        ]);

        $path = $request->file('import_file')->getRealPath();
        $data = Excel::load($path)->get();

        if ($data->count()) {
            foreach ($data as $key => $value) {
                $arr[] = ['title' => $value->title, 'description' => $value->description];
            }

            if (!empty($arr)) {
                Item::insert($arr);
            }
        }

        return back()->with('success', 'Insert Record successfully.');
    }
}
