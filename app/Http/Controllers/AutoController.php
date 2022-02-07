<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAutoRequest;
use App\Http\Requests\UpdateAutoRequest;
use App\Models\Auto;
use App\Services\AutoService;

class AutoController extends Controller
{
    private $autoService;

    public function __construct(AutoService $autoService)
    {
        $this->autoService = $autoService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $autos = $this->autoService->all();
        return \Response()->json(['data' => $autos], 200);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(CreateAutoRequest $request)
    {
        try {
            $auto = $this->autoService->save($request);
            return \Response()->json(['res' => true, 'message' => 'The Auto was correctly created'], 200);
        }
        catch (\Exception $e){
            return \Response()->json(['res' => false, 'message' => $e->getMessage()], 422);

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $auto = $this->autoService->get($id);
        return \Response()->json(['data' => $auto], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Auto
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateAutoRequest $request, Auto $auto)
    {
        try {
            $auto = $this->autoService->update($request, $auto);
            return \Response()->json(['res' => true, 'message' => 'The Auto was correctly updated'], 200);
        } catch (\Exception $e){
            return \Response()->json(['res' => false, 'message' => $e->getMessage()], 422);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Auto
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Auto $auto)
    {
        try {
            $this->autoService->delete($auto);
            return \Response()->json(['res' => true, 'message' => 'The Auto was correctly deleted'], 200);
        } catch (\Exception $e){
            return \Response()->json(['res' => false, 'message' => $e->getMessage()], 422);
        }
    }

}
