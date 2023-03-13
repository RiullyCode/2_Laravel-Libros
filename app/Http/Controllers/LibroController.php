<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use Illuminate\Http\Request;

class LibroController extends Controller
{
    public function listar(){
        $libros = Libro::all();
        return view('vista', ['misLibros' => $libros]);
    }

    public function añadir(Request $req){
        $libros = new Libro;
        $libros->titulo = $req->input('titulo');
        $libros->autor = $req->input('autor');
        $libros->fecha = $req->input('fecha');
        $libros->estado = $req->input('estado');

        $libros->save();

        $libros = Libro::all();
        return view('vista', ['misLibros' => $libros]);

    }

    public function delete($id) {
        $libros = Libro::findOrFail($id);
        $libros->delete();
        
        $libros = Libro::all();
        return view('vista', ['misLibros' => $libros]);
    }
}
