@extends('layouts.layout')

@section('title', 'Editar Categoria')

@section('content')

    <x-form :route="route('categories.update',$category)" :title="'Actualizar Categoria'" :fields="$fields"/>

@endsection
@push('styles')
<link href="{{ asset('css/form.css') }}" rel="stylesheet">
@endpush