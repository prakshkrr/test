<?php

namespace App\Http\Controllers;
use App\Modules\Category\Models\Category;
use App\Modules\Color\Models\Color;
use App\Modules\Product\Models\Product;
use App\models\Multipleimage;
use App\models\cart;
use Auth;
use DB;
use Illuminate\Http\Request;


class frontendController extends Controller

    {
    
        public function user()
        {
            return view('frontend.main');
        }
        public function products()
        {
            $category = Category::where('deleted_at',0)
            ->where('status',1)->get();
                            
            $colors=Color::where('deleted_at',0)
            ->where('status',1)->get();
                          
            $product=Product::where('deleted_at',0)
                             ->where('status',1)->get();
            return view('frontend.sidebar', compact('product','category','colors'));
        }

        public function detail($url)
        {
            
            $product=Product::where('deleted_at',0)->where('status',1)->get();

            $product = Product::where('url', $url)->where('deleted_at',0)->where('status',1)->get();
            $id = Product::where('url', $url)->get(['id'])->first();
            $filter_id = json_decode($id, true);
            $subimages = multipleimage::where('product_id', $filter_id)->orderBy('sort', 'asc')->get();
            $product = Product::where('url', $url)->get();
            // return view('frontview.detail', compact('products', 'subimages'));
            
            return view('frontend.detail', compact('product','subimages'));
        }

        public function sortProduct(Request $request)
        {

        if (isset($request->category)&&isset($request->colors))
        {
            $product=Product::whereIn('category_id',$request->category)->whereIn('color_id',$request->colors)->where('deleted_at',0)->where('status',1)->whereBetween('price', [$request->min_price, $request->max_price])->orderBy($request->sort_name_price,$request->sort_asc_desc)->get();
        }
        elseif (isset($request->category))
        {
            $product=Product::whereIn('category_id',$request->category)->where('deleted_at',0)->where('status',1)->whereBetween('price', [$request->min_price, $request->max_price])->orderBy($request->sort_name_price,$request->sort_asc_desc)->get();
        }
        elseif (isset($request->colors))
        {

            $product=Product::whereIn('color_id',$request->colors)->where('deleted_at',0)->where('status',1)->whereBetween('price', [$request->min_price, $request->max_price])->orderBy($request->sort_name_price,$request->sort_asc_desc)->get();
        }
        else
        {
            $product=Product::where('deleted_at',0)->where('status',1)->whereBetween('price', [$request->min_price, $request->max_price])->orderBy($request->sort_name_price,$request->sort_asc_desc)->get();
        }

            if ($request->view=='true'){

                return view('frontend.grid', compact('product'));
            }
            else{
                return view('frontend.list', compact('product'));
            }
        }        
        
    
        
    }
        
    
        
    
    
