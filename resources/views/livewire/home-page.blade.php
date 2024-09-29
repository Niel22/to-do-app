<div class="dashboard-main-body">
    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
        <h6 class="fw-semibold mb-0">Dashboard</h6>
        <ul class="d-flex align-items-center gap-2">
            <li class="fw-medium">
                <a href="index.html" class="d-flex align-items-center gap-1 hover-text-primary">
                    <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                    Dashboard
                </a>
            </li>
            <li>-</li>
            <li class="fw-medium">Task Stat</li>
        </ul>
    </div>

    @if(Auth::user()->is_admin)
    <div class="row row-cols-xxxl-5 row-cols-lg-3 row-cols-sm-3 row-cols-1 gy-4">
        <div class="col">
            <div class="card shadow-none border bg-gradient-start-3 h-100">
                <div class="card-body p-20">
                    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                        <div>
                            <p class="fw-medium text-primary-light mb-1">Total Users</p>
                            <h6 class="mb-0">{{ $total_users }}</h6>
                        </div>
                        <div class="w-50-px h-50-px bg-warning rounded-circle d-flex justify-content-center align-items-center">
                            <iconify-icon icon="mdi:account-group-outline" class="text-white text-2xl mb-0"></iconify-icon>
                        </div>
                    </div>
                </div>
            </div><!-- card end -->
        </div>
        <div class="col">
            <div class="card shadow-none border bg-gradient-start-1 h-100">
                <div class="card-body p-20">
                    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                        <div>
                            <p class="fw-medium text-primary-light mb-1">Total Tasks</p>
                            <h6 class="mb-0">{{ $total_task }}</h6>
                        </div>
                        <div class="w-50-px h-50-px bg-cyan rounded-circle d-flex justify-content-center align-items-center">
                            <iconify-icon icon="mdi:format-list-bulleted" class="text-white text-2xl mb-0"></iconify-icon>
                        </div>
                    </div>
                </div>
            </div><!-- card end -->
        </div>
        <div class="col">
            <div class="card shadow-none border bg-gradient-start-2 h-100">
                <div class="card-body p-20">
                    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                        <div>
                            <p class="fw-medium text-primary-light mb-1">Pending Tasks</p>
                            <h6 class="mb-0">{{ $pending_tasks }}</h6>
                        </div>
                        <div class="w-50-px h-50-px bg-purple rounded-circle d-flex justify-content-center align-items-center">
                            <iconify-icon icon="mdi:clock-outline" class="text-white text-2xl mb-0"></iconify-icon>
                        </div>
                    </div>
                </div>
            </div><!-- card end -->
        </div>
        <div class="col">
            <div class="card shadow-none border bg-gradient-start-3 h-100">
                <div class="card-body p-20">
                    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                        <div>
                            <p class="fw-medium text-primary-light mb-1">In Progress Tasks</p>
                            <h6 class="mb-0">{{ $in_progress_tasks }}</h6>
                        </div>
                        <div class="w-50-px h-50-px bg-info rounded-circle d-flex justify-content-center align-items-center">
                            <iconify-icon icon="mdi:progress-check" class="text-white text-2xl mb-0"></iconify-icon>
                        </div>
                    </div>
                </div>
            </div><!-- card end -->
        </div>
        <div class="col">
            <div class="card shadow-none border bg-gradient-start-4 h-100">
                <div class="card-body p-20">
                    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                        <div>
                            <p class="fw-medium text-primary-light mb-1">Completed Tasks</p>
                            <h6 class="mb-0">{{ $completed_tasks }}</h6>
                        </div>
                        <div class="w-50-px h-50-px bg-success-main rounded-circle d-flex justify-content-center align-items-center">
                            <iconify-icon icon="mdi:check-circle-outline" class="text-white text-2xl mb-0"></iconify-icon>
                        </div>
                    </div>
                </div>
            </div><!-- card end -->
        </div>
    </div>


    <div class="col-lg-12 mt-3">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-content-center">
                <h5 class="card-title mb-0">Todays Tasks Deadline</h5>
                <a href="{{ route('task.add') }}" class="btn btn-sm btn-primary">Add Task</a>
            </div>
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
                            @forelse($todays_task as $task)
                            <tr>
                                <td>
                                  <div class="d-flex align-items-center">
                                    <span class="text-lg text-secondary-light fw-semibold flex-grow-1">{{ $task->task_title }}</span>
                                  </div>
                                </td>
                                <td>
                                    <span class="bg-{{ $task->priority == 'high' ? 'danger' : ($task->priority == 'medium' ? 'warning' : 'success') }}-focus text-{{ $task->priority == 'high' ? 'danger' : ($task->priority == 'medium' ? 'warning' : 'success') }}-main px-24 py-4 rounded-pill fw-medium text-sm text-capitalize">
                                        {{ $task->priority }}
                                    </span>
                                </td>

                                <td>{{  \Carbon\Carbon::parse($task->due_date)->format('D, j M, Y') }}</td>
                                <td>
                                    <span class="bg-{{ $task->status == 'pending' ? 'warning' : ($task->status == 'in progress' ? 'info' : ($task->status == 'cancelled' ? 'danger' : 'success')) }}-focus text-{{ $task->status == 'pending' ? 'warning' : ($task->status == 'in progress' ? 'info' : ($task->status == 'cancelled' ? 'danger' : 'success')) }}-main px-24 py-4 rounded-pill fw-medium text-sm text-capitalize">
                                        {{ $task->status }}
                                    </span>
                                </td>

                                <td>{{ \Carbon\Carbon::parse($task->due_date)->diffForHumans() }}</td>
                                <td><select {{ $task->status == 'cancelled' ? 'disabled' : ($task->status == 'completed' ? 'disabled' : '') }} wire:model="statuses.{{ $task->id }}" wire:change="updateStatus('{{ $task->id }}', $event.target.value)" class="form-select">
                                    <option {{ $task->status == "pending" ? 'selected' : '' }} value="pending">Pending</option>
                                    <option {{ $task->status == "in progress" ? 'selected' : '' }} value="in progress">In Progress</option>
                                    <option {{ $task->status == "completed" ? 'selected' : '' }} value="completed">Completed</option>
                                    <option {{ $task->status == "cancelled" ? 'selected' : '' }} value="cancelled">Cancel</option>
                                </select></td>
                                <td>{{ Auth::user()->created_at->format('D d, M Y') }}</td>
                                <td class="text-center">
                                    <a href="{{ route('task.view', 'slug') }}" class="w-32-px h-32-px bg-primary-light text-primary-600 rounded-circle d-inline-flex align-items-center justify-content-center"><iconify-icon icon="iconamoon:eye-light"></iconify-icon></a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="8">
                                    <div class="alert alert-warning text-sm text-center">
                                        No Task with today as deadline in your todo list.
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div><!-- card end -->
    </div>
    @else

    <div class="row row-cols-xxxl-5 row-cols-lg-3 row-cols-sm-3 row-cols-1 gy-4">
        <div class="col">
            <div class="card shadow-none border bg-gradient-start-1 h-100">
                <div class="card-body p-20">
                    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                        <div>
                            <p class="fw-medium text-primary-light mb-1">Total Tasks</p>
                            <h6 class="mb-0">{{ $total_task }}</h6>
                        </div>
                        <div class="w-50-px h-50-px bg-cyan rounded-circle d-flex justify-content-center align-items-center">
                            <iconify-icon icon="mdi:format-list-bulleted" class="text-white text-2xl mb-0"></iconify-icon>
                        </div>
                    </div>
                </div>
            </div><!-- card end -->
        </div>
        <div class="col">
            <div class="card shadow-none border bg-gradient-start-2 h-100">
                <div class="card-body p-20">
                    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                        <div>
                            <p class="fw-medium text-primary-light mb-1">Pending Tasks</p>
                            <h6 class="mb-0">{{ $pending_tasks }}</h6>
                        </div>
                        <div class="w-50-px h-50-px bg-purple rounded-circle d-flex justify-content-center align-items-center">
                            <iconify-icon icon="mdi:clock-outline" class="text-white text-2xl mb-0"></iconify-icon>
                        </div>
                    </div>
                </div>
            </div><!-- card end -->
        </div>
        <div class="col">
            <div class="card shadow-none border bg-gradient-start-3 h-100">
                <div class="card-body p-20">
                    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                        <div>
                            <p class="fw-medium text-primary-light mb-1">In Progress Tasks</p>
                            <h6 class="mb-0">{{ $in_progress_tasks }}</h6>
                        </div>
                        <div class="w-50-px h-50-px bg-info rounded-circle d-flex justify-content-center align-items-center">
                            <iconify-icon icon="mdi:progress-check" class="text-white text-2xl mb-0"></iconify-icon>
                        </div>
                    </div>
                </div>
            </div><!-- card end -->
        </div>
        <div class="col">
            <div class="card shadow-none border bg-gradient-start-4 h-100">
                <div class="card-body p-20">
                    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                        <div>
                            <p class="fw-medium text-primary-light mb-1">Completed Tasks</p>
                            <h6 class="mb-0">{{ $completed_tasks }}</h6>
                        </div>
                        <div class="w-50-px h-50-px bg-success-main rounded-circle d-flex justify-content-center align-items-center">
                            <iconify-icon icon="mdi:check-circle-outline" class="text-white text-2xl mb-0"></iconify-icon>
                        </div>
                    </div>
                </div>
            </div><!-- card end -->
        </div>
    </div>


    <div class="col-lg-12 mt-3">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-content-center">
                <h5 class="card-title mb-0">Todays Tasks Deadline</h5>
                <a href="{{ route('task.add') }}" class="btn btn-sm btn-primary">Add Task</a>
            </div>
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
                            @forelse($todays_task as $task)
                            <tr>
                                <td>
                                  <div class="d-flex align-items-center">
                                    <span class="text-lg text-secondary-light fw-semibold flex-grow-1">{{ $task->task_title }}</span>
                                  </div>
                                </td>
                                <td>
                                    <span class="bg-{{ $task->priority == 'high' ? 'danger' : ($task->priority == 'medium' ? 'warning' : 'success') }}-focus text-{{ $task->priority == 'high' ? 'danger' : ($task->priority == 'medium' ? 'warning' : 'success') }}-main px-24 py-4 rounded-pill fw-medium text-sm text-capitalize">
                                        {{ $task->priority }}
                                    </span>
                                </td>

                                <td>{{  \Carbon\Carbon::parse($task->due_date)->format('D, j M, Y') }}</td>
                                <td>
                                    <span class="bg-{{ $task->status == 'pending' ? 'warning' : ($task->status == 'in progress' ? 'info' : ($task->status == 'cancelled' ? 'danger' : 'success')) }}-focus text-{{ $task->status == 'pending' ? 'warning' : ($task->status == 'in progress' ? 'info' : ($task->status == 'cancelled' ? 'danger' : 'success')) }}-main px-24 py-4 rounded-pill fw-medium text-sm text-capitalize">
                                        {{ $task->status }}
                                    </span>
                                </td>

                                <td>{{ \Carbon\Carbon::parse($task->due_date)->diffForHumans() }}</td>
                                <td><select {{ $task->status == 'cancelled' ? 'disabled' : ($task->status == 'completed' ? 'disabled' : '') }} wire:model="statuses.{{ $task->id }}" wire:change="updateStatus('{{ $task->id }}', $event.target.value)" class="form-select">
                                    <option {{ $task->status == "pending" ? 'selected' : '' }} value="pending">Pending</option>
                                    <option {{ $task->status == "in progress" ? 'selected' : '' }} value="in progress">In Progress</option>
                                    <option {{ $task->status == "completed" ? 'selected' : '' }} value="completed">Completed</option>
                                    <option {{ $task->status == "cancelled" ? 'selected' : '' }} value="cancelled">Cancel</option>
                                </select></td>
                                <td>{{ Auth::user()->created_at->format('D d, M Y') }}</td>
                                <td class="text-center">
                                    <a href="{{ route('task.view', 'slug') }}" class="w-32-px h-32-px bg-primary-light text-primary-600 rounded-circle d-inline-flex align-items-center justify-content-center"><iconify-icon icon="iconamoon:eye-light"></iconify-icon></a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="8">
                                    <div class="alert alert-warning text-sm text-center">
                                        No Task with today as deadline in your todo list.
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div><!-- card end -->
    </div>
    @endif
</div>
