<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Product;
use App\Category;
use Auth;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{

    public function admin_products_index(){
    	$products = Product::all();
        return view('admin_view.products.products')->with('products',$products);
    }

    public function seller_index_products(){
    	$categories = Category::all();
    	return view('seller_view.products.products')->with('categories',$categories);
    }

    public function product_of_category($id){
        $category = Category::find($id);
        $data=DB::table('products')->where([

            ['id_category','=',$id],
            ['approve','=',1]
        ])
            ->get();

        return view ('customer_view.products.products')->with('data', $data);

    }

    public function customer_product_details($id){
        $product = Product::find($id);
        return view('customer_view.products.show')->with('product',$product);
    }

    public function admin_product_details($id){
        $product = Product::find($id);
        return view('Admin_view.products.show')->with('product',$product);
    }


    public function admin_products_approve($id){
    	$product = Product::find($id);
        $product->approve = 1 ;
        $product->save();
        return back()->with('success','Product approved');
    }

    
     public function admin_product_destroy($id)
    {
        $Product = Product::find($id);
        $Product->delete(); 
        return back()->with('success','Product Removed');
    }
 
    public function view_product_of_seller(){
        $products = Product::where('id_seller',Auth::id())->get();
        return view('seller_view.products.products')->with('products',$products);
    }
    public function seller_products_edit($id){
        $products = Product::find($id);
        return view('seller_view.products.edit')->with('products',$products);
    }

    public function seller_products_confirm_edit(Request $request, $id){

        $this->validate($request,[
                'name'=>'required|min:3|max:20',
                'description'=>'required|min:3|max:50',
                'price'=>'required|integer',
                'img'=>'image|max:1999'
            ]);

            //handel file upload 
            if($request->hasFile('img')){

                //get filename with the extention
                $filenameWithExt = $request->file('img')->getClientOriginalName();

                //get just filename
                $filename=pathinfo($filenameWithExt,PATHINFO_FILENAME);

                //get just extention
                $extention=$request->file('img')->getClientOriginalExtension();

                //file name to store
                $fileNameToStore=$filename.'_'.time().'.'.$extention;

                //upload the image
                $path=$request->file('img')->storeAs('public/uploads',$fileNameToStore);

            }

            //update
            $Product = Product::find($id);
            $Product->name         = $request -> input('name');
            $Product->description  = $request -> input('description');
            $Product->price  = $request -> input('price');
            if($request->hasFile('img')){
                $Product->img =$fileNameToStore;
            }
            $Product->save();

            return back()->with('success','product updated');
    }

    public function seller_products_add(){
        $categories = Category::all();
        return view('seller_view.products.add')->with('categories',$categories);
    }

     public function add_product_form(Request $request){
        $this->validate($request,[
            'name'=>'required|min:3|max:20',
            'description'=>'required|min:3|max:50',
            'price'=>'required|integer',
            'img'=>'image|nullable|max:1999'
        ]);

         

                //get filename with the extention
                $filenameWithExt = $request->file('img')->getClientOriginalName();

                //get just filename
                $filename=pathinfo($filenameWithExt,PATHINFO_FILENAME);

                //get just extention
                $extention=$request->file('img')->getClientOriginalExtension();

                //file name to store
                $fileNameToStore=$filename.'_'.time().'.'.$extention;

                //upload the image
                $path=$request->file('img')->storeAs('public/uploads',$fileNameToStore);

        $Product = new Product;
        $Product->name              = $request -> input('name');
        $Product->description       = $request -> input('description');
        $Product->price             = $request -> input('price');
        $Product->id_category       = $request -> input('category');
        $Product->id_seller         = Auth::id();
        $Product->img               = $fileNameToStore;
        $Product->save();

        return back()->with('success','Add Requested');
    }


}
