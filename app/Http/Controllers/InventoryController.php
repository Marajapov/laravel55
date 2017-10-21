<?php

namespace App\Http\Controllers;

use Request;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use App\Inventory as Inventory;

class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inventories = Inventory::get();
        return view('inventory.index',['inventories'=>$inventories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(\Illuminate\Http\Request $request)
    {
        // Image
        $image = $request->file('img');
        $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/inventories');
        $newImage = $image->move($destinationPath,$input['imagename']);        
        // New Inventory
        $inventory = new Inventory();
        $inventory->name = $request->input('name');
        $inventory->img = $input['imagename'];
        $inventory->save();
        return redirect('/inventory');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $inventory = Inventory::find($id);
        return view('inventory.show',['inventory'=>$inventory]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $inventory = Inventory::find($id);
        return view('inventory.edit',['inventory'=>$inventory]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateInventory(\Illuminate\Http\Request $request, $id)
    {
        $inventory = Inventory::find($id);
        $inventory->name = $request->input('name');

        $destinationPath = public_path('inventories');
        if(file_exists($destinationPath.'/'.$inventory->getImg())){
            @unlink($destinationPath.'/'.$inventory->getImg());
        }
        $image = $request->file('img');
        $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
        $newImage = $image->move($destinationPath,$input['imagename']);     

        $inventory->img = $input['imagename'];
        $inventory->save();
        return redirect('/inventory');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function deleteInventory()
    {
        if(Request::ajax()) {
            $data = Input::all();
            $inventory = Inventory::find($data['id']);
            $destinationPath = public_path('inventories');
            if(file_exists($destinationPath.'/'.$inventory->getImg())){
                @unlink($destinationPath.'/'.$inventory->getImg());
            }
            $inventory->delete();
            $inventory = Inventory::get();
        }
    }
}
