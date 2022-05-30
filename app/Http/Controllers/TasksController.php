<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Redirect;

use App\Models\Task;

class TasksController extends Controller
{
    //  

public function index(){

    $tasks = Task::with('status')->get();

    return view('tasks',compact('tasks'));

}


    public function add_new_task(Request $request){

     
        $validator = Validator::make($request->all(),[
            'new_task' =>           'required'
        ]);

        if($validator->fails()){    
            return back()->with('error','Task field required');
        }

        if(Task::create(['task'=>$request->new_task, 'status_id'=>1])){
            
            return back()->with('success','Task created successfully!');
        } else {
            return back()->with('error','Something went wrong');
        }



    }

    public function edit_task(Request $request){

        $validator = Validator::make($request->all(),[
            'mark_as_completed' =>  'required_without:delete_task',
            'delete_task' =>        'required_without:mark_as_completed',
        ]);

        if($request->has('mark_as_completed')){

            Task::where('id',$request->mark_as_completed)->update(['status_id'=>2]);
            return back()->with('success',"Task id $request->mark_as_complated updated successfully!");
        
        }

        if($request->has('delete_task')){

            Task::destroy($request->delete_task);
            return back()->with('success',"Task id $request->delete_task deleted!");
        
        }



    }

}
