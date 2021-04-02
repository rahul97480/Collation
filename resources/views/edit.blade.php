@extends('layouts.app')

@section('content')

<form action="{{ url('updatetask/'.$task->id) }}" method="POST" class="form-horizontal">
            {!! csrf_field() !!}

            <!-- Task Name -->
            <div class="form-group">
                <label for="task" class="col-sm-3 control-label">Task</label>

                <div class="col-sm-6">


































                
                    <input type="text" name="name" id="task-name" value="{{$task->name}}" class="form-control">
                </div>
            </div>

            <!-- Add Task Button -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-success">
                        <i ></i> Update Task
                    </button>
                </div>
            </div>
        </form>


@endsection