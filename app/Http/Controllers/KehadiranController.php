<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kehadiran;
use App\Models\Peserta;
use DataTables;
use PDF;

class KehadiranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $peserta = Peserta::count();
        $kehadiran = Kehadiran::count();
        // dd($kehadiran);
        return view('kehadiran', compact(['peserta', 'kehadiran']));
    }

    public function show($id)
    {
        $data = Kehadiran::findOrFail($id);
        return $data;
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getSertifikat(Request $request)
    {
        $data = [];

        if ($request->has('q')) {
            $search = $request->q;
            $data = Kehadiran::select('id', 'nama', 'email', 'no_hp')
            ->where('nama', 'LIKE', '%' . $search . '%')
            ->orWhere('email', 'LIKE', '%' . $search . '%')
            ->orWhere('no_hp', 'LIKE', '%' . $search . '%')
            ->get();
        }

        return response()->json($data);
    }

    public function sertifikatPDF($id)
    {
        $data = Kehadiran::findOrFail($id);
        //$data = $data->nama;
        //dd($data);
        // $data = [
        //     'barcode' => $data,
        //     'id' => $data->id,
        // ];
        $pdf = PDF::loadView('sertifikat_pdf', $data)->setPaper('a4', 'landscape');
        return $pdf->stream();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id_peserta = $request->id_peserta;
        $peserta = Peserta::whereId($id_peserta)->first();
        // dd($peserta);
        $data = new Kehadiran;
        $data->id_peserta = $request->id_peserta;
        $data->nama = $peserta->nama;
        $data->jk = $peserta->jk;
        $data->pendidikan = $peserta->pendidikan;
        $data->nip = $peserta->nip;
        $data->golongan = $peserta->golongan;
        $data->pangkat = $peserta->pangkat;
        $data->jabatan = $peserta->jabatan;
        $data->ttl = $peserta->ttl;
        $data->npwp = $peserta->npwp;
        $data->unit_kerja = $peserta->unit_kerja;
        $data->alamat_unit_kerja = $peserta->alamat_unit_kerja;
        $data->kabkota = $peserta->kabkota;
        $data->propinsi = $peserta->propinsi;
        $data->tlp_kantor = $peserta->tlp_kantor;
        $data->no_hp = $peserta->no_hp;
        $data->email = $peserta->email;
        $data->status = 'Hadir';
        $data->save();
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function sertifikat()
    {
        return view('sertifikat');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function koreksiData(Request $request)
    {
        $data = Peserta::whereId($request->id)->first();
        $data->nama = $request->nama;
        $data->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Kehadiran::findOrFail($id);
        $data->delete();
    }

    public function dataTable()
    {
        $data = Kehadiran::query()->orderBy('id', 'DESC');
        return DataTables::of($data)
        ->addColumn('action', function ($data) {
            return view('layouts._action', [
                'data' => $data,
            ]);
        })
        ->rawColumns(['action'])
        ->make(true);
    }

    public function koreksi()
    {
        return view('koreksi');
    }
}
