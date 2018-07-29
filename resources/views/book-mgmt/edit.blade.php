@extends('quote-mgmt.base')

@section('action-content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Update Quote</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('quote-management.update', ['quote_id' => $quote->quote_id]) }}">
                        <input type="hidden" name="_method" value="PATCH">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="price" class="col-md-4 control-label">Price</label>

                                <div class="col-md-6">
                                    <input id="price" type="number" class="form-control" name="price" value="{{ old('price') }}" required>

                                    @if ($errors->has('price'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}">
                                <label for="description" class="col-md-4 control-label">Description</label>

                                <div class="col-md-6">
                                    <input id="description" type="text" class="form-control" name="description" value="{{ old('description') }}" required>

                                    @if ($errors->has('description'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('service_id') ? ' has-error' : '' }}">
                                <label for="service_id" class="col-md-4 control-label">Service Id</label>

                                <div class="col-md-6">
                                    <input id="service_id" type="text" class="form-control" name="service_id" value="{{ old('service_id') }}" required>

                                    @if ($errors->has('service_id'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('service_id') }}</strong>
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
                                    Update
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
