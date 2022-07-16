<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $tasks = Task::where('id_user', Auth::id())->get();
        
        return view('tasks.index',[
            'title' => 'Agenda de tarefas',
            'tasks' => $tasks,
        ]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tasks.formNewTask',[
            'title' => 'nova tarefa', 
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|max:50',
            'status' => 'required|boolean',
            'id_user' => 'required',
            'content' => 'required'
        ]);
        
        $task = new Task();
        $task->title = $request->title;
        $task->status = $request->status;
        $task->id_user = $request->id_user;
        $task->content = $request->content;

        if($task->save()){
            return redirect()->route('task.index');
        }

        return redirect()->back()->withInput()->withErrors('confira os dados');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        return view('tasks.showTask',[
            'title' => $task->title,
            'task' => $task,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        $task->destroy($task->id);

        return redirect()->route('task.index');
    }

    /**
     * faz busca no banco de dados de acordo com a requisição passada
     * @param Request $request 
     */
    public function find(Request $request)
    {
        
        $tasks = Task::where('title', 'like', $request->search.'%')->get();

        return null;
    }
}
