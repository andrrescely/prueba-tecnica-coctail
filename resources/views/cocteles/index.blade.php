<!DOCTYPE html>
<html>
<head>
    <title>Lista de Cócteles</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
</head>
<body>
    <div class="container">
        <h1 class="mt-4">Lista de Cócteles</h1>
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table id="example" class="table table-striped table-bordered mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Instrucciones</th>
                    <th>Imagen</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <!-- Botón para redirigir a la vista de cocteles -->
                <a href="{{ url('/get-cocteles') }}" class="btn btn-primary">Agregar más Cocteles</a>
                @foreach($cocteles as $coctel)
                    <tr>
                        <td>{{ $coctel->id }}</td>
                        <td>{{ $coctel->name }}</td>
                        <td>{{ $coctel->instructions }}</td>
                        <td><img src="{{ $coctel->thumbnail }}" alt="Imagen" width="100"></td>
                        <td>
                            <a href="{{ route('cocteles.edit', $coctel->id) }}" class="btn btn-primary btn-sm">Editar</a>
                            <form action="{{ route('cocteles.destroy', $coctel->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
</body>
</html>
