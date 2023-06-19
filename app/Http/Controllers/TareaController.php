<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tarea;
use App\Models\Proyecto;
use Illuminate\Support\Facades\Auth;

class TareaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $tareas = $user->tareas;
        return view('tareas.index',compact(['tareas']));
    }

    public function listarPorProyecto($proyecto_id) {
        $tareas = Tarea::where('proyecto_id',$proyecto_id);
        return $tareas;
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        $proyectos = $user->proyectos;
        return view('tareas.create',compact(['proyectos']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tarea = Tarea::create($request->all());
        return redirect()->route('tareas.index')
        ->with("mensaje", 'Tarea creada correctamente')
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Auth::user();
        $proyectos = $user->proyectos;
        $tarea = Tarea::findOrFail($id);
        return view('tareas.edit',compact(['tarea','proyectos']));
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
        $tarea = Tarea::findOrFail($id);
        $tarea->fill($request->all());
        $tarea->save();
        return redirect()->route('tareas.index')
        ->with("mensaje", 'Tarea editada correctamente')
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
        $tarea = Tarea::findOrFail($id);
        $tarea->delete();
        return redirect()->route('tareas.index')
        ->with("mensaje", 'Tarea eliminada correctamente')
        ->with("tipo", 'success');
    }

    public function delete($id)
    {
        $tarea = Tarea::findOrFail($id);
        return view('tareas.delete', compact(['tarea']));
    }
}
