<?php

namespace App\Http\Controllers;

use App\Models\Noticia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ControllerNoticias extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Noticia::all();
        return view('modules.admin.noticias.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $noticia = new Noticia();
        $route = route('noticias.store');
        return view('modules.admin.noticias.form', compact('noticia', 'route'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'contenido' => 'required|string',
            'imagen' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $noticia = new Noticia();
        $noticia->titulo = $request->titulo;
        $noticia->contenido = $request->contenido;
        $noticia->imagen = $request->file('imagen')->store('uploads/noticias', 'public');
        $noticia->save();

        return redirect()->route('noticias.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Noticia $noticia)
    {
        return view('modules.landing.noticias.show', compact('noticia'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Noticia $noticia)
    {
        $route = route('noticias.update', $noticia->id_noticia);
        return view('modules.admin.noticias.form', compact('noticia', 'route'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Noticia $noticia)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'contenido' => 'required|string',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $noticia->titulo = $request->titulo;
        $noticia->contenido = $request->contenido;

        if ($request->hasFile('imagen')) {
            $anterior = $noticia->imagen;
            $noticia->imagen = $request->file('imagen')->store('uploads/noticias', 'public');

            if ($anterior && Storage::disk('public')->exists($anterior)) {
                Storage::disk('public')->delete($anterior);
            }
        }

        $noticia->save();
        return redirect()->route('noticias.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Noticia $noticia)
    {

        if ($noticia->imagen && Storage::disk('public')->exists($noticia->imagen)) {
            Storage::disk('public')->delete($noticia->imagen);
        }

        $noticia->delete();
        return redirect()->route('noticias.index');
    }

    public function publico()
    {
        $noticias = Noticia::orderBy('id_noticia', 'desc')->get();
        return view('modules.landing.noticias.index', compact('noticias'));
    }

    public function detalle($id)
    {
        $noticia = Noticia::findOrFail($id);
        return view('modules.landing.noticias.show', compact('noticia'));
    }
}
