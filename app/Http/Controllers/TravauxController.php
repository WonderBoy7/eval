<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTravauxRequest;
use App\Http\Requests\UpdateTravauxRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\TravauxRepository;
use Illuminate\Http\Request;
use Flash;
use Laracasts\Flash\Flash as FlashFlash;

class TravauxController extends AppBaseController
{
    /** @var TravauxRepository $travauxRepository*/
    private $travauxRepository;

    public function __construct(TravauxRepository $travauxRepo)
    {
        $this->travauxRepository = $travauxRepo;
    }

    /**
     * Display a listing of the Travaux.
     */
    public function index(Request $request)
    {
        $travauxes = $this->travauxRepository->paginate(10);

        return view('travauxes.index')
            ->with('travauxes', $travauxes);
    }

    /**
     * Show the form for creating a new Travaux.
     */
    public function create()
    {
        return view('travauxes.create');
    }

    /**
     * Store a newly created Travaux in storage.
     */
    public function store(CreateTravauxRequest $request)
    {
        $input = $request->all();

        $travaux = $this->travauxRepository->create($input);

        //Flash::success('Travaux saved successfully.');

        return redirect(route('travauxes.index'));
    }

    /**
     * Display the specified Travaux.
     */
    public function show($id)
    {
        $travaux = $this->travauxRepository->find($id);

        if (empty($travaux)) {
         //   Flash::error('Travaux not found');

            return redirect(route('travauxes.index'));
        }

        return view('travauxes.show')->with('travaux', $travaux);
    }

    /**
     * Show the form for editing the specified Travaux.
     */
    public function edit($id)
    {
        $travaux = $this->travauxRepository->find($id);

        if (empty($travaux)) {
     //       Flash::error('Travaux not found');

            return redirect(route('travauxes.index'));
        }

        return view('travauxes.edit')->with('travaux', $travaux);
    }

    /**
     * Update the specified Travaux in storage.
     */
    public function update($id, UpdateTravauxRequest $request)
    {
        $travaux = $this->travauxRepository->find($id);

        if (empty($travaux)) {
       //     Flash::error('Travaux not found');

            return redirect(route('travauxes.index'));
        }

        $travaux = $this->travauxRepository->update($request->all(), $id);

    //    Flash::success('Travaux updated successfully.');

        return redirect(route('travauxes.index'));
    }

    /**
     * Remove the specified Travaux from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $travaux = $this->travauxRepository->find($id);

        if (empty($travaux)) {
           // Flash::error('Travaux not found');

            return redirect(route('travauxes.index'));
        }

        $this->travauxRepository->delete($id);

       // Flash::success('Travaux deleted successfully.');

        return redirect(route('travauxes.index'));
    }
}
