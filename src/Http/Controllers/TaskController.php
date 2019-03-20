<?php

namespace Etieneabasi\MyTaskManager\Controllers;

use Illuminate\Http\Request;
use Etieneabasi\MyTaskManager\Controllers\Task;
use Etieneabasi\MyTaskManager\Controllers\Category;
class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexT()
    {
        $task = Task::all();
        $cats = Category::all();
        return view('mytaskmanager::task', ["cats" => $cats,'task'=>$task]);

    }
    public function index()
    {

        $cats = Category::all();
        if (!empty($_GET['category'])){
            $currentCategory = Category::where('id', $_GET['category'])->first();
            //task is a function from Category model
            $currentTask = $currentCategory->task ?? null;
        }
        return view('mytaskmanager::task', ["cats" => $cats,'task'=>$currentTask ?? null, 'current_category'=>$currentCategory ?? null]);

    }

    // public function index()
    // {
    //     $cats = Category::all();
    //     return view('task', ["cats" => $cats]);

    // }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function storeCat(Request $request)
    {
        $request->validate([
            'category'=>'required|string',


        ]);

        $cats = new Category();
        $cats->id = $request->id;
        $cats->name= $request->category;

        $cats->save();

            return back()->with('message','Successfully saved');
        
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
            'taskname'=>'required|string',
            'category'=>'required|string'


        ]);

        $task = new Task();
        $task->name= $request->taskname;
        $task->category_id = $request->category;
        
        $task->save();    
            return back()->with('message','Successfully Deleted');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $task = Task::all();
        return view("mytaskmanager::task",["task"=>$task]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
      
    }

    public function checkFunction(Request $request)
    {
        

        $task = Task::findOrFail($request->taskId);


        if($task->completed == 0)
        {
            $task->completed  = 1;
            $task->save();
        }
        else
        {
            $task->completed = 0;
            $task->save();

        }

        return $task;
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
        //
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
            $task = Task::find($id);
            $task-> delete();
    
                return back()->with('message','Successfully Deleted');
         
    
        
    }

}
