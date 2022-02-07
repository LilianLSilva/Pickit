<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateOwnerRequest;
use App\Http\Requests\UpdateOwnerRequest;
use App\Models\Owner;
use App\Services\OwnerService;


class OwnerController extends Controller
{
    private $ownerService;

    public function __construct(OwnerService $ownerService)
    {
        $this->ownerService = $ownerService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $owners = $this->ownerService->all();
        return \Response()->json(['data' => $owners], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(CreateOwnerRequest $request)
    {
        try {
            $owner = $this->ownerService->save($request);
            return \Response()->json(['res' => true, 'message' => 'The Owner was correctly created'], 200);
        }
        catch (\Exception $e){
            return \Response()->json(['res' => false, 'message' => $e->getMessage()],442);

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
        $owner = $this->ownerService->get($id);
        return \Response()->json(['data' => $owner], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Owner
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateOwnerRequest $request, Owner $owner)
    {
        try {
            $owner = $this->ownerService->update($request, $owner);
            return \Response()->json(['res' => true, 'message' => 'The Owner was correctly updated'], 200);
        } catch (\Exception $e){
            return \Response()->json(['res' => false, 'message' => $e->getMessage()], 422);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Owner
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Owner $owner)
    {
        try {
            $this->ownerService->delete($owner);
            return \Response()->json(['res' => true, 'message' => 'The Owner was correctly deleted'], 200);
        } catch (\Exception $e){
            return \Response()->json(['res' => false, 'message' => $e->getMessage()], 422);
        }
    }
}
