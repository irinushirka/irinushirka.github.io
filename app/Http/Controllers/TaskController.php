<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use Auth;

class TaskController extends Controller
{
    public function todo(){
        $user_id = Auth::user()->id;
        $com_tasks = Task::where('user_id', $user_id)->where('completed', '1')->orderBy('id', 'DESC')->paginate(10);
        $uncom_tasks = Task::where('user_id', $user_id)->where('completed', '0')->orderBy('id', 'DESC')->paginate(10);
        return view('user_pages.todo.todo', compact('com_tasks', 'uncom_tasks'));
    }

    public function submitTask(Request $r){
        Task::create([
            'user_id' => Auth::user()->id,
            'task' => $r['task'],
            'completed' => 0
        ]);  
        return redirect()->to('/todo');      
    }

    public function updateTask($id){
        $task = Task::find($id);
        $task->completed == 1 ? $task->completed = 0 : $task->completed = 1;
        $task->save();
        return redirect()->to('/todo');
    }

    public function deleteTask($id){
        $user_id = Auth::user()->id;
        Task::where('user_id', $user_id)->where('id', $id)->delete();
        return redirect()->to('/todo');
    }
}
