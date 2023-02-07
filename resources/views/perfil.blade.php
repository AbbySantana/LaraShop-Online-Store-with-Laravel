
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

            <form action="{{route('perfil.update')}}"  method="POST">
                @csrf
                <div class="row">
                    <div class="col">
                        <div class="mb-3 row">
                            <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Color del encabezado</label>
                            <div class="col-lg-1 col-md-1 col-sm-12">
                                <input type="color" name="color" class="form-control" id="color-picker">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3 row">
                        <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Fuente de la letra</label>
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <select class="form-select" name="font" aria-label="Default select example">
                                <option selected>Seleccione un tipo de letra</option>
                                <option value="Arial, sans-serif">Arial, sans-serif</option>
                                <option value="Times New Roman, serif">Times New Roman, serif</option>
                                <option value="Courier New, monospace">Courier New, monospace</option>
                                <option value="Comic Sans, Comic Sans MS, cursive">Comic Sans, Comic Sans MS, cursive</option>
                                <option value="Oldtown, fantasy">Oldtown, fantasy</option>
                              </select>
                        </div>
                    </div>
                </div>
                    <button type="submit" class="btn btn-primary">Modificar</button>
            </form>
        </div>
    </div>
@endsection
