<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('admin.product.index', compact('products'));
    }
    public function add()
    {
        $category = Category::all();

        return view("admin.product.add", compact('category'));
    }

    // insert product
    public function insert(Request $request)
    {

        $products = new Product();

        if ($request->hasFile('image')) {

            $path = 'asserts/uploads/products' . $products->image;
            if (File::exists($path)) {
                File::delete($path);
            }

            $file = $request->file('image');
            $imageName = $file->getClientOriginalExtension();
            //  . concatene
            $filename = time() . '.' . $imageName;
            $file->move('asserts/uploads/products/', $filename);
            $products->image = $filename;
        }
        $products->cate_id = $request->input('cate_id');
        $products->name = $request->input('name');
        $products->slug = $request->input('slug');
        $products->description = $request->input('description');
        $products->small_description = $request->input('small_description');
        $products->status = $request->input('status') == TRUE ? '1' : '0';
        $products->trending = $request->input('trending') == TRUE ? '1' : '0';
        $products->original_price = $request->input('original_price');
        $products->selling_price = $request->input('selling_price');
        $products->tax = $request->input('tax');
        $products->qty = $request->input('qty');
        $products->meta_title = $request->input('meta_title');
        $products->meta_description = $request->input('meta_description');
        $products->meta_keywords = $request->input('meta_keywords');
        $products->save();

        // rediriger vers la table des produits
        return redirect('products')->with('status', 'Le produit à été ajouté avec succès');
    }


    //edit product
    public function edit($id)
    {
        $products = Product::find($id);
        return view('admin.product.edit', compact('products'));
    }

    public function update(Request $request, $id)
    {
        $products = Product::find($id);
        if ($request->hasFile('image')) {

            $path = 'asserts/uploads/product' . $products->image;
            if (File::exists($path)) {
                File::delete($path);
            }
            $file = $request->file('image');
            $imageName = $file->getClientOriginalExtension();
            //  . concatene
            $filename = time() . '.' . $imageName;
            $file->move('asserts/uploads/product/', $filename);
            $products->image = $filename;
        }

        $products->name = $request->input('name');
        $products->slug = $request->input('slug');
        $products->description = $request->input('description');
        $products->small_description = $request->input('small_description');
        $products->status = $request->input('status') == TRUE ? '1' : '0';
        $products->trending = $request->input('trending') == TRUE ? '1' : '0';;
        $products->original_price = $request->input('original_price');
        $products->selling_price = $request->input('selling_price');
        $products->tax = $request->input('tax');
        $products->qty = $request->input('qty');
        $products->meta_title = $request->input('meta_title');
        $products->meta_description = $request->input('meta_description');
        $products->meta_keywords = $request->input('meta_keywords');
        $products->update();


        return redirect('products')->with('status', 'Le produit à été modifié avec succès');
    }


    //delete product

    public function delete($id)
    {
        $products = Product::find($id);
        if ($products->image) {
            $path = 'asserts/uploads/product' . $products->image;
            if (File::exists($path)) {
                File::delete($path);
            }
        }

        $products->delete();
        return redirect('products')->with('status', 'La Catégorie à été supprimé avec succès');
    }
}
