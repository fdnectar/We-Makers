<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Category;


class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::all();
        return view('admin.viewcategory', compact('category'));
    }

    public function addCategory()
    {
        return view('admin.addcategory');
    }

    public function storeCategory(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'title' => 'required',
            'image' => 'required|mimes:png,jpeg,jpg',
        ]);

        $category = new Category();
        $category->name = $request->name;
        $category->title = $request->title;
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('uploads/category/', $filename);
            $category->image = $filename;
        }
        $category->status = $request->status;
        $category->save();
        return redirect('admin/view-category')->with('success', 'Category Added Succesfully');
        // return back()->with('success', 'Category Added Succesfully');
    }

    public function viewEditCategory($category_id)
    {
        $category = Category::find($category_id);
        return view('admin.edit_category', compact('category'));
    }

    public function updateCategory(Request $request, $category_id)
    {
        $request->validate([
            'name' => 'required',
            'title' => 'required',
            'image' => 'required|mimes:png,jpeg,jpg',
        ]);

        $category = Category::find($category_id);

        $category->name = $request['name'];
        $category->title = $request['title'];
        if ($request->hasfile('image')) {
            $destination = 'uploads/category/' . $category->image;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('uploads/category/', $filename);
            $category->image = $filename;
        }
        $category->status = $request->status;
        $category->save();
        return redirect('admin/view-category')->with('success', 'Category Updated Succesfully');
    }

    public function deleteCategory($category_id)
    {
        $category = Category::find($category_id);
        $destination = 'uploads/category/' . $category->image;
        if (File::exists($destination)) {
            File::delete($destination);
        }
        $category->delete();
        return redirect('admin/view-category')->with('success', 'Category Deleted Succesfully');
    }
}
