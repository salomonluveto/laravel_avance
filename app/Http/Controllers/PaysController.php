<?php

namespace App\Http\Controllers;

use App\Models\Pays;
use App\Models\Region;
use App\Exports\PaysExport;
use App\Imports\PaysImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;


class PaysController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pays = Pays::orderBy('id','desc')->paginate(10);
        return view('pays.index', compact('pays'));
    }
    public function export() 
    {
        return Excel::download(new PaysExport, 'pays.xlsx');
    }
    public function import(Request $request) 
    {
        if($request->hasfile('fichier')){
        Excel::import(new PaysImport, $request->fichier);
        }
        return redirect()->route('pays.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $regions = Region::all();
        return view('pays.create', compact('regions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'name'=>'required',
            'capital'=>'required'
        ]);
        $pays = Pays::create([
            'name'=>$request->name,
            'capital'=>$request->capital
        ]);
        
        if($request->has('regions')){
            // vérifie les données provenant du name regions des donnéés cocchées c'est comme isset
            $regions  = $request->regions;
            foreach($regions as $region){
                if($request->has('adhesion'.$region)){ // verifie si la date a été inserer
                $pays->regions()->attach($region, ['adhesion'=>$request->input('adhesion'.$region)]);
                }
            }

        }
        return redirect()->route('pays.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pays  $pays
     * @return \Illuminate\Http\Response
     */
    public function show(Pays $pays)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pays  $pays
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pays = Pays::findOrFail($id);
        return view('pays.edit', compact('pays'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pays  $pays
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required',
            'capital'=>'required'
        ]);
        $pays = Pays::findOrFail($id)->update([
            'name'=>$request->name,
            'capital'=>$request->capital
        ]);
        return redirect()->route('pays.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pays  $pays
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pays $pays)
    {
        //
    }
}
