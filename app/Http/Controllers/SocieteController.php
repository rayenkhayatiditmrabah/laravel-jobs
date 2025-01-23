<?php

namespace App\Http\Controllers;
use App\Models\Offre;
use App\Models\Postulation;
use App\Models\Societe;
use Illuminate\Http\Request;
use App\Models\User;
class SocieteController extends Controller
{
    public function allsociete() {
        $societe = User::where('role', 'societe')->get();
        return view('société.liste-societe', ['data' => $societe]);
    }
    public function alloffre(){
        $offres = Offre::all();
        return view ("offre.liste-offre",['data'=>$offres]);
    }
    public function offres(){
        $offre = Offre::all();
        return view("offres",['offres'=>$offre]);
    }
    public function formaddoffre(){
        return view("");
    }
    public function addoffre(Request $request){
        $offre=new Offre();
       // $offre->=$request->
        $offre->nom=$request->nom;
        $offre->type=$request->type;
        $offre->description=$request->description;
        $offre->save();
        return view("");
    }
    public function listeoffre(){
     //   $offres = Offre::all()->sortByDesc('created_at')->where();
       // return view("","data",$offres);
    }
    
    public function modifoffre(Request $request, $id){
        $offres=Offre::find($id);
        $offres->nom=$request->nom;
        $offres->type=$request->type;
        $offres->description=$request->description;
        $offres->save();
        return redirect("/listeoffre");
    }
    public function supprimeroffre($id){
        $offres=Offre::find($id)->delete();
        return redirect("/listeoffre");
    }

    public function registersociete(Request $request)
{
    $user = new User();
    $user->name = $request->nom;
    $user->email= $request->email;
    $user->password=$request->password;
    $user->role = 'societe' ;
    $user->save();
    return redirect('/login');
}



}

