@extends('admin.layouts.app')
@section('title', 'Admin Home')
@section('content')
    @push('css')
        <style>
            .disabled-link {
                pointer-events: none;
                color: #fff;
                background-color: #FFC007;
                border-color: #dae0e5;
                text-decoration: none;
            }

            .disabled-link:hover {
                color: #6c757d;
                background-color: #e9ecef;
                border-color: #dae0e5;
            }
        </style>
    @endpush
    <main>
        <div class="container-fluid px-4">
            <div class="user-create d-flex align-items-center justify-content-between">
                <h1 class="mt-4">Users</h1>
                @if ($isTrue == 1)
                    <a href="{{ route('register') }}" class="btn btn-primary">Create</a>
                @endif
            </div>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Users Table

                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Create Date</th>
                                <th>isAdmin</th>
                                <th>isActive</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->created_at }}</td>
                                    <td>
                                        {{ $user->isSuperAdmin === 1 ? 'Super Admin' : ($user->isAdmin === 1 ? 'Admin' : ($user->isAdmin === 0 ? 'User' : 'Unknown')) }}
                                    </td>

                                    <td>{{ $user->isActive === 1 ? 'Active' : 'Passive' }}</td>
                                    <td>
                                        @if ($auth_user->isAdmin && ($user->isSuperAdmin || $user->isAdmin))
                                            <a class="btn btn-warning disabled-link"
                                                href="{{ $isTrue == 0 ? route('updateViewUser', ['slug' => $user->slug]) : route('updateView', ['slug' => $user->slug]) }}">
                                                Update</a>
                                            <button disabled class="btn btn-danger">Delete</button>
                                        @elseif($auth_user->isSuperAdmin)
                                            <a class="btn btn-warning"
                                                href="{{ $isTrue == 0 ? route('updateViewUser', ['slug' => $user->slug]) : route('updateView', ['slug' => $user->slug]) }}">Update</a>
                                            <button class="btn btn-danger">Delete</button>
                                        @elseif($auth_user->isAdmin)
                                            <a class="btn btn-warning"
                                                href="{{ $isTrue == 0 ? route('updateViewUser', ['slug' => $user->slug]) : route('updateView', ['slug' => $user->slug]) }}">Update</a>
                                            <button class="btn btn-danger">Delete</button>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
@endsection
