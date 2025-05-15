<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateClientWeightRequest;
use App\Http\Requests\UpdateClientWeightRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\ClientWeightRepository;
use Illuminate\Http\Request;
use Flash;

class ClientWeightController extends AppBaseController
{
    /** @var ClientWeightRepository $clientWeightRepository*/
    private $clientWeightRepository;

    public function __construct(ClientWeightRepository $clientWeightRepo)
    {
        $this->clientWeightRepository = $clientWeightRepo;
    }

    /**
     * Display a listing of the ClientWeight.
     */
    public function index(Request $request)
    {
        $clientWeights = $this->clientWeightRepository->paginate(10);

        return view('client_weights.index')
            ->with('clientWeights', $clientWeights);
    }

    /**
     * Show the form for creating a new ClientWeight.
     */
    public function create()
    {
        return view('client_weights.create');
    }

    /**
     * Store a newly created ClientWeight in storage.
     */
    public function store(CreateClientWeightRequest $request)
    {
        $input = $request->all();

        $clientWeight = $this->clientWeightRepository->create($input);

        Flash::success('Client Weight saved successfully.');

        return redirect(route('client-weights.index'));
    }

    /**
     * Display the specified ClientWeight.
     */
    public function show($id)
    {
        $clientWeight = $this->clientWeightRepository->find($id);

        if (empty($clientWeight)) {
            Flash::error('Client Weight not found');

            return redirect(route('client-weights.index'));
        }

        return view('client_weights.show')->with('clientWeight', $clientWeight);
    }

    /**
     * Show the form for editing the specified ClientWeight.
     */
    public function edit($id)
    {
        $clientWeight = $this->clientWeightRepository->find($id);

        if (empty($clientWeight)) {
            Flash::error('Client Weight not found');

            return redirect(route('client-weights.index'));
        }

        return view('client_weights.edit')->with('clientWeight', $clientWeight);
    }

    /**
     * Update the specified ClientWeight in storage.
     */
    public function update($id, UpdateClientWeightRequest $request)
    {
        $clientWeight = $this->clientWeightRepository->find($id);

        if (empty($clientWeight)) {
            Flash::error('Client Weight not found');

            return redirect(route('client-weights.index'));
        }

        $clientWeight = $this->clientWeightRepository->update($request->all(), $id);

        Flash::success('Client Weight updated successfully.');

        return redirect(route('client-weights.index'));
    }

    /**
     * Remove the specified ClientWeight from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $clientWeight = $this->clientWeightRepository->find($id);

        if (empty($clientWeight)) {
            Flash::error('Client Weight not found');

            return redirect(route('client-weights.index'));
        }

        $this->clientWeightRepository->delete($id);

        Flash::success('Client Weight deleted successfully.');

        return redirect(route('client-weights.index'));
    }
}
