<?php

namespace App\Http\Controllers;

use App\Repositories\TaskRepository;
use App\Task;
use Illuminate\Http\Request;
use Woo\GridView\DataProviders\EloquentDataProvider;

class TaskController extends Controller
{
    /**
     * Экземпляр TaskRepository.
     *
     * @var TaskRepository
     */
    protected $tasks;

    /**
     * Создание нового экземпляра контроллера.
     *
     * @param  TaskRepository  $tasks
     * @return void
     */
    public function __construct(TaskRepository $tasks)
    {
        $this->middleware('auth');

        $this->tasks = $tasks;
    }

    /**
     * Показать список всех задач пользователя.
     *
     * @param  Request  $request
     * @return Response
     */
    public function index(Request $request)
    {
        return view('tasks.index', [
            'tasks' => $this->tasks->forUser($request->user()),
            'dataProvider' => new EloquentDataProvider($request->user()->tasks()->getQuery())
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
        ]);

        $request->user()->tasks()->create([
            'name' => $request->name,
        ]);

        return redirect('/');
    }

    /**
     * Уничтожить заданную задачу.
     *
     * @param  Request  $request
     * @param  Task  $task
     * @return Response
     */
    public function destroy(Request $request, Task $task)
    {
        $this->authorize('destroy', $task);
        $task->delete();

        return redirect('/');
    }
}
