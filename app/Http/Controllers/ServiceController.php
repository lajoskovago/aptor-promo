<?php

namespace App\Http\Controllers;

use App\Service;
use App\User;
use App\CodeUsage;
use App\Tourist;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        if (!$user) {

            return redirect()->route('login');
        }

        $services = Service::latest()->paginate(5);

        foreach($services as $i => $key) {
          $serviciiPrestate = CodeUsage::where('service_id', $key->id)->get();
          $turisti = [];
          foreach($serviciiPrestate as $prestari) {
            $turisti[$prestari->promo_code] = 1;

          }
          $services[$i]->total = count($turisti);
        }
        return view('services.index',compact('services', 'user'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
$user = Auth::user();

        if (!$user) {

            return redirect()->route('login');
        }



        return view('services.create', compact('user'));
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
            'email' => 'required',
            'nume_contact' => 'required',
            'prenume_contact' => 'required',
            'email_contact' => 'required',
            'password' => 'required',
        ]);

        $service = Service::create($request->all());
        $input = $request->all();
        User::create([
            'name' => $input['nume'],
            'email' => $input['email'],
            'user_type' => 3,
            'parent' => $service->id,
            'password' => Hash::make($input['password']),
        ]);
        return redirect()->route('services.index')
                        ->with('success','Prestatorul a fost adaugat cu succes');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(service $service)
    {
$user = Auth::user();

        if (!$user) {

            return redirect()->route('login');
        }


        return view('services.show',compact('service', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {

$user = Auth::user();

        if (!$user) {

            return redirect()->route('login');
        }


        return view('services.edit',compact('service', 'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        $request->validate([
            'nume' => 'required',
            'email' => 'required',
            'nume_contact' => 'required',
            'email_contact' => 'required',
        ]);

        $service->update($request->all());

        return redirect()->route('services.index')
                        ->with('success','Service updated successfully');
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

        return redirect()->route('services.index')
                        ->with('success','Product deleted successfully');
    }

    public function codeInput($touristId)
    {
        $user = Auth::user();

        if (!$user) {

            return redirect()->route('login');
        }


        $tourist = Tourist::find($touristId);
        $serviciiFolosite = CodeUsage::where('promo_code', $tourist->promo_code)->get();

        $prestatori = [];
        foreach($serviciiFolosite as $key) {
          $prestatori[$key->service_id] = $key->service_id;
        }
        $services = Service::whereIn('id', $prestatori)->get();

        return view('services.index',compact('services', 'user'))
            ->with('i', 0);
    }
}
