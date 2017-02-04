@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-2">
                <div class="panel panel-default">
                    <form id="settingsForm">
                        <div class="panel-heading text-center">
                            <h3>{{ $user->name }}'s Settings</h3>
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="Name" value="{{ $user->name }}" required="required">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="{{ $user->email }}" required="required">
                            </div>

                            <div class="form-group">
                                <label for="password">Name</label>
                                <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                            </div>

                            <div class="form-group">
                                <label for="password_confirmation">Name</label>
                                <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Password Confirmation">
                            </div>
                        </div>
                        <div class="panel-footer text-right">
                            <input type="button" class="btn btn-default" value="Update">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection