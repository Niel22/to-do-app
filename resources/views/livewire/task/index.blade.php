<div class="col-lg-12">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-content-center">
            <h5 class="card-title mb-0">All Tasks</h5>
            <a href="{{ route('task.add') }}" class="btn btn-sm btn-primary">Add Task</a>
        </div>
        @if(Auth::user()->is_admin)
        <div class="card-body">
            <div class="table-responsive">
                <table class="table bordered-table mb-0">
                    <thead>
                        <tr>
                            <th scope="col">Task Name</th>
                            <th scope="col">User Name</th>
                            <th scope="col">Priority</th>
                            <th scope="col">Due Date</th>
                            <th scope="col">Status</th>
                            <th scope="col">Due In</th>
                            <th scope="col">Update Status</th>
                            <th scope="col">Date Created</th>
                            <th scope="col" class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($tasks as $task)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <span
                                            class="text-lg text-secondary-light fw-semibold flex-grow-1">{{ $task->task_title }}</span>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <span
                                            class="text-lg text-secondary-light fw-semibold flex-grow-1">{{ $task->user->name }}</span>
                                    </div>
                                </td>
                                <td>
                                    <span
                                        class="bg-{{ $task->priority == 'high' ? 'danger' : ($task->priority == 'medium' ? 'warning' : 'success') }}-focus text-{{ $task->priority == 'high' ? 'danger' : ($task->priority == 'medium' ? 'warning' : 'success') }}-main px-24 py-4 rounded-pill fw-medium text-sm text-capitalize">
                                        {{ $task->priority }}
                                    </span>
                                </td>

                                <td>{{ \Carbon\Carbon::parse($task->due_date)->format('D, j M, Y') }}</td>
                                <td>
                                    <span
                                        class="bg-{{ $task->status == 'pending' ? 'warning' : ($task->status == 'in progress' ? 'info' : ($task->status == 'cancelled' ? 'danger' : 'success')) }}-focus text-{{ $task->status == 'pending' ? 'warning' : ($task->status == 'in progress' ? 'info' : ($task->status == 'cancelled' ? 'danger' : 'success')) }}-main px-24 py-4 rounded-pill fw-medium text-sm text-capitalize">
                                        {{ $task->status }}
                                    </span>
                                </td>

                                <td>{{ \Carbon\Carbon::parse($task->due_date)->diffForHumans() }}</td>
                                <td>
                                    <select
                                        {{ $task->status == 'cancelled' ? 'disabled' : ($task->status == 'completed' ? 'disabled' : '') }}
                                        wire:model="statuses.{{ $task->id }}"
                                        wire:change="updateStatus('{{ $task->id }}', $event.target.value)"
                                        class="form-select">
                                        <option value="pending" {{ $task->status == 'pending' ? 'selected' : '' }}>
                                            Pending</option>
                                        <option value="in progress"
                                            {{ $task->status == 'in progress' ? 'selected' : '' }}>In Progress</option>
                                        <option value="completed" {{ $task->status == 'completed' ? 'selected' : '' }}>
                                            Completed</option>
                                        <option value="cancelled" {{ $task->status == 'cancelled' ? 'selected' : '' }}>
                                            Cancel</option>
                                    </select>
                                </td>
                                <td>{{ Auth::user()->created_at->format('D d, M Y') }}</td>
                                <td class="text-center">
                                    <button wire:click="delete({{ $task->id }})"
                                        class="w-32-px h-32-px bg-danger-focus text-danger-main rounded-circle d-inline-flex align-items-center justify-content-center"><iconify-icon
                                            icon="mingcute:delete-2-line"></iconify-icon></button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8">
                                    <div class="alert alert-warning text-sm text-center">
                                        No Task Added By any user
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        @else
        <div class="card-body">
            <div class="table-responsive">
                <table class="table bordered-table mb-0">
                    <thead>
                        <tr>
                            <th scope="col">Task Name</th>
                            <th scope="col">Priority</th>
                            <th scope="col">Due Date</th>
                            <th scope="col">Status</th>
                            <th scope="col">Due In</th>
                            <th scope="col">Update Status</th>
                            <th scope="col">Date Created</th>
                            <th scope="col" class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse(Auth::user()->tasks as $task)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <span
                                            class="text-lg text-secondary-light fw-semibold flex-grow-1">{{ $task->task_title }}</span>
                                    </div>
                                </td>
                                <td>
                                    <span
                                        class="bg-{{ $task->priority == 'high' ? 'danger' : ($task->priority == 'medium' ? 'warning' : 'success') }}-focus text-{{ $task->priority == 'high' ? 'danger' : ($task->priority == 'medium' ? 'warning' : 'success') }}-main px-24 py-4 rounded-pill fw-medium text-sm text-capitalize">
                                        {{ $task->priority }}
                                    </span>
                                </td>

                                <td>{{ \Carbon\Carbon::parse($task->due_date)->format('D, j M, Y') }}</td>
                                <td>
                                    <span
                                        class="bg-{{ $task->status == 'pending' ? 'warning' : ($task->status == 'in progress' ? 'info' : ($task->status == 'cancelled' ? 'danger' : 'success')) }}-focus text-{{ $task->status == 'pending' ? 'warning' : ($task->status == 'in progress' ? 'info' : ($task->status == 'cancelled' ? 'danger' : 'success')) }}-main px-24 py-4 rounded-pill fw-medium text-sm text-capitalize">
                                        {{ $task->status }}
                                    </span>
                                </td>

                                <td>{{ \Carbon\Carbon::parse($task->due_date)->diffForHumans() }}</td>
                                <td>
                                    <select
                                        {{ $task->status == 'cancelled' ? 'disabled' : ($task->status == 'completed' ? 'disabled' : '') }}
                                        wire:model="statuses.{{ $task->id }}"
                                        wire:change="updateStatus('{{ $task->id }}', $event.target.value)"
                                        class="form-select">
                                        <option value="pending" {{ $task->status == 'pending' ? 'selected' : '' }}>
                                            Pending</option>
                                        <option value="in progress"
                                            {{ $task->status == 'in progress' ? 'selected' : '' }}>In Progress</option>
                                        <option value="completed" {{ $task->status == 'completed' ? 'selected' : '' }}>
                                            Completed</option>
                                        <option value="cancelled" {{ $task->status == 'cancelled' ? 'selected' : '' }}>
                                            Cancel</option>
                                    </select>
                                </td>
                                <td>{{ Auth::user()->created_at->format('D d, M Y') }}</td>
                                <td class="text-center">
                                    <a href="{{ route('task.view', $task->slug) }}"
                                        class="w-32-px h-32-px bg-primary-light text-primary-600 rounded-circle d-inline-flex align-items-center justify-content-center"><iconify-icon
                                            icon="iconamoon:eye-light"></iconify-icon></a>
                                    <button wire:click="edit('{{ $task->id }}')"
                                        class="w-32-px h-32-px bg-success-focus text-success-main rounded-circle d-inline-flex align-items-center justify-content-center"><iconify-icon
                                            icon="lucide:edit"></iconify-icon></button>
                                    <button wire:click="delete({{ $task->id }})"
                                        class="w-32-px h-32-px bg-danger-focus text-danger-main rounded-circle d-inline-flex align-items-center justify-content-center"><iconify-icon
                                            icon="mingcute:delete-2-line"></iconify-icon></button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8">
                                    <div class="alert alert-warning text-sm text-center">
                                        No Task Added to your todo list yet
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        @endif
    </div><!-- card end -->
</div>
