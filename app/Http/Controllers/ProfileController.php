<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Eloquent;
use App\Models\katalog;
use App\Models\penyewa;
use App\Models\supir;
class ProfileController extends Controller
{
        //katalog
        public function katalogGet()
        {
            $katalog = katalog::all();
            return view('Profile.katalog.index',  ['katalog' => $katalog]);
        }
        public function katalogCreate()
        {
          return view('/Profile/katalog/create');
        }
        public function katalogEdit($id)
        {
          $katalog = katalog::find($id);
          return view('Profile.katalog.edit', compact('katalog'));
        }
    
        public function katalogPost(Request $req)
        {
            $id = $req->get('id');
            if($id)
            {
                $katalog = katalog::find($id);
            }else
            {
                $katalog = new katalog;
            }
            if($req->gambar){
              if($req->hasFile('gambar')){
                $foto = $req->file('gambar');
                $filename = time() . '.' . $foto->getClientOriginalExtension();
                $destinationPath = 'image/';              
                 $foto->move($destinationPath, $filename);
                }
                $katalog->gambar = $filename;
            }
            $katalog->judul = $req->judul;
            $katalog->harga = $req->harga;
            $katalog->save();
            return redirect()->route('Profile.katalog.index')->with(['success' => 'Data Berhasil Di Simpan']);
        }
        public function katalogDel($id)
      {
        $katalog = katalog::findOrFail($id);
        $katalog->delete();
    
        return redirect('/Profile/katalog');
          if($katalog){
              return response()->json([
                  'status' => 'success'
              ]);
          }else{
              return response()->json([
                  'status' => 'error'
              ]);
          }
        }
      
      //// Penyewa

       public function penyewaGet()
       {
           $penyewa = penyewa::all();
           return view('Profile.penyewa.index',  ['penyewa' => $penyewa]);
       }
       public function penyewaCreate()
       {
         return view('/Profile/penyewa/create');
       }
       public function penyewaEdit($id)
       {
         $penyewa = penyewa::find($id);
         return view('Profile.penyewa.edit', compact('penyewa'));
       }
   
       public function penyewaPost(Request $req)
       {
           $id = $req->get('id');
           if($id)
           {
               $penyewa = penyewa::find($id);
           }else
           {
               $penyewa = new penyewa;
           }
           if($req->gambar){
             if($req->hasFile('gambar')){
               $foto = $req->file('gambar');
               $filename = time() . '.' . $foto->getClientOriginalExtension();
               $destinationPath = 'image/';              
                $foto->move($destinationPath, $filename);
               }
               $penyewa->gambar = $filename;
           }
           $penyewa->nama = $req->nama;
           $penyewa->alamat = $req->alamat;
           $penyewa->telp = $req->telp;
           $penyewa->save();
           return redirect()->route('Profile.penyewa.index')->with(['success' => 'Data Berhasil Di Simpan']);
       }
       public function penyewaDel($id)
     {
       $penyewa = penyewa::findOrFail($id);
       $penyewa->delete();
   
       return redirect('/Profile/penyewa');
         if($penyewa){
             return response()->json([
                 'status' => 'success'
             ]);
         }else{
             return response()->json([
                 'status' => 'error'
             ]);
         }
     }

     ///// supir

       public function supirGet()
       {
           $supir = supir::all();
           return view('Profile.supir.index',  ['supir' => $supir]);
       }
       public function supirCreate()
       {
         return view('/Profile/supir/create');
       }
       public function psupirEdit($id)
       {
         $supir = supir::find($id);
         return view('Profile.supir.edit', compact('supir'));
       }
   
       public function supirPost(Request $req)
       {
           $id = $req->get('id');
           if($id)
           {
               $supir = supir::find($id);
           }else
           {
               $supir = new supir;
           }
           if($req->gambar){
             if($req->hasFile('gambar')){
               $foto = $req->file('gambar');
               $filename = time() . '.' . $foto->getClientOriginalExtension();
               $destinationPath = 'image/';              
                $foto->move($destinationPath, $filename);
               }
               $supir->gambar = $filename;
           }
           $supir->nama = $req->nama;
           $supir->alamat = $req->alamat;
           $supir->telp = $req->telp;
           $supir->save();
           return redirect()->route('Profile.supir.index')->with(['success' => 'Data Berhasil Di Simpan']);
       }
       public function supirDel($id)
     {
       $supir = supir::findOrFail($id);
       $supir->delete();
   
       return redirect('/Profile/supir');
         if($supir){
             return response()->json([
                 'status' => 'success'
             ]);
         }else{
             return response()->json([
                 'status' => 'error'
             ]);
         }
     }
};
