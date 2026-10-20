<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ControllerGaleria extends Controller
{
    // Admin: listado
    public function index()
    {
        $fotos = Foto::all();
        return view('modules.admin.galeria.index', compact('fotos'));
    }

    // Admin: formulario de creación
    public function create()
    {
        $foto = new Foto();
        $route = route('galeria.store');
        return view('modules.admin.galeria.form', compact('foto', 'route'));
    }

    // Admin: guardar
    public function store(Request $request)
    {
        $request->validate([
            'descripcion' => 'required|string|max:255',
            'imagen'      => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $foto = new Foto();
        $foto->descripcion = $request->descripcion;
        $foto->imagen = $request->file('imagen')->store('uploads/galeria', 'public');
        $foto->save();

        return redirect()->route('galeria.index')->with('ok', 'Foto guardada correctamente');
    }

    // Admin: formulario de edición
    public function edit($id)
    {
        $foto = Foto::findOrFail($id);
        $route = route('galeria.update', $foto->id_foto);
        return view('modules.admin.galeria.form', compact('foto', 'route'));
    }

    // Admin: actualizar
    public function update(Request $request, $id)
    {
        $foto = Foto::findOrFail($id);

        $request->validate([
            'descripcion' => 'required|string|max:255',
            'imagen'      => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $foto->descripcion = $request->descripcion;

        if ($request->hasFile('imagen')) {
            $anterior = $foto->imagen;
            $foto->imagen = $request->file('imagen')->store('uploads/galeria', 'public');

            if ($anterior) {
                Storage::disk('public')->delete($anterior);
            }
        }

        $foto->save();

        return redirect()->route('galeria.index')->with('ok', 'Foto actualizada correctamente');
    }

    // Admin: eliminar
    public function destroy($id)
    {
        $foto = Foto::findOrFail($id);

        if ($foto->imagen) {
            Storage::disk('public')->delete($foto->imagen);
        }

        $foto->delete();

        return redirect()->route('galeria.index')->with('ok', 'Foto eliminada correctamente');
    }

    // Sitio público
    public function publico()
    {
        $fotos = Foto::all();
        return view('modules.landing.galeria.index', compact('fotos'));
    }
}