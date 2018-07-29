@extends('book-mgmt.base')

@section('action-content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Add new Booking</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('book-management.store') }}">
                        {{ csrf_field() }}


                        <div class="form-group{{ $errors->has('user_id') ? ' has-error' : '' }}">
                            <label for="user_id" class="col-md-4 control-label">User Id</label>

                            <div class="col-md-6">
                                <input id="user_id" type="text" class="form-control" name="user_id" value="{{ old('user_id') }}" required>

                                @if ($errors->has('user_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('user_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                            <label for="status" class="col-md-4 control-label">Status</label>

                            <div class="col-md-6">
                                <input id="status" type="text" class="form-control" name="status" value="{{ old('status') }}" required>

                                @if ($errors->has('status'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('status') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('quote_id') ? ' has-error' : '' }}">
                            <label for="quote_id" class="col-md-4 control-label">Quote Id</label>

                            <div class="col-md-6">
                                <input id="quote_id" type="text" class="form-control" name="quote_id" value="{{ old('quote_id') }}" required>

                                @if ($errors->has('quote_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('quote_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('partner_id') ? ' has-error' : '' }}">
                            <label for="partner_id" class="col-md-4 control-label">Partner Id</label>

                            <div class="col-md-6">
                                <input id="partner_id" type="text" class="form-control" name="partner_id" value="{{ old('partner_id') }}" required>

                                @if ($errors->has('partner_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('partner_id') }}</strong>
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
