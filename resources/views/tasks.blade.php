<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MLP To-Do</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-xs-12">
                <img src="{{asset('/images/logo.png')}}" class="logo" />
            </div>
        </div>

        <div class="row">
            <div class="col-sm-4 col-xs-12">
            
                @include('includes.flash-message')
        
                {{Form::open(['route'=>'tasks.add_new'])}}
                    <div class="form-group">
                        {{Form::text('new_task',old('task'),['class'=>'form-control'])}}
                    </div>    
                    <div class="form-group">
                        <button type="submit" name="action" value="add_new" class="btn btn-block btn-primary">ADD</button>
                    </div>    

                {{Form::close()}}

            </div>
            <div class="col-sm-8 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-body">    
                        <table class="table">
                            <tr>
                                <th style="width: 2em">#</th>
                                <th colspasn="5">Task</th>
                            </tr>    
                            {{Form::open(['route'=>'tasks.edit'])}}
                                @foreach($tasks as $task)
                                 <tr data-toggle="tooltip" data-placement="top" title="{{$task->status->name}}">
                                    <td>{{$task->id}}</td>
                                    <td class="task-column" @if($task->status_id==2) colspan="3" @endif >{!!$task->formatted_task()!!} </td>
                                    @if($task->status_id == 1)    
                                        <td><button type="submit" name="mark_as_completed" value="{{$task->id}}" class="btn btn-success"  onclick="return confirm('Are you sure?');"> <span class="glyphicon glyphicon-ok"></span></button></td>
                                        <td><button type="submit" name="delete_task" value="{{$task->id}}" class="btn btn-danger"  onclick="return confirm('Are you sure?');"> <span class="glyphicon glyphicon-remove"></span></button></td>
                                    @endif    
                                </tr>
                            @endforeach
                            {{Form::close()}}

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
