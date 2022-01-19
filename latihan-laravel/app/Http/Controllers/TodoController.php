<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
use Illuminate\Support\Facades\Date;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $todo = Todo::all();

        return view('index', ["todos" => $todo]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|min:10',
            'description' => 'required',
        ]);

        $todo = new Todo();
        $todo->title = $request->title;
        $todo->description = $request->description;
        $todo->save();

        return redirect()->route('index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function done($id)
    {
        $todo = Todo::find($id);

        if (!$todo) {
            return redirect()->back()->with('error', "Todo Not found!");
        }

        $todo->done_at = date('Y-m-d H:i:s');
        $todo->save();

        return redirect()->route('index')->with('success', "Successfully finish todo!");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $todo = Todo::find($id);

        if (!$todo) {
            return redirect()->back()->with('error', "Todo Not found!");
        }

        return view('edit', [
            "todo" => $todo
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $todo = Todo::find($id);

        if (!$todo) {
            return redirect()->back()->with('error', "Todo Not found!");
        }

        $todo->title = $request->title;
        $todo->description = $request->description;
        $todo->save();

        return redirect()->route('index')->with('success', "Successfully update todo!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $todo = Todo::find($id);

        if (!$todo) {
            return redirect()->back()->with('error', "Todo Not found!");
        }

        $todo->delete();

        return redirect()->route('index')->with('success', "Successfully delete todo!");
    }
}