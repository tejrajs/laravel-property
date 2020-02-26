<?php

namespace App\Http\Controllers;

use App\PropertyAnalytic;
use App\Traits\ApiResponser;
use App\Traits\Illuminate\Http\JsonResponse;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use DB;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class AnalyticController extends Controller
{
    use ApiResponser;

    /**
     * Get all analytics for an inputted property
     *
     * @param PropertyAnalytic $analytic
     * @param $property_id
     * @return void
     */
    public function index(PropertyAnalytic $analytic, $property_id)
    {
        //
        return $this->successResponse($analytic->where('property_id', $property_id)->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created Property Analytic in storage.
     *
     * @param Request $request
     * @return JsonResponse
     * @throws ValidationException
     */
    public function store(Request $request)
    {
        //
        $rules =  [
            'property_id' => 'required',
            'analytic_type_id' => 'required',
            'value' => 'required'
        ];
        $this->validate($request, $rules);
        DB::beginTransaction();
        try{
            $pAnalytic = new PropertyAnalytic();
            $pAnalytic->property_id = $request->input('property_id');
            $pAnalytic->analytic_type_id = $request->input('analytic_type_id');
            $pAnalytic->value = $request->input('value');
            $pAnalytic->save();
            DB::commit();
            return $this->successResponse($pAnalytic);
        } catch (\Exception $e) {
            DB::rollback();
            return $this->errorResponse($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified Property Analytic in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return Response
     * @throws ValidationException
     */
    public function update(Request $request, $id)
    {
        //
        $rules =  [
            'property_id' => 'required',
            'analytic_type_id' => 'required',
            'value' => 'required'
        ];
        $this->validate($request, $rules);
        DB::beginTransaction();
        try{
            $pAnalytic = PropertyAnalytic::findOrFail($id);
            $pAnalytic->property_id = $request->input('property_id');
            $pAnalytic->analytic_type_id = $request->input('analytic_type_id');
            $pAnalytic->value = $request->input('value');
            $pAnalytic->save();
            DB::commit();
            return $this->successResponse($pAnalytic);
        } catch (\Exception $e) {
            DB::rollback();
            return $this->errorResponse($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
