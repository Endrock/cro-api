<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateProfileAPIRequest;
use App\Http\Requests\API\UpdateProfileAPIRequest;
use App\Models\Profile;
use App\Repositories\ProfileRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;

/**
 * Class ProfileAPIController
 */
class ProfileAPIController extends AppBaseController
{
    private ProfileRepository $profileRepository;

    public function __construct(ProfileRepository $profileRepo)
    {
        $this->profileRepository = $profileRepo;
    }

    /**
     * Display a listing of the Profiles.
     * GET|HEAD /profiles
     */
    public function index(Request $request): JsonResponse
    {
        $profiles = $this->profileRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($profiles->toArray(), 'Profiles retrieved successfully');
    }

    /**
     * Store a newly created Profile in storage.
     * POST /profiles
     */
    public function store(CreateProfileAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        $profile = $this->profileRepository->create($input);

        return $this->sendResponse($profile->toArray(), 'Profile saved successfully');
    }

    /**
     * Display the specified Profile.
     * GET|HEAD /profiles/{id}
     */
    public function show($id): JsonResponse
    {
        /** @var Profile $profile */
        $profile = $this->profileRepository->find($id);

        if (empty($profile)) {
            return $this->sendError('Profile not found');
        }

        return $this->sendResponse($profile->toArray(), 'Profile retrieved successfully');
    }

    /**
     * Update the specified Profile in storage.
     * PUT/PATCH /profiles/{id}
     */
    public function update($id, UpdateProfileAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        /** @var Profile $profile */
        $profile = $this->profileRepository->find($id);

        if (empty($profile)) {
            return $this->sendError('Profile not found');
        }

        $profile = $this->profileRepository->update($input, $id);

        return $this->sendResponse($profile->toArray(), 'Profile updated successfully');
    }

    /**
     * Remove the specified Profile from storage.
     * DELETE /profiles/{id}
     *
     * @throws \Exception
     */
    public function destroy($id): JsonResponse
    {
        /** @var Profile $profile */
        $profile = $this->profileRepository->find($id);

        if (empty($profile)) {
            return $this->sendError('Profile not found');
        }

        $profile->delete();

        return $this->sendSuccess('Profile deleted successfully');
    }
}
