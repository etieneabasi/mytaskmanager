<?php

namespace Etieneabasi\MyTaskManager\Controllers;
use Alert;
use Illuminate\Http\Request;
use Etieneabasi\MyTaskManager\Models\Category;
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
            return view('etieneabasi::task', ["cats" => $cats]);
    
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
    
            Alert::success('Success Message','Category saved Successfully');
            return back();            
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
            return view("etieneabasi::task",["cats"=>$cats]);
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
          
            return view("etieneabasi::task",["cats"=>$cats]);
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
 Alert::Success('message','Category Updated Successfully');
                return back();
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
    
            Alert::Success('message','Category Deleted Successfully');
          return back();
            
    
        }
  
    
}
