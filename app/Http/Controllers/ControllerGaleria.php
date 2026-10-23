<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use Illuminate\Http\Request;

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

        $imagen = $request->file('imagen');
        $nombre = time() . '_' . uniqid() . '.' . $imagen->getClientOriginalExtension();
        $imagen->move(public_path('uploads/galeria'), $nombre);
        $foto->imagen = 'uploads/galeria/' . $nombre;

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

            $imagen = $request->file('imagen');
            $nombre = time() . '_' . uniqid() . '.' . $imagen->getClientOriginalExtension();
            $imagen->move(public_path('uploads/galeria'), $nombre);
            $foto->imagen = 'uploads/galeria/' . $nombre;

            if ($anterior && file_exists(public_path($anterior))) {
                unlink(public_path($anterior));
            }
        }

        $foto->save();

        return redirect()->route('galeria.index')->with('ok', 'Foto actualizada correctamente');
    }

    // Admin: eliminar
    public function destroy($id)
    {
        $foto = Foto::findOrFail($id);

        if ($foto->imagen && file_exists(public_path($foto->imagen))) {
            unlink(public_path($foto->imagen));
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
