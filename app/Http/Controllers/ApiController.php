<?php

namespace App\Http\Controllers;

use App\Models\Items;
use App\Models\User;
use Exception;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Hash;
use Psy\Util\Str;

class ApiController extends BaseController
{


    public function render($request, Exception $exception)
    {
        if ($request->is('api/*')) {

            if ($exception instanceOf IlluminateValidationValidationException) {
                $messages = [];
                foreach ($exception->errors() as $key => $errors) {
                    $messages[] = implode(', ', $errors);
                }

                $message = implode(', ', $messages);

            } else {
                $message = $exception->getMessage();
            }

            $jsonData = [
                'status' => 'ERROR',
                'message' => $message,
            ];

            return response()->json($jsonData);
        }

        return parent::render($request, $exception);
    }

    public function index(Request $request)
    {
        $page = $request->query('page', 0);
        $limit =  $request->query('limit', 10);
        $items = Items::skip($page*$limit)->take($limit)->get();

        $jsonData = ['status' => 'SUCCESS', 'products' => []];

        foreach ($items as $item){

            $jsonData ['items'][] = [
                'id' => $item->id,
                'name' => $item->name,
                'manufacturer' => $item->manufacturer,
                'quantity' => $item->quantity,
                'expiry_date' => $item->expiry_date,
                'image' => $item->image,
            ];
        }

        return response()->json($jsonData);
    }

    public function show($id)
    {
        $item = Items::where('id', $id)->firstOrFail();

        $jsonData = [
            'status' => 'SUCCESS',
            'item' => [
                'id' => $item->id,
                'name' => $item->name,
                'manufacturer' => $item->manufacturer,
                'quantity' => $item->quantity,
                'expiry_date' => $item->expiry_date,
                'image' => $item->image,
            ]
        ];

        return response()->json($jsonData);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:items|max:512',
            'manufacturer' => 'required|max:128',
            'quantity' => 'required|numeric|min:0|max:99999',
            'expiry_date' => 'required|date',
        ]);
        $data = $request->all();
        $item = new Items($data);
        $item->save();

        return [
            'status' => 'SUCCESS',
            'item' => [
                'id' => $item->id,
                'name' => $item->name,
                'manufacturer' => $item->manufacturer,
                'quantity' => $item->quantity,
                'expiry_date' => $item->expiry_date,
                'image' => $item->image,
            ]
        ];
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|unique:items|max:512',
            'manufacturer' => 'required|max:128',
            'quantity' => 'required|numeric|min:0|max:99999',
            'expiry_date' => 'required|date',
        ]);

        $data = $request->all();
        $item = Items::where('id', $id)->firstOrFail();
        $item->fill($data);
        $item->save();

        $jsonData = [
            'status' => 'SUCCESS',
            'item' => [
                'id' => $item->id,
                'name' => $item->name,
                'manufacturer' => $item->manufacturer,
                'quantity' => $item->quantity,
                'expiry_date' => $item->expiry_date,
                'image' => $item->image,
            ]
        ];

        return response()->json($jsonData);
    }

    public function destroy($id)
    {
        $item = Items::where('id', $id)->firstOrFail();
        $item->delete();

        $jsonData = [
            'status' => 'SUCCESS',
        ];

        return response()->json($jsonData);
    }

}
