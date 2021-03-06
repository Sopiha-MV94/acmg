@extends('admin.layouts.app')


@section('content')

    <!-- Breadcrumbs begin -->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{route('cabinet:dashboard')}}">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">
            Users
        </li>
    </ol>
    <!-- Breadcrumbs end -->

    <h1 class="mb-3">Users List</h1>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nickname</th>
            <th scope="col">Email</th>
            <th scope="col">Role</th>
            <th scope="col" style="text-align: center;">Balance</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    @if($user->hasRole('admin'))
                        <span class="badge badge-success">admin</span>
                    @elseif($user->hasRole('manager'))
                        <span class="badge badge-warning">manager</span>
                    @else
                        <span class="badge badge-primary">user</span>
                    @endif
                </td>
                <td style="text-align: center;">
                    @if (!$user->hasRole('admin') && !$user->hasRole('manager'))
                        <a href="{{ route('admin:users.wallet', $user->id) }}">
                            {{ $user->wallet->getBalanceMoney() }}
                        </a>
                    @endif
                </td>
                <td style="text-align: right;">
                    @if (!$user->hasRole('admin') && !$user->hasRole('manager'))
                        <a class="btn btn-link" href="{{ route('admin:users.accounts', $user->id) }}">
                            <i class="fa fa-address-card-o fa-lg" aria-hidden="true"></i>
                        </a>
                    @endif
                    <a class="btn btn-link" href="{{ route('admin:users.edit', $user->id) }}">
                        <i class="fa fa-pencil-square fa-lg" aria-hidden="true"></i>
                    </a>
                    <a class="btn btn-link" href="{{ route('admin:users.delete', $user->id) }}">
                        <i class="fa fa-trash fa-lg" aria-hidden="true"></i>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
