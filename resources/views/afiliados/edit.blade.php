@extends('layouts.app')

@section('content')

<div class="container">
    
    {{-- Banner superior --}}
        <div class="bg-danger mb-4 rounded p-4 text-white shadow-sm">
            <div class="d-flex justify-content-between align-items-center">

                <div class="d-flex align-items-center gap-3">
                    
                    <img src="{{ asset('img/logo-seoc.png') }}" 
                        alt="Logo Sindicato" 
                        style="height:50px; width:auto;">

                    <div>
                        <h2 class="mb-1">
                            Editar Afiliado
                        </h2>
                        
                    </div>

                </div>

               

            </div>
        </div>

    <form action="{{ route('afiliados.update', $afiliado) }}"
          method="POST"
          enctype="multipart/form-data">

        @method('PUT')

        @include('afiliados.form', ['modo' => 'Actualizar'])

    </form>
</div>

@endsection
