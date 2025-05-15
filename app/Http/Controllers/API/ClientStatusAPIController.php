<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateClientStatusAPIRequest;
use App\Http\Requests\API\UpdateClientStatusAPIRequest;
use App\Models\ClientStatus;
use App\Repositories\ClientStatusRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;

/**
 * Class ClientStatusAPIController
 */
class ClientStatusAPIController extends AppBaseController
{
    private ClientStatusRepository $clientStatusRepository;

    public function __construct(ClientStatusRepository $clientStatusRepo)
    {
        $this->clientStatusRepository = $clientStatusRepo;
    }

    /**
     * Display a listing of the client-statuses.
     * GET|HEAD /client-statuses
     */
    public function index(Request $request): JsonResponse
    {
        $clientStatuses = $this->clientStatusRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($clientStatuses->toArray(), 'Client Statuses retrieved successfully');
    }

    /**
     * Store a newly created ClientStatus in storage.
     * POST /client-statuses
     */
    public function store(CreateClientStatusAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        $clientStatus = $this->clientStatusRepository->create($input);

        return $this->sendResponse($clientStatus->toArray(), 'Client Status saved successfully');
    }

    /**
     * Display the specified ClientStatus.
     * GET|HEAD /client-statuses/{id}
     */
    public function show($id): JsonResponse
    {
        /** @var ClientStatus $clientStatus */
        $clientStatus = $this->clientStatusRepository->find($id);

        if (empty($clientStatus)) {
            return $this->sendError('Client Status not found');
        }

        return $this->sendResponse($clientStatus->toArray(), 'Client Status retrieved successfully');
    }

    /**
     * Update the specified ClientStatus in storage.
     * PUT/PATCH /client-statuses/{id}
     */
    public function update($id, UpdateClientStatusAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        /** @var ClientStatus $clientStatus */
        $clientStatus = $this->clientStatusRepository->find($id);

        if (empty($clientStatus)) {
            return $this->sendError('Client Status not found');
        }

        $clientStatus = $this->clientStatusRepository->update($input, $id);

        return $this->sendResponse($clientStatus->toArray(), 'ClientStatus updated successfully');
    }

    /**
     * Remove the specified ClientStatus from storage.
     * DELETE /client-statuses/{id}
     *
     * @throws \Exception
     */
    public function destroy($id): JsonResponse
    {
        /** @var ClientStatus $clientStatus */
        $clientStatus = $this->clientStatusRepository->find($id);

        if (empty($clientStatus)) {
            return $this->sendError('Client Status not found');
        }

        $clientStatus->delete();

        return $this->sendSuccess('Client Status deleted successfully');
    }
}
