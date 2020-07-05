<?php

namespace App\Http\Controllers;

use App\Hotel;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;
use View;

class HotelController extends Controller
{

  public function __construct()
    {

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
// echo 'tmp error';

//       $url = 'http://www.otlra.ro/ep/otl_income.php';
// $data = array('codetest');

// // use key 'http' even if you send the request to https://...
// $options = array(
//     'http' => array(
//         'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
//         'method'  => 'POST',
//         'content' => http_build_query($data)
//     )
// );
// $context  = stream_context_create($options);
// $result = file_get_contents($url, false, $context);
// if ($result === FALSE) { /* Handle error */ }

// var_dump($result);
// exit;
        $user = Auth::user();
        $hotels = Hotel::get();

        return view('hotels.index',compact('hotels', 'user'))
            ->with('i', 0);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $user = Auth::user();
        return view('hotels.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $test = $request->validate([
            'nume' => 'required',
            'email' => 'required',
            'nume_contact' => 'required',
            'email_contact' => 'required',
            'password' => 'required',
        ]);

        $hotel = Hotel::create($request->all());
        $input = $request->all();
        User::create([
            'name' => $input['nume'],
            'email' => $input['email'],
            'user_type' => 2,
            'parent' => $hotel->id,
            'password' => Hash::make($input['password']),
        ]);
        return redirect()->route('hotels.index')
                        ->with('success','Hotelul a fost adaugat cu succes');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function show(hotel $hotel)
    {
$user = Auth::user();
        return view('hotels.show',compact('hotel', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function edit(Hotel $hotel)
    {
$user = Auth::user();
        return view('hotels.edit',compact('hotel', 'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hotel $hotel)
    {
        $request->validate([
            'nume' => 'required',
            'email' => 'required',
            'nume_contact' => 'required',
            'email_contact' => 'required',
        ]);

        $hotel->update($request->all());

        return redirect()->route('hotels.index')
                        ->with('success','Hotel updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hotel $hotel)
    {
        $hotel->delete();

        return redirect()->route('hotels.index')
                        ->with('success','Product deleted successfully');
    }
}
