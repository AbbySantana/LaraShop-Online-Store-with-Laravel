
@extends('layouts.app')
@section('title')
@section('content')
    <div class="card mb-4">
        <div class="card-header">
           Perfil de Usuario
        </div>
        <div class="card-body">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="" method="POST" >
                @method('PUT')
                @csrf
                <div class="row">
                    <div class="col">
                        <div class="mb-3 row">
                            <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Color del encabezado</label>
                            <div class="col-lg-10 col-md-6 col-sm-12">
                                <input name="name" type="text" class="form-control">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3 row">
                        <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Fuente de la letra</label>
                        <div class="col-lg-10 col-md-6 col-sm-12">
                            <input name="name" type="text" class="form-control">

                        </div>
                    </div>
                </div>
                    <button type="submit" class="btn btn-primary">Modificar</button>
            </form>
        </div>
    </div>
@endsection
