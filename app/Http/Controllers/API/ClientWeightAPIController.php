<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateClientWeightAPIRequest;
use App\Http\Requests\API\UpdateClientWeightAPIRequest;
use App\Models\ClientWeight;
use App\Repositories\ClientWeightRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;

/**
 * Class ClientWeightAPIController
 */
class ClientWeightAPIController extends AppBaseController
{
    private ClientWeightRepository $clientWeightRepository;

    public function __construct(ClientWeightRepository $clientWeightRepo)
    {
        $this->clientWeightRepository = $clientWeightRepo;
    }

    /**
     * Display a listing of the client-weights.
     * GET|HEAD /client-weights
     */
    public function index(Request $request): JsonResponse
    {
        $clientWeights = $this->clientWeightRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($clientWeights->toArray(), 'Client Weights retrieved successfully');
    }

    /**
     * Store a newly created ClientWeight in storage.
     * POST /client-weights
     */
    public function store(CreateClientWeightAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        $clientWeight = $this->clientWeightRepository->create($input);

        return $this->sendResponse($clientWeight->toArray(), 'Client Weight saved successfully');
    }

    /**
     * Display the specified ClientWeight.
     * GET|HEAD /client-weights/{id}
     */
    public function show($id): JsonResponse
    {
        /** @var ClientWeight $clientWeight */
        $clientWeight = $this->clientWeightRepository->find($id);

        if (empty($clientWeight)) {
            return $this->sendError('Client Weight not found');
        }

        return $this->sendResponse($clientWeight->toArray(), 'Client Weight retrieved successfully');
    }

    /**
     * Update the specified ClientWeight in storage.
     * PUT/PATCH /client-weights/{id}
     */
    public function update($id, UpdateClientWeightAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        /** @var ClientWeight $clientWeight */
        $clientWeight = $this->clientWeightRepository->find($id);

        if (empty($clientWeight)) {
            return $this->sendError('Client Weight not found');
        }

        $clientWeight = $this->clientWeightRepository->update($input, $id);

        return $this->sendResponse($clientWeight->toArray(), 'ClientWeight updated successfully');
    }

    /**
     * Remove the specified ClientWeight from storage.
     * DELETE /client-weights/{id}
     *
     * @throws \Exception
     */
    public function destroy($id): JsonResponse
    {
        /** @var ClientWeight $clientWeight */
        $clientWeight = $this->clientWeightRepository->find($id);

        if (empty($clientWeight)) {
            return $this->sendError('Client Weight not found');
        }

        $clientWeight->delete();

        return $this->sendSuccess('Client Weight deleted successfully');
    }
}
