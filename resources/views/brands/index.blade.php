@extends('layouts.layout')
@section('bottun','Subir Marca')
@section('title', 'Tabla Marca')

@section('content')
    @component('components.table', ['route' => route('brands.create')])
        @slot('route', $route)
        @foreach ($brands as $brand)
            <tr>
                <td>{{ $brand->id }}</td>
                <td>{{ $brand->name }}</td>
                <td>
                    <a href="{{ route('brands.edit', $brand) }}" ><button class="button button2">Editar</button></a>
                </td>
                <td>
                    <form action="{{ route('brands.destroy', $brand) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit"class="button button3" >Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach
    @endcomponent
@endsection
@push('styles')
<link href="{{ asset('css/table.css') }}" rel="stylesheet">
@endpush