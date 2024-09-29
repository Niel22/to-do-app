<div class="dashboard-main-body">

    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
        <h6 class="fw-semibold mb-0">Task Details</h6>
        <ul class="d-flex align-items-center gap-2">
            <li class="fw-medium">
                <a href="index.html" class="d-flex align-items-center gap-1 hover-text-primary">
                    <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                    Dashboard
                </a>
            </li>
            <li>-</li>
            <li class="fw-medium">Task Details</li>
        </ul>
    </div>

    <div class="card">
        <div class="card-header">
            <div class="d-flex flex-wrap align-items-center justify-content-end gap-2">
                <button wire:click="edit('{{ $task->id }}')" class="btn btn-sm btn-success radius-8 d-inline-flex align-items-center gap-1">
                    <iconify-icon icon="uil:edit" class="text-xl"></iconify-icon>
                    Edit Task
                </button>
                <a href="{{ route('tasks.list') }}" class="btn btn-sm btn-dark radius-8 d-inline-flex align-items-center gap-1">
                    Back to Tasks
                </a>
            </div>
        </div>
        <div class="card-body py-40">
            <div class="row justify-content-center" id="taskDetails">
                <div class="col-lg-8">
                    <div class="shadow-4 border radius-8">
                        <div class="p-20 d-flex flex-wrap justify-content-between gap-3 border-bottom">
                            <div class="row" style="font-weight: bold">
                                <p class="mb-1 text-sm">Date Assigned: {{ $task->created_at->format('d D, M Y') }}</p>
                                <p class="mb-1 text-sm">Due Date: {{ \Carbon\Carbon::parse($task->due_date)->format('d D, M Y') }} <small class="text-muted">({{ \Carbon\Carbon::parse($task->due_date)->diffForHumans() }})</small></p>
                                <p class="mb-0"> Update Status:
                                    <select {{ $task->status == 'cancelled' ? 'disabled' : ($task->status == 'completed' ? 'disabled' : '') }} wire:model="statuses.{{ $task->id }}" wire:change="updateStatus('{{ $task->id }}', $event.target.value)" class="form-select text-sm">
                                        <option value="pending" {{ $task->status == "pending" ? 'selected' : '' }}>Pending</option>
                                        <option value="in progress" {{ $task->status == "in progress" ? 'selected' : '' }}>In Progress</option>
                                        <option value="completed" {{ $task->status == "completed" ? 'selected' : '' }}>Completed</option>
                                        <option value="cancelled" {{ $task->status == "cancelled" ? 'selected' : '' }}>Cancel</option>
                                    </select>
                                </p>
                            </div>
                        </div>

                        <div class="py-28 px-20">
                            <div class="d-flex flex-wrap justify-content-between align-items-end gap-3">
                                <div>
                                    <h6 class="text-md">Task Details:</h6>
                                    <table class="text-sm text-secondary-light">
                                        <tbody>
                                            <tr>
                                                <td>Task Name</td>
                                                <td class="ps-8">: {{ $task->task_title }}</td>
                                            </tr>
                                            <tr>
                                                <td>Description</td>
                                                <td class="ps-8">: {{ $task->task_description }}</td>
                                            </tr>
                                            <tr>
                                                <td>Priority</td>
                                                <td class="ps-8 text-capitalize">: <span class="bg-{{ $task->priority == 'high' ? 'danger' : ($task->priority == 'medium' ? 'warning' : 'success') }}-focus text-{{ $task->priority == 'high' ? 'danger' : ($task->priority == 'medium' ? 'warning' : 'success') }}-main px-24 py-4 rounded-pill fw-medium text-sm text-capitalize">
                                                    {{ $task->priority }}
                                                </span></td>
                                            </tr>
                                            <tr>
                                                <td>Status</td>
                                                <td class="ps-8 text-capitalize">: <span class="bg-{{ $task->status == 'pending' ? 'warning' : ($task->status == 'in progress' ? 'info' : ($task->status == 'cancelled' ? 'danger' : 'success')) }}-focus text-{{ $task->status == 'pending' ? 'warning' : ($task->status == 'in progress' ? 'info' : ($task->status == 'cancelled' ? 'danger' : 'success')) }}-main px-24 py-4 rounded-pill fw-medium text-sm text-capitalize">
                                                    {{ $task->status }}
                                                </span></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

