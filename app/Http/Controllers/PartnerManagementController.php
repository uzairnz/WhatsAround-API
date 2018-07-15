<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Partner;

class PartnerManagementController extends Controller
{
    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/partner-management';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $partners = Partner::paginate(5);

        return view('partner-mgmt/index', ['partners' => $partners]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('partner-mgmt/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        $this->validateInput($request);
//        User::create([
//            'name' => $request['name'],
//            'email' => $request['email'],
//            'password' => ($request['password']),
//            'cnic_number' => $request['cnic_number'],
//            'contact_number' => $request['contact_number'],
//            'rating' => $request['rating']
//        ]);
//
//        return redirect()->intended('/user-management');

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
            return redirect()->intended('/partner-management');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $partner = Partner::find($id);
        // Redirect to user list if updating user wasn't existed
        if ($partner == null || count($partner) == 0) {
            return redirect()->intended('/partner-management');
        }

        return view('partner-mgmt/edit', ['partner' => $partner]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
            return redirect()->intended('/partner-management');
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
        Partner::where('partner_id', $id)->delete();
        return redirect()->intended('/partner-management');
    }

    /**
     * Search user from database base on some specific constraints
     *
     * @param  \Illuminate\Http\Request  $request
     *  @return \Illuminate\Http\Response
     */
    public function search(Request $request) {
        $constraints = [
            'partner_id' => $request['partner_id'],
            'name' => $request['name'],
            'email' => $request['email'],
            'rating' => $request['rating']
        ];

        $partners = $this->doSearchingQuery($constraints);
        return view('partner-mgmt/index', ['partners' => $partners, 'searchingVals' => $constraints]);
    }

    private function doSearchingQuery($constraints) {
        $query = User::query();
        $fields = array_keys($constraints);
        $index = 0;
        foreach ($constraints as $constraint) {
            if ($constraint != null) {
                $query = $query->where( $fields[$index], 'like', '%'.$constraint.'%');
            }

            $index++;
        }
        return $query->paginate(5);
    }
    private function validateInput($request) {
        $this->validate($request, [
            'username' => 'required|max:20',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'firstname' => 'required|max:60',
            'lastname' => 'required|max:60'
        ]);
    }
}
