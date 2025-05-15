<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePodRequest;
use App\Http\Requests\UpdatePodRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\PodRepository;
use Illuminate\Http\Request;
use Flash;

class PodController extends AppBaseController
{
    /** @var PodRepository $podRepository*/
    private $podRepository;

    public function __construct(PodRepository $podRepo)
    {
        $this->podRepository = $podRepo;
    }

    /**
     * Display a listing of the Pod.
     */
    public function index(Request $request)
    {
        $pods = $this->podRepository->paginate(10);

        return view('pods.index')
            ->with('pods', $pods);
    }

    /**
     * Show the form for creating a new Pod.
     */
    public function create()
    {
        return view('pods.create');
    }

    /**
     * Store a newly created Pod in storage.
     */
    public function store(CreatePodRequest $request)
    {
        $input = $request->all();

        $pod = $this->podRepository->create($input);

        Flash::success('Pod saved successfully.');

        return redirect(route('pods.index'));
    }

    /**
     * Display the specified Pod.
     */
    public function show($id)
    {
        $pod = $this->podRepository->find($id);

        if (empty($pod)) {
            Flash::error('Pod not found');

            return redirect(route('pods.index'));
        }

        return view('pods.show')->with('pod', $pod);
    }

    /**
     * Show the form for editing the specified Pod.
     */
    public function edit($id)
    {
        $pod = $this->podRepository->find($id);

        if (empty($pod)) {
            Flash::error('Pod not found');

            return redirect(route('pods.index'));
        }

        return view('pods.edit')->with('pod', $pod);
    }

    /**
     * Update the specified Pod in storage.
     */
    public function update($id, UpdatePodRequest $request)
    {
        $pod = $this->podRepository->find($id);

        if (empty($pod)) {
            Flash::error('Pod not found');

            return redirect(route('pods.index'));
        }

        $pod = $this->podRepository->update($request->all(), $id);

        Flash::success('Pod updated successfully.');

        return redirect(route('pods.index'));
    }

    /**
     * Remove the specified Pod from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $pod = $this->podRepository->find($id);

        if (empty($pod)) {
            Flash::error('Pod not found');

            return redirect(route('pods.index'));
        }

        $this->podRepository->delete($id);

        Flash::success('Pod deleted successfully.');

        return redirect(route('pods.index'));
    }
}
