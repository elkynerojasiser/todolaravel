<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Proyecto;
use redirect;

class ProyectoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proyectos = Proyecto::all();
        return view('proyectos.index',compact(["proyectos"]));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('proyectos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $proyecto = Proyecto::create($request->all());

        return redirect()->route('proyectos.index')
        ->with("mensaje", 'Proyecto creado correctamente')
        ->with("tipo", 'success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $proyecto = Proyecto::findOrFail($id);
        $tareas = $proyecto->tareas;
        return view('proyectos.show',compact(['proyecto','tareas']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $proyecto = Proyecto::findOrFail($id);
        return view('proyectos.edit',compact(['proyecto']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $proyecto = Proyecto::findOrFail($id);
        $proyecto->fill($request->all());
        $proyecto->save();

        return redirect()->route('proyectos.index')
        ->with("mensaje", 'Proyecto editad correctamente')
        ->with("tipo", 'success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $proyecto = Proyecto::findOrFail($id);
        $tareas = $proyecto->tareas;
        if(count($tareas)>0){
            return redirect()->route('proyectos.index')
            ->with("mensaje", 'El proyecto contiene tareas que se deben eliminar')
            ->with("tipo", 'danger');
        }else{
            $proyecto->delete();
            return redirect()->route('proyectos.index')
            ->with("mensaje", 'Proyecto eliminado correctamente')
            ->with("tipo", 'success');
        }

    }

    public function delete($id)
    {
        $proyecto = Proyecto::findOrFail($id);
        $tareas = $proyecto->tareas;
        if(count($tareas)>0){
            return redirect()->route('proyectos.index')
            ->with("mensaje", 'El proyecto contiene tareas que se deben eliminar')
            ->with("tipo", 'danger');
        }
        return view('proyectos.delete',compact(["proyecto"]));
    }
}
