<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Items;
use App\Models\Units;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Event;
use App\Events\SendMail;

class ItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('item_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $items = Items::all();

        return view('items.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('item_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('items.create');
    }

    public function store(StoreTaskRequest $request)
    {
        $name = $request->file('image')->getClientOriginalName();
        $path = $request->file('image')->store('uploads');
        $validate=[
            'name' => [
                'required', 'string',
            ],
            'manufacturer' => [
                'required', 'string',
            ],
            'quantity' => [
                'required', 'regex:/^[0-9]+(\.[0-9][0-9]?)?$/',
            ],
            'expiry_date' => [
                'required', 'date',
            ],
        ];
        if($validate){
            $item=new Items();
            $item->name=$request['name'];
            $item->manufacturer=$request['manufacturer'];
            $item->quantity=$request['quantity'];
            $item->expiry_date=$request['expiry_date'];
            $item->image=$path;

            $item->save();
        }

        return redirect()->route('units.create',['id'=>$item['id'],'name'=>$item['name']]);
    }


    public function show(Items $item)
    {
        abort_if(Gate::denies('item_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('items.show', compact('item'));
    }

    public function edit(Items $item)
    {
        abort_if(Gate::denies('item_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('items.edit', compact('item'));
    }

    public function update(UpdateTaskRequest $request, Items $item)
    {
        $item->update($request->validated());
        if($item['quantity']<=0 || strtotime($item['expiry_date'])< strtotime(date("H:i:s"))){
            \event(new SendMail(1,$item['id']));

        }
        return redirect()->route('items.index');
    }

    public function destroy(Items $item)
    {
        abort_if(Gate::denies('item_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $item->delete();

        return redirect()->route('items.index');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function all()
    {
        return Items::all();
    }
    public function save(Request $request){
        return Items::create($request->all());
    }

    public function get($id)
    {
        $item=Items::find($id);
        return $item!=null?$item:"Not found";
    }
    public function modify(Request $request, $id)
    {
        $item=Items::find($id);
        $item->update($request->all());
        return $item;

    }
    public function delete($id)
    {
        return Items::destroy($id)?\response(["Deleted successfully"]):\response(["Item not found"]);
    }

}
