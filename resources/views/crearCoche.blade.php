@extends('layout')

@section('content')
    <div class="row" style="padding: 10%;">
        <div class="col-md-6">
            <form action="{{ route('guardar-coche') }}" method="post">
                @csrf
                <h1>Añadir coche</h1>
                <div class="mb-3">
                    <label for="">Propietario</label>
                    <select class="form-control" name="propietario_id" id="id_select">
                        <option id="seleccionar">Seleccione un propietario</option>
                        @foreach ($propietarios as $propietario)
                            <option class="propietarios" value="{{ $propietario->id }}">{{ $propietario->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="">Modelo</label>
                    <input class="form-control" type="text" name="modelo" value="{{ $coche->modelo }}">
                </div>
                <div class="mb-3">
                    <label for="">Marca</label>
                    <input class="form-control" type="text" name="marca" value="{{ $coche->marca }}">
                </div>
                <div class="mb-3">
                    <label for="">Color</label>
                    <input class="form-control" type="text" name="color" value="{{ $coche->color }}">
                </div>
                <div class="mb-3">
                    <label for="">Caballos</label>
                    <input class="form-control" type="text" name="caballos" value="{{ $coche->caballos }}">
                </div>
                <button type="submit" class="btn btn-primary">Añadir coche</button>
            </form>
        </div>      
        <div class="col-md-6 pt-4">
            <div id="coches_propie" style="display: none;">
                <h3>Coches del propietario seleccionado </h3>
                <table class="table table-dark table-striped">
                    <thead>
                        <tr>
                            <th>{{ __('Id_Propietario') }}</th>
                            <th>{{ __('Model') }}</th>
                            <th>{{ __('Marca') }}</th>
                            <th>{{ __('Color') }}</th>
                            <th>{{ __('Caballos') }}</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- CDN Jquery y script -->

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>

    <!-- Ajax que lista los coches de un propietario seleccionado -->
    <script type="text/javascript">
        $(document).ready(function() {
            $('#id_select').on('change', function() {

                if ($(".propietarios").val()) {
                    $('#coches_propie').show();
                }
                var id_propietario = $(this).val();
                //alert(id_propietario);
                $.ajax({
                    url: "{{ route('coches-propi') }}",
                    data: {
                        propietario_id: id_propietario
                    },
                    datatype: "HTML",
                    type: 'GET',
                    success: function(data) {
                        $('tbody').html(data);
                    },
                    statusCode: {
                        404: function() {
                            alert('Error');
                        }
                    },
                    error: function(x, xs, xt) {
                        window.open(JSON.stringify(x));

                    }
                });
            });
        });
    </script>
@endsection
