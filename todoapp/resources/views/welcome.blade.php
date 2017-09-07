	<!DOCTYPE html>
	<html>
		<head>
			<meta charset="utf-8">
			<title></title>
			<link rel="stylesheet" href="/css/app.css">
		</head>
		<body>
			<section class="add-task">
				<h1> add task:</h1>
				<form class="hidden" action="/" method="post">
					{{ csrf_field() }}
				</form>
				<form class="to-do_form" action="/task" method="post">
					{{ csrf_field() }}
					<textarea type="text" name="name"  rows="1" cols="20" class="to-do_text"></textarea>
					<input type="submit" name="submit" class="to-do_submit">
				</form>
			</section>

			<section class="todo">
				<div class="todo__completed">
					<h2 class="subject-title">To Do:</h2>
	        @foreach ($tasks as $task)
            @if ($task['status'] == 0)
							<div class="todo__completed-container">
								<p class="todo__completed-text">
	                {{$task->name}}
	              </p>
								<form action="/task/{{ $task->id }}" method="POST">
	            		{{ csrf_field() }}
	            		{{ method_field('DELETE') }}
									<button class="delete-button">Delete Task</button>
	        			</form>
								<form action="/task/{{ $task->id }}" method="POST">
									{{ csrf_field() }}
									<button class="complete-button">complete</button>
								</form>
							</div>
            @endif
	        @endforeach
	    </div>

	    <div class="todo__uncompleted">
				<h2 class="subject-title">Completed:</h2>
        @foreach ($tasks as $task)
          @if ($task['status'] == 1)
						<div class="todo__uncompleted-container">
							<p class="todo__uncompleted-text">
								{{$task->name}}
							</p>
							<form action="/task/{{ $task->id }}" method="POST">
								{{ csrf_field() }}
								{{ method_field('DELETE') }}
								<button class="delete-button">Delete Task</button>
							</form>
							<form action="/task/{{ $task->id }}" method="POST">
								{{ csrf_field() }}
								<button class="uncomplete-button">uncomplete</button>
							</form>
						</div>
          @endif
        @endforeach
	    </div>
			</section>
		</body>
	</html>
