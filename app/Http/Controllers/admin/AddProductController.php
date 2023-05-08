<?php

namespace App\Http\Controllers\admin;

use App\Models\AddProduct;
use App\Models\Variant;
use DataTables;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category_variant;
use App\Models\ProductImage;
use Illuminate\Bus\Batch;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class AddProductController extends Controller
{
    public function productForm()
    {
        return view('Admin.product');
    }
    public function productList()
    {
        return view('Admin.productlist');
    }
    public function productImage($id)
    {
        $product = AddProduct::with('product_images')->where('id', $id)->first();
        return view('Admin.addimage', compact('product'));
    }
    public function edit($id)
    {
        $product = AddProduct::with('category_variants')->where('id', $id)->first();
        return view('Admin.editproduct', compact('product'));
    }
    public function getData(Request $request)
    {
        if ($request->ajax()) {

            $products = AddProduct::with('category_variants')->get();
            // dd($products);
            return datatables()->of($products)->addIndexColumn()->addColumn('action', function ($products) {
                $updatebtn = '<a href="' . url('/product/editproduct', [$products->id]) . '" class="edit btn btn-success"  title="Edit" ><i class="fas fa-edit" ></i></a>';

                $deletebtn = '<button type="button" class="btn btn-danger ml-2 delete_product"
                 data-id="' . $products['id'] . '"><i class="fa fa-trash" aria-hidden="true" title="Delete"></i></button>';

                $imgbtn = '<a href="' . url('/product/product_image', [$products->id]) . '" type="button" class="btn btn-primary ml-2 " title="Image_upload"
              ><i class="far fa-images text-light"></i></>';
                return $updatebtn . "" . $deletebtn . "" . $imgbtn;
            })->addColumn('product_name', function ($products) {
                return $products->product_name;
            })->editColumn('category_variants.category_name', function ($products) {
                // dd($products->category_variants);
                $temp = [];
                foreach ($products->category_variants as $key => $value) {
                    $temp[] = $value->category_name;
                }
                return implode(', ', $temp);
            })->rawColumns(['action'])->make(true);
        }
        return view('Admin.productlist');
    }
    public function addProduct(Request $request)
    {
        $addproduct = new AddProduct;
        $addproduct->product_name = ucfirst($request->product_name);
        $addproduct->save();
        $ids = [];
        $data = [];

        foreach ($request['category_variant'] as  $key => $category) {
            $category_variant = new Category_variant;
            $category_variant->product_id = $addproduct->id;

            $category_variant->category_name = ucfirst($category);
            $category_variant->save();
            array_push($ids, $category_variant->id);
        }
        foreach ($request['variant'] as  $key => $variant) {
            $quantity = $request['quantity'][$key];
            foreach ($variant as $v_key => $variants) {
                $data[] = [
                    'product_id' => $addproduct->id,
                    'category_variant_id' => $ids[$key],
                    'variant_name' => ucfirst($variants),
                    'quantity' => $quantity[$v_key],
                ];
            }
        }
        Variant::insert($data);
        Session::flash('message', 'Product added successfully');
        return redirect()->route('product.productlist');
    }
    public function update(Request $request, $id)
    {
        //   dd($request->all());
        $edit_product = AddProduct::where('id', $id)->first();
        $edit_product->product_name = ucfirst($request->product_name);
        $edit_product->update();
        Category_variant::where('product_id', $id)->delete();
        Variant::where('product_id', $id)->delete();
        $ids = [];
        $data = [];
        foreach ($request['category_variant'] as  $key => $categories) {
            $category_variant = new Category_variant;
            $category_variant->product_id = $edit_product->id;
            $category_variant->category_name = $categories;
            $category_variant->save();
            array_push($ids, $category_variant->id);
        }
        foreach ($request['variant'] as  $key => $variants) {
            $quantity = $request['quantity'][$key];
            foreach ($variants as $keys => $variant) {
                $data[] = [
                    'product_id' => $edit_product->id,
                    'category_variant_id' => $ids[$key],
                    'variant_name' => ucfirst($variant),
                    'quantity' => $quantity[$keys],
                ];
            }
        }
        Variant::insert($data);
        Session::flash('message', 'Product updated successfully');
        return redirect()->route('product.productlist');
    }
    public function destroy($id)
    {
        $product = AddProduct::destroy($id);
        Category_variant::where('product_id', $id)->delete();
        Variant::where('product_id', $id)->delete();
        ProductImage::where('product_id', $id)->delete();
        if ($product == true) {
            $success = true;
            $message = "Product deleted successfully";
        } else {
            $success = false;
            $message = "Product not found";
        }
        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);
    }

    public function uploadImage(Request $request, $id)
    {
        $request->validate([
            'product_images.*' => 'required|image|mimes:jpeg,jpg,png,svg',
        ]);
        $product = AddProduct::find($id);
        foreach ($request['product_images'] as $images) {
            $fileName = uniqid() . '.' . $images->getClientOriginalExtension();
            $images->move(public_path('product/images'), $fileName);
            $product_images = new ProductImage;
            $product_images->product_id = $product->id;
            $product_images->image_link = $fileName;
            $product_images->save();
        }
        return redirect()->route('product.productlist');
    }

    public function deleteImage($id)
    {
        $product_image = ProductImage::destroy($id);
        if ($product_image == true) {
            $success = true;
            $message = "Product image deleted successfully";
        } else {
            $success = false;
            $message = "Product image not found";
        }
        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);
    }
}
