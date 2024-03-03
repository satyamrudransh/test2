<?php

namespace App\Http\Controllers\API\User;
use App\Models\User\User;
use App\Models\TaskUser\TaskUser;
use App\Models\Task\Task;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;


class UserController extends Controller
{
    public function index(Request $request)
    {
      
        if($request->has('related') && $request->has('limit'))
        {
            $temp=$request->related;
            return UserResource::collection(User::with($temp)->latest()->paginate($request->limit));
        }

        else
        {
            return UserResource::collection(User::latest()->paginate($request->limit));
        }
    
    }

    public function show($id)
    {
        try{
            return new UserResource(User::findOrFail($id));
        }
        catch(\Exception $e){
            return $e->getMessage();
 
        }
    }

    
    public function store(Request $request)
    {
        $user = new User();

        if($request->has('firstName'))
        $user['firstName'] = $request->input('firstName');

        if($request->has('lastName'))
        $user['lastName'] = $request->input('lastName');

        if($request->has('email'))
        $user['email'] = $request->input('email');

        if($request->has('avatar'))
        $user['avatar'] = $request->input('avatar');
        

        $user->save();

        if (!$user->userId) {
            return response()->json(['error' => 'User creation failed'], 500);
        }


        $taskIds = Task::where('parentTaskId', 0)->pluck('id')->toArray();

        // Create task user records for each task
        foreach ($taskIds as $taskId) {
            TaskUser::create([
                'userId' => $user->userId,
                'taskId' => $taskId
            ]);
        }


        // Create an array of task IDs
    // $taskIds = [1, 2, 3, 4, 5];
    
    // // Create task user records for each task
    // foreach ($taskIds as $taskId) {
    //     TaskUser::create([
    //         'userId' => $user->userId,
    //         'taskId' => $taskId
    //     ]);
    // }

        $success['0']['code']='0001';
        $success['0']['status']='200';
        $success['0']['title']='Submitted successfully';
        $success['0']['detail']='User placed successfully';
        return response()->json(['data', $success],'200');
    }


    public function update(Request $request , $id)
    {
        $user = User::findOrFail($id);
     
        if($request->has('firstName'))
        $user['firstName'] = $request->input('firstName');

        if($request->has('lastName'))
        $user['lastName'] = $request->input('lastName');

        if($request->has('email'))
        $user['email'] = $request->input('email');

        if($request->has('avatar'))
        $user['avatar'] = $request->input('avatar');

        if($request->has('totalCoins'))
        $user['totalCoins'] = $request->input('totalCoins');

        $user->save();

        $success['0']['code']='0001';
        $success['0']['status']='200';
        $success['0']['title']='Updated successfully';
        $success['0']['detail']='User Update successfully';
        return response()->json(['data' , $success],'200');

    }


    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();

        $success['0']['code']='0001';
        $success['0']['status']='200';
        $success['0']['title']='Deleted successfully';
        $success['0']['detail']='User Delete successfully';
        return response()->json(['data' ,  $success],'200');
    }
}
