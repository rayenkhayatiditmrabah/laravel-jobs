<?php

namespace App\Http\Controllers;
use App\Models\Categorie;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function ajoutCategory(){
        return view('category.ajout-category');
    }
    public function add(Request $request){
        $category=new Categorie();
        $category->nom=$request->nom;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/students/', $filename);
            $category->image = $filename;

         }

        $category->save();

        return redirect('/listeCategory');


    }
}
