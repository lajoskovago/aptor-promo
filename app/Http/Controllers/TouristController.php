<?php

namespace App\Http\Controllers;

use App\Tourist;
use App\User;
use App\ServiceOption;
use App\CodeUsage;
use Auth;
use Illuminate\Http\Request;

class TouristController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($hotelId = null)
    {
    //   $details = [
    //     'title' => 'Numele',
    //     'body' => 'codul'
    // ];

    // \Mail::to('kovago.lajos91@gmail.com')->send(new \App\Mail\SendCode($details));

    // dd("Email is Sent.");exit;
        $user = Auth::user();

        if (!$user) {

            return redirect()->route('login');
        }

        if ($user->user_type == 2) {
          $hotelId = $user->parent;
        }

        if ($hotelId) {
          $tourists = Tourist::latest()->where('hotel', $hotelId)
                                      ->leftJoin('hotels','hotels.id','=','tourists.hotel')
                                      ->select(['tourists.*', 'hotels.nume as hotel_name'])
                                      ->paginate(5);
        } else {
          $tourists = Tourist::latest()->leftJoin('hotels','hotels.id','=','tourists.hotel')
                                      ->select(['tourists.*', 'hotels.nume as hotel_name'])
                                      ->paginate(5);
        }

        return view('tourists.index',compact('tourists', 'hotel', 'user'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($hotelId)
    {
      $user = Auth::user();

        if (!$user) {

            return redirect()->route('login');
        }
        return view('tourists.create', compact('hotelId', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nume' => 'required',
            'prenume' => 'required',
            'email' => 'required',
            'hotel' => 'required',
            'checkin_date' => 'required',
            'checkout_date' => 'required',
            'oras' => 'required',
            'tara' => 'required',
            'transport' => 'required',
            'scop' => 'required',
        ]);
        $input = $request->all();
        //check if tourist already exists
        //first by phone
        $alreadyExists = Tourist::where('telefon', $input['telefon'])->first();
        if ($alreadyExists) {
          $alreadyExists = Tourist::where('email', $input['email'])->first();
          if ($alreadyExists) {
            return redirect()->route('tourists.create', $input['hotel'])
                              ->withInput($request->input())
                              ->with('error','Turistul cu acest numar de telefon sau email deja exista in sistem');
          }
        }

        Tourist::create($request->all());
        $input = $request->all();

        return redirect()->route('tourists.index', $input['hotel'])
                        ->with('success','Turstul a fost adaugat cu succes');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tourist  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Tourist $tourist)
    {
              $user = Auth::user();

        if (!$user) {

            return redirect()->route('login');
        }

        return view('tourists.show',compact('tourist', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tourist  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Tourist $tourist)
    {
        return view('tourists.edit',compact('tourist'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tourist  $tourist
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        $request->validate([
            'nume' => 'required',
            'prenume' => 'required',
            'email' => 'required',
            'hotel' => 'required',
            'checkin_date' => 'required',
            'checkout_date' => 'required',
            'oras' => 'required',
            'tara' => 'required',
            'transport' => 'required',
            'scop' => 'required',
        ]);

        $tourist->update($request->all());

        return redirect()->route('tourists.index', $request->all()['hotel'])
                        ->with('success','Datele au fost actualizate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        $service->delete();

        return redirect()->route('tourists.index')
                        ->with('success','Product deleted successfully');
    }

    public function promo($turistId)
    {
              $user = Auth::user();

        if (!$user) {

            return redirect()->route('login');
        }
        $newPromo = substr(md5(uniqid($turistId, true)),0,7);
        $tourist = Tourist::find($turistId);
        $tourist->promo_code = $newPromo;
        $tourist->promo_code_active = 1;
        $tourist->save();

        return redirect()->back()
                        ->with('success','Un nou cod promotional a fost trimis turistului pe adresa de email'.$tourist->email);
    }

    public function checkout($turistId)
    {
              $user = Auth::user();

        if (!$user) {

            return redirect()->route('login');
        }
        $tourist = Tourist::find($turistId);
        $tourist->checkout_timestamp = $date = date('Y-m-d H:i:s');
        $tourist->save();

        return redirect()->back()
                        ->with('success','Checkout efectuat cu succes');
    }

    public function codeInput(Request $request)
    {
        $user = Auth::user();

        if (!$user) {

            return redirect()->route('login');
        }
        return view('tourists.code', compact('user'));
    }

    public function checkCode(Request $request)
    {
        $user = Auth::user();

        if (!$user) {

            return redirect()->route('login');
        }
         $input = $request->all();
         $tourist = Tourist::where('promo_code', $input['promo_code'])->first();
        //  if ($user->user_type == 3) {
        //     $usedServices = CodeUsage::where(['promo_code'=>$input['promo_code'], 'service_id' => $user->parent])->get();
        //  }
         $usedServices = CodeUsage::where(['promo_code'=>$input['promo_code'], 'service_id' => $user->parent])->get();
         $availableCode = true;
         if(count($usedServices)) {
          $availableCode = false;
         }

         return view('tourists.code_details', compact('tourist', 'user', 'availableCode'));
    }

    public function used($serviceId)
    {
        $user = Auth::user();

        if (!$user) {

            return redirect()->route('login');
        }

        $serviciiPrestate = CodeUsage::where('service_id', $serviceId)->get();
          $turisti = [];
          foreach($serviciiPrestate as $prestari) {
            $turisti[$prestari->promo_code] = $prestari->promo_code;

          }
        $tourists = Tourist::whereIn('promo_code', $turisti)->paginate(5);

        return view('tourists.index',compact('tourists', 'user'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
}
