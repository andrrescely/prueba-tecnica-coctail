<!DOCTYPE html>
<html>
<head>
    <title>Editar Cóctel</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h1>Editar Cóctel</h1>

        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('cocteles.update', $coctel->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $coctel->name) }}" required>
            </div>

            <div class="mb-3">
                <label for="instructions" class="form-label">Instrucciones</label>
                <textarea class="form-control" id="instructions" name="instructions" rows="3" required>{{ old('instructions', $coctel->instructions) }}</textarea>
            </div>

            <div class="mb-3">
                <label for="thumbnail" class="form-label">Imagen URL</label>
                <input type="text" class="form-control" id="thumbnail" name="thumbnail" value="{{ old('thumbnail', $coctel->thumbnail) }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Actualizar Cóctel</button>
            <a href="{{ route('cocteles.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
