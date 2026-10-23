<?php

namespace App\Http\Controllers;

use App\Models\Slide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ControllerSlider extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Slide::all();
        return view('modules.admin.slides.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $slide = new Slide();
        $route = route('slides.store');
        $id_slide = 1;
        return view('modules.admin.slides.form', compact('slide', 'route', 'id_slide'));
    }

    /**
     * Store a newly created resource in storage.
     */


    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'imagen' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048'
        ]);

        $slide = new Slide();
        $slide->titulo = $request->titulo;
        $slide->descripcion = $request->descripcion;

        $imagen = $request->file('imagen');
        $nombre = time() . '_' . uniqid() . '.' . $imagen->getClientOriginalExtension();
        $imagen->move(public_path('uploads/slides'), $nombre);
        $slide->imagen = 'uploads/slides/' . $nombre;

        $slide->save();

        return redirect()->route('slides.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $slide = Slide::findOrFail($id);
        return view('modules.landing.slides.show', compact('slide'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Slide $slide)
    {
        $route = route('slides.update', $slide->id_slide);
        $id_slide = $slide->id_slide;
        return view('modules.admin.slides.form', compact('slide', 'route', 'id_slide'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Slide $slide)
    {
        $slide->titulo = $request->titulo;
        $slide->descripcion = $request->descripcion;

        if ($request->hasFile('imagen')) {
            $imagenAnterior = $slide->imagen;

            $imagen = $request->file('imagen');
            $nombre = time() . '_' . uniqid() . '.' . $imagen->getClientOriginalExtension();
            $imagen->move(public_path('uploads/slides'), $nombre);
            $slide->imagen = 'uploads/slides/' . $nombre;

            $slide->save();

            if ($imagenAnterior && File::exists(public_path($imagenAnterior))) {
                File::delete(public_path($imagenAnterior));
            }
        } else {
            $slide->save();
        }

        return redirect()->route('slides.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Slide $slide)
    {
        if ($slide->imagen && File::exists(public_path($slide->imagen))) {
            File::delete(public_path($slide->imagen));
        }

        $slide->delete();

        return redirect()->route('slides.index');
    }
}
