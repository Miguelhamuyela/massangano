<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Finalist;
use App\Models\School;
use App\Models\Course;
use Facade\FlareClient\Stacktrace\File;

class FinalistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $finalists = Finalist::with(['school', 'course'])->orderByDesc('id')->get();
        return view('_admin.finalists.finalist.index', compact('finalists'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $schools = School::all();
        $courses = Course::all();
        return view('_admin.finalists.finalistCreate.index', compact('schools', 'courses'));
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
            'name'        => 'required|string|max:255',
            'email'       => 'required|email|unique:finalists',
            'bi'         => 'required|string|unique:finalists',
            'phone'       => 'required|string',
            'file' => 'required|file|mimes:pdf,doc,docx',
            'cover' => 'nullable|image|mimes:jpg,jpeg,png',
            'id_schools' => 'required|exists:schools,id',
            'id_courses' => 'required|exists:courses,id',
        ]);

        // Upload da imagem
        $imageName = null;
        if ($request->hasFile('cover') && $request->file('cover')->isValid()) {
            $image = $request->file('cover');
            $extension = $image->extension();
            $imageName = md5($image->getClientOriginalName() . strtotime('now')) . '.' . $extension;
            $image->move(public_path('img/finalist'), $imageName);
        }

        //upload do arquivo
        $fileName = null;
        if ($request->hasFile('file') && $request->file('file')->isValid()) {
            $file = $request->file('file');
            $extension = $file->extension();
            $fileName = md5($file->getClientOriginalName() . strtotime('now')) . '.' . $extension;
            $file->move(public_path('files/finalist'), $fileName);
        }

        Finalist::create([
            'name' => $request->name,
            'email' => $request->email,
            'bi' => $request->bi,
            'phone' => $request->phone,
            'file' => $fileName,
            'cover' => $imageName,
            'id_schools' => $request->id_schools,
            'id_courses' => $request->id_courses,
        ]);

        return redirect()->route('admin.finalist.listar')->with('success', 'Finalista criado com sucesso.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Finalist $finalist)
    {
        //
        $finalists = Finalist::with('school')->findOrFail($finalist->id);
        return view('_admin.finalists.finalistView.index', compact('finalist'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Finalist $finalist)
    {
        //
        $finalists = Finalist::findOrFail($finalist->id);
        $schools = School::all();
        return view('_admin.finalists.finalistEdit.index', compact('finalist', 'schools'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Finalist $finalist)
    {
        //
        $request->validate([
            'name'        => 'required|string|max:255',
            'email'       => 'required|email|unique:finalists',
            'bi'         => 'required|string|unique:finalists',
            'phone'       => 'required|string',
            'file' => 'required|file|mimes:pdf,doc,docx',
            'cover' => 'nullable|image|mimes:jpg,jpeg,png',
            'id_schools' => 'required|exists:schools,id',
            'id_courses' => 'required|exists:courses,id',
        ]);

        // Upload da imagem
        $imageName = null;
        if ($request->hasFile('cover') && $request->file('cover')->isValid()) {
            $image = $request->file('cover');
            $extension = $image->extension();
            $imageName = md5($image->getClientOriginalName() . strtotime('now')) . '.' . $extension;
            $image->move(public_path('img/finalist'), $imageName);
        }

        //upload do arquivo
        $fileName = null;
        if ($request->hasFile('file') && $request->file('file')->isValid()) {
            $file = $request->file('file');
            $extension = $file->extension();
            $fileName = md5($file->getClientOriginalName() . strtotime('now')) . '.' . $extension;
            $file->move(public_path('files/finalist'), $fileName);
        }

        $finalist->update([
            'name' => $request->name,
            'email' => $request->email,
            'bi' => $request->bi,
            'phone' => $request->phone,
            'file' => $fileName,
            'cover' => $imageName,
            'id_schools' => $request->id_schools,
            'id_courses' => $request->id_courses,
        ]);

        return redirect()->route('admin.finalist.listar')->with('success', 'Finalista atualizado com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Finalist $finalist)
    {
        //
        $finalist = Finalist::findOrFail($finalist->id);
        $finalist->delete();
        return redirect()->route('admin.finalist.delete')->with('success', 'Finalista removido com sucesso.');
    }
}
