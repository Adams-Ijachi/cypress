<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\GetUserActivitiesRangeRequest;
use App\Http\Resources\UserActivityResource;

class UserActivitiesController extends Controller
{
    public function __invoke(GetUserActivitiesRangeRequest $request)
    {
        try {
            $user = \Auth::user();

            $activities = $user->activities()
                ->whereBetween('date', [$request->validated()['from'], $request->validated()['to']])
                ->get();

            return UserActivityResource::collection($activities);

        }catch (\Exception $e) {
            return response()->json([
                'message' => 'Something went wrong'
            ], 500);
        }
    }
}
