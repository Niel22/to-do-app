<div class="dashboard-main-body">

    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
        <h6 class="fw-semibold mb-0">Create Task</h6>
        <ul class="d-flex align-items-center gap-2">
            <li class="fw-medium">
            </li>
            <li>-</li>
            <li class="fw-medium"><a href="{{ route('tasks.list') }}" class="btn btn-small btn-dark">Back to tasks list</a>
            </li>
        </ul>
    </div>

    <div class="row gy-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form wire:submit="create" class="row gy-3">
                        <div class="col-12">
                            <label class="form-label">Task Title</label>
                            <input type="text" wire:model="task_title" name="task_title" class="form-control" placeholder="Enter Task Title"
                                required>
                                @error('task_title')
                                    <span class="text-sm text-danger">{{ $message }}</span>
                                @enderror
                        </div>

                        <div class="col-12">
                            <label class="form-label">Task Description</label>
                            <textarea wire:model="task_description" name="task_description" class="form-control" placeholder="Enter Task Description" rows="3"></textarea>
                            @error('task_description')
                                <span class="text-sm text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-12">
                            <label class="form-label">Due Date <small class="text-muted">(Select a due date and
                                    time)</small></label>
                            <input type="datetime-local" wire:model="due_date" name="due_date" class="form-control" required>
                            @error('due_date')
                                <span class="text-sm text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-12">
                            <label class="form-label">Priority</label>
                            <select wire:model="priority" name="priority" class="form-control" required>
                                <option value="">Select task prority</option>
                                <option value="normal">Normal</option>
                                <option value="medium">Medium</option>
                                <option value="high">High</option>
                            </select>
                            @error('priority')
                                <span class="text-sm text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-12">
                            <label class="form-label">Notification Time</label>
                            <select wire:model="notification_time" name="notification_time" class="form-control" required>
                                <option value="never">Select time for notification</option>
                                <option value="never">Never</option>
                                <option value="5">5 minutes before</option>
                                <option value="30">30 minutes before</option>
                                <option value="60">1 hour before</option>
                            </select>
                            @error('notification_time')
                                <span class="text-sm text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-12">
                            <button type="submit" class="btn btn-primary-600">Create Task</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
