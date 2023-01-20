@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
    <div class="card mb-3">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="{{asset($viewData["product"]["image"])}}" class="img-fluid rounded-start">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                <h5 class="card-title">
                    {{ strtoupper(e($viewData["product"]["name"]))}} ({{$viewData["product"]["price"]}})
                </h5>
                <p class="card-text">{{strtoupper(e($viewData["product"]["description"]))}}</p>
                <p class="card-text"><small class="text-muted">Añadir a la cesta</small></p>
                </div>
            </div>
            <div class="card-body text-center">
                <a href="{{route('products.index')}}" class="btn bg-primary text-white">Volver</a>
            </div>
        </div>
    </div>
@endsection
