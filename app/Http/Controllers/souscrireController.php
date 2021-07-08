<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use App\Models\offre;
use Illuminate\Http\Request;
use App\Models\souscrire;
use App\Mail\email;

class souscrireController extends Controller
{
  
  public function add(Request $request)
  {       
      if(souscrire::where('email',$request->mail)
        ->where('offre_id',$request->offres_id)
        ->first())
        {
        return view('failed'); 
        } 

        else 
        {
            $s=" / ";
            $ct1 = $request->contact1;
            $ct2 = $request->contact2;
  	       $tel = $ct1 .$s .$ct2;
           $souscrire = new souscrire;
  	       $souscrire->denomination=$request->denomination;
           $souscrire->statut_social=$request->statut;
           $souscrire->representant=$request->nom_prenoms;
           $souscrire->fonct_representant=$request->fonction;
           $souscrire->point_focal=$request->point_focal;
           $souscrire->telephone=$tel;
           $souscrire->email=$request->mail;
           $souscrire->offre_id = $request->offres_id;
           $souscrire->save();
           
           $mail = $request->mail;

           $title = DB::table('offres')->where('id',$request->offres_id)->first()->titre;
           $fichier = DB::table('offres')->where('id',$request->offres_id)->first()->fichier;
$details=[
'nom'=>$request->nom_prenoms,
'entreprise'=>$request->denomination,
'statut'=>$request->statut,
  'titre' =>$title,
  'fichier' =>$fichier,
'corps'=> "Merci pour l'intérêt que vous portez à notre appel d'offre, Vous trouverez ci-joint le dossier de l'offre."
            ];
            \Mail::to($request->mail)->send(new \App\Mail\email($details));

            

           return view('confirmation',compact('mail')); 


        }
  }

  public function index($id)
  {
 
        $date_current = date('Y-m-d');

        $date = DB::table('offres')
        ->where('id',$id)
        ->whereDate('date_limite','>=',$date_current)
        ->first();

        $data = DB::table('offres')
        ->where('id',$id)
        ->where('offres.id',$id)
        ->get();

        

    if ($date == true) 
    {
      
        return view('postuler',compact('id','data'));
    }
    else
      {
        
       return view('expire');

      }

    
    }




    public function offres()
    {
      $date_current = date('Y-m-d');

       $data = DB::table('offres')
       ->orderBy('id','desc')
       ->select(DB::raw('DATE_FORMAT(date_limite,"%d-%M-%Y")as date_limite'),DB::raw('DATE_FORMAT(date_publication,"%d-%M-%Y")as date_publication'),'titre','details','id')
       ->paginate(5);
       return view('offres',compact('data'));
    }


}
