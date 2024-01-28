<?php

namespace App\Http\Controllers\Items;

use App\Models\Item;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Items\StoreItemsRequest;
use App\Http\Requests\Items\UpdateItemsRequest;
use Carbon\Carbon;

class ItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $items = Item::latest()->get();
        return $items;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreItemsRequest $request)
    {
        //
        $data = $request->all();

        $item = Item::create([
            'name' => $data['name'],
            'slug' => Str::slug($data['name']),
        ]);

        return $item;
    }

    /**
     * Display the specified resource.
     */
    public function show(Item $item)
    {
        //
        return response()->json([
            'status' => true,
            'data' => $item,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateItemsRequest $request, Item $item)
    {
        //
        $data = $request->all();

        $item->completed = $data['completed'] ? true : false;
        $item->completed_at = $data['completed'] ? Carbon::now() : null;
        $item->save();
        return $item;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        //
        $item->delete();
        return response()->json([
            'status' => true,
            'message' => 'Item deleted successfully',
        ]);
    }
}
