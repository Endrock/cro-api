<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSkillRequest;
use App\Http\Requests\UpdateSkillRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\SkillRepository;
use Illuminate\Http\Request;
use Flash;

class SkillController extends AppBaseController
{
    /** @var SkillRepository $skillRepository*/
    private $skillRepository;

    public function __construct(SkillRepository $skillRepo)
    {
        $this->skillRepository = $skillRepo;
    }

    /**
     * Display a listing of the Skill.
     */
    public function index(Request $request)
    {
        $skills = $this->skillRepository->paginate(10);

        return view('skills.index')
            ->with('skills', $skills);
    }

    /**
     * Show the form for creating a new Skill.
     */
    public function create()
    {
        return view('skills.create');
    }

    /**
     * Store a newly created Skill in storage.
     */
    public function store(CreateSkillRequest $request)
    {
        $input = $request->all();

        $skill = $this->skillRepository->create($input);

        Flash::success('Skill saved successfully.');

        return redirect(route('skills.index'));
    }

    /**
     * Display the specified Skill.
     */
    public function show($id)
    {
        $skill = $this->skillRepository->find($id);

        if (empty($skill)) {
            Flash::error('Skill not found');

            return redirect(route('skills.index'));
        }

        return view('skills.show')->with('skill', $skill);
    }

    /**
     * Show the form for editing the specified Skill.
     */
    public function edit($id)
    {
        $skill = $this->skillRepository->find($id);

        if (empty($skill)) {
            Flash::error('Skill not found');

            return redirect(route('skills.index'));
        }

        return view('skills.edit')->with('skill', $skill);
    }

    /**
     * Update the specified Skill in storage.
     */
    public function update($id, UpdateSkillRequest $request)
    {
        $skill = $this->skillRepository->find($id);

        if (empty($skill)) {
            Flash::error('Skill not found');

            return redirect(route('skills.index'));
        }

        $skill = $this->skillRepository->update($request->all(), $id);

        Flash::success('Skill updated successfully.');

        return redirect(route('skills.index'));
    }

    /**
     * Remove the specified Skill from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $skill = $this->skillRepository->find($id);

        if (empty($skill)) {
            Flash::error('Skill not found');

            return redirect(route('skills.index'));
        }

        $this->skillRepository->delete($id);

        Flash::success('Skill deleted successfully.');

        return redirect(route('skills.index'));
    }
}
