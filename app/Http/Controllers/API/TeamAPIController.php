<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateTeamAPIRequest;
use App\Http\Requests\API\UpdateTeamAPIRequest;
use App\Models\Team;
use App\Repositories\TeamRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;

/**
 * Class TeamAPIController
 */
class TeamAPIController extends AppBaseController
{
    private TeamRepository $teamRepository;

    public function __construct(TeamRepository $teamRepo)
    {
        $this->teamRepository = $teamRepo;
    }

    /**
     * Display a listing of the Teams.
     * GET|HEAD /teams
     */
    public function index(Request $request): JsonResponse
    {
        $teams = $this->teamRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($teams->toArray(), 'Teams retrieved successfully');
    }

    /**
     * Store a newly created Team in storage.
     * POST /teams
     */
    public function store(CreateTeamAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        $team = $this->teamRepository->create($input);

        return $this->sendResponse($team->toArray(), 'Team saved successfully');
    }

    /**
     * Display the specified Team.
     * GET|HEAD /teams/{id}
     */
    public function show($id): JsonResponse
    {
        /** @var Team $team */
        $team = $this->teamRepository->find($id);

        if (empty($team)) {
            return $this->sendError('Team not found');
        }

        return $this->sendResponse($team->toArray(), 'Team retrieved successfully');
    }

    /**
     * Update the specified Team in storage.
     * PUT/PATCH /teams/{id}
     */
    public function update($id, UpdateTeamAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        /** @var Team $team */
        $team = $this->teamRepository->find($id);

        if (empty($team)) {
            return $this->sendError('Team not found');
        }

        $team = $this->teamRepository->update($input, $id);

        return $this->sendResponse($team->toArray(), 'Team updated successfully');
    }

    /**
     * Remove the specified Team from storage.
     * DELETE /teams/{id}
     *
     * @throws \Exception
     */
    public function destroy($id): JsonResponse
    {
        /** @var Team $team */
        $team = $this->teamRepository->find($id);

        if (empty($team)) {
            return $this->sendError('Team not found');
        }

        $team->delete();

        return $this->sendSuccess('Team deleted successfully');
    }
}
