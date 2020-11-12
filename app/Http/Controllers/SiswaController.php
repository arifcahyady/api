<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Siswa;
use App\User;
use App\Mapel;


class SiswaController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('cari')) {
            
            $data = Siswa::where('nama_depan', 'LIKE', '%'. $request->cari .'%')->get();
        }else {
            $data = Siswa::all();        
        }
    	return view('siswa.index', compact('data'));
    }

    public function create(Request $request)
    {

        $request->validate([
            'nama_depan' => 'required',
            'email' => 'required|unique:users',
            'agama' => 'required',
            'alamat' => 'required',
            'avatar' => 'mimes:jpg,jpeg,png,svg'

        ]);

        $user = new User;
        $user->role = 'siswa';
        $user->name = $request->nama_depan;
        $user->password = bcrypt('admin');
        $user->email = $request->email;
        $user->save();

        $request->request->add(['user_id' => $user->id]);
    	$siswa = Siswa::create($request->all());
        if ($request->hasFile('avatar')) {
            $request->file('avatar')->move('images/', $request->file('avatar')->getClientOriginalName());
            $siswa->avatar = $request->file('avatar')->getClientOriginalName();
            $siswa->save();
        }
    	return redirect('/siswa')->with('sukses', 'Data Berhasil di tambah kan');
    }

    public function edit($id)
    {
        $siswa = Siswa::find($id);
        return view('siswa.edit', compact('siswa'));
    }

    public function update(Request $request, $id)
    {
        $siswa = Siswa::find($id);
        $siswa->update($request->all());
        if ($request->hasFile('avatar')) {
            $request->file('avatar')->move('images/', $request->file('avatar')->getClientOriginalName());
            $siswa->avatar = $request->file('avatar')->getClientOriginalName();
            $siswa->save();
        }
        return redirect('/siswa')->with('sukses', 'Data berhasil di update');
    }

    public function delete($id)
    {
        $siswa = Siswa::find($id);
        $siswa->delete();
        return redirect('/siswa')->with('sukses', 'Data berhasil di hapus');
    }

    public function profile($id)
    {
        $siswa = Siswa::find($id);
        $matapelajaran = Mapel::all();

        return view('siswa.profile', compact('siswa','matapelajaran'));
    }

    public function addnilai(Request $request, $id)
    {
        // dd($request->all());
        $siswa = Siswa::find($id);
        if ($siswa->mapel()->where('mapel_id',$request->mapel)->exists()) {
       
        return redirect('/siswa/' . $id . '/profile')->with('error', 'Data mata pelajaran sudah ada');
            
        }
        $siswa->mapel()->attach($request->mapel,['nilai' => $request->nilai]);

        return redirect('/siswa/' . $id . '/profile')->with('sukses', 'Data nilai berhasil di tambah');
    }
}
