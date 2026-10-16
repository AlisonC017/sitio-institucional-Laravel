<?php

namespace App\Http\Controllers;

use App\Mail\ContactoMail;
use App\Models\Contacto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class ControllerContactos extends Controller
{
    // admin, parte dle formulairo 
    public function index()
    {
        $contacto = Contacto::first() ?? new Contacto();
        return view('modules.admin.contacto.form', compact('contacto'));
    }

    // guardar
    public function guardar(Request $request)
    {
        $request->validate([
            'nombre_empresa' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
            'telefono' => 'required|string|max:50',
            'correo' => 'required|email|max:100',
            'facebook' => 'nullable|string|max:255',
            'instagram' => 'nullable|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $contacto = Contacto::first() ?? new Contacto();
        $contacto->fill($request->only([
            'nombre_empresa', 'direccion', 'telefono',
            'correo', 'facebook', 'instagram',
        ]));

        if ($request->hasFile('logo')) {
            $anterior = $contacto->logo;
            $contacto->logo = $request->file('logo')->store('uploads/contacto', 'public');

            if ($anterior && Storage::disk('public')->exists($anterior)) {
                Storage::disk('public')->delete($anterior);
            }
        }

        $contacto->save();

        return redirect()->route('contacto.index')->with('ok', 'Información guardada correctamente');
    }

    // pagina de contacto
    public function publico()
    {
        $contacto = Contacto::first();
        return view('modules.landing.contact', compact('contacto'));
    }

    // enviar mensaje
    public function enviar(Request $request)
    {
        $datos = $request->validate([
            'nombre' => 'required|string|max:100',
            'correo' => 'required|email|max:100',
            'asunto' => 'required|string|max:150',
            'mensaje' => 'required|string|max:2000',
        ]);

        $destino = Contacto::first()?->correo ?? config('mail.from.address');

        Mail::to($destino)->send(new ContactoMail($datos));

        return back()->with('ok', 'Mensaje enviado correctamente');
    }
}