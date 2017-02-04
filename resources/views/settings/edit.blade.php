@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3>{{ $user->name }}'s Settings</h3>
                    </div>
                    <div class="panel-body">
                        <p>Form Here</p>
                    </div>
                    <div class="panel-footer text-right">
                        <button class="btn btn-primary">Update</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection