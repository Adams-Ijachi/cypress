<?php

namespace App\Http\Controllers;

use App\Http\Enums\UserRolesEnums;
use App\Http\Requests\CreateActivityRequest;
use App\Http\Requests\UpdateActivityRequest;
use App\Models\GlobalActivity;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public function index()
    {
        return view('activities.index',[
            'activities' => GlobalActivity::paginate(10),
        ]);
    }

    public function create()
    {
        return view('activities.create');
    }

    public function store(CreateActivityRequest $request)
    {
        if (GlobalActivity::whereDate('date', $request->safe()['date'])->count() >= 4) {
            return redirect()->back()->withErrors(['date' => 'You can only add 4 activities per day']);
        }

        $validated = $request->validated();
        $validated['image'] = $request->file('image')->store('images');

        \DB::transaction(function () use ($validated) {
            $activity = GlobalActivity::create($validated);

            $users = \App\Models\User::where('role', UserRolesEnums::User->value)->get();

            $users->each(function ($user) use ($activity) {
                $user->activities()->create([
                    'title' => $activity->title,
                    'description' => $activity->description,
                    'date' => $activity->date,
                    'is_global' => true,
                    'global_activity_id' => $activity->id,
                    'image' => $activity->image,
                ]);
            });
        });


        return redirect()->route('dashboard.activities');
    }




    public function edit(GlobalActivity $activity)
    {
        return view('activities.edit',[
            'activity' => $activity,
        ]);
    }


    public function update(UpdateActivityRequest $request, GlobalActivity $activity)
    {
        $validated = $request->validated();
        $validated['image'] = $request->hasFile('image') ? $request->file('image')->store('images') : $activity->image;

        $activity->update($validated);

        return redirect()->route('dashboard.activities');
    }

    public function destroy(GlobalActivity $activity)
    {
        $activity->delete();
        return redirect()->route('dashboard.activities');
    }

}
