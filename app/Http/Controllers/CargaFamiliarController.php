<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Afiliado;
use App\Models\CargaFamiliar;

class CargaFamiliarController extends Controller
{

    // ==============================
    // FORMULARIO CREAR FAMILIAR
    // ==============================

    public function create($afiliado_id)
    {

        $afiliado = Afiliado::findOrFail($afiliado_id);

        return view('carga_familiar.create', compact('afiliado','afiliado_id'));

    }


    // ==============================
    // GUARDAR FAMILIAR
    // ==============================

    public function store(Request $request)
    {

        $request->validate([

            'nombre' => 'required',
            'apellido' => 'required',
            'dni' => 'nullable',
            'parentesco' => 'required'

        ]);

        CargaFamiliar::create([

            'afiliado_id' => $request->afiliado_id,
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'dni' => $request->dni,
            'parentesco' => $request->parentesco,
            'es_hijo' => $request->es_hijo ?? 0,
            'estudia' => $request->estudia ?? 0,
            'discapacidad' => $request->discapacidad ?? 0,
            'fecha_nacimiento' => $request->fecha_nacimiento

        ]);

        return redirect()
            ->route('carga_familiar.show', $request->afiliado_id)
            ->with('mensaje','Carga familiar agregada correctamente');

    }


    // ==============================
    // VER CARGA FAMILIAR
    // ==============================

    public function show($afiliado_id)
    {

        $afiliado = Afiliado::with('cargasFamiliares')
                    ->findOrFail($afiliado_id);

        return view('carga_familiar.show', compact('afiliado'));

    }


    // ==============================
    // FORMULARIO EDITAR FAMILIAR
    // ==============================

    public function edit($id)
    {

        $familiar = CargaFamiliar::findOrFail($id);

        return view('carga_familiar.edit', compact('familiar'));

    }


    // ==============================
    // ACTUALIZAR FAMILIAR
    // ==============================

    public function update(Request $request, $id)
    {

        $familiar = CargaFamiliar::findOrFail($id);

        $request->validate([

            'nombre' => 'required',
            'apellido' => 'required',
            'dni' => 'nullable',
            'parentesco' => 'required'

        ]);

        $familiar->update([

            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'dni' => $request->dni,
            'parentesco' => $request->parentesco,
            'es_hijo' => $request->es_hijo ?? 0,
            'estudia' => $request->estudia ?? 0,
            'discapacidad' => $request->discapacidad ?? 0,
            'fecha_nacimiento' => $request->fecha_nacimiento

        ]);

        return redirect()
            ->route('carga_familiar.show', $familiar->afiliado_id)
            ->with('mensaje','Carga familiar actualizada');

    }

     // ==============================
    // detalle familiar
    // ==============================

        public function detalle($id)
    {

        $familiar = CargaFamiliar::findOrFail($id);

        return view('carga_familiar.detalle', compact('familiar'));

    }

    public function destroy($id)
    {

        $familiar = CargaFamiliar::findOrFail($id);

        $afiliado_id = $familiar->afiliado_id;

        $familiar->delete();

        return redirect()
            ->route('carga_familiar.show', $afiliado_id)
            ->with('mensaje','Carga familiar eliminada correctamente');

    }

}