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
                            Registrar Afiliado
                        </h2>
                        
                    </div>

                </div>

               

            </div>
        </div>

    <form action="{{ route('afiliados.store') }}"
          method="POST"
          enctype="multipart/form-data">

        @include('afiliados.form', ['modo' => 'Guardar'])

    </form>
</div>

@endsection
