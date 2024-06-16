<a href="{{ $route }}"><button class="btn">@yield('title')</button></a>
<br><br>
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<table class="table">
  <thead>
      <tr>
          <th>Id</th>
          @if ($route == route('categories.create'))
              <th>Id_Parent</th>
          @endif
          <th>Name</th>
          @if ($route == route('products.create'))
              <th>Price</th>
              <th>Description</th>
          @endif
          <th>Editar</th>
          <th>Eliminar</th>
      </tr>
  </thead>
  <tbody>
      {{ $slot; }}
  </tbody>
</table>