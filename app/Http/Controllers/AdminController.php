<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorie;
use App\Models\Societe;
use App\Models\Employee;
use App\Models\Postulation;
use App\Models\Admin;
use App\Models\Contact;
use App\Models\User;
class AdminController extends Controller
{
    public function getcontact(){
        $contact=Contact::all();
        return view("contact.liste-contact",['data'=>$contact]);
    }
    public function gettpostulationss(){
        $postulation=Postulation::all();
        return view("postulation.liste-postulation",["data"=>$postulation]);
    }
    public function allAdmin(){
        $User=User::where('role', 'Admin')->get();;
        return view("admin.liste-Admin",['data'=>$User]);

    }
    public function formaddAdmin(){
        return view("Admin.ajout-Admin");
    }
    public function addAdmin(Request $request){
        $User= new User();
        $User->name=$request->nom;
        $User->email=$request->email;
        $User->password=$request->password;
        $User->role="Admin";
        $User->save();
        return view("dashboard");
    }
    public function formeditAdmin(){
        return view("société.modif-Admin");
    }
    public function editAdmin(Request $request,$id){
        $User=User::find($id);
        $User->name=$request->nom;
        $User->email=$request->email;
        $User->password=$request->password;
        $User->save();
}
    public function deleteAdmin($id){
        $User=User::find($id)->delete();
    }




/////////////////////////////////////////////////////////


    public function allsociete(){
        $societe=Societe::all();
        return view("société.liste-societe",['data'=>$societe]);

    }
    public function formaddSociete(){
        return view("société.ajout-societe");
    }
    public function addsociete(Request $request){
        $Societe= new Societe();
        $Societe->nom=$request->nom;
        $Societe->email=$request->email;
        $Societe->password=$request->password;
        $Societe->role="Societe";
        $Societe->save();
    }
    public function formeditSociete(){
        return view("société.modif-societe");
    }
    public function editSociete(Request $request,$id){
        $Societe=Societe::find($id);
        $Societe->nom=$request->nom;
        $Societe->email=$request->email;
        $Societe->password=$request->password;
        $Societe->save();
}
    public function deleteSociete($id){
        $Societe=Societe::find($id)->delete();
    }



    ////////////////////////////
    public function allemployee(){
        $employees = User::where('role', 'employee')->get();
        return view("employee.liste-employee",['data'=>$employees]);
    }
    public function formaddEmployee(){
        return view('employee.ajout-employee');
    }
    public function addEmployee(Request $request){
        $Employee= new Employee();
        $Employee->nom=$request->nom;
        $Employee->email=$request->email;
        $Employee->password=$request->password;
        $Employee->role="Employee";
        $Employee->save();
    }
    public function formeditEmployee(){
        return view("employee.modif-employee");
    }
    public function editEmployee(Request $request,$id){
        $Employee=Employee::find($id);
        $Employee->nom=$request->nom;
        $Employee->email=$request->email;
        $Employee->password=$request->password;
        $Employee->save();
}
    public function deleteEmployee($id){
        $Employee=Employee::find($id);
        $Employee->delete();
    }



    ////////////////////////////////////////////
    public function allcategorie(){
        $categorie=Categorie::all();
        return view("category.liste-category",['data'=>$categorie]);
    }
    public function formaddCategorie(){
        return view("category.ajout-category");
    }
    public function addCategorie(Request $request){
        $Categorie= new Categorie();
        $Categorie->nom=$request->nom;
        $Categorie->save();
        return redirect("/listeCategorie");
        }
    public function formeditCategorie(){
        return view("category.modif-category");
    }
    public function editCategorie(Request $request,$id){
        $Categorie=Categorie::find($id);
        $Categorie->nom=$request->nom;
        $Categorie->save();
}
    public function deleteCategorie($id){
        $Categorie=Categorie::find($id);
        $Categorie->delete();
        return redirect('/listeCategorie');
    }

}


