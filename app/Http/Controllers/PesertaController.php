<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peserta;
use PDF;


class PesertaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('welcome');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Peserta::findOrFail($id);
        return $data;
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getData(Request $request)
    {
        $data = [];

        if ($request->has('q')) {
            $search = $request->q;
            $data = Peserta::select('id', 'nama', 'email', 'no_hp')
                ->where('nama', 'LIKE', '%' . $search . '%')
                ->orWhere('email', 'LIKE', '%' . $search . '%')
                ->orWhere('no_hp', 'LIKE', '%' . $search . '%')
                ->get();
        }

        return response()->json($data);
    }

    public function generatePDF(Request $request)
    {
        if ($request->id == ''){
            return back()->with(['error' => 'Data Tidak Ditemukan']);
        }
        $data = $request->id;
        // $id = $request->id;
        // $data = Peserta::findOrFail($data);
        $url = '/storage/pdf/'. 'document_'. $data .'.pdf';
        return redirect($url);
        // $data = $data->nama;
        // dd($data);
        // $data = [
        //     'barcode' => $data,
        //     'id' => $data->id,
        // ];
        // $pdf = PDF::loadView('myPDF', $data)->setPaper('a4', 'portrait');
        // return $pdf->stream("document"."_".$id.".pdf");
    }
}
