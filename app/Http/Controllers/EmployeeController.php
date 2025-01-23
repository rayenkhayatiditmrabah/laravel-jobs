<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Categorie;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function add1(Request $request){
        $employee= new User();
        $employee->name=$request->nom;
        $employee->email=$request->email;
        $employee->password=$request->password;
        $employee->role='employee';
        $employee->save();
        return redirect("/listeEmployee");



    }
    public function ezr()
    {
        $categories = Categorie::all();
        return view("themeclient", ['categories' => $categories]);
    }
}
