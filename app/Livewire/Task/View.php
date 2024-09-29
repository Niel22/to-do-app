<?php

namespace App\Livewire\Task;

use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class View extends Component
{
    public $slug;

    public $statuses = [];

    public function mount()
    {
        foreach (Auth::user()->tasks as $task) {
            $this->statuses[$task->id] = $task->status;
        }
    }

    public function updateStatus($taskId, $value)
    {
        $task = Task::find($taskId); // Fetch the task by its ID
        if ($task) {
            $task->status = $value; // Update the status
            $task->save(); // Save changes

            // Optionally, add a success message
            if ($value == 'in progress') {
                toastr()->warning('Task is in progress!');
            } elseif ($value == 'completed') {
                toastr()->success('Task completed!');
            } elseif ($value == 'cancelled') {
                toastr()->error('Task cancelled!');
            } else {
                toastr()->info('Task is pending!');
            }
        }
    }

    public function edit($id){
        $task = Task::where('id', $id)->first();
        if ($task->status == 'cancelled' || $task->status == 'completed') {

            toastr()->error('You cannot edit this task because it has been ' . $task->status);

        } else {
            $this->redirectRoute('task.edit', $task->slug);
        }
    }

    public function render()
    {

        return view('livewire.task.view', [
            'task' => Task::where('slug', $this->slug)->first()
        ]);
    }
}
