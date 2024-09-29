<?php

namespace App\Livewire\Task;

use App\Models\Task;
use Illuminate\Support\Str;
use Livewire\Component;

class Edit extends Component
{
    public $slug, $task_title, $task_description, $due_date, $priority, $notification_time, $task;

    protected $rules = [
        'task_title' => ['required', 'min:5'],
        'task_description' => ['required', 'min:20', 'max:255'],
        'due_date' => ['required', 'date'],
        'priority' => ['required'],
        'notification_time' => ['required'],
    ];

    public function mount()
    {
        $this->task = Task::where('slug', $this->slug)->first();

        $this->task_title = $this->task->task_title;
        $this->task_description = $this->task->task_description;
        $this->due_date = $this->task->due_date;
        $this->priority = $this->task->priority;
        $this->notification_time = $this->task->notification_time;
    }

    public function update()
    {

        $newTask = $this->validate();

        $newTask['slug'] = Str::slug($newTask['task_title']);

        $this->task->update([
            'task_title' => $newTask['task_title'],
            'task_description' => $newTask['task_description'],
            'due_date' => $newTask['due_date'],
            'priority' => $newTask['priority'],
            'notification_time' => $newTask['notification_time'],
            'slug' => $newTask['slug']
        ]);

        toastr()->success('Task updated successfully');

        $this->redirectRoute('task.view', $newTask['slug']);
    }

    public function render()
    {
        // dd($this->task);

            return view('livewire.task.edit');
    }
}
