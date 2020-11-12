<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Guru;
use App\Mapel;

class GuruController extends Controller
{
    public function profile($id)
    {
        $guru = Guru::find($id);
        $matapelajaran = Mapel::all();

        return view('guru.profile', compact('guru','matapelajaran'));
    }
}
