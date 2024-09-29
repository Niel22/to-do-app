<?php

namespace App\Livewire;

use App\Models\Task;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class HomePage extends Component
{
    public $total_task, $pending_tasks, $in_progress_tasks, $completed_tasks, $cancel_tasks, $todays_task = [], $total_users;

    public $statuses = [];


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

    public function mount()
    {
        if (Auth::user()->is_admin) {
            foreach (Task::all() as $task) {
                $this->statuses[$task->id] = $task->status;
            }

            $this->total_task = Task::all()->count();
            $this->pending_tasks = Task::all()->where('status', 'pending')->count();
            $this->in_progress_tasks = Task::all()->where('status', 'in progress')->count();
            $this->cancel_tasks = Task::all()->where('status', 'cancel')->count();
            $this->completed_tasks = Task::all()->where('status', 'completed')->count();
            $this->total_users = User::count();

            foreach (Task::all() as $upcomingReminder) {
                // Parse the due date
                $dueDate = Carbon::parse($upcomingReminder['due_date']);

                // Check if the task is due today and the time is in the future
                if ($dueDate->isToday() && $dueDate->isFuture()) {
                    $this->todays_task[] = $upcomingReminder;
                }
            }
        } else {
            foreach (Auth::user()->tasks as $task) {
                $this->statuses[$task->id] = $task->status;
            }

            $this->total_task = Auth::user()->tasks->count();
            $this->pending_tasks = Auth::user()->tasks->where('status', 'pending')->count();
            $this->in_progress_tasks = Auth::user()->tasks->where('status', 'in progress')->count();
            $this->cancel_tasks = Auth::user()->tasks->where('status', 'cancel')->count();
            $this->completed_tasks = Auth::user()->tasks->where('status', 'completed')->count();

            foreach (Auth::user()->tasks as $upcomingReminder) {
                // Parse the due date
                $dueDate = Carbon::parse($upcomingReminder['due_date']);

                // Check if the task is due today and the time is in the future
                if ($dueDate->isToday() && $dueDate->isFuture()) {
                    $this->todays_task[] = $upcomingReminder;
                }
            }
        }
    }

    public function render()
    {
        return view('livewire.home-page');
    }
}
