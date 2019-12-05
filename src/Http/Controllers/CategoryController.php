<?php

namespace Manhle\CategoryPackage\Http\Controllers;

use Manhle\CategoryPackage\DataTables\CategoryDataTable;
use Manhle\CategoryPackage\Models\Category;
use Manhle\CategoryPackage\Models\CategoryLang;
use Manhle\CategoryPackage\Models\Lang;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CategoryDataTable $table)
    {
        return $table->render('backs.pages.category.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $langs = Lang::all();
        return view('backs.pages.category.create', compact('langs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function store(Request $request)
    {
        $category = Category::create([
            'activate' => $request->activate,
            'slug' => str_slug($request->name) . random_int(10000, 99999)
        ]);
        $lang = Lang::findOrFail(1);
        CategoryLang::create([
            'category_id' => $category->id,
            'name' => $request->name,
            'description' => $request->description,
            'lang_id' => $lang->id,
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description
        ]);
        toastr()->info("Them the loai thanh cong");
        return redirect()->route('admin.categories.index');
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
        $category = Category::findOrFail($id);
        return view('backs.pages.category.edit', compact(['category', 'id']));
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
        $category = Category::findOrFail($id);
        $category->update([
            'activate' => $request->activate,
            'slug' => str_slug($request->name) . random_int(10000, 99999)
        ]);
        $lang = Lang::findOrFail(1);
        $categorylangs = $category->categoryLang;
        foreach ($categorylangs as $catelang) {
            if ($catelang->lang_id == 1) {
                $catelang->update([
                    'category_id' => $category->id,
                    'name' => $request->name,
                    'description' => $request->description,
                    'lang_id' => $lang->id,
                    'meta_title' => $request->meta_title,
                    'meta_description' => $request->meta_description
                ]);
            }
        }
        toastr()->info("Sua the loai thanh cong");
        return redirect()->route('admin.categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        foreach ($category->categoryLang as $cate)
        {
            $cate->delete();
        }
        $category->delete();
        return redirect()->route('admin.categories.index');
    }
}
