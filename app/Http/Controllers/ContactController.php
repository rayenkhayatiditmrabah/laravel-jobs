<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Postulation;

class ContactController extends Controller
{
    public function add(Request $request){
        $contact=new Contact();
        $contact->nom=$request->nom;
        $contact->email=$request->email;
        $contact->sujet=$request->sujet;
        $contact->message=$request->message;

        $contact->save();

        return redirect('/contact')->with('message', 'Votre message a été envoyé par succés!!');
    }
    public function afficherMessage($id){
        $contact = Contact::find($id);
        $contact->show1= 1;
        $contact->save();
        return redirect('/listeContact');

    }
    public function getContact(){
        $contact = Contact::all();

        return view('contact.liste-contact',['data'=>$contact]);
    }
    public function delete($id){
        $contact= Postulation::find($id);           //yhot l id eli bch nfaskhouh f variable esmha categorie ($variable=esm l model eli marbout bel base::find($id))


        $contact->delete();
        return redirect('/postulation1');

    }


}
