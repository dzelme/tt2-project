@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Create an appointment</div>

                    <div class="panel-body">
                        <!-- Display Validation Errors -->
                        @include('common.errors');

                        <!-- New Appointment Form -->
                        <form action="/appointment" method="POST" class="form-horizontal">
                            {{ csrf_field() }}

                            <!-- Appointment From -->
                            <div class="form-group">
                                <label for="appointment-from" class="col-sm-3 control-label">Appointment From</label>

                                <div class="col-sm-6">
                                    <input type="text" name="from" id="appointment-from" class="form-control" placeholder="YYYY-MM-DD HH:MM:SS">
                                </div>
                            </div>

                            <!-- Appointment To -->
                            <div class="form-group">
                                <label for="appointment-to" class="col-sm-3 control-label">Appointment To</label>

                                <div class="col-sm-6">
                                    <input type="text" name="to" id="appointment-to" class="form-control" placeholder="YYYY-MM-DD HH:MM:SS">
                                </div>
                            </div>

                            <!-- Doctor ID -->
                            <div class="form-group">
                                <label for="doctor-id" class="col-sm-3 control-label">Doctor ID</label>

                                <div class="col-sm-6">
                                    <input type="text" name="doctor_id" id="doctor-id" class="form-control">
                                </div>
                            </div>            

                            <!-- Appointment Reminder -->
                            <div class="form-group">
                                <label for="appointment-reminder" class="col-sm-3 control-label">Reminder</label>

                                <div class="col-sm-6">
                                    <input type="checkbox" name="reminder" id="appointment-reminder" class="form-control">
                                </div>
                            </div>

                            <!-- Add Task Button -->
                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-6">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fa fa-plus"></i> Add Appointment
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    
                
                
                <!-- Current Tasks -->
                    @if (count($appointments) > 0)
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Current Appointments
                            </div>

                            <div class="panel-body">
                                <table class="table table-striped task-table">

                                    <!-- Table Headings -->
                                    <thead>
                                        <th>From</th>
                                        <th>To</th>
                                        <th>Reminder</th>
                                        <th>Doctor_ID</th>
                                        <th>&nbsp;</th>
                                    </thead>

                                    <!-- Table Body -->
                                    <tbody>
                                        @foreach ($appointments as $appointment)
                                            <tr>
                                                <!-- Task Name -->
                                                <td class="table-text">
                                                    <div>{{ $appointment->from }}</div>
                                                </td>
                                                
                                                <td class="table-text">
                                                    <div>{{ $appointment->to }}</div>
                                                </td>
                                                
                                                <td class="table-text">
                                                    <div>{{ $appointment->reminder }}</div>
                                                </td>
                                                
                                                <td class="table-text">
                                                    <div>{{ $appointment->doctor_id }}</div>
                                                </td>

                                                <td>
                                                    <form action="/appointment/{{ $appointment->id }}" method="POST">
                                                        {{ csrf_field() }}
                                                        {{ method_field('DELETE') }}

                                                        <button>Delete Appointment</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @endif
            
            
            
            
            </div>
        </div>
    </div>
</div>
@endsection