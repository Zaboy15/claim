<?php

namespace App\Http\Controllers;

use DB;
use App\Claim;
use App\Products;
use App\ProductsDetail;
use Illuminate\Http\Request;

class DashboardController extends Controller
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

    public function DashboardView(Request $request)
    {
        return view('Dashboard.dashboard');
        // $test = $request->session()->get('auth');
        // return $test['username'];
    }

    public function ClaimRequestView(Request $request)
    {    
        return view('Dashboard.claim');
    }

    public function ClaimRequestData(Request $request)
    {
        $claim = DB::select(DB::raw("select 
            date_trunc('second', a.created_date) as claim_date,
            c.name as product,
            b.code as type,
            b.serial_number,
            d.province as area,
            d.city,
            d.name as store,
            a.phone,
            a.photos
        from claim a
        LEFT JOIN productsdetail b ON a.product_detail_id = b.product_detail_id
        LEFT JOIN products c ON b.product_id = c.product_id
        LEFT JOIN store d ON a.store_id = d.store_id
        WHERE a.status_id = 1
        ORDER BY claim_id DESC"));    
        $data = array("data" => $claim);
        return response()->json($data);
    }

    public function ClaimDeliveryView(Request $request)
    {    
        return view('Dashboard.delivery');
    }

    public function ClaimDeliveryData(Request $request)
    {
        $claim = DB::select(DB::raw("select 
            date_trunc('second', a.created_date) as claim_date,
            a.fullname,
            a.phone,
            e.name as status
        FROM claim a
        LEFT JOIN status e ON a.status_id = e.status_id
        WHERE a.status_id IN (6,7)
        ORDER BY claim_id DESC"));    
        $data = array("data" => $claim);
        return response()->json($data);
    }
}
