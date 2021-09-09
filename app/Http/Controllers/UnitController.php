<?php

namespace App\Http\Controllers;

use App\Models\Units;
use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Report\Xml\Unit;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
           $item_id=$_GET['item_id'];
        }catch (\Exception $e){
            $item_id=$_REQUEST['item_id'];
        }
        if ($item_id != null) {
            $units = Units::all()->where('item_id', '=', $item_id);
        } else {
            $units = Units::all();
        }
        return view('units.index', compact('units'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try{
            $item_id=$_GET['id'];

        }catch (\Exception $e){
            $item_id=null;
        }
        return view('units.create',compact('item_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validate=$request->validate(
            [
                'name'=>['required', 'string',],
                'buy_price' =>['required', 'regex:/^[0-9]+(\.[0-9][0-9]?)?$/'],
                'sell_price' =>['required', 'regex:/^[0-9]+(\.[0-9][0-9]?)?$/'],
                'item_id'
            ]);

        $unit=new Units();
        if($validate){
          $unit->name=$request['name'];
          $unit->buy_price=$request['buy_price'];
          $unit->sell_price=$request['sell_price'];
          $unit->item_id=$request['item_id'];
          $unit->save();
        }

        $id=$item_id=$request['item_id'];

        if($request['done']=="done") {
            return redirect()->route('units.index',compact('item_id'));
        }
        else{
            return redirect()->route('units.create',compact('id'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Units $unit)
    {
        return view('units.show', compact('unit'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Units $unit)
    {
        return view('units.edit', compact('unit'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Units $unit)
    {
        $unit->update($request->validate([
            'name'=>['required', 'string',],
            'buy_price' =>['required', 'regex:/^[0-9]+(\.[0-9][0-9]?)?$/'],
            'sell_price' =>['required', 'regex:/^[0-9]+(\.[0-9][0-9]?)?$/']
        ]));
        return redirect()->route('units.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $units=Units::find($id);
        $item_id=$units->item_id;
        $units->delete();

        return redirect()->route('units.index',[$item_id])->with('message','Unit deleted');
    }


}
