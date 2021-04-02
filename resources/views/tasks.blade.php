@extends('layouts.app')

@section('content')

    <!-- Bootstrap Boilerplate... -->

    <div class="panel-body">
        <!-- Display Validation Errors -->
        @include('common.errors')

        <!-- New Task Form -->
        <form action="{{ url('task') }}" method="POST" class="form-horizontal">
            {!! csrf_field() !!}

            <!-- Task Name -->
            <div class="form-group">
                <label for="task" class="col-sm-3 control-label">Task</label>

                <div class="col-sm-6">
                    <input type="text" name="name" id="task-name" class="form-control">
                </div>
            </div>

            <!-- Add Task Button -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-success">
                        <i ></i> Add Task
                    </button>
                </div>
            </div>
        </form>
    </div>

    <!-- Current Tasks -->
    
    @if (count($tasks) > 0)
        <div class="panel panel-default">
            <div class="panel-heading">
                Current Tasks
            </div>
            

            <div class="container">
                <table class="table table-striped task-table">

                    <!-- Table Headings -->
                    <thead>
                        <th>Task</th>
                        <th> </th>
                    </thead>

                    <!-- Table Body -->
                    
                    <tbody>
                    
                            @foreach ($tasks as $task)

                                <tr class="drag" draggable="true">
                                    <!-- Task Name -->
                                    <td class="table-text">
                                        <div >{{ $task->name }}</div>
                                    </td>

                                    <!-- Edit Button -->

                                    <td>
                                        <form action="{{ url('edit/'.$task->id) }}" method="POST">
                                            {!! csrf_field() !!}


                                            <button class="btn btn-success">Edit Task</button>
                                        </form>
                                    </td>

                                    <!-- Delete Button -->
                                    <td>
                                        <form action="{{ url('task/'.$task->id) }}" method="POST">
                                            {!! csrf_field() !!}
                                            {!! method_field('DELETE') !!}

                                            <button class="btn btn-danger">Delete Task</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        
                    </tbody>
                </table>
            
        </div>

    </div>
        
    @endif
@endsection