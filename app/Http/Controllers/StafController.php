<?php

namespace App\Http\Controllers;

use App\Staf;
use App\Kurikulum;
use Session;
use Illuminate\Http\Request;

class StafController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $staf = Staf::with('Kurikulum')->get();
        return view('staf.index',compact('staf'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kurikulum = Kurikulum::all();
        return view('staf.create',compact('kurikulum'));
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
            'nama_staf' => 'required|',
            'jabatan' => 'required|',
            'kurikulum_id' => 'required|'
        ]);
        $staf = new Staf;
        $staf->nama_staf = $request->nama_staf;
        $staf->jabatan = $request->jabatan;
        $staf->kurikulum_id = $request->kurikulum_id;
        $staf->save();
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Berhasil menyimpan <b>$staf->kurikulum_id</b>"
        ]);
        return redirect()->route('staf.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Staf  $staf
     * @return \Illuminate\Http\Response
     */
    public function show(Request $staf, $id)
    {
        $staf = Staf::findOrFail($id);
        return view('staf.show',compact('staf'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Staf  $staf
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $staf, $id)
    {
        $staf = Staf::findOrFail($id);
        $kurikulum = Kurikulum::all();
        $selectedKuri = Staf::findOrFail($id)->kurikulum_id;
        return view('staf.edit',compact('kurikulum','staf','selectedKuri'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Staf  $staf
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'nama_staf' => 'required|',
            'jabatan' => 'required|',
            'kurikulum_id' => 'required|'
        ]);
        $staf = Staf::findOrFail($id);
        $staf->nama_staf = $request->nama_staf;
        $staf->jabatan = $request->jabatan;
        $staf->kurikulum_id = $request->kurikulum_id;
        $staf->save();
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Berhasil mengedit <b>$staf->kurikulum_id</b>"
        ]);
        return redirect()->route('staf.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Staf  $staf
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $staf, $id)
    {
        $staf = Staf::findOrFail($id);
        $staf->delete();
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Data Berhasil dihapus"
        ]);
        return redirect()->route('staf.index');
    }
}
