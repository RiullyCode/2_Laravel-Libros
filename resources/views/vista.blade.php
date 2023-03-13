<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Vista_Ejercicio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
</head>

<body>
    {{-- formulario --}}
    @extends('header')
    @section('content')
    <div class="container">

        <form action="{{route('list')}}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="titulo" class="form-label">Titulo</label>
                <input type="text" class="form-control" id="titulo" name="titulo" aria-describedby="titulohelp">
                <div id="titulohelp" class="form-text">Escriba aquí el titulo del libro</div>
            </div>
            <div class="mb-3">
                <label for="autor" class="form-label">autor</label>
                <input type="text" class="form-control" name="autor" id="autor" aria-describedby="autorhelp">
                <div id="autorhelp" class="form-text">Escriba aquí el autor del libro</div>
            </div>
            <div class="mb-3">
                <label for="date" class="form-label">date</label>
                <input type="date" class="form-control" name="fecha" id="date" aria-describedby="datehelp">
                <div id="datehelp" class="form-text">Escriba aquí la fecha del libro</div>
            </div>
            <div class="mb-3">
                <label for="estado" class="form-label">Estado</label>
                <select class="form-select" id="estado" name="estado" aria-describedby="estadoHelp">
                  <option value="disponible">Disponible</option>
                  <option value="no disponible">No disponible</option>
                </select>
                <div id="estadoHelp" class="form-text">Seleccione el estado del libro</div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    
        <br><br>
        
        {{-- listado_libros --}}
        <div class="row">
            @foreach($misLibros as $libro)
            <div class="card col-lg-4 col-md-6 col-sm-12">
                <h5>{{$libro->titulo}}</h5>
                <p>{{$libro->autor}}</p>
                <p>{{$libro->estado}}</p>
                <p>{{$libro->fecha}}</p>
                <form action="{{ route('eliminarTarea', $libro->id) }}" method="POST" class="float-end">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger">Eliminar</button>
                </form>
            </div>
            @endforeach
        </div>
        @endsection
    </div>
</body>

</html>
