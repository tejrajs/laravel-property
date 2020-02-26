<?php

namespace App\Http\Controllers;

use App\Http\Resources\AnalyticResource;
use App\Property;
use App\PropertyAnalytic;
use App\Traits\ApiResponser;
use App\Traits\Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use DB;

class PropertyController extends Controller
{
    use ApiResponser;

    /**
     * Display summary of all property analytics for an inputted suburb.
     *
     * @param Property $property
     * @param $suburb
     * @return JsonResponse
     */
    public function suburb(Property $property, $suburb)
    {
        //
        $properties = $property->where('suburb', $suburb)->get();
        return $this->getResponse($properties);
    }

    /**
     * Display summary of all property analytics for an inputted state.
     *
     * @param Property $property
     * @param $suburb
     * @return JsonResponse
     */
    public function state(Property $property, $state)
    {
        //
        $properties = $property->where('state', $state)->get();
        return $this->getResponse($properties);
    }

    /**
     * Display summary of all property analytics for an inputted country.
     *
     * @param Property $property
     * @param $country
     * @return JsonResponse
     */
    public function country(Property $property, $country)
    {
        //
        $properties = $property->where('country', $country)->get();
        return $this->getResponse($properties);
    }

    private function getResponse($properties){
        $pCollect = [];
        $with = 0;
        if(!empty($properties)){
            foreach ($properties as $property){
                if($property->analytics->count() > 0){
                    $with += 1;
                    foreach ($property->analytics as $analytic){
                        $pCollect[] = $analytic;
                    }
                }
            }
        }
        $collect = collect($pCollect);
        return $this->successResponse([
            'min' => $collect->min('value'),
            'max' => $collect->max('value'),
            'median' => $collect->median('value'),
            'with_percentage' => (($with/$properties->count())*100),
            'without_percentage' => (($properties->count() - $with)/$properties->count()*100)
        ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $rules =  [
            'suburb' => 'required',
            'state' => 'required',
            'country' => 'required'
        ];
        $this->validate($request, $rules);
        DB::beginTransaction();
        try{
            $property = new Property();
            $property->suburb = $request->input('suburb');
            $property->state = $request->input('state');
            $property->country = $request->input('country');
            $property->save();
            DB::commit();
            return $this->successResponse($property);
        } catch (\Exception $e) {
            DB::rollback();
            return $this->errorResponse($e->getMessage());
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
