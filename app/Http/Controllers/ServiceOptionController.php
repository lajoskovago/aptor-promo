<?php

namespace App\Http\Controllers;

use App\ServiceOption;
use App\CodeUsage;
use App\Tourist;
use Auth;
use Illuminate\Http\Request;

class ServiceOptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($serviceId = null)
    {
        $user = Auth::user();

        if (!$user) {

            return redirect()->route('login');
        }

        if ($user->user_type == 2) {
          $serviceId = $user->parent;
        }
        if ($serviceId) {

          $serviceOptions = ServiceOption::latest()
                                          ->where('service_options.service_id', $serviceId)
                                          ->paginate(5);
        } else {
          $serviceOptions = ServiceOption::latest()->paginate(5);
        }
        foreach($serviceOptions as $service) {
          $totalUsage = CodeUsage::where('service_option_id', $service->id)->get();
          $service->totalCount = count($totalUsage);

        };
        return view('service_options.index',compact('serviceOptions', 'user'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($serviceId)
    {
$user = Auth::user();

        if (!$user) {

            return redirect()->route('login');
        }


        return view('service_options.create', compact('serviceId', 'user'));
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
            'nume_serviciu' => 'required',
            'descriere_serviciu' => 'required'
        ]);
        $input = $request->all();
        ServiceOption::create($request->all());
        $input = $request->all();

        return redirect()->route('options.index', $input['service_id'])
                        ->with('success','Serviciul a fost adaugat cu succes');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ServiceOption  $service
     * @return \Illuminate\Http\Response
     */
    public function show($serviceOption)
    {
$user = Auth::user();

        if (!$user) {

            return redirect()->route('login');
        }

        $serviceOption = ServiceOption::find($serviceOption);
        return view('service_options.show',compact('serviceOption', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ServiceOption  $service
     * @return \Illuminate\Http\Response
     */
    public function edit($serviceOption)
    {
$user = Auth::user();

        if (!$user) {

            return redirect()->route('login');
        }

        $serviceOption = ServiceOption::find($serviceOption);
        return view('service_options.edit',compact('serviceOption', 'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ServiceOption  $tourist
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ServiceOption $serviceOption)
    {
        $request->validate([
            'nume_serviciu' => 'required',
            'descriere_serviciu' => 'required'
        ]);

        $serviceOption->update($request->all());

        return redirect()->route('options.index')
                        ->with('success','Datele au fost actualizate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ServiceOption  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy($serviceOptionId)
    {
       $serviceOption = ServiceOption::find($serviceOptionId);
       $serviceId = $serviceOption->service_id;
        $serviceOption->delete();

        return redirect()->route('options.index', $serviceId)
                        ->with('success','Serviciul a fost sters');
    }

    public function apply($touristId)
    {
       $serviceOption = ServiceOption::latest()->get();
$user = Auth::user();
      return view('service_options.apply',compact('serviceOption', 'touristId', 'user'))->with('i', 0);
    }

    public function applied(Request $request)
    {
      $input = $request->all();
      foreach($input['servicii'] as $k=>$serviceOptionId) {
        $user = Auth::user();
        $tourist = Tourist::find($input['tourist']);
        $codeUsage = [
          'service_id' => $user->parent,
          'service_option_id' => $serviceOptionId,
          'promo_code' => $tourist->promo_code,
        ];
        CodeUsage::create([
          'service_id' => $user->parent,
          'service_option_id' => $serviceOptionId,
          'promo_code' => $tourist->promo_code,
        ]);
      }

      return redirect()->route('tourists.show', $tourist->id)
                        ->with('success','Codul a fost folosit');
    }

    public function codeInput($touristId)
    {
        $user = Auth::user();

        if (!$user) {

            return redirect()->route('login');
        }
        $tourist = Tourist::find($touristId);
        $serviciiFolosite = CodeUsage::where('promo_code', $tourist->promo_code)->get();

        $servicii = [];
        foreach($serviciiFolosite as $key) {
          $servicii[$key->service_option_id] = $key->service_option_id;
        }
        $serviceOptions = ServiceOption::whereIn('id', $servicii)->paginate(5);

        return view('service_options.index',compact('serviceOptions', 'user'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
}
