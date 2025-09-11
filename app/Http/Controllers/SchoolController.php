<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Province;
use App\Models\County;
use App\Models\School;
use App\Models\Course;

class SchoolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function School()
    {
        $schools = School::with(['province', 'county', 'course'])->orderByDesc('id')->get();
        return view('_admin.schools.school.index', compact('schools'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses = Course::all();
        $provinces = Province::all();
        $counties = County::all();
        return view('_admin.schools.schoolCreate.index', compact('provinces', 'counties', 'courses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name'        => 'required|string|max:255',
            'nSchool'     => 'required|string|unique:schools',
            'email'       => 'required|email|unique:schools',
            'nif'         => 'required|string|unique:schools',
            'phone'       => 'required|string',
            'nRoom'       => 'required|string',
            'bout'        => 'required|string',
            'schoolType'  => 'required|in:publica,privada',
            'schoolLevel' => 'required|in:Iº Ano,IIº Ano,IIIº Ano,IVº Ano,Vº Ano',
            'schoolCategory' => 'required|string',
            'description' => 'required|string',
            'id_provinces' => 'required|exists:provinces,id',
            'id_counties' => 'required|exists:counties,id',
            'id_courses' => 'required|exists:courses,id',
        ]);

        if ($request->schoolType === 'privada') {
            $rules['schoolCategory'] = 'required|string';
        }

        $data = $request->validate($rules);

        School::create($data);

        return redirect()->route('admin.school.listar')->with('success', 'Escola cadastrada com sucesso!');
        return redirect()->back()->with('error', 'Ocorreu um erro ao cadastrar!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(School $school)
    {
        //
        return view('_admin.schools.schoolView.index', ['id' => $school->id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(School $school)
    {
        $school = School::findOrFail($school->id);
        $provinces = Province::all();
        $counties = County::all();
        $courses = Course::all();
        return view('admin.schools.editar.index', compact('school', 'provinces', 'counties', 'courses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, School $school)
    {
        $school = School::findOrFail($school->id);

        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'nSchool'     => 'required|string|unique:schools',
            'email'       => 'required|email|unique:schools',
            'nif'         => 'required|string|unique:schools',
            'phone'       => 'required|string',
            'nRoom'       => 'required|string',
            'bout'        => 'required|string',
            'schoolType'  => 'required|in:publica, privada',
            'schoolLevel' => 'required|in:Iº Ano, IIº Ano, IIIº Ano, IVº Ano, Vº Ano',
            'schoolCategory' => 'required|string',
            'description' => 'required|string',
            'id_provinces' => 'required|exists:provinces,id',
            'id_counties' => 'required|exists:counties,id',
            'id_courses' => 'required|exists:courses,id',
        ]);

        $school->update($validated);

        return redirect()->route('admin.school.update')->with('success', 'Escola atualizada com sucesso!');
        return redirect()->back()->with('error', 'Ocorreu um erro ao Salver Universidade!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(School $school)
    {
        $school = School::findOrFail($school->id);
        $school->delete();
        return redirect()->route('admin.school.destroy')->with('success', 'Escola removida com sucesso!');
    }
}
