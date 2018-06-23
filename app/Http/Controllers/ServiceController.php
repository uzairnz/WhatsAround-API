<?php

namespace App\Http\Controllers;

use App\Quote;
use Illuminate\Http\Request;
use App\Service;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\Return_;

class ServiceController extends Controller
{

    public function index()
    {
        return Service::all();
    }



    public function store(Request $request)
    {
        $service = new Service;
        $service->service_name = $request->input('service_name');
        $service->category = $request->input('category');
        $service->location = $request->input('location');
        $service->quotes = $request->input('quotes');


        if ($service->save()) {
            return $service;
        }

        throw new HttpException(400, "Invalid data");
    }


    public function show($id)
    {
        $result = DB::Select('select * from services where service_id = ?', [$id]);
//          $result = DB::table('services')     // Fahad wala join
//              ->join ('quotes', function ($join){
//                  $join->on('services.service_id', '=' ,'quotes.service_id');
//              })->where('services.service_id', '=', $id)
//              ->get();
        return $result;

    }

    public function update(Request $request, $service_id)
    {
        if (!$service_id) {
            throw new HttpException(400, "Invalid id");
        }

        $service = Service::find($service_id);
        // $user = DB::insert('insert into users (user_id) values (?)', [$user_id]);
        //     * changed default primary key for eloquent from id to user_id in model (User.php)
        $service = Service::find($service_id);
        $service->service_name = $request->input('service_name');
        $service->category = $request->input('category');
        $service->location = $request->input('location');
        $service->quotes = $request->input('quotes');

        if ($service->save()) {
            return $service;
        }

        throw new HttpException(400, "Invalid data");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!$id) {
            throw new HttpException(400, "Invalid id");
        }

        $service = Service::find($id);
        $service->delete();

        return response()->json([
            'message' => 'Service deleted',
        ], 200);
    }

    public function blast()
    {
        $result = DB::table('services')     // Fahad wala join
        ->join ('quotes', function ($join){
            $join->on('services.service_id', '=' ,'quotes.service_id');
        })
            ->get();
        Return $result;
    }

    public function blasting($id)
    {
        $result = DB::table('services')     // Fahad wala join
        ->join ('quotes', function ($join){
            $join->on('services.service_id', '=' ,'quotes.service_id');
        })->where('services.service_id', '=', $id)
            ->get();
        return $result;
    }

    public function myquote($id)
    {
        $result = DB::table('services')     // Fahad wala join
        ->join ('quotes', function ($join){
            $join->on('services.service_id', '=' ,'quotes.service_id');
        })->where('quotes.partner_id', '=', $id)
            ->get();
        return $result;
    }


}
