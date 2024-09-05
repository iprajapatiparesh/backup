@extends('layout.app')

<style>
    .btn-falcon-default {
        font-size: 0.75rem;
        /* Adjust button text size */
        padding: 0.25rem 0.5rem;
        /* Adjust button padding */
    }

    .fas {
        font-size: 0.75rem;
    }

    .btn-falcon-default {
        font-size: 0.75rem;
        padding: 0.25rem 0.5rem;
    }

    .fas {
        font-size: 0.75rem;
    }
</style>

@section('content')
    <div class="card mt-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="card-title mb-0">Users</h5>
            <div>
                <a href="{{ route('users.create') }}" class="btn btn-primary">Add New User</a>
            </div>
        </div>

        <div class="p-3">
            <!-- Display Flash Messages -->
            @if (session('success'))
                <div class="alert alert-success border-2 d-flex align-items-center" role="alert">
                    <div class="bg-success me-3 icon-item"><span class="fas fa-check-circle text-white fs-3"></span></div>
                    <p class="mb-0 flex-1">{{ session('success') }}</p>
                    <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if (session('info'))
                <div class="alert alert-info border-2 d-flex align-items-center" role="alert">
                    <div class="bg-info me-3 icon-item"><span class="fas fa-info-circle text-white fs-3"></span></div>
                    <p class="mb-0 flex-1">{{ session('info') }}</p>
                    <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if (session('warning'))
                <div class="alert alert-warning border-2 d-flex align-items-center" role="alert">
                    <div class="bg-warning me-3 icon-item"><span class="fas fa-exclamation-circle text-white fs-3"></span>
                    </div>
                    <p class="mb-0 flex-1">{{ session('warning') }}</p>
                    <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger border-2 d-flex align-items-center" role="alert">
                    <div class="bg-danger me-3 icon-item"><span class="fas fa-times-circle text-white fs-3"></span></div>
                    <p class="mb-0 flex-1">{{ session('error') }}</p>
                    <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <!-- Search Form and Add New User Button -->
            <div class="d-flex justify-content-end mb-3">
                <form action="{{ route('users.index') }}" method="GET" class="d-flex w-50">
                    <input type="text" name="search" class="form-control me-2" placeholder="Search..."
                        value="{{ $search }}">
                    <button type="submit" class="btn btn-secondary">Search</button>
                </form>
            </div>

            <!-- Users Table -->
            <div class="table-responsive">
                <table class="table table-bordered table-striped fs--1 mb-0">
                    <thead class="bg-200 text-900">
                        <tr>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Contact</th>
                            <th>Username</th>
                            <th>Role</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->FirstName }}</td>
                                <td>{{ $user->LastName }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->Contact }}</td>
                                <td>{{ $user->UserName }}</td>
                                <td>{{ $user->role }}</td>
                                <td>
                                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST"
                                        style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-center mt-3">
                <ul class="pagination mb-0">
                    {{ $users->links('pagination::bootstrap-4') }}
                </ul>
            </div>



        </div>
    </div>
@endsection