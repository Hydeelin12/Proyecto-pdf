<?php

namespace App\Http\Controllers;

use App\Models\Articulo;
use App\Models\Registro;
use Illuminate\Http\Request;
use PDF;
/**
 * Class ArticuloController
 * @package App\Http\Controllers
 */
class ArticuloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articulos = Articulo::paginate();

        return view('articulo.index', compact('articulos'))
            ->with('i', (request()->input('page', 1) - 1) * $articulos->perPage());
    }

    public function pdf()
    {
        $articulos = Articulo::paginate();
        $pdf = PDF::loadView('articulo.pdf',['articulos'=>$articulos]);
        return $pdf->stream();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $articulo = new Articulo();

        $registros=Registro::pluck('nombre','id');

        return view('articulo.create', compact('articulo','registros'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Articulo::$rules);

        $articulo = Articulo::create($request->all());

        return redirect()->route('articulos.index')
            ->with('success', 'Articulo created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $articulo = Articulo::find($id);

        return view('articulo.show', compact('articulo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $articulo = Articulo::find($id);
        $registros=Registro::pluck('nombre','id');

        return view('articulo.edit', compact('articulo','registros'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Articulo $articulo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Articulo $articulo)
    {
        request()->validate(Articulo::$rules);

        $articulo->update($request->all());

        return redirect()->route('articulos.index')
            ->with('success', 'Articulo updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $articulo = Articulo::find($id)->delete();

        return redirect()->route('articulos.index')
            ->with('success', 'Articulo deleted successfully');
    }
}
