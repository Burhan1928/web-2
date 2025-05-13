<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pegawai;

class PegawaiController extends Controller
{
    public function index()
{
$pegawais = pegawai::all();
return view('pegawai.index', compact('pegawais'));
}
}
