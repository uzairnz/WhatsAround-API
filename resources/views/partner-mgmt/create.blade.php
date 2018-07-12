@extends('partner-mgmt.base')

@section('action-content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Add new partner</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('partner-management.store') }}">
                        {{ csrf_field() }}

                        {{--<div class="form-group{{ $errors->has('user_id') ? ' has-error' : '' }}">--}}
                            {{--<label for="username" class="col-md-4 control-label">User Id</label>--}}

                            {{--<div class="col-md-6">--}}
                                {{--<input id="username" type="number" class="form-control" name="user_id" value="{{ old('user_id') }}" required autofocus>--}}

                                {{--@if ($errors->has('user_id'))--}}
                                    {{--<span class="help-block">--}}
                                        {{--<strong>{{ $errors->first('user_id') }}</strong>--}}
                                    {{--</span>--}}
                                {{--@endif--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('cnic_number') ? ' has-error' : '' }}">
                            <label for="cnic_number" class="col-md-4 control-label">Cnic Number</label>

                            <div class="col-md-6">
                                <input id="cnic_number" type="number" class="form-control" name="cnic_number" value="{{ old('cnic_number') }}" required>

                                @if ($errors->has('cnic_number'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('cnic_number') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('contact_number') ? ' has-error' : '' }}">
                            <label for="contact_number" class="col-md-4 control-label">Contact Number</label>

                            <div class="col-md-6">
                                <input id="contact_number" type="number" class="form-control" name="contact_number" value="{{ old('contact_number') }}" required>

                                @if ($errors->has('contact_number'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('contact_number') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>



                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('rating') ? ' has-error' : '' }}">
                        <label for="rating" class="col-md-4 control-label">rating</label>

                        <div class="col-md-6">
                        <input id="rating" type="number" class="form-control" name="rating" value="{{ old('rating') }}" required autofocus>

                        @if ($errors->has('rating'))
                        <span class="help-block">
                        <strong>{{ $errors->first('rating') }}</strong>
                        </span>
                        @endif
                        </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Create
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
