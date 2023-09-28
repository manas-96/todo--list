<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\To_do_list;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class ToDoController extends Controller
{
    public function Register()
    {
        return view('auth.register');
    }

    public function Login()
    {
        if (Auth::user()) {
            return redirect(route('dashboard'));
        } else {
            return view('auth.login');
        }
    }
    public function Home()
    {
        return view('welcome');
    }
    public function Dashboard(Request $request)
    {
        $search = $request->search ?? "";
        if ($search == null) {
            $records = To_do_list::where('user_id', Auth::id())->paginate(5);
            return view('dashboard', compact('records', 'search'));
            // print_r($records);
        } else {
            $records = To_do_list::where('user_id', Auth::id())->Where('title', 'LIKE', "%$search%")->paginate(5);
            return view('dashboard', compact('records', 'search'));
        }
    }
    public function Create()
    {
        return view('create');
    }
    public function SendCreate(Request $request)
    {
        $validated = $request->validate(
            [
                'title' => 'required|max:250',
                'description' => 'required|max:250'

            ]
        );
        if ($validated) {
            $todo = new To_do_list();
            $todo->title = $validated['title'];
            $todo->description = $validated['description'];
            $todo->user_id = Auth::id();
            if ($todo->save()) {
                return back()->with('success', 'We added your work.');
                // echo "Data Saved";
                // return Redirect::to('dashboard')->with('success', 'We added your work.');

            }
        }
    }
    public function edit($id)
    {
        $task = To_do_list::where('id', '=', $id)->Where('user_id', '=', Auth::id())->first();
        // dd($task);
        return view('edit', compact('task'));
    }
    public function SendEdit(Request $request)
    {
        // dd($request->toArray());
        $validated = $request->validate(
            [
                'title' => 'required|max:50',
                'description' => 'required|max:255',
                'id' => 'numeric'
            ]
        );
        if ($validated) {
            $update_task = To_do_list::find($request->id);
            $update_task->title = $validated['title'];
            $update_task->description = $validated['description'];
            if ($update_task->save()) {
                return back()->with('update', 'We updated your work');
                // echo 'OK';
            }
        }
    }
    public function Delete(Request $request)
    {
        if (To_do_list::find($request->id)->delete()) {
            return Redirect::back()->with('deleted', 'Task deleted successfully');
        }
    }
}
