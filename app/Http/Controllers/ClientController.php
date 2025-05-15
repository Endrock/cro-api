<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateClientRequest;
use App\Http\Requests\UpdateClientRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\ClientStatus;
use App\Models\ClientWeight;
use App\Models\User;
use App\Repositories\ClientRepository;
use Illuminate\Http\Request;
use Flash;

class ClientController extends AppBaseController
{
    /** @var ClientRepository $clientRepository*/
    private $clientRepository;

    public function __construct(ClientRepository $clientRepo)
    {
        $this->clientRepository = $clientRepo;
    }

    /**
     * Display a listing of the Client.
     */
    public function index(Request $request)
    {
        $clients = $this->clientRepository->paginate(10);

        return view('clients.index')
            ->with('clients', $clients);
    }

    /**
     * Show the form for creating a new Client.
     */
    public function create()
    {
        $clientStatuses = ClientStatus::pluck('name', 'id');
        $clientWeights = ClientWeight::pluck('value', 'id');
        // TODO - Add a filter to only show users with the role of Account Manager
        $accountManagers = User::whereHas('role', function ($q) {
            $q->where('name', 'Account Manager');
        })->pluck('name', 'id');
        return view('clients.create', compact('clientStatuses', 'clientWeights', 'accountManagers'));
    }

    /**
     * Store a newly created Client in storage.
     */
    public function store(CreateClientRequest $request)
    {
        $input = $request->all();

        $client = $this->clientRepository->create($input);

        if ($request->filled('primary_site_url')) {
            $client->sites()->create(['url' => $request->input('primary_site_url')]);
        }

        Flash::success('Client saved successfully.');

        return redirect(route('clients.index'));
    }

    /**
     * Display the specified Client.
     */
    public function show($id)
    {
        $client = $this->clientRepository->find($id);

        if (empty($client)) {
            Flash::error('Client not found');

            return redirect(route('clients.index'));
        }

        $clientStatuses = ClientStatus::pluck('name', 'id');
        $clientWeights = ClientWeight::pluck('value', 'id');
        // TODO - Add a filter to only show users with the role of Account Manager
        $accountManagers = User::whereHas('role', function ($q) {
            $q->where('name', 'Account Manager');
        })->pluck('name', 'id');
        return view('clients.show', compact('client', 'clientStatuses', 'clientWeights', 'accountManagers'));
    }

    /**
     * Show the form for editing the specified Client.
     */
    public function edit($id)
    {
        $client = $this->clientRepository->find($id);

        if (empty($client)) {
            Flash::error('Client not found');

            return redirect(route('clients.index'));
        }

        $clientStatuses = ClientStatus::pluck('name', 'id');
        $clientWeights = ClientWeight::pluck('value', 'id');
        // TODO - Add a filter to only show users with the role of Account Manager
        $accountManagers = User::whereHas('role', function ($q) {
            $q->where('name', 'Account Manager');
        })->pluck('name', 'id');
        return view('clients.edit', compact('client', 'clientStatuses', 'clientWeights', 'accountManagers'));
    }

    /**
     * Update the specified Client in storage.
     */
    public function update($id, UpdateClientRequest $request)
    {
        $client = $this->clientRepository->find($id);

        if (empty($client)) {
            Flash::error('Client not found');

            return redirect(route('clients.index'));
        }

        $client = $this->clientRepository->update($request->all(), $id);

        Flash::success('Client updated successfully.');

        return redirect(route('clients.index'));
    }

    /**
     * Remove the specified Client from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $client = $this->clientRepository->find($id);

        if (empty($client)) {
            Flash::error('Client not found');

            return redirect(route('clients.index'));
        }

        $this->clientRepository->delete($id);

        Flash::success('Client deleted successfully.');

        return redirect(route('clients.index'));
    }
}
