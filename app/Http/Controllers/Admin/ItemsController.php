<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Category;
use App\Models\Item;

class ItemsController extends Controller
{
    public function index()
    {
        $item = Item::all();
        return view('admin.view-items', compact('item'));
    }

    public function addItems()
    {
        $category = Category::where('status', '1')->get();
        return view('admin.add-items', compact('category'));
    }

    public function storeItem(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'name' => 'required',
            'title' => 'required',
            'image' => 'required|mimes:png,jpeg,jpg'
        ]);

        $item = new Item();
        $item->category_id = $request->category_id;
        $item->name = $request->name;
        $item->title = $request->title;
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('uploads/items/', $filename);
            $item->image = $filename;
        }
        $item->status = $request->status;
        $item->save();
        return redirect('admin/view-items')->with('success', 'Item Added Succesfully');
    }

    public function viewEditItem($item_id)
    {
        $category = Category::where('status', '1')->get();
        $item = Item::find($item_id);
        return view('admin.edit-item', compact('item', 'category'));
    }

    public function updateItem(Request $request, $item_id)
    {
        $request->validate([
            'category_id' => 'required',
            'name' => 'required',
            'title' => 'required',
            'image' => 'required|mimes:png,jpeg,jpg'
        ]);

        $item = Item::find($item_id);
        $item->category_id = $request->category_id;
        $item->name = $request->name;
        $item->title = $request->title;
        if ($request->hasfile('image')) {
            $destination = 'uploads/items/' . $item->image;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('uploads/items/', $filename);
            $item->image = $filename;
        }
        $item->status = $request->status;
        $item->save();
        return redirect('admin/view-items')->with('success', 'Item Updated Succesfully');
    }

    public function deleteItem($item_id)
    {
        $item = Item::find($item_id);
        $destination = 'uploads/items/' . $item->image;
        if (File::exists($destination)) {
            File::delete($destination);
        }
        $item->delete();
        return redirect('admin/view-items')->with('success', 'Item Deleted Succesfully');
    }
}
