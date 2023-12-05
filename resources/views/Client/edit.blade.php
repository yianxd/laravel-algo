@extends('layouts.navbar')

@section('content')
    <div class="container">
        <h4>Registro</h4>
        <div class="row">
            <div class="col-xl-12">
                <form action="{{route('client.store')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="dni">Document</label>
                        <input type="text" class="form-control" name="dni" required value={{"$client->dni"}}>
                    </div>
                    <div class="form-group">
                        <label for="type_dni">Tipo de documento</label>
                        <input type="text" class="form-control" name="type_dni"  value={{"$client->type_dni"}}>
                    </div>
                    <div class="form-group">
                        <label for="id">ID</label>
                        <input type="text" class="form-control" name="id" value={{"$client->id"}}>
                    </div>
                    <div class="form-group">
                        <label for="addres">direccion</label>
                        <input type="text" class="form-control" name="addres" required value={{"$client->addres"}}>
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
