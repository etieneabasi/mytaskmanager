@extends('etieneabasi::master')
@section('title')
Task
@endsection
@section('content')
<div class="container mt-5">
  <div class="row pb-5">
<div class="col-sm-3"></div>
<div class="col-sm-6">
<p>
<a class="btn btn-link" type=""  data-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">Click to Add Category</a>
</p>
    <div class="col-sm-12 pb-5">
    <div class="row">
  <div class="col">
    <div class="collapse multi-collapse" id="multiCollapseExample1">
    <div class="accordion" id="accordionExample">
  <div class=" uper">
    <div class=" row" id="headingOne">
      <h5 class="mb-0">
       <p><a class="btn btn-link " type="" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          Click to Add Category
        </a>
      </p></h5>
      <h5 class="mb-0">
       <p> <a class="btn btn-link collapsed" type="" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          Click to View All Categories
        </a>
     </p> </h5>
      <span class="btn btn-primary float-right mb-5" style="border-radius:0px">Total Category : {{count($cats)}}</span>

    </div>    
    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">   
        <div class="">
          <form action="{{route('category.store')}}" method="get">
            <div class="input-group ">
              @csrf
              <input type="text" name="category" class="form-control" aria-label="Recipient's username" aria-describedby="basic-addon2">
              <button class="btn btn-secondary" type="submit" style="border-radius:0px" >Add Category</button>
            </div>
            </form>
          </div>
          </div>
          </div>
          <div class="uper">
    
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
      <div class="">
            <table class="table table-hover table-striped">
              <tbody>
                @foreach($cats as $cat)
                <i class="fas fa-cat"></i>
                <tr>
                 
                  <td>
                   
                    <a class="category nav-link text-dark" href="{{route('tasks.index')}}?category={{$cat->id}}" style="cursor:pointer">{{ $cat->name }}
                      <br>  <span> <small class="text-primary">{{ $cat->created_at->toFormattedDateString()}}</small></span>

                    </td> 
                    <td class="pt-4" width="40%">
                      
                      <button type="button" data-cat-id="{{$cat->id}}" data-cat-name="{{$cat->name}}"  class=" btn btn-success btn-sm " data-toggle="modal" data-target="#exampleModal">Edit</button>                                           
                      <form class="d-inline" action="{{route('cat.destroy', $cat->id)}}" method="get">
                       @csrf
                       <button type="submit" class="btn btn-danger btn-sm">Delete</button></td>
                     </form>
                   </td>
                 </tr>
                 @endforeach
                 <tbody>
                 </table>
               </div>
               </div>
             </div>
         </div>
         </div>
         </div>
         </div>
         </div>
         <!-- Modal -->
         <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-center" role="document">
          <form action="" method="post" name="form_cat_update" id="cat_update">

              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">

                 <div class="input-group ">
                  @csrf

                  <input type="text" name="name"  id="cat_id" class="form-control" aria-label="Recipient's username" aria-describedby="basic-addon2">
                </div>
                
              </div>
              <div class="modal-footer">
                <button class="btn btn-success" type="submit">Save Changes</button>
              </div>
            </div>
          </form>
        </div>
      </div>
      <div class="col-sm-12">
        <div class="card uper" style="border-radius:0px">
          <div class="card-header card-holder category-title">
          <span>Task Under Category Title : {{$current_category ? " $current_category->name" :"Select a category to Add / View task"}} </span>
          </div>
          <div class="card-body">
            @if($errors->has("taskname"))
            <p class="alert alert-info">{{ $errors->first('taskname') }}</p>
            @endif
            <form action="{{route('task.store')}}" method="get">
              @csrf
              
              <input type="hidden" name="category" id="categoryId" value="{{$current_category->id ?? null}}">                
              <div class="input-group">
                <input type="text" name="taskname" class="form-control" aria-label="Recipient's username" aria-describedby="basic-addon2" style="border-radius:0px">
                <button class="btn btn-secondary" type="submit" style="border-radius:0px">Add Task</button>
                
              </div>
            </form>
          </div>


          <div class="container">
            <div class="row">

            <table class="table table-hover table-striped">
               
               <tbody>
               @if(!is_null($task))
                 @foreach($task as $array)
                 <tr>
                   <td>
                     
                     <input type="checkbox" id="webTargeting" class="mt-3 ml-3" name="checkName"
                     @if($array->completed==1)
                     checked 
                    
                     @endif 

                     class="check ml-3" onchange="checkFunction('{{ $array->id }}')" value="" >
                   </td>
                   <td class="text-center">@if($array->completed==1) <s>{{ $array->name }}</s> @else
                     {{ $array->name }}
                     
                     @endif
                     <br>  <span> <small class="text-primary">{{ $cat->created_at->toFormattedDateString()}}</small></span>
                   
                   </td>
                
                     <td class="pt-4" width="40%">
                      <button type="button" data-task-id="{{$array->id}}" data-task-name="{{$array->name}}"  class=" btn btn-success btn-sm " data-toggle="modal" data-target="#exampleModalCenter">Edit</button>                                           
                      <form class="d-inline" action="{{route('tasks.destroy', $array->id)}}" method="get">
                       @csrf
                       <button type="submit" class="btn btn-danger btn-sm">Delete</button></td>
                     </form>
                   
                   </tr>
                   @endforeach
                   @else
                   <tr>
                     <td class="pl-4"> No tasks found </td>
                   </tr>
                   @endif
                 </tbody>
               </table>
              </div>
            </div>
          </div>
          </div>
          </div>
                  <div class="col-sm-3"></div>
<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
  <form action="" name="form_task_update" id="editedUpdate" method="post">
  @csrf
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Edit Task </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <div class="input-group ">
                  <input type="text" name="name" id="task_id" class="form-control">
                </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-success">Save changes</button>
      </div>
    </div>
  </div>
</div>
                  
        </div>
      </div>


      @endsection

      @section('script')
      <script src="{{asset('vendor/MyTaskManager/js/axios/axios.min.js')}}"></script>
      <script>
       function checkFunction(task_id)
       {
         console.log(task_id);
         var form = new FormData;
         form.append("taskId", task_id);
         form.append("_token", "{{csrf_token()}}");
         axios.post("{{route('task.check')}}", form)
         .then( function(serverResponse) {
          console.log(serverResponse.data);
          window.location.reload();
        })
         .catch(function(error) {
          console.log(error.response.data);
        })
         
       }     

       var url = "{{url('task/update/')}}"

       $("#exampleModal").on('show.bs.modal',function(eventCat){
         var btn = eventCat.relatedTarget;
         var id = $(btn).data('cat-id');
         var catName = $(btn).data('cat-name');
         
         $("#cat_id").val(catName);

         $("#cat_update").attr('action',url+'/'+id);
       });

       var urlf = "{{url('task/updateTask/')}}"

$("#exampleModalCenter").on('show.bs.modal',function(eventTask){
  var btn = eventTask.relatedTarget;
  var id = $(btn).data('task-id');
  var taskName = $(btn).data('task-name');
  
  $("#task_id").val(taskName);

  $("#editedUpdate").attr('action',urlf+'/'+id);
})
</script>
@endsection

