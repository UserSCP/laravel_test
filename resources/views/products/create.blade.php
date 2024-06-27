@extends('layouts.layout')

@section('title', 'Crear Producto')

@section('content')
    <x-form :route="route('products.store')" :title="'Crear Producto'" :fields="$fields" />
@endsection
@push('styles')
<link href="{{ asset('css/form.css') }}" rel="stylesheet">
@endpush