<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateTravauxAPIRequest;
use App\Http\Requests\API\UpdateTravauxAPIRequest;
use App\Models\Travaux;
use App\Repositories\TravauxRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;

/**
 * Class TravauxAPIController
 */
class TravauxAPIController extends AppBaseController
{
    private TravauxRepository $travauxRepository;

    public function __construct(TravauxRepository $travauxRepo)
    {
        $this->travauxRepository = $travauxRepo;
    }

    /**
     * Display a listing of the Travauxes.
     * GET|HEAD /travauxes
     */
    public function index(Request $request): JsonResponse
    {
        $travauxes = $this->travauxRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($travauxes->toArray(), 'Travauxes retrieved successfully');
    }

    /**
     * Store a newly created Travaux in storage.
     * POST /travauxes
     */
    public function store(CreateTravauxAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        $travaux = $this->travauxRepository->create($input);

        return $this->sendResponse($travaux->toArray(), 'Travaux saved successfully');
    }

    /**
     * Display the specified Travaux.
     * GET|HEAD /travauxes/{id}
     */
    public function show($id): JsonResponse
    {
        /** @var Travaux $travaux */
        $travaux = $this->travauxRepository->find($id);

        if (empty($travaux)) {
            return $this->sendError('Travaux not found');
        }

        return $this->sendResponse($travaux->toArray(), 'Travaux retrieved successfully');
    }

    /**
     * Update the specified Travaux in storage.
     * PUT/PATCH /travauxes/{id}
     */
    public function update($id, UpdateTravauxAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        /** @var Travaux $travaux */
        $travaux = $this->travauxRepository->find($id);

        if (empty($travaux)) {
            return $this->sendError('Travaux not found');
        }

        $travaux = $this->travauxRepository->update($input, $id);

        return $this->sendResponse($travaux->toArray(), 'Travaux updated successfully');
    }

    /**
     * Remove the specified Travaux from storage.
     * DELETE /travauxes/{id}
     *
     * @throws \Exception
     */
    public function destroy($id): JsonResponse
    {
        /** @var Travaux $travaux */
        $travaux = $this->travauxRepository->find($id);

        if (empty($travaux)) {
            return $this->sendError('Travaux not found');
        }

        $travaux->delete();

        return $this->sendSuccess('Travaux deleted successfully');
    }
}
