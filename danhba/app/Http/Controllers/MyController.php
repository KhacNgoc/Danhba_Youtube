<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MyController extends Controller
{
    public function getIndex1(){
        return View('index');
    }
    public function ormtest(){
        $con = new Contact;
        $con->name_contact = 'b';
        $con->number_phone = '11111';
        $con->id_cat = '1';
        $con->id_owner = '1';
        $con->save();
    }
    public function qbtest(){
        $dl = DB::table('contacts')->where('id', '=','3')->delete();
    }
    public function getindex(){
        $con = Contact::all();
        return view('pages.index', compact('con'));
    }
    
    public function getCate($id){
        $con = Contact::where('id_cat', '=', $id)->get();
        return view('pages.index', compact('con'));
    }
    public function getFind(Request $request){
        $con = Contact::where('name_contact', 'like', "%".$request->search."%")->get();
        return view('pages.index', compact('con'));
    }
    public function addContact(Request $req){
        $con = new Contact;
        $con->name_contact=$req->name;
        $con->number_phone=$req->tel;
        $con->id_cat=$req->cat;
        $con->id_owner='1';
        $con->save();
        return redirect()->back();
    }
    public function editContact(Request $req){
        $con = Contact::find($req->id);
        $con->name_contact=$req->name;
        $con->number_phone=$req->tel;
        $con->id_cat=$req->cat;
        $con->id_owner='1';
        $con->save();
        return redirect()->back();
    }
    public function deleteContact($id){
        $con=Contact::find($id);
        $con->delete();
        return redirect()->back();
    }

}
