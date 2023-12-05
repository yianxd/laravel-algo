@extends('layouts.navbar')

@section('content')
    <div class="container">
        <h4>Registro</h4>
        <div class="row">
            <div class="col-xl-12">
                <form action="{{route('booking.store')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="ID_room">Numero de habitacion</label>
                        <input type="text" class="form-control" name="id_room" value={{"id_room"}}>
                    </div>
                    <div class="form-group">
                        <label for="dni">Documento cliente</label>
                        <input type="text" class="form-control" name="dni" value={{"dni"}}>
                    </div>
                    <div class="form-group">
                        <label for="date_end">Fecha final</label>
                        <input type="date" class="form-control" name="date_end" required value={{"date_end"}}>
                    </div>
                    <div class="form-group">
                        <label for="date_star">Fecha final</label>
                        <input type="date" class="form-control" name="date_start" required value={{"date_start"}}>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Registro">
                        <input type="reset" class="btn btn-danger" value="Cancelar">
                        <a href="javascript:history.back()" class='btn btn-dark'>Volver</a>
                    </div>

                </form>
            </div>

        </div>
    </div>
@endsection
