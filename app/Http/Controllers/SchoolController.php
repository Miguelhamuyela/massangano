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
            'image' => 'nullable|image|mimes:jpg,jpeg,png',
            'schoolType'  => 'required|in:publica,privada',
            'schoolLevel' => 'required|in:Iº Ano,IIº Ano,IIIº Ano,IVº Ano,Vº Ano',
            'schoolCategory' => 'nullable|string',
            'description' => 'required|string',
            'id_provinces' => 'required|exists:provinces,id',
            'id_counties' => 'required|exists:counties,id',
            'id_courses' => 'required|exists:courses,id',
        ]);

        /* if ($request->schoolType === 'privada') {
            $rules['schoolCategory'] = 'required|string';
        } */

        /* $data = $request->validate($rules); */
        // Upload da imagem
        $imageName = null;
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $image = $request->file('image');
            $extension = $image->extension();
            $imageName = md5($image->getClientOriginalName() . strtotime('now')) . '.' . $extension;
            $image->move(public_path('img/school'), $imageName);
            $data['image'] = $imageName; // Adiciona o nome da imagem ao array de dados
        }

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
        /* $school = School::findOrFail($school->id); */
        return view('_admin.schools.schoolView.index', ['school' => $school]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(School $school)
    {
        $provinces = Province::all();
        $counties = County::all();
        $courses = Course::all();
        return view('_admin.schools.schoolEdit.index', compact('school', 'provinces', 'counties', 'courses'));
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

        $request->validate([
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
            'image' => 'nullable|image|mimes:jpg,jpeg,png',
            'description' => 'required|string',
            'id_provinces' => 'required|exists:provinces,id',
            'id_counties' => 'required|exists:counties,id',
            'id_courses' => 'required|exists:courses,id',
        ]);

        $school->update([
            'name'        => $request->name,
            'nSchool'     => $request->nSchool,
            'email'       => $request->email,
            'nif'         => $request->nif,
            'phone'       => $request->phone,
            'nRoom'       => $request->nRoom,
            'bout'        => $request->bout,
            'image'       => $request->image,
            'schoolType'  => $request->schoolType,
            'schoolLevel' => $request->schoolLevel,
            'schoolCategory' => $request->schoolCategory,
            'description' => $request->description,
            'id_provinces' => $request->id_provinces,
            'id_counties' => $request->id_counties,
            'id_courses' => $request->id_courses,
        ]);

        // Upload da imagem
        $imageName = null;
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $image = $request->file('image');
            $extension = $image->extension();
            $imageName = md5($image->getClientOriginalName() . strtotime('now')) . '.' . $extension;
            $image->move(public_path('img/school'), $imageName);
        }

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
        $school = School::findOrFail($school);
        $school->delete();
        return redirect()->route('admin.school.listar')->with('success', 'Escola removida com sucesso!');
    }
}
