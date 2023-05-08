<?php

namespace App\Http\Controllers\admin;

use App\Models\Category;
use App\Models\Product;
use App\Models\Product_by_color;
use App\Models\Product_image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Product_type;
use App\Models\Size;
use Carbon\Carbon;

class ProductController extends Controller
{
    public function addproduct()
    {
        return view('Admin.addproduct');
    }
    public function products()
    {
        return view('Admin.product');
    }

    public function insert(Request $request)
    {
        // dd($request->all());
        $product_type = Product_type::firstOrCreate([
            'name' => $request->product_type
        ]);

        $category = new Category;
        $category->category_name = $request->category_type;
        $category->save();

        $product = new Product;
        $product->product_type = $product_type->id;
        $product->category_id = $category->id;
        $product->name = $request->product_name;
        // $product->product_image=$request->image;
        $file = $request->file('image');
        $destination = 'storage/app/public';
        $product->product_image = $file->getClientOriginalName();
        $request->image->move(public_path($destination), $product->product_image);

        $product->details = $request->detail;
        $product->price = $request->price;
        $product->qty = $request->quantity;
        $product->save();



        if ($request->hasFile('multiple_image')) {

            foreach ($request->file('multiple_image') as $imgs) {

                $name = $imgs->getClientOriginalName();
                $imgs->move(public_path('image/'), $name);

                $multiple = new Product_image;
                $multiple->product_id = $product->id;
                $multiple->color_id = '0';
                $multiple->images = $name;
                $multiple->save();
            }
        }
        if ($request->product_type == 'single_varient') {
            if ($request->type == 'size') {
                $size = $request->size_select;
                foreach ($size as $key => $value1) {
                    if ($key == '0') {
                        $sizeinsert = new Size;
                        $sizeinsert->size = $value1;
                        $sizeinsert->save();
                    }
                }
                $price1 = $request['price1'];
                foreach ($price1 as $key => $value) {
                    $multiinsert = new Product_by_color;
                    $multiinsert->product_id = $product->id;
                    $multiinsert->size_id = $sizeinsert->id;
                    $multiinsert->price = $value;
                    $multiinsert->qty = $request['quantity1'][$key];
                    $multiinsert->save();
                }
            }
        }
        return redirect()->route('dashboard');
    }






    // public function getdata()
    // {

    //     $now=Carbon::now();

    //     $Month = $now->month;
    //     // dd($currentMonth);
    //     $booking=Booking::where('service_provider_id',1)->whereIn('status',['0','1','2','3'])->whereMonth('created_at',$Month)->count();
    //     dd($booking);
    // }
}
