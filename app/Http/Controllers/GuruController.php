<?php

namespace App\Http\Controllers;

use App\Guru;
use App\Kurikulum;
use File;
use Session;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $guru = Guru::with('Kurikulum')->get();
        return view('guru.index',compact('guru'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kurikulum = Kurikulum::all();
        return view('guru.create',compact('kurikulum'));
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
            'nama_guru' => 'required|',
            'jabatan' => 'required|',
            'foto' => 'required|',
            'kurikulum_id' => 'required|'
        ]);
        $guru = new Guru;
        $guru->nama_guru = $request->nama_guru;
        $guru->jabatan = $request->jabatan;
        $guru->foto =$request->foto;
        if($request->hasfile('foto')){
            $file = $request->file('foto');
            $destinationPath = public_path() .DIRECTORY_SEPARATOR. 'img';
            $filename = str_random(6).'_'.$file->getClientOriginalName();
            $uploadSuccess = $file->move($destinationPath,$filename);
            $guru->foto = $filename;
        }
        $guru->kurikulum_id = $request->kurikulum_id;
        $guru->save();
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Berhasil menyimpan <b>$guru->kurikulum_id</b>"
        ]);
        return redirect()->route('guru.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function show(Request $guru, $id)
    {
        $guru = Guru::findOrFail($id);
        return view('guru.show',compact('guru'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $guru, $id)
    {
        $guru = Guru::findOrFail($id);
        $kurikulum = Kurikulum::all();
        $selectedKuri = Guru::findOrFail($id)->kurikulum_id;
        return view('guru.edit',compact('kurikulum','guru','selectedKuri'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'nama_guru' => 'required|',
            'jabatan' => 'required|',
            'foto' => 'required|',
            'kurikulum_id' => 'required|'
        ]);
        $guru = Guru::findOrFail($id);
        $guru->nama_guru = $request->nama_guru;
        $guru->jabatan = $request->jabatan;
        $guru->kurikulum_id = $request->kurikulum_id;
        if($request->hasFile('foto')){
            $file = $request->file('foto');
            $destinationPath = public_path().DIRECTORY_SEPARATOR.'img';
            $filename = str_random(6).'_'.$file->getClientOriginalName();
            $uploadSuccess = $file->move($destinationPath,$filename);
        
 
         if($guru->foto) {
             $old_foto = $guru->foto;
             $filepath = public_path() .DIRECTORY_SEPARATOR.'img'
             . DIRECTORY_SEPARATOR . $guru->foto;
             try {
                 File::delete($filepath);
             } catch(FileNotFoundException $e) {
 
             }
         }
         $guru->foto = $filename;
     }
        $guru->save();
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Berhasil mengedit <b>$guru->kurikulum_id</b>"
        ]);
        return redirect()->route('guru.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $guru, $id)
    {
        $guru = Guru::findOrFail($id);
        if($guru->foto){
            $old_foto = $guru->foto;
            $filepath = public_path() .DIRECTORY_SEPARATOR.'img'
            . DIRECTORY_SEPARATOR . $guru->foto;

            try{
                File::delete($filepath);
            } catch (FileNotFoundException $e) {

            }
        }
        $guru->delete();
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Data Berhasil dihapus"
        ]);
        return redirect()->route('guru.index');
    }
}
