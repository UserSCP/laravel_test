
@extends('layouts.layout')

@section('title', 'Crear Categoria')

@section('content')

    <x-form :route="route('categories.store')" :title="'Crear Categoria'" :fields="$fields" />

@endsection
@push('styles')
<link href="{{ asset('css/form.css') }}" rel="stylesheet">
@endpush