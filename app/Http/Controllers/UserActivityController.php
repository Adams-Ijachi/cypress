<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateActivityRequest;
use App\Http\Requests\UpdateActivityRequest;
use App\Models\Activity;
use App\Models\User;
use App\Models\UserActivity;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class UserActivityController extends Controller
{
    public function index(User $user)
    {
        $userActivities = UserActivity::with('globalActivity')->where('user_id', $user->id)->paginate(10);
        return view('user_activities.index',[
            'activities' => $userActivities,
            'user' => $user,
        ]);

    }


    public function create(User $user)
    {
        return view('user_activities.create',[
            'user' => $user,
        ]);
    }

    public function store(User $user, CreateActivityRequest $request)
    {
        return $this->save($request, $user);
    }

    public function edit(User $user,UserActivity $activity)
    {
        return view('user_activities.edit',[
            'activity' => $activity->load('globalActivity'),
            'user' => $user,
        ]);
    }


    public function update(User $user,UserActivity $activity, UpdateActivityRequest $request)
    {
        if ($activity->is_global){

            $activity->update([
                'title' => $request->safe()['title'],
                'description' => $request->safe()['description'],
                'date' => $request->safe()['date'],
                'is_global' => false,
                'global_activity_id' => null,
                'image' => $request->hasFile('image') ? $request->file('image')->store('images') : $activity->image,
            ]);

            return redirect()->route('dashboard.users.activities', $user->id);
        }

        $activity->update([
            'title' => $request->safe()['title'],
            'description' => $request->safe()['description'],
            'date' => $request->safe()['date'],
            'image' => $request->hasFile('image') ? $request->file('image')->store('images') : $activity->image,
        ]);

        return redirect()->route('dashboard.users.activities', $user->id);
    }


    public function destroy($id)
    {
    }

    /**
     * @param UpdateActivityRequest $request
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function save(FormRequest $request, User $user): \Illuminate\Http\RedirectResponse
    {

        $validated = $request->validated();

        $validated['image'] = '';

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('images');
        }


        UserActivity::create([
            'user_id' => $user->id,
            'title' => $validated['title'],
            'description' => $validated['description'],
            'date' => $validated['date'],
            'image' => $validated['image'],
            'is_global' => false,
        ]);


        return redirect()->route('dashboard.users.activities', $user);
    }
}
