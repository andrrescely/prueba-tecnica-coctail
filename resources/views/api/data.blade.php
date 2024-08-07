<!DOCTYPE html>
<html>
<head>
    <title>Cocktails</title>
    @vite('resources/js/app.js')
    @vite('resources/sass/app.scss')
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    <div class="container">
        <h1 class="my-4">COCTELES API</h1>
        <table id="cocktailsTable" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Instructions</th>
                    <th>Thumbnail Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <!-- Botón para redirigir a la vista de cocteles -->
                <a href="{{ url('/cocteles') }}" class="btn btn-primary">Lista de cócteles agregados</a>
                @foreach ($cocktails as $cocktail)
                    <tr>
                        <td>{{ $cocktail['strDrink'] }}</td>
                        <td>{{ $cocktail['strInstructions'] }}</td>
                        <td><img src="{{ $cocktail['strDrinkThumb'] }}" alt="{{ $cocktail['strDrink'] }}" width="100"></td>
                        <td>
                            <button class="btn btn-primary save-coctel"
                                    data-name="{{ $cocktail['strDrink'] }}"
                                    data-instructions="{{ $cocktail['strInstructions'] }}"
                                    data-thumbnail="{{ $cocktail['strDrinkThumb'] }}">
                                Save
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script>
        // $(document).ready(function() {
        //     $('#cocktailsTable').DataTable();

        //     $('.save-coctel').on('click', function() {
        //         let name = $(this).data('name');
        //         let instructions = $(this).data('instructions');
        //         let thumbnail = $(this).data('thumbnail');

        //         $.ajax({
        //             type: 'POST',
        //             url: '/save-coctel',
        //             data: {
        //                 _token: '{{ csrf_token() }}',
        //                 name: name,
        //                 instructions: instructions,
        //                 thumbnail: thumbnail
        //             },
        //             success: function(response) {
        //                 alert(response.success);
        //             },
        //             error: function(error) {
        //                 console.log(error);
        //                 alert('An error occurred. Please try again.');
        //             }
        //         });
        //     });
        // });
    </script>
</body>
</html>
