<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Province;
use Illuminate\Http\Request;

class ProvinceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $province = Province::orderByDesc('id')->get();
        return view('_admin.provinces.list.index', compact('province'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $province = Province::all();
        return view('_admin.provinces.create.index', compact('province'));
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

        Province::create([
            'name' => $request->name,
        ]);

        return redirect()->route('admin.province.listar')->with('success', 'Província criada com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Province $province)
    {
        //
        return view('_admin.provinces.details.index', ['province' => $province]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Province $province)
    {
        //
        $province = Province::all();
        return view('_admin.provinces.edit.index', ['province' => $province]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Province $province)
    {
        //
        $request->validate([
            'name' => 'required|string',
        ]);

        $province->update([
            'name' => $request->name,
        ]);

        return redirect()->route('admin.province.index')->with('success', 'Província atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Province $province)
    {
        //
        $procince = Province::findOrFail($province);

        // Verifica se a categoria está associada a algum artigo
        if (!$province) {
            return redirect()->back()->with('error', 'Província não encontrada!');
        }


        // Exclui a categoria do banco de dados

        $province->delete();
        return redirect()->route('admin.province.index')->with('success', 'Província apagado com sucesso!');
    }
}
