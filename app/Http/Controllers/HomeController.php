<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Models\souscrire;
use App\Models\offre;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use DataTables;
use App\Exports\soumissionnaire;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        
        $data = DB::table('offres')->get();

       // $last_id= offre::latest('id')->first('id');

        //$id1 = $last_id->id;

         $nbr = DB::table('souscrires')
        //->whereDate('offres.date_limite','>=',$date_current)
        ->get();


         $date_current = date('Y-m-d');
        if ($request->ajax()) {
            $data = DB::table('souscrires')
            ->join('offres','souscrires.offre_id','=','offres.id')
            //->where('souscrires.offre_id',$id1)
            ->whereDate('offres.date_limite','>=',$date_current)
                ->select(DB::raw('DATE_FORMAT(souscrires.created_at, "%d-%M-%Y") as date'),'souscrires.id','souscrires.denomination','souscrires.statut_social','souscrires.representant','souscrires.fonct_representant','souscrires.point_focal','souscrires.telephone','souscrires.email','offres.alias')
                ->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
     
                           $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">View</a>';
    
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }


       return view('home',compact('data','nbr'));

    }

    public function export (Request $request){
        $id = $request->id;
         return Excel::download(new soumissionnaire ($id), 'soumissionnaire.xlsx');
    }

    public function deco()
    {
        auth()->logout();
       return redirect('/appels-offres');
    }

    

    public function add(Request $request)
        {


        $date = date('y-m-d');
        $offre = new offre;
        $offre->titre = $request->titre;
        $offre->alias = $request->alias;
        $offre->date_limite = $request->date;
        $offre->details = $request->details;
        $offre->date_publication = $date;
        $offre->id_user = $request->user;

        if ($request->hasFile('file')) {
        $file_path = 'public/';
        $myfile = $request->file('file');
        $file_name =  $myfile->getClientOriginalName();
        $path = $request->file('file')->storeAs($file_path,$file_name);
        $offre->fichier = $file_name;
        }
        $offre->save();
        return redirect()->back()->with('msg','publiée');
        }

        public function gestion()
        {
            $list = DB::table('offres')
            ->join('users','offres.id_user','=','users.id')
            ->select('offres.id','offres.titre','offres.details','offres.fichier','offres.date_limite','offres.date_publication','users.name')
            ->get();


            return view('offres_dashboard',compact('list'));
        }

        public function edit_offre($id)
        {
            $list = offre::find($id);

            return view('editer',compact('list'));
        }

        public function confirm(Request $request)
        {
        $update = offre::find($request->post_id);
        $update->titre = $request->titre;
        $update->details = $request->details;
        $update->date_limite = $request->date_l;
        $update->date_publication = date('y-m-d');
        $update->id_user = $request->user_id;

          if ($request->hasFile('file')) {
        $file_path = 'public/';
        $myfile = $request->file('file');
        $file_name =  $myfile->getClientOriginalName();
        $path = $request->file('file')->storeAs($file_path,$file_name);
        $update->fichier = $file_name;
        }
        $update->save();

            return redirect()->back()->with('ok','enreg');
        }

        public function delete_offer($id)
        {
            $offre = offre::find($id)->delete();
           
            return redirect()->back();
        }



}
