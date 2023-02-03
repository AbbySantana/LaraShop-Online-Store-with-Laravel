@extends('layouts.admin')
@section('title')
@section('content')
    <div class="card mb-4">
        <div class="card-header">
            Crear productos
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

            <form action="{{route('admin.product.update', ['id'=> $viewData['product']->getId()])}}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="row">
                    <div class="col">
                        <div class="mb-3 row">
                            <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Nombre:</label>
                            <div class="col-lg-10 col-md-6 col-sm-12">
                                <input name="name" type="text" class="form-control"
                                    value="{{ e($viewData['product']['name']) }}">

                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3 row">
                            <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Precio:</label>
                            <div class="col-lg-10 col-md-6 col-sm-12">
                                <input name="price" type="number" class="form-control"
                                    value="{{ e($viewData['product']['price']) }}">
                            </div>
                        </div>
                    </div>
                    <div class="image">
                        <label>Selecciona una imagen:</label>
                        <div class="col-lg-10 col-md-6 col-sm-12">
                            <input type="file" class="form-control" name="image">
                            <div>
                                <img src="{{ asset('storage/' . $viewData['product']['image']) }}"
                                    class="img-fluid rounded-start">
                            </div>

                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Descripción</label>
                    <textarea class="form-control" name="description" rows="3">{{ e($viewData['product']['description']) }}</textarea>
                </div>
                    <button type="submit" class="btn btn-primary">Modificar</button>
            </form>
        </div>
    </div>
@endsection
