<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="{{ public_path('css/app.css') }}" rel="stylesheet" type=""text/css>
</head>
<body>
<h2>Lista de articulos</h2>

    <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
										<th>Registro</th>
										<th>Nombre</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($articulos as $articulo)
                                        <tr>
                                            
											<td>
                                                {{ $articulo->registro->nombre }}
                                            </td>
											<td>{{ $articulo->nombre }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
</body>
</html>