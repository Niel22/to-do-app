<?php

namespace App\Livewire\Task;

use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Livewire\Component;

class Add extends Component
{

    public $task_title, $task_description, $due_date, $priority, $notification_time;

    protected $rules = [
        'task_title' => ['required', 'min:5'],
        'task_description' => ['required', 'min:20', 'max:255'],
        'due_date' => ['required', 'date'],
        'priority' => ['required'],
        'notification_time' => ['required'],
    ];

    public function create(){
        $task = $this->validate();

        if($task['due_date'] < Carbon::now()){
            $this->addError('due_date', 'Date cannot be in the past');
        }else{
            $task['user_id'] = Auth::id();
            $task['slug'] = Str::slug($task['task_title']);

            Task::create($task);

            toastr()->success('Task added to your todo list!');

            $this->redirectRoute('tasks.list');

        }
    }

    public function render()
    {
        return view('livewire.task.add');
    }
}
