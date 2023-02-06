<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\MenuStoreRequest;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = Menu::all();
        return view('admin.menus.index', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.menus.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $image = $request->file('image')->store('categories', 'public');

        $menu = Menu::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $image,
        ]);

        if ($request->categories) {
            $menu->categories()->attach($request->categories);
        }

        return redirect()->route('admin.menus.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        $categories = Category::all();
        return view('admin.menus.edit', compact('menu', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {

        if ($request->file('image')) {
            Storage::disk('public')->delete($menu->image);
            $image = $request->file('image')->store('categories', 'public');
        } else {
            $image = $menu->image;
        }

        $menu->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $image,

        ]);

        if ($request->categories) {
            $menu->categories()->sync($request->categories);
        }

        return redirect()->route('admin.menus.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        Storage::disk('public')->delete($menu->image);
        $menu->delete();
        return redirect()->route('admin.menus.index');
    }
}
