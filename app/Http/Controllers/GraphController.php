<?php

namespace App\Http\Controllers;

use DB;
use App\Claim;
use App\Products;
use App\ProductsDetail;
use Illuminate\Http\Request;

class GraphController extends Controller
{
    public function __construct(Request $request)
    {
        $this->middleware(function($request, $next){
            if($request->session()->has('auth'))
            {
                return $next($request);
            }
            else
            {
                return redirect('/');
            }
        });
    }

    public function total_claim_per_product(){
        $graph = DB::select(DB::raw("select
            count(*) as total,
            cl.created_date::date as date,
            pr.name as product
        FROM claim cl
        JOIN productsdetail pd ON cl.product_detail_id = pd.product_detail_id
        JOIN products pr ON pd.product_id = pr.product_id
        GROUP BY cl.created_date::date, pr.name
        ORDER BY cl.created_date::date ASC"));
        $products = array();
        $x = 0;
        $m = 0;
        foreach($graph as $gr)
        {
            if(in_array($gr->product, array_column($products, 'name'))) 
            {
                $key = "";
                foreach($products as $k => $v)
                {
                    if($v['name'] == $gr->product)
                    {
                        $key = $k;
                    }
                }
                // $products[$key]['data'][$m][] = intval(strtotime($gr->date)."000");  
                // $products[$key]['data'][$m][] = $gr->total;
                $products[$key]['data'][] = $gr->total;
                $m++;
            }
            else
            {
                $products[$x]['name']   = $gr->product;
                // $products[$x]['data'][$m][] = intval(strtotime($gr->date)."000");
                // $products[$x]['data'][$m][] = $gr->total;
                // $products[$x]['data'][$m][] = $gr->total;
                $products[$x]['data'][] = $gr->total;
                // $products[$x]['data'][] = $gr->total;
                $x++;
                $m++;
            }
        }
        // $graph =  DB::table('claim as cl')
        //         ->join('productsdetail as pd', 'cl.product_detail_id', '=', 'pd.product_detail_id')
        //         ->join('products as pr', 'pr.product_id', '=', 'pd.product_id')
        //         ->groupBy('cl.created_date::date', 'pr.name')
        //         ->orderBy('cl.created_date::date', 'ASC')
        //         ->get(array('count(*) as total', 'cl.created_date::date', 'pr.name as product'));
        return response()->json($products);
    }
}
