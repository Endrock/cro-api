<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateClientStatusRequest;
use App\Http\Requests\UpdateClientStatusRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\ClientStatusRepository;
use Illuminate\Http\Request;
use Flash;

class ClientStatusController extends AppBaseController
{
    /** @var ClientStatusRepository $clientStatusRepository*/
    private $clientStatusRepository;

    public function __construct(ClientStatusRepository $clientStatusRepo)
    {
        $this->clientStatusRepository = $clientStatusRepo;
    }

    /**
     * Display a listing of the ClientStatus.
     */
    public function index(Request $request)
    {
        $clientStatuses = $this->clientStatusRepository->paginate(10);

        return view('client_statuses.index')
            ->with('clientStatuses', $clientStatuses);
    }

    /**
     * Show the form for creating a new ClientStatus.
     */
    public function create()
    {
        return view('client_statuses.create');
    }

    /**
     * Store a newly created ClientStatus in storage.
     */
    public function store(CreateClientStatusRequest $request)
    {
        $input = $request->all();

        $clientStatus = $this->clientStatusRepository->create($input);

        Flash::success('Client Status saved successfully.');

        return redirect(route('client-statuses.index'));
    }

    /**
     * Display the specified ClientStatus.
     */
    public function show($id)
    {
        $clientStatus = $this->clientStatusRepository->find($id);

        if (empty($clientStatus)) {
            Flash::error('Client Status not found');

            return redirect(route('client-statuses.index'));
        }

        return view('client_statuses.show')->with('clientStatus', $clientStatus);
    }

    /**
     * Show the form for editing the specified ClientStatus.
     */
    public function edit($id)
    {
        $clientStatus = $this->clientStatusRepository->find($id);

        if (empty($clientStatus)) {
            Flash::error('Client Status not found');

            return redirect(route('client-statuses.index'));
        }

        return view('client_statuses.edit')->with('clientStatus', $clientStatus);
    }

    /**
     * Update the specified ClientStatus in storage.
     */
    public function update($id, UpdateClientStatusRequest $request)
    {
        $clientStatus = $this->clientStatusRepository->find($id);

        if (empty($clientStatus)) {
            Flash::error('Client Status not found');

            return redirect(route('client-statuses.index'));
        }

        $clientStatus = $this->clientStatusRepository->update($request->all(), $id);

        Flash::success('Client Status updated successfully.');

        return redirect(route('client-statuses.index'));
    }

    /**
     * Remove the specified ClientStatus from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $clientStatus = $this->clientStatusRepository->find($id);

        if (empty($clientStatus)) {
            Flash::error('Client Status not found');

            return redirect(route('client-statuses.index'));
        }

        $this->clientStatusRepository->delete($id);

        Flash::success('Client Status deleted successfully.');

        return redirect(route('client-statuses.index'));
    }
}
