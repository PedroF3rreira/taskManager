<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Task;
use App\Models\Category;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::where('id_user', Auth::id())->orderBy('created_at', 'DESC')->paginate(5);
        $categories = Category::all();

        return view('tasks.index',[
            'title' => 'Agenda de tarefas',
            'tasks' => $tasks,
            'categories' => $categories,
            'filterType' => 'sem filtro'
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
        $request->validate([
            'title' => 'required|max:50',
            'status' => 'required|boolean',
            'id_user' => 'required',
            'content' => 'required',
            'category' => 'required',
        ]);
        
        $task = new Task();
        $task->title = $request->title;
        $task->status = $request->status;
        $task->id_user = $request->id_user;
        $task->content = $request->content;
        $task->category_id = $request->category;

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

        $result['success'] = true;
        echo json_encode($result);
        return;

        //return redirect()->route('task.index');
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

    /**
     * *
     * @param  Task   $task 
     * @return json       
     */
    public function concludedTask(Task $task)
    {
        $result = [];

        if($task->status === 0){
            $task->status = 1;
            $task->save();
            $result['success'] = true;
            $result['status'] = $task->status;  
        }
        else{
            $task->status = 0;
            $task->save();
            $result['success'] = true;
            $result['status'] = $task->status;   
        }   
        
        echo json_encode($result);
        return;
    }

    /**
     * Filtra resultados e retorna a view task.index com resultados filtrados
     * @param  string $search tipo de filtro
     * @return View
     */
    public function orderBy(string $search)
    {
        $tasks = [];
        $categories = Category::all();
        $type = '';

        switch ($search) {
            case 'pedding':
                $tasks = Task::where('id_user', Auth::id())
                ->where('status', '0')
                ->paginate(5);
                if(count($tasks)){
                    $type = 'tarefas pendentes';
                }
                else{
                    $type = 'não têm tarefas pendentes';
                }       
                break;
            case 'concluded':
                $tasks = Task::where('id_user', Auth::id())
                ->where('status', '1')
                ->paginate(5);

                 if(count($tasks)){
                    $type = 'tarefas concluidas';
                }
                else{
                    $type = 'não têm tarefas concluidas';
                }   
                break;
            default:
                return redirect()->route('task.index');
                
        }

         return view('tasks.index',[
            'title' => 'Agenda de tarefas',
            'tasks' => $tasks,
            'categories' => $categories,
            'filterType' => $type
        ]);   
    }
}
