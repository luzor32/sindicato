<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Afiliado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class AfiliadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */

 public function index(Request $request)
{
    $buscar = $request->buscar;
    $estado = $request->estado;
    $orden = $request->orden ?? 'id';
    $direccion = $request->direccion ?? 'desc';

    $afiliados = Afiliado::query()

        ->when($buscar, function ($query) use ($buscar) {
            $query->where(function ($q) use ($buscar) {
                $q->where('dni', 'like', "%{$buscar}%")
                  ->orWhere('nombre', 'like', "%{$buscar}%")
                  ->orWhere('apellido', 'like', "%{$buscar}%");
            });
        })

        ->when($estado, function ($query) use ($estado) {
            $query->where('estado', $estado);
        })

        ->orderBy($orden, $direccion)

        ->paginate(2)
        ->withQueryString();

        if ($request->ajax()) {
        return view('afiliados.partials.tabla', compact('afiliados'))->render();
         }

    return view('afiliados.index', compact(
        'afiliados',
        'buscar',
        'estado',
        'orden',
        'direccion'
    ));
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('afiliados.create');
    }

    /**
     * Store a newly created resource in storage.
     */


    public function store(Request $request)
    {
        // 1️⃣ Validación
        $rules = [
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'dni' => 'required|digits:8|unique:afiliados,dni',
            'cuil' => 'required|digits:11|unique:afiliados,cuil',
            'nacionalidad' => 'required|string|max:100',
            'empresa' => 'required|string|max:255',
            'email' => 'required|email',
            'telefono' => 'required|string|max:50',
            'fecha_nacimiento' => 'required|date',
            'localidad' => 'required|string|max:150',
            'calle' => 'required|string|max:150',
            'numero' => 'required|string|max:10',
            'provincia' => 'required|string|max:150',
            'codigo_postal' => 'required|string|max:20',
            'puesto' => 'required|string|max:150',
            'seccion' => 'required|string|max:150',
            'tipo_contrato' => 'required|string|max:150',
            'jornada_laboral' => 'required|string|max:150',
            'delegacion_sindical' => 'required|string|max:150',

            // DOCUMENTOS
            'foto_dni' => 'required|image|mimes:jpg,jpeg,png|max:100240',
            'foto_dni_dorso' => 'required|image|mimes:jpg,jpeg,png|max:100240',

            // NUEVOS (opcionales)
            'recibo_sueldo' => 'required|file|mimes:jpg,jpeg,png,pdf|max:100240',
            'certificado_trabajo' => 'required|file|mimes:jpg,jpeg,png,pdf|max:100240',
        ];

        $messages = [
            'required' => 'El campo :attribute es obligatorio',
            'digits' => 'El campo :attribute debe tener :digits dígitos',
            'unique' => 'El :attribute ya existe en el sistema',
            'image' => 'El archivo debe ser una imagen válida',
            'mimes' => 'Formato permitido: jpg, jpeg, png o pdf',
            'max' => 'El archivo supera el tamaño máximo permitido'
        ];

        $validatedData = $request->validate($rules, $messages);

        // 2️⃣ Normalizar datos
        $validatedData['nombre'] = strtoupper($validatedData['nombre']);
        $validatedData['apellido'] = strtoupper($validatedData['apellido']);
        $validatedData['email'] = strtolower($validatedData['email']);

        DB::beginTransaction();

        try {

            // ✅ DNI FRENTE
            if ($request->hasFile('foto_dni')) {
                $validatedData['foto_dni'] =
                    $request->file('foto_dni')->store('dni', 'public');
            }

            // ✅ DNI DORSO
            if ($request->hasFile('foto_dni_dorso')) {
                $validatedData['foto_dni_dorso'] =
                    $request->file('foto_dni_dorso')->store('dni', 'public');
            }

            // ✅ RECIBO DE SUELDO (NUEVO)
            if ($request->hasFile('recibo_sueldo')) {
                $validatedData['recibo_sueldo'] =
                    $request->file('recibo_sueldo')->store('documentos', 'public');
            }

            // ✅ CERTIFICADO TRABAJO (NUEVO)
            if ($request->hasFile('certificado_trabajo')) {
                $validatedData['certificado_trabajo'] =
                    $request->file('certificado_trabajo')->store('documentos', 'public');
            }

            // 5️⃣ Estado inicial
            $validatedData['estado_solicitud'] = Afiliado::SOLICITUD_PENDIENTE;
            $validatedData['estado_afiliado'] = null;
            $validatedData['fecha_alta'] = null;

            // 6️⃣ Crear afiliado
            $afiliado = Afiliado::create($validatedData);

            // 7️⃣ Número afiliado automático
            $afiliado->numero_afiliado =
                'AFI-' . str_pad($afiliado->id, 6, '0', STR_PAD_LEFT);

            $afiliado->save();

            DB::commit();

            return redirect()
                ->route('afiliados.index')
                ->with('mensaje', 'Afiliado creado correctamente ✅');

        } catch (\Exception $e) {

            DB::rollBack();
            dd($e->getMessage());
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(Afiliado $afiliado)
    {
        //
        return view('afiliados.show', compact('afiliado'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Afiliado $afiliado)
    {
        //
        return view('afiliados.edit', compact('afiliado'));
    }

    /**
     * Update the specified resource in storage.
     */


    public function update(Request $request, Afiliado $afiliado)
    {
        // 1️⃣ Validación
        $rules = [
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'dni' => [
                'required',
                'digits:8',
                Rule::unique('afiliados', 'dni')->ignore($afiliado->id),
            ],
            'cuil' => [
                'required',
                'digits:11',
                Rule::unique('afiliados', 'cuil')->ignore($afiliado->id),
            ],
            'nacionalidad' => 'required|string|max:100',
            'empresa' => 'required|string|max:255',
            'email' => 'required|email',
            'telefono' => 'required|string|max:50',
            'fecha_nacimiento' => 'required|date',
            'localidad' => 'required|string|max:150',
            'calle' => 'required|string|max:150',
            'numero' => 'required|string|max:10',

            'provincia' => 'required|string|max:100',
            'codigo_postal' => 'required|string|max:20',
            'puesto' => 'required|string|max:255',
            'seccion' => 'required|string|max:255',
            'tipo_contrato' => 'required|string|max:255',
            'jornada_laboral' => 'required|string|max:255',
            'fecha_afiliacion' => 'nullable|date',
            'delegacion_sindical' => 'required|string|max:255',

            'estado_solicitud' => 'nullable|in:pendiente,aprobado,rechazado',
            'estado_afiliado' => 'nullable|in:activo,suspendido,baja',

            // DOCUMENTOS
            'foto_dni' => 'nullable|image|mimes:jpg,jpeg,png|max:10240',
            'foto_dni_dorso' => 'nullable|image|mimes:jpg,jpeg,png|max:10240',

            // NUEVOS
            'recibo_sueldo' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:10240',
            'certificado_trabajo' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:10240',
        ];

        $messages = [
            'required' => 'El campo :attribute es obligatorio',
            'digits' => 'El campo :attribute debe tener :digits dígitos',
            'unique' => 'El :attribute ya existe en el sistema',
            'image' => 'El archivo debe ser una imagen válida',
            'mimes' => 'Formato permitido: jpg, jpeg, png o pdf',
            'max' => 'El archivo supera el tamaño máximo permitido'
        ];

        $validatedData = $request->validate($rules, $messages);

        // 2️⃣ Normalizar datos
        $validatedData['nombre'] = strtoupper($validatedData['nombre']);
        $validatedData['apellido'] = strtoupper($validatedData['apellido']);
        $validatedData['email'] = strtolower($validatedData['email']);

        DB::beginTransaction();

        try {

            // 3️⃣ Aprobación por primera vez
            if (
                $request->estado_solicitud == Afiliado::SOLICITUD_APROBADO &&
                $afiliado->estado_solicitud != Afiliado::SOLICITUD_APROBADO
            ) {
                $validatedData['fecha_alta'] = now();
                $validatedData['estado_afiliado'] = Afiliado::AFILIADO_ACTIVO;
            }

            /*
            |--------------------------------------------------------------------------
            | DOCUMENTOS
            |--------------------------------------------------------------------------
            */

            // ✅ DNI FRENTE
            if ($request->hasFile('foto_dni')) {

                if ($afiliado->foto_dni &&
                    Storage::disk('public')->exists($afiliado->foto_dni)) {
                    Storage::disk('public')->delete($afiliado->foto_dni);
                }

                $validatedData['foto_dni'] =
                    $request->file('foto_dni')->store('dni', 'public');
            }

            // ✅ DNI DORSO
            if ($request->hasFile('foto_dni_dorso')) {

                if ($afiliado->foto_dni_dorso &&
                    Storage::disk('public')->exists($afiliado->foto_dni_dorso)) {
                    Storage::disk('public')->delete($afiliado->foto_dni_dorso);
                }

                $validatedData['foto_dni_dorso'] =
                    $request->file('foto_dni_dorso')->store('dni', 'public');
            }

            // ✅ RECIBO SUELDO (NUEVO)
            if ($request->hasFile('recibo_sueldo')) {

                if ($afiliado->recibo_sueldo &&
                    Storage::disk('public')->exists($afiliado->recibo_sueldo)) {
                    Storage::disk('public')->delete($afiliado->recibo_sueldo);
                }

                $validatedData['recibo_sueldo'] =
                    $request->file('recibo_sueldo')->store('documentos', 'public');
            }

            // ✅ CERTIFICADO TRABAJO (NUEVO)
            if ($request->hasFile('certificado_trabajo')) {

                if ($afiliado->certificado_trabajo &&
                    Storage::disk('public')->exists($afiliado->certificado_trabajo)) {
                    Storage::disk('public')->delete($afiliado->certificado_trabajo);
                }

                $validatedData['certificado_trabajo'] =
                    $request->file('certificado_trabajo')->store('documentos', 'public');
            }

            // 6️⃣ Evitar modificación manual fecha alta
            unset($validatedData['fecha_alta']);

            // 7️⃣ Actualizar
            $afiliado->update($validatedData);

            DB::commit();

            return redirect()
                ->route('afiliados.index')
                ->with('mensaje', 'Afiliado actualizado correctamente ✅');

        } catch (\Exception $e) {

            DB::rollBack();
            dd($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Afiliado $afiliado)
    {
        //
        // 1️⃣ Borrar la foto del storage si existe
        if ($afiliado->foto_dni) {
            Storage::disk('public')->delete($afiliado->foto_dni);
        }

        // 2️⃣ Borrar el registro de la base de datos
        $afiliado->delete();

        // 3️⃣ Redirigir con mensaje flash
        return redirect()
            ->route('afiliados.index')
            ->with('mensaje', 'Afiliado eliminado correctamente');
    }
}
