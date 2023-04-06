<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use App\Models\RumahSakit;
use Illuminate\Http\Request;

class PasienController extends Controller
{
    public function index()
    {
        $pasien = Pasien::with('rumah_sakit')->latest()->paginate(10);

        return view('pasien.manage', ['pasien' => $pasien]);
    }

    public function createForm()
    {
       $RumahSakit = RumahSakit::all();
       
       return view('pasien.create', ['RumahSakit' => $RumahSakit]);
    }

    public function create(Request $request)
    {
        $request->validate([
            'nama_pasien' => 'required',
            'alamat' => 'required',
            'no_telepon' => 'required',
            'id_rumah_sakit' => 'required|integer',
        ]);

        Pasien::create([
            'nama_pasien' => ucwords(strtolower($request->nama_pasien)),
            'alamat' => $request->alamat,
            'no_telepon' => $request->no_telepon,
            'id_rumah_sakit' => $request->id_rumah_sakit,
        ]);
            
        return redirect()->to('/pasien')->with('success', 'Pasien berhasil ditambahkan');
    }

    public function editForm($id)
    {
        $pasien = Pasien::findOrFail($id);
        $RumahSakit = RumahSakit::all();

        return view('pasien.edit', ['pasien' => $pasien, 'RumahSakit' => $RumahSakit]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_pasien' => 'required',
            'alamat' => 'required',
            'no_telepon' => 'required|number',
            'id_rumah_sakit' => 'required|number',
        ]);

        $pasien = Pasien::findOrFail($id);

        $pasien->update([
            'nama_pasien' => ucwords(strtolower($request->nama_pasien)),
            'alamat' => $request->alamat,
            'no_telepon' => $request->no_telepon,
            'id_rumah_sakit' => $request->id_rumah_sakit,
        ]);

        return redirect()->to('/pasien')->with('success', 'Pasien berhasil ditambahkan');
    }

    public function destroy($id)
    {
        $pasien = Pasien::findOrFail($id);
        $pasien->delete();
    }
}
