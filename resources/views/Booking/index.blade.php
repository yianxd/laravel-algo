@extends('layouts.navbar')

@section('content')
<div class="cotainer">
    <h4>Reservas</h4>
    <div class="row">
        <div class="col-xl-12">
            <form action="{{ route('booking.index')}}" method="get">
                <div class="form-row">
                    <div class="col-sm-3 my-1">
                        <input type="text" class="form-control" name="texto" value="{{$texto}}">
                    </div>
                    <div class="col-auto my-1">
                          <input type="submit" class="btn btn-primary" value="Buscar">
                    </div>
                    <div class="col-auto my-1">
                        <a href="{{route('booking.create')}}" class="btn btn-success">Nuevo cliente</a>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-lx-12">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Opciones</th>
                            <th>ID</th>
                            <th>Habitacion</th>
                            <th>Documento cliente</th>
                            <th>Fecha final</th>
                            <th>Fecha inicio</th>
                            <th>dias</th>
                            <th>estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($booking)<=0)
                            <tr>
                                <td colspan="4">No hay resultados</td>
                            </tr>
                        @else
                        @foreach ($booking as $booking)
                        <tr>
                            <td>
                                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modal-delete-{{$booking->id_booking}}">
                                    Eliminar
                                </button> |
                                <a href="{{route('booking.edit',$booking->id_booking)}} " class="btn btn-warning btn-sm">Editar</a>
                            </td>
                            <td>{{$booking->id_booking}}</td>
                            <td>{{$booking->id_room}}</td>
                            <td>{{$booking->dni}}</td>
                            <td>{{$booking->date_end}}</td>
                            <td>{{$booking->date_start}}</td>
                            <td>{{$booking->status}}</td>
                        </tr>
                        @include('booking.destroy')
                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
@endsection
