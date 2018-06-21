<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

use App\Http\Controllers\Controller;
use App\Conseiller;
use Auth;




class ResponsableController extends Controller
{

	public function list_advisor() 
	{
		$conseillers =  Conseiller::where('responsables_id', 
			Auth::id())->get();

		return view('home',compact('conseillers'));

	}
	public function add_advisor() 
	{
		$responsable_id=Auth::id();

		$conseiller = New Conseiller;

		$conseiller->nom = Input::get('name');
		$conseiller->email = Input::get('email');
		$conseiller->responsables_id =$responsable_id; 
		$conseiller->save();

		return redirect('/home')->with('message', 'Votre conseiller à été ajouté');
	}

	public function delete_advisor($id) 
	{
		$conseiller = Conseiller::find($id);
		$conseiller->delete();

		return Redirect('/home');
	}

	public function return_formEdit_advisor($id) 
	{
		$conseiller = Conseiller::find($id);

		return view('updateConseiller',['conseiller'=>$conseiller]);
	}

	public function updateConseiller($id,Request $request){
		
		$conseiller = Conseiller::find($id);

		$conseiller->nom = $request->name;
		$conseiller->email= $request->email;
		$conseiller->save();

		return redirect('/home');
	}

}