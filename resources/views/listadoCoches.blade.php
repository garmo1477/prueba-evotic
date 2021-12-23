@extends('layout')

@section('content')

    @if(session()->has('status'))
        <div class="alert alert-success">
            {{ session()->get('status') }}
        </div>
    @endif
    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
        <div class="flex justify-center pt-8 sm:justify-start sm:pt-0">
            <h1 class="mb-4 pt-4">Listado de Coches</h1>
        </div>
        <div>
            <div>
                <table class="table table-dark table-striped">
                    <thead>
                        <tr>
                            <th>{{ __('ID_Prop') }} </th>
                            <th>{{ __('Model') }}</th>
                            <th>{{ __('Marca') }}</th>
                            <th>{{ __('Color') }}</th>
                            <th>{{ __('Caballos') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($coches as $coche)
                            <tr>
                                <td>
                                    {{ $coche->propietario_id }}
                                </td>
                                <td>{{ $coche->modelo }}</td>
                                <td>{{ $coche->marca }} </td>
                                <td>{{ $coche->color }} </td>
                                <td>{{ $coche->caballos }} </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a href="{{ route('crear-coche') }}" class="btn btn-primary mb-4" type="button">Añadir nuevo coche</a>
            </div>
        </div>
        <div class="flex justify-center mt-4 sm:items-center sm:justify-between">  
            <div class="ml-4 text-center text-sm text-gray-500 sm:text-right sm:ml-0">
                Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
            </div>
        </div>
    </div>
    </div>
@endsection
