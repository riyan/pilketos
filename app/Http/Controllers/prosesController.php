<?php

namespace App\Http\Controllers;

use App\Models\Paslon;
use App\Models\Pemilih;
use App\Models\Suara;
use Illuminate\Http\Request;

class prosesController extends Controller
{
    public function proses($nisn, $passcode){
        $pesan = "";
        $pemilih = Pemilih::where('nisn',$nisn)->where('passcode',$passcode)->first();
        //dd(empty($pemilih));
        if(!empty($pemilih)){
            $suara = Suara::where('pemilih_id',$pemilih->id)->first();
            if(empty($suara)){
                return redirect()->route('pilih',['whoid'=>$pemilih->id,'namax'=>$pemilih->nama]);
            }else{
                $pesan = "<h3 class='text-danger'>Hi, ".strtoupper($pemilih->nama)." MOHON MA'AF! HAK SUARA KAMU TELAH DIGUNAKAN</h3>
                <h4>HANYA BOLEH MENGGUNAKAN 1 SUARA UNTUK 1 KALI PEMILIHAN. TERIMA KASIH.</h4>";
                return view('cancel',compact('pesan'));
            }
        }

        $pesan = "<h3 class='text-danger'>MOHON MA'AF! KAMU TIDAK TERDAFTAR SEBAGAI PEMILIH</h3>
                <h4>MOHON LAPOR KE PIHAK PANITA. TERIMA KASIH.</h4>";
        return view('cancel',compact('pesan'));
    }

    public function pilih(Request $request){
        $paslon = Paslon::orderBy('no_urut')->get();
        $namax = $request->query('namax');
        $whoid = $request->query('whoid');
        //dd($request);
        return view('pilih',compact(['paslon','namax','whoid']));
    }

    public function buat(Request $request){
        $suara = new Suara;
        $suara->pemilih_id = $request->pid;
        $suara->paslon_id = $request->pil;
        if($suara->save()){
            return $suara->id;
        }
        //dd($request->all());
    }
}
