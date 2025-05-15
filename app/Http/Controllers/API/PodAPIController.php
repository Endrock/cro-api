<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatePodAPIRequest;
use App\Http\Requests\API\UpdatePodAPIRequest;
use App\Models\Pod;
use App\Repositories\PodRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;

/**
 * Class PodAPIController
 */
class PodAPIController extends AppBaseController
{
    private PodRepository $podRepository;

    public function __construct(PodRepository $podRepo)
    {
        $this->podRepository = $podRepo;
    }

    /**
     * Display a listing of the Pods.
     * GET|HEAD /pods
     */
    public function index(Request $request): JsonResponse
    {
        $pods = $this->podRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($pods->toArray(), 'Pods retrieved successfully');
    }

    /**
     * Store a newly created Pod in storage.
     * POST /pods
     */
    public function store(CreatePodAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        $pod = $this->podRepository->create($input);

        return $this->sendResponse($pod->toArray(), 'Pod saved successfully');
    }

    /**
     * Display the specified Pod.
     * GET|HEAD /pods/{id}
     */
    public function show($id): JsonResponse
    {
        /** @var Pod $pod */
        $pod = $this->podRepository->find($id);

        if (empty($pod)) {
            return $this->sendError('Pod not found');
        }

        return $this->sendResponse($pod->toArray(), 'Pod retrieved successfully');
    }

    /**
     * Update the specified Pod in storage.
     * PUT/PATCH /pods/{id}
     */
    public function update($id, UpdatePodAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        /** @var Pod $pod */
        $pod = $this->podRepository->find($id);

        if (empty($pod)) {
            return $this->sendError('Pod not found');
        }

        $pod = $this->podRepository->update($input, $id);

        return $this->sendResponse($pod->toArray(), 'Pod updated successfully');
    }

    /**
     * Remove the specified Pod from storage.
     * DELETE /pods/{id}
     *
     * @throws \Exception
     */
    public function destroy($id): JsonResponse
    {
        /** @var Pod $pod */
        $pod = $this->podRepository->find($id);

        if (empty($pod)) {
            return $this->sendError('Pod not found');
        }

        $pod->delete();

        return $this->sendSuccess('Pod deleted successfully');
    }
}
