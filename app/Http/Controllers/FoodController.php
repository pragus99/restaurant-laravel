<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\{Food, Category};
use App\Http\Requests\FoodRequest;
use Illuminate\Support\Facades\Storage;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('food.index', [
            'foods' => Food::latest()->paginate(10),
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('food.create', [
            "categories" => Category::get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FoodRequest $request)
    {
        $request->validate([
            'image' => 'image|mimes:jpg,jpeg,gif,png,svg|max:10000'
        ]);

        $attr = $request->all();
        $attr['category_id'] = request('category');
        
        $image = request()->file('image') ? $image = request()->file('image')->store('image/food') : null;
        //run php artisan storage:link
        $attr['image'] = $image;

        Food::create($attr);

        return redirect()->back()->with('success', 'Food is Created');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('food.show', [
            'food' =>  Food::find($id),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('food.edit', [
            'food' => Food::find($id),
            'categories' => Category::all(),
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FoodRequest $request, Food $food)
    {
        $request->validate([
            'image' => 'image|mimes:jpg,jpeg,gif,png,svg|max:10000'
        ]);

        if (request()->file('image')) {
            Storage::delete($food->image);
            $image = request()->file('image')->store('images/food');
        } else {
            $image = $food->image;
        };

        $attr = $request->all();
        $attr['category_id'] = request('category');
        $attr['image'] = $image;

        $food->update($attr);

        return redirect('/food')->with('success', 'Food is Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Food $food)
    {
        Storage::delete($food->image);
        $food->delete();

        return redirect()->back()->with('success', 'Food is Deleted');
    }

    public function foodList(Category $category)
    {        
        return view('food.list', [
            'categories' => Category::with('foods')->orderBy('id', 'desc') ->get(),
        ]);
    }
}
