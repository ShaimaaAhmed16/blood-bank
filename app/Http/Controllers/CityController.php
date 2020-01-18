<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Governorate;
use Illuminate\Http\Request;
use PHPUnit\Framework\MockObject\Generator;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $records=City::paginate(20);
        return view('city.index',compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $governorates = Governorate::all();
        return view('city.create' , compact('governorates'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules=[
            'name'=>'required',
            'governorate_id'=>'required'
        ];
        $messages=[
            'name.required'=>'name is required',
            'governorate_id.required'=>'governorate is required'
        ];
        $this->validate($request,$rules,$messages);
        $record=City::create($request->all());
        flash()->success("success");
        return redirect(route('city.index'));
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
        $model=City::findOrFail($id);
        $governorates = Governorate::all();
        return view('city.edit',compact('model' , 'governorates'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        $record=City::findOrFail($id);
        $record->update($request->all());
        flash()->success('Edited');
        return redirect(route('city.index'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $record=City::findOrFail($id);
        $record->delete();
        flash()->success('Deleted');
        return redirect(route('city.index'));
    }
}
