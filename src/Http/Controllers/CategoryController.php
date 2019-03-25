<?php

namespace Etieneabasi\MyTaskManager\Controllers;

use Illuminate\Http\Request;
use Alert;
use Etieneabasi\MyTaskManager\Controllers\Category;
use Etieneabasi\MyTaskManager\Controllers\Task;
class CategoryController extends Controller
{
  
        /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function index()
        {
            $cats = Category::all();
            return view('mytaskmanager::task', ["cats" => $cats]);
    
        }
    
        /**
         * Show the form for creating a new resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function create()
        {
            // return view('task');
    
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
                'name1'=>'required|string',
            ]);
    
            $cats = new Category();
            $cats->id = $request->id;
            $cats->name= $request->name1;
    
            $cats->save();
    
                return back()->with('message','Successfully saved');
            
        }
    
        /**
         * Display the specified resource.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function show()
        {
            //
            $cats = Category::all();
            return view("mytaskmanager::task",["cats"=>$cats]);
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
            $cats =Category::find($id);
          
            return view("mytaskmanager::task",["cats"=>$cats]);
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
            $request->validate([
                'name'=>'required|string',
              
            ]);
    
            $cats = Category::find($id);
            $cats->name= $request->get('name');
    
            $cats->save();
                return back()->with('message','Successfully Updated');
        }
    
        /**
         * Remove the specified resource from storage.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function destroy($id)
        {
            $cat = Category::find($id);
            $cat-> delete();
    
                return back()->with('message','Successfully Deleted');
          
            
    
        }
  
    
}
