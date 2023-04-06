<?php

namespace App\Http\Controllers;

use App\Models\RumahSakit;
use Illuminate\Http\Request;

class RumahSakitController extends Controller
{
    public function index()
    {
        $RumahSakit = RumahSakit::latest()->paginate(10);

        return view('rumah_sakit.manage', ['RumahSakit' => $RumahSakit]);
    }

    public function createForm()
    {
       return view('rumah_sakit.create');
    }

    public function create(Request $request)
    {
        $request->validate([
            'nama_rumah_sakit' => 'required|unique:rumah_sakit,nama_rumah_sakit',
            'alamat' => 'required',
            'email' => 'required|email',
            'telepon' => 'required',
        ]);

        RumahSakit::create([
            'nama_rumah_sakit' => $request->nama_rumah_sakit,
            'alamat' => $request->alamat,
            'email' => $request->email,
            'telepon' => $request->telepon,
        ]);
            
        return redirect()->to('/rumah-sakit')->with('success', 'Rumah Sakit berhasil ditambahkan');
    }

    public function editForm($id)
    {
        $RumahSakit = RumahSakit::findOrFail($id);

        return view('rumah_sakit.edit', ['RumahSakit' => $RumahSakit]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_rumah_sakit' => 'required|unique:rumah_sakit,nama_rumah_sakit,'.$id,
            'alamat' => 'required',
            'email' => 'required|email',
            'telepon' => 'required',
        ]);

        $RumahSakit = RumahSakit::findOrFail($id);

        $RumahSakit->update([
            'nama_rumah_sakit' => $request->nama_rumah_sakit,
            'alamat' => $request->alamat,
            'email' => $request->email,
            'no_telepon' => $request->no_telepon,
        ]);

        return redirect()->to('/rumah-sakit')->with('success', 'Rumah Sakit berhasil diubah');
    }

    public function destroy($id)
    {
        $RumahSakit = RumahSakit::findOrFail($id);
        $RumahSakit->delete();
    }
}
