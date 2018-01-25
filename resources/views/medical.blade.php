@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Search for patient's medical records</div>

                    <div class="panel-body">
                        <!-- Display Validation Errors -->
                        @include('common.errors');

                        <!-- Patient ID to search for Form -->
                        <form action="/medical" method="POST" class="form-horizontal">
                            {{ csrf_field() }}

                            <!-- Patient ID -->
                            <div class="form-group">
                                <label for="patient-id" class="col-sm-3 control-label">Patient ID</label>

                                <div class="col-sm-6">
                                    <input type="text" name="patient_id" id="patient-id" class="form-control">
                                </div>
                            </div>            

                            <!-- Search Button -->
                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-6">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fa fa-plus"></i> Search
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    
                
                <div class="panel-heading">Medical Record</div>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ $user->name }}" required disabled>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('surname') ? ' has-error' : '' }}">
                            <label for="surname" class="col-md-4 control-label">Surname</label>

                            <div class="col-md-6">
                                <input id="surname" type="text" class="form-control" name="surname" value="{{ $user->surname }}" required disabled>

                                @if ($errors->has('surname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('surname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('identification') ? ' has-error' : '' }}">
                            <label for="identification" class="col-md-4 control-label">Identification Number</label>

                            <div class="col-md-6">
                                <input id="identification" type="text" class="form-control" name="identification" value="{{ $user->identification }}" required disabled>

                                @if ($errors->has('identification'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('identification') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ $user->email }}" required disabled>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('alergies') ? ' has-error' : '' }}">
                            <label for="alergies" class="col-md-4 control-label">Alergies</label>

                            <div class="col-md-6">
                                <input id="alergies" type="alergies" class="form-control" name="alergies" value="{{ $user->alergies }}" required autofocus>

                                @if ($errors->has('alergies'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('alergies') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('gums') ? ' has-error' : '' }}">
                            <label for="gums" class="col-md-4 control-label">Gums</label>

                            <div class="col-md-6">
                                <input id="gums" type="gums" class="form-control" name="gums" value="{{ $user->gums }}" required>

                                @if ($errors->has('gums'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('gums') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('notes') ? ' has-error' : '' }}">
                            <label for="notes" class="col-md-4 control-label">Notes</label>

                            <div class="col-md-6">
                                <input id="notes" type="notes" class="form-control" name="notes" value="{{ $user->notes }}" required>

                                @if ($errors->has('notes'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('notes') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
            <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Edit
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            
            
            
            </div>
        </div>
    </div>
</div>
@endsection