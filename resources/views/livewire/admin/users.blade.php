<div class="col-lg-12">
    <div class="card">
      <div class="card-header d-flex justify-content-between align-content-center">
        <h5 class="card-title mb-0">All Users</h5>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table bordered-table mb-0">
            <thead>
                <tr>
                  <th scope="col">Name</th>
                  <th scope="col">Email</th>
                  <th scope="col">Role</th>
                  <th scope="col">Total Tasks</th>
                  <th scope="col">Date Joined</th>
                  <th scope="col" class="text-center">Actions</th>
                </tr>
              </thead>
            <tbody>
            @forelse($users as $user)
              <tr>
                <td>
                  <div class="d-flex align-items-center">
                    <span class="text-lg text-secondary-light fw-semibold flex-grow-1">{{ $user->name }}</span>
                  </div>
                </td>
                <td>{{  $user->email }}</td>
                <td>
                    <span class="text-white bg-warning-main px-24 py-4 rounded-pill fw-medium text-sm text-capitalize">
                        {{ $user->is_admin ? 'Admin' : 'User' }}
                    </span>
                </td>
                <td>
                    <span class="text-white bg-success-main px-24 py-4 rounded-pill fw-medium text-sm text-capitalize">
                        {{ $user->tasks->count() }}
                    </span>
                </td>
                <td>{{  \Carbon\Carbon::parse($user->created_at)->format('D, j M, Y') }}</td>
                <td class="text-center">
                    <button wire:click="delete({{ $user->id }})" class="w-32-px h-32-px bg-danger-focus text-danger-main rounded-circle d-inline-flex align-items-center justify-content-center"><iconify-icon icon="mingcute:delete-2-line"></iconify-icon></button>
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
    </div><!-- card end -->
  </div>
