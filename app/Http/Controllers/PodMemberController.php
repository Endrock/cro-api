<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdatePodMembersRequest;
use App\Models\Pod;
use App\Models\User;
use Laracasts\Flash\Flash as Flash;

class PodMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pods = \App\Models\Pod::with('users.role')->get();

        return view('pods.members.index', compact('pods'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pod  $pod
     * @return \Illuminate\Http\Response
     */
    public function edit(Pod $pod)
    {
        // TODO Improve this piece of ~shit~ code
        $eligibleUsers = User::whereIn('role_id', [1, 2, 3, 4]) // IDs de Dev, AM, GL, Designer
            ->pluck('name', 'id');

        $currentMembers = $pod->users()->pluck('users.id')->toArray();

        return view('pods.members.edit', compact('pod', 'eligibleUsers', 'currentMembers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePodMembersRequest  $request
     * @param  \App\Models\Pod  $pod
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePodMembersRequest $request, Pod $pod)
    {
        $pod->users()->sync($request->input('user_ids', []));

        Flash::success('Pod members updated successfully.');

        $pods = Pod::with('users.role')->get();

        return redirect()->route('pods.members.index', compact('pods'));
    }
}
