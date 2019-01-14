<?php

namespace App\Http\Controllers;

use App\Friendship;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class FriendshipController extends Controller
{
    public function findfriends()
    {
        $auth_user_id = Auth::user()->id;

        $friends1 = DB::table('friendships')
            ->leftJoin('users', 'users.id', 'friendships.f_receiver')
            ->where('f_status', 1)
            ->where('f_sender', $auth_user_id)
            ->pluck('f_receiver');

        $friends2 = DB::table('friendships')
            ->leftJoin('users', 'users.id', 'friendships.f_sender')
            ->where('f_status', 1)
            ->where('f_receiver', $auth_user_id)
            ->pluck('f_sender');

        $friends = array_merge($friends1->toArray(), $friends2->toArray());

        $allUsers = DB::table('users')
            ->whereNotIn('id', $friends)
            ->where('id', '!=', $auth_user_id)->get();

        /*foreach($allUsers as $u)
        {
            echo $u->name.' '; echo $u->surname.' '; echo $u->birth_date;
            echo "<br>";
        }*/
        return view('friends.findFriends', compact('allUsers'));
    }

    public function sendRequest($id){
        return Auth::user()->addFriend($id);
    }

    public function requests()
    {
        $auth_user_id = Auth::user()->id;

        $friendRequests = DB::table('friendships')
            ->rightJoin('users', 'users.id', '=', 'friendships.f_sender')
            ->where('f_status', '=', 0)
            ->where('friendships.f_receiver', '=', $auth_user_id)->get();

        return view('friends.requests', compact('friendRequests'));
    }

    public function accept($name, $surname, $id)
    {
        $auth_user_id = Auth::user()->id;
        $checkRequest = Friendship::where('f_sender', $id)
                ->where('f_receiver', $auth_user_id)
                ->first();
        if($checkRequest){
            //echo "yes, update here";
            $updateFriendship = DB::table('friendships')
                ->where('f_sender', $id)
                ->where('f_receiver', $auth_user_id)
                ->update(['f_status' => 1]);

            if($updateFriendship){
                return back()->with('msg', 'You are now friend with '. $name .' '. $surname);
            }
        } else  {
            return back();
        }
    }

    public function friends()
    {
        $auth_user_id = Auth::user()->id;

        $friends1 = DB::table('friendships')
            ->leftJoin('users', 'users.id', 'friendships.f_receiver')
            ->where('f_status', 1)
            ->where('f_sender', $auth_user_id)
            ->get();

        //dd($friends1);

        $friends2 = DB::table('friendships')
            ->leftJoin('users', 'users.id', 'friendships.f_sender')
            ->where('f_status', 1)
            ->where('f_receiver', $auth_user_id)
            ->get();

        $friends = array_merge($friends1->toArray(), $friends2->toArray());

        return view('friends.friends', compact('friends'));
    }

    public function removerequest($id){
        DB::table('friendships')
            ->where('f_receiver', Auth::user()->id)
            ->where('f_sender', $id)
            ->delete();

        return back()->with('msg', 'Request has been deleted');
    }
}
