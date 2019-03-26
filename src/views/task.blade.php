@extends('etieneabasi::master')
@section('title')
Task
@endsection
@section('content')

<div class="container">

  <div class="row bg-light pt-5 pb-5">

    <div class="col-sm-5">
     
      <div class="card uper">
        <div class="card-header">
          Task Category <span class="btn btn-primary" style="border-radius:0px">Total Category : {{count($cats)}}</span>
        </div>
        <div class="card-body">
          @if($errors->has("category"))
          <p class="alert alert-info">{{ $errors->first('category') }}</p>
          @endif
          <form action="{{route('category.store')}}" method="get">
            <div class="input-group ">
              @csrf
              <input type="text" name="category" class="form-control" aria-label="Recipient's username" aria-describedby="basic-addon2">
              <button class="btn btn-primary" type="submit" style="border-radius:0px">Add Category</button>
            </div>
          </div>
        </form>
        <div class="container">
          <div class="row">

            <table class="table table-hover table-striped">
              <tbody>
                @foreach($cats as $cat)
                <i class="fas fa-cat"></i>
                <tr>
                 
                  <td>
                   
                    <a class="category nav-link text-dark" href="{{route('tasks.index')}}?category={{$cat->id}}" style="cursor:pointer">{{ $cat->name }}
                      <br>  <span> <small class="text-primary">{{ $cat->created_at->toFormattedDateString()}}</small></span>

                      <!-- </li> -->
                      <!-- </ul> -->
                    </td> <td class="pt-4" width="40%">
                      
                      <button type="button" data-cat-id="{{$cat->id}}" data-cat-name="{{$cat->name}}"  class=" btn btn-info btn-sm " data-toggle="modal" data-target="#exampleModal"><i class="fa fa-pencil"></i></button>                                           
                      <form class="d-inline" action="{{route('cat.destroy', $cat->id)}}" method="get">
                       @csrf
                       <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i>  </button></td>
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

         <!-- Modal -->
         <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
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
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button class="btn btn-primary" type="submit">Save Changes</button>
              </div>
            </div>
          </form>
        </div>
      </div>
      <div class="col-sm-7">
        <div class="card uper">
          <div class="card-header card-holder category-title">
            Task  {{$current_category ? "under $current_category->name" :"select a category to view task"}} <span class="btn btn-primary" style="border-radius:0px"></span>
          </div>
          <div class="card-body">
            @if($errors->has("taskname"))
            <p class="alert alert-info">{{ $errors->first('taskname') }}</p>
            @endif
            <form action="{{route('task.store')}}" method="get">
              @csrf
              
              <input type="hidden" name="category" id="categoryId" value="{{$current_category->id ?? null}}">                
              <div class="input-group">
                <input type="text" name="taskname" class="form-control" aria-label="Recipient's username" aria-describedby="basic-addon2">
                <button class="btn btn-primary" type="submit" style="border-radius:0px">Add Task</button>
                
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
                      
                      <input type="checkbox" id="webTargeting" name="checkName"
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
                      <form class="d-inline" action="{{route('tasks.destroy', $array->id)}}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm" style="margin-left:100px"><i class="fa fa-trash-o"></i>  </button></td>
                      </form> 
                    </tr>
                    @endforeach
                    @else
                    <tr>
                      <td> No tasks found </td>
                    </tr>
                    @endif
                  </tbody>
                </table>
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

       $("#exampleModal").on('show.bs.modal',function(event){
         var btn = event.relatedTarget;
         var id = $(btn).data('cat-id');
         var catName = $(btn).data('cat-name');
         
         $("#cat_id").val(catName);

         $("#cat_update").attr('action',url+'/'+id)
       })

     </script>
     @endsection

