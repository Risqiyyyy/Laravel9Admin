<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Pagination\LengthAwarePaginator;

class SiswaController extends Controller
{
  public function index()
  {
    $response = Http::get('https://api-medcom.vercel.app/getSiswa');
    $siswa = json_decode($response);
    return view('content.pages.siswa')->with('siswa', $siswa);
  }
  
  public function store(Request $request)
  {
    $response = Http::post('https://api-medcom.vercel.app/Createsiswa', [
      'NIS' => $request->NIS,
      'Nama_Lengkap' => $request->Nama_Lengkap,
      'Tempat_Lahir' => $request->Tempat_Lahir,
      'Tanggal_Lahir' => $request->Tanggal_Lahir,
      'Alamat' => $request->Alamat,
      'Jenis_Kelamin' => $request->Jenis_Kelamin,
      'Agama' => $request->Agama
  ]);
    return redirect()->route('siswa.index');
  }


  public function detail(Request $NIS)
  {
    $response = Http::get('https://api-medcom.vercel.app/getSiswaById/'.$NIS);
    $siswa = json_decode($response);
    dd($response);
    return redirect()->route('siswa.index');
  }

  public function delete(Request $NIS)
  {
    $apiURL = 'https://api-medcom.vercel.app/deleteSiswa/'. $NIS;
    $response = Http::delete($apiURL);
    $siswa = json_decode($response);
    dd($siswa);
    return redirect()->route('siswa.index');
  }
}
