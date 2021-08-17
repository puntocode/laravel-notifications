<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use App\Notifications\MessageSent;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }


    public function message(){
        $users = User::where('id', '!=', auth()->id())->get();
        return view('messages.index', compact('users'));
    }

    public function show($id){
        $message = Message::findOrFail($id);
        return view('messages.show', compact('message'));
    }

    public function store(Request $request){
        $this->validate($request, [
            'message' => 'required',
            'user_id' =>  'required|exists:users,id'
        ]);

        $message = Message::create([
            'sender_id' => auth()->id(),
            'recipient_id' => $request->user_id,
            'message' => $request->message
        ]);

        $recipient = User::find($request->user_id);
        $recipient->notify(new MessageSent($message));

        return back()->with('flash', 'tu mensaje fue enviado');
    }


}
