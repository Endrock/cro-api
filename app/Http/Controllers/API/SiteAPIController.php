<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateSiteAPIRequest;
use App\Http\Requests\API\UpdateSiteAPIRequest;
use App\Models\Site;
use App\Repositories\SiteRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;

/**
 * Class SiteAPIController
 */
class SiteAPIController extends AppBaseController
{
    private SiteRepository $siteRepository;

    public function __construct(SiteRepository $siteRepo)
    {
        $this->siteRepository = $siteRepo;
    }

    /**
     * Display a listing of the Sites.
     * GET|HEAD /sites
     */
    public function index(Request $request): JsonResponse
    {
        $sites = $this->siteRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($sites->toArray(), 'Sites retrieved successfully');
    }

    /**
     * Store a newly created Site in storage.
     * POST /sites
     */
    public function store(CreateSiteAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        $site = $this->siteRepository->create($input);

        return $this->sendResponse($site->toArray(), 'Site saved successfully');
    }

    /**
     * Display the specified Site.
     * GET|HEAD /sites/{id}
     */
    public function show($id): JsonResponse
    {
        /** @var Site $site */
        $site = $this->siteRepository->find($id);

        if (empty($site)) {
            return $this->sendError('Site not found');
        }

        return $this->sendResponse($site->toArray(), 'Site retrieved successfully');
    }

    /**
     * Update the specified Site in storage.
     * PUT/PATCH /sites/{id}
     */
    public function update($id, UpdateSiteAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        /** @var Site $site */
        $site = $this->siteRepository->find($id);

        if (empty($site)) {
            return $this->sendError('Site not found');
        }

        $site = $this->siteRepository->update($input, $id);

        return $this->sendResponse($site->toArray(), 'Site updated successfully');
    }

    /**
     * Remove the specified Site from storage.
     * DELETE /sites/{id}
     *
     * @throws \Exception
     */
    public function destroy($id): JsonResponse
    {
        /** @var Site $site */
        $site = $this->siteRepository->find($id);

        if (empty($site)) {
            return $this->sendError('Site not found');
        }

        $site->delete();

        return $this->sendSuccess('Site deleted successfully');
    }
}
