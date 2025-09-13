<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $courses = Course::orderByDesc('id')->get();
        return view('_admin.courses.course.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $courses = Course::all();
        return view('_admin.courses.courseCreate.index', compact('courses'));
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

        Course::create([
            'name' => $request->name,
        ]);

        return redirect()->route('admin.course.listar')->with('success', 'Cusro criada com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Course $courses)
    {
        //
        return view('_admin.courses.courseView.index', ['course' => $courses]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $courses)
    {
        //
        $courses = Course::all();
        return view('_admin.course.courseEdit.index', ['course' => $courses]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $courses)
    {
        //
        $request->validate([
            'name' => 'required|string',
        ]);

        $courses->update([
            'name' => $request->name,
        ]);

        return redirect()->route('admin.course.index')->with('success', 'Cusro atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $courses)
    {
        //
        $courses = Course::findOrFail($courses->id);

        // Verifica se a categoria está associada a algum artigo
        if (!$courses) {
            return redirect()->back()->with('error', 'Cusro não encontrada!');
        }


        // Exclui a categoria do banco de dados

        $courses->delete();
        return redirect()->route('admin.course.index')->with('success', 'Cusro apagado com sucesso!');
    }
}
