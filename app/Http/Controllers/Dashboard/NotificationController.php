<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Notifications\General\ApiNotification;
use App\Http\Requests\Dashboard\User\{NotificationRequest};
use App\Notifications\General\{GeneralNotification,FCMNotification};
use Illuminate\Notifications\DatabaseNotification;
use App\Jobs\SendFCMNotification;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! request()->ajax()) {
            $superAdmins = User::whereIn('user_type',['admin','superadmin'])->pluck('id');
            $notifications = DatabaseNotification::whereHasMorph('notifiable',[User::class],function($q) use($superAdmins){
                $q->whereIn('notifiable_id',$superAdmins);
            })->latest()->paginate(200);
            return view('dashboard.notification.index',compact('notifications'));
        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Entity  $entity
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! request()->ajax()) {
            $superAdmins = User::whereIn('user_type',['admin','superadmin'])->pluck('id');
            $notification = DatabaseNotification::whereHasMorph('notifiable',[User::class],function($q) use($superAdmins){
                $q->whereIn('notifiable_id',$superAdmins);
            })->findOrFail($id);
            if (!$notification->read_at) {
               $notification->update(['read_at' => now()]);
            }
            return view('dashboard.notification.show',compact('notification'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NotificationRequest $request)
    {
        if ($request->user_id == 'all') {
            $users = User::where('user_type', 'owner')->get();
            $user_list = $users->pluck('id')->toArray();
        } else {
            $users = User::findOrFail($request->user_id);
            $user_list = [$users->id];
        }
        $data['sender_data'] = [
            'name' => trans('dashboard.manager.management'),
            'image' => asset('default_images/default.png'),
        ];
        $data['key'] = 'management';
        $data['key_type'] = 'management';
        // dd($users);
        \Notification::send($users, new GeneralNotification($request->validated() + $data, ['database','fcm']));
        $users->notify(new ApiNotification($data,['fcm','database']));
//        $pushFcmNotes = [
//            'type' => 'management',
//            'title' => $request->title ?? trans('api.management.management'),
//            'body' => $request->body,
//            'click_action' => "FLUTTER_NOTIFICATION_CLICK",
//        ];
//        pushFcmNotes($pushFcmNotes, $user_list);
        if (!request()->ajax()) {
            return back()->withTrue(trans('dashboard.messages.success_send'));
        } else {
            return response()->json(['value' => 1, 'body' => trans('dashboard.messages.success_send')]);
        }
    }



}
