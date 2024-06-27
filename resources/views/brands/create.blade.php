@extends('layouts.layout')

@section('title', 'Crear Marca')

@section('content')

    <x-form :route="route('brands.store')" :title="'Crear Marca'" :fields="$fields" />

@endsection
@push('styles')
<link href="{{ asset('css/form.css') }}" rel="stylesheet">
@endpush