<?php

namespace App\Http\Controllers;

use App\Http\Resources\SessionResource;
use App\Models\Session;
use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function create(Request  $request)
    {
        try {
            $session = Session::create([
                'user1_id'=>auth()->id(),
                'user2_id'=>$request->friend_id,
                'status'=>1
            ]);

            if(!empty($session)){
                return new SessionResource($session);
            }else{
                throw new \Exception('Invalid Information', 400);
            }
        }catch (\Exception $ex){
            return response()->json([
                'message'=>$ex->getMessage(),
            ]);
        }
    }
}
