<?php

namespace App\Http\Controllers;

use App\siswa;
use App\kelas;
use App\jurusan;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index()
    {
        $siswas = siswa::all();
        $kelas = kelas::all();
        $jurusan = jurusan::all();
        return view('siswa.index', compact('siswas','kelas','jurusan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $siswas = siswa::all();
        $kelas = kelas::all();
        $jurusan = jurusan::all();
        return view('siswa.create', compact('siswas','kelas','jurusan'));
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
            $siswas =  new siswa();
            $siswas->nis = $request->nis;
            if ($request->hasfile('foto')) {
                $siswa = $request->file('foto');
                $extension = $siswa->getClientOriginalExtension();
                $filename = str_random(6).'.'.$extension;
                $destinationPath = public_path().'/img';
                $siswa->move($destinationPath, $filename);
                $siswas->foto = $filename; 
            }
            $siswas->nama_siswa = $request->nama_siswa;
            $siswas->jenis_kelamin = $request->jenis_kelamin;
            $siswas->tanggal_lahir = $request->tanggal_lahir;
            $siswas->kelas_id = $request->kelas_id;
            $siswas->jurusan_id = $request->jurusan_id;
            $siswas->alamat = $request->alamat;
            $siswas->no_telepon = $request->no_telepon;
            $siswas->save();
            return redirect()->route('siswa.index')->with('alert-success', 'Data Berhasil Disimpan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $siswas = siswa::findOrFail($id);
        $kelas = kelas::all();
        $jurusan = jurusan::all();
        return view('siswa.edit', compact('siswas','kelas','jurusan'));
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
            $siswas =  siswa::findOrFail($id);
            $jurusan = jurusan::all();
            $kelas = kelas::all();
            $siswas->nis = $request->nis;
            $siswas->foto = $request->foto;
            if ($request->hasfile('foto')) {
                $siswas = $request->file('foto');
                $extension = $siswas->getClientOriginalExtension();
                $filename = str_random(6).'.'.$extension;
                $destinationPath = public_path() . DIRECTORY_SEPERATOR . 'img';
                $siswas->move($destinationPath, $filename);
                $siswas->foto = $filename; 
            $siswas->nama_siswa = $request->nama_siswa;
            $siswas->jenis_kelamin = $request->jenis_kelamin;
            $siswas->tanggal_lahir = $request->tanggal_lahir;
            $siswas->kelas_id = $request->kelas_id;
            $siswas->jurusan_id = $request->jurusan_id;
            $siswas->alamat = $request->alamat;
            $siswas->no_telepon = $request->no_telepon;
            $siswas->save();
            return redirect()->route('siswa.index')->with('alert-success', 'Data Berhasil Ditambah.');
    }
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
        $siswas = siswa::findOrFail($id);
         $siswas->delete();
         return redirect()->route('siswa.index')->with('alert-success', 'Data Berhasil Dihapus.');
    }
}
