@extends('layouts.layout')

@section('title', 'Editar Marca')

@section('content')

    <x-form :route="route('brands.update',$brand)" :title="'Actualizar marca'" :fields="$fields"/>

@endsection
@push('styles')
<link href="{{ asset('css/form.css') }}" rel="stylesheet">
@endpush