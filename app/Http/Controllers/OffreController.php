<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Offre;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Postulation;
use App\Models\User;

class OffreController extends Controller
{
    public function addOffreCateg(){
        $cat = Categorie::all();
        return view('offreform',['data'=>$cat]);
    }

    public function ajouterOffre(Request $request)
{
    $offre = new Offre();

    $offre->idcategorie = $request->idcategorie;
    $offre->nom = $request->nom;
    $offre->type = $request->type;
    $offre->description = $request->description;
    $offre->save();
    return redirect("/");
}
    public function offres(){
        $offre = Offre::all();
        return view('offres',['offres'=>$offre]);
    }
    public function postuler($id)
    {

        $offre = Offre::find($id);

        if (!$offre) {
            return redirect()->back()->with('error', 'Offre non trouvée.');
        }

        if (Auth::check() && Auth::user()->role == 'employee') {

            if (Postulation::where('iduser', Auth::user()->id)->where('idoffre', $offre->id)->exists()) {
                return redirect()->back()->with('error', 'Vous avez déjà postulé à cette offre.');
            }

            $post=new Postulation();
                $post->iduser = Auth::user()->id;
                $post->idoffre = $offre->id;
                $post->save();


            return redirect()->back()->with('success', 'Postulation réussie.');
        } else {
            return redirect()->back()->with('error', 'Vous devez être connecté en tant qu\'employé pour postuler.');
        }
    }
    public function showContactView()
{

    $postula = Postulation::all();

    // Passez les données à la vue
   return view('postulation.liste-postulation', ['postulations' => $postula]);
}
public function showContactView1()
{

    $postula = Postulation::all();

    // Passez les données à la vue
   return view('postulations1', ['postulations' => $postula]);
}

}
