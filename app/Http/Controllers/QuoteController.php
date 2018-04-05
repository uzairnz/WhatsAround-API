<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Quote;
use Illuminate\Support\Facades\DB;

class QuoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Quote::all();
    }


    public function store(Request $request)
    {
        $quote = new Quote;
        $quote->price = $request->input('price');
        $quote->description = $request->input('description');
        $quote->service_id = $request->input('service_id');
        $quote->partner_id = $request->input('partner_id');


        if ($quote->save()) {
            return $quote;
        }

        throw new HttpException(400, "Invalid data");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $result = DB::Select('select * from quotes where quote_id = ?', [$id]);

        return $result;
    }


    public function update(Request $request, $quote_id)
    {
        if (!$quote_id) {
            throw new HttpException(400, "Invalid id");
        }

        $quote = Quote::find($quote_id);
        // $user = DB::insert('insert into users (user_id) values (?)', [$user_id]);
        //     * changed default primary key for eloquent from id to user_id in model (User.php)

        $quote->price = $request->input('price');
        $quote->description = $request->input('description');
        $quote->service_id = $request->input('service_id');
        $quote->partner_id = $request->input('partner_id');



        if ($quote->save()) {
            return $quote;
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

        $quote = Quote::find($id);
        $quote->delete();

        return response()->json([
            'message' => 'Quote deleted',
        ], 200);
    }
}
