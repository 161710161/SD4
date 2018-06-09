<?php

namespace App\Http\Controllers;

use App\Kurikulum;
use Session;
use Illuminate\Http\Request;

class KurikulumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $a = Kurikulum::all();
        return view('kurikulum.index',compact('a'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kurikulum.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'nama_kurikulum' => 'required|',
            'ket_kurikulum' => 'required|',
            'nama_kepsek' => 'required',
            'nama_wkepsek' => 'required'
        ]);
        $a = new Kurikulum;
        $a->nama_kurikulum = $request->nama_kurikulum;
        $a->ket_kurikulum = $request->ket_kurikulum;
        $a->nama_kepsek = $request->nama_kepsek;
        $a->nama_wkepsek = $request->nama_wkepsek;
        $a->save();
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Berhasil menyimpan <b>$a->nama_kurikulum</b>"
        ]);
        return redirect()->route('kurikulum.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Kurikulum  $kurikulum
     * @return \Illuminate\Http\Response
     */
    public function show(Request $kurikulum, $id)
    {
        $a = Kurikulum::findOrFail($id);
        return view('kurikulum.show',compact('a'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kurikulum  $kurikulum
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $kurikulum, $id)
    {
        $a = Kurikulum::findOrFail($id);
        return view('kurikulum.edit',compact('a')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Kurikulum  $kurikulum
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'nama_kurikulum' => 'required|',
            'ket_kurikulum' => 'required|',
            'nama_kepsek' => 'required',
            'nama_wkepsek' => 'required'
        ]);
        $a = Kurikulum::findOrFail($id);
        $a->nama_kurikulum = $request->nama_kurikulum;
        $a->ket_kurikulum = $request->ket_kurikulum;
        $a->nama_kepsek = $request->nama_kepsek;
        $a->nama_wkepsek = $request->nama_wkepsek;
        $a->save();
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Berhasil mengedit <b>$a->nama_kurikulum</b>"
        ]);
        return redirect()->route('kurikulum.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kurikulum  $kurikulum
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $kurikulum, $id)
    {
        $a = Kurikulum::findOrFail($id);
        $a->delete();
        return redirect()->route('kurikulum.index');
    }
}
