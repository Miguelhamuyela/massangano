<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Province;
use App\Models\County;
use App\Models\School;

class CountyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $county = County::orderByDesc('id')->get();
        return view('_admin.counties.county.index', compact('county'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $county = County::all();
        return view('_admin.counties.countyCreate.index', compact('county'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required|string',
        ]);

        County::create([
            'name' => $request->name,
        ]);

        return redirect()->route('admin.county.listar')->with('success', 'Município criada com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(County $county)
    {
        //
        return view('_admin.counties.countyView.index', ['county' => $county]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(County $county)
    {
        //
        $counties = County::all();
        return view('_admin.county.countyEdit.index', ['county' => $county]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, County $county)
    {
        //
        $request->validate([
            'name' => 'required|string',
        ]);

        $county->update([
            'name' => $request->name,
        ]);

        return redirect()->route('admin.county.index')->with('success', 'Município atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(County $county)
    {
        //
        $county = County::findOrFail($county->id);

        // Verifica se a categoria está associada a algum artigo
        if (!$county) {
            return redirect()->back()->with('error', 'Município não encontrada!');
        }


        // Exclui a categoria do banco de dados

        $county->delete();
        return redirect()->route('admin.county.index')->with('success', 'Município apagado com sucesso!');
    }
}
