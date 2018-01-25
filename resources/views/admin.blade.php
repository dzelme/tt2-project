@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">User Roles</div>

                <div class="panel-body">
                    <table>
                        <thead>
                        <th>Name</th>
                        <th>Surname</th>
                        <th>Identification Number</th>
                        <th>E-Mail</th>
                        <th>User</th>
                        <th>Doctor</th>
                        <th>Administrator</th>
                        <th></th>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <form action="{{ route('admin.assign') }}" method="post">
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->surname }}</td>
                                    <td>{{ $user->identification }}</td>
                                    <td>{{ $user->email }} <input type="hidden" name="email" value="{{ $user->email }}"></td>
                                    <td><input type="checkbox" name="role_user" {{ $user->hasRole('user') ? 'checked' : '' }} ></td>
                                    <td><input type="checkbox" name="role_doctor" {{ $user->hasRole('doctor') ? 'checked' : '' }} ></td>
                                    <td><input type="checkbox" name="role_administrator" {{ $user->hasRole('administrator') ? 'checked' : '' }} ></td>
                                    {{ csrf_field() }}
                                    <td><button type="submit">Assign Roles</button></td>
                                </form>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                
                </div>
                
                <div class="panel-heading">Email Reminders</div>

                <div class="panel-body">
                    <form action="/email" method="POST">
                        {{ csrf_field() }}
                        <button disabled>Send Email</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection