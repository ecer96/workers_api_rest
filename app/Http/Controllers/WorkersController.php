<?php

namespace App\Http\Controllers;

use App\Models\Workers;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class WorkersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {

            $workers = Workers::all();
            return response()->json(['message' => $workers], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error' . $e], 404);
        }
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {

            $validate = $request->validate([
                'name' => 'required',
                'email' => 'required|unique:workers',
                'number' => 'required|unique:workers',
                'age' => 'required',
                'profession' => 'required',
                'years' => 'required',
                'salary' => 'required'
            ]);

            Workers::create($validate);

            return response()->json([
                'message' => 'Worker Created Sucessfully'
            ], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error Creating the Worker' . $e->getMessage()], 404);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $worker = Workers::find($id);

        if (!$worker) {
            return response()->json(['Message' => 'We Couldnt Find that Worker...'], 404);
        }

        return response()->json(['Message' => $worker], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
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
        $worker = Workers::find($id);
    
        if (!$worker) {
            return response()->json(['message' => 'Trabajador no encontrado'], 404);
        }
    
        $worker->update($request->only($worker->getFillable()));
    
        return response()->json(['message' => 'Trabajador actualizado con éxito']);
    }


    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $worker = Workers::find($id);

        if (!$worker) {
            return response()->json(['Message' => 'We Couldnt Find any Worker Whit that id..'], 404);
        }

        $worker->destroy($id);

        return response()->json(['Message' => 'Woker Deleted' . $worker]);
    }
}
