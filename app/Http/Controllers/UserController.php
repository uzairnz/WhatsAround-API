<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return User::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $user = new User;
        $user->password = $request->input('password');
        $user->name = $request->input('name');
        $user->cnic_number = $request->input('cnic_number');
        $user->contact_number = $request->input('contact_number');
        $user->email = $request->input('email');
        $user->rating = $request->input('rating');

        if ($user->save()) {
            return $user;
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
        $result = DB::Select('select * from users where user_id = ?', [$id]);

        return $result;

    }


    public function update(Request $request, $user_id)
    {
        if (!$user_id) {
            throw new HttpException(400, "Invalid id");
        }

        $user = User::find($user_id);
      // $user = DB::insert('insert into users (user_id) values (?)', [$user_id]);
        //     * changed default primary key for eloquent from id to user_id in model (User.php)

        $user->password = $request->input('password');
        $user->name = $request->input('name');
        $user->cnic_number = $request->input('cnic_number');
        $user->contact_number = $request->input('contact_number');
        $user->email = $request->input('email');
        $user->rating = $request->input('rating');


        if ($user->save()) {
            return $user;
        }

        throw new HttpException(400, "Invalid data");
    }

    public function destroy($id)
    {
        if (!$id) {
            throw new HttpException(400, "Invalid id");
        }

        $user = User::find($id);
        $user->delete();

        return response()->json([
            'message' => 'User deleted',
        ], 200);
    }


}
