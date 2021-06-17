<?php

namespace App\Http\Controllers;

use App\Participantes;
use Illuminate\Http\Request;

class ParticipantesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $repo["participantes"] = Participantes::all();
        return view('participantes.index',$repo);
    }

    public function search(Request $request)
    {
        $search = $request->input("search");
        $result = Participantes::select()
            ->where("nombre","like","%$search%")
            ->orWhere("apellido","like","%$search%")
            ->orWhere("edad","like","%$search%")
            ->orWhere("pais","like","%$search%")
            ->get();
        return view("participantes.index")->with(["participantes"=>$result]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("participantes.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->except("_token");
        Participantes::insert($data);
        return redirect()->route("participantes.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Participantes::findOrfail($id);
        return view("participantes.info")->with(["participante"=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Participantes::findOrfail($id);
        return view("participantes.edit")->with(["participante"=>$data]);
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
        $data = $request->except("_token","_method");
        Participantes::where("id","=",$id)->update($data);
        return redirect()->route("participantes.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Participantes::destroy($id);
        return redirect()->route("participantes.index");
    }
}
