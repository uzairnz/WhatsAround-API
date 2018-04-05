<?php

namespace App\Http\Controllers;

use App\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Partner::all();
    }


    public function store(Request $request)
    {
        $partner = new Partner;
        $partner->password = $request->input('password');
        $partner->name = $request->input('name');
        $partner->cnic_number = $request->input('cnic_number');
        $partner->contact_number = $request->input('contact_number');
        $partner->email = $request->input('email');
        $partner->occupation = $request->input('occupation');
        $partner->service_category = $request->input('service_category');
        $partner->age = $request->input('age');
        $partner->location = $request->input('location');
        $partner->gender = $request->input('gender');
        $partner->rating = $request->input('rating');

        if ($partner->save()) {
            return $partner;
        }

        throw new HttpException(400, "Invalid data");
    }


    public function show($id)
    {
        $result = DB::Select('select * from partners where partner_id = ?', [$id]);

        return $result;

    }

    public function update(Request $request, $partner_id)
    {
        if (!$partner_id) {
            throw new HttpException(400, "Invalid id");
        }

        $partner = Partner::find($partner_id);
        // $user = DB::insert('insert into users (user_id) values (?)', [$user_id]);
        //     * changed default primary key for eloquent from id to user_id in model (User.php)

        $partner->password = $request->input('password');
        $partner->name = $request->input('name');
        $partner->cnic_number = $request->input('cnic_number');
        $partner->contact_number = $request->input('contact_number');
        $partner->email = $request->input('email');
        $partner->occupation = $request->input('occupation');
        $partner->service_category = $request->input('service_category');
        $partner->age = $request->input('age');
        $partner->location = $request->input('location');
        $partner->gender = $request->input('gender');
        $partner->rating = $request->input('rating');


        if ($partner->save()) {
            return $partner;
        }

        throw new HttpException(400, "Invalid data");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!$id) {
            throw new HttpException(400, "Invalid id");
        }

        $partner = Partner::find($id);
        $partner->delete();

        return response()->json([
            'message' => 'Partner deleted',
        ], 200);
    }
}
