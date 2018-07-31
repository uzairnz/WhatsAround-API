@extends('quote-mgmt.base')
@section('action-content')
    <!-- Main content -->
    <section class="content">
      <div class="box">
  <div class="box-header">
    <div class="row">
        <div class="col-sm-8">
          <h3 class="box-title">List of Quotes</h3>
        </div>
        <div class="col-sm-4">
          <a class="btn btn-primary" href="{{ route('quote-management.create') }}">Add new Quote</a>
        </div>
    </div>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
      <div class="row">
        <div class="col-sm-6"></div>
        <div class="col-sm-6"></div>
      </div>
      {{--<form method="POST" action="{{ route('quote-management.search') }}">--}}
         {{--{{ csrf_field() }}--}}
         {{--@component('layouts.search', ['title' => 'Search'])--}}
          {{--@component('layouts.two-cols-search-row', ['items' => ['User Name', 'First Name'], --}}
          {{--'oldVals' => [isset($searchingVals) ? $searchingVals['username'] : '', isset($searchingVals) ? $searchingVals['firstname'] : '']])--}}
          {{--@endcomponent--}}
          {{--</br>--}}
          {{--@component('layouts.two-cols-search-row', ['items' => ['Last Name', 'Department'],--}}
          {{--'oldVals' => [isset($searchingVals) ? $searchingVals['lastname'] : '', isset($searchingVals) ? $searchingVals['department'] : '']])--}}
          {{--@endcomponent--}}
        {{--@endcomponent--}}
      {{--</form>--}}
    <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
      <div class="row">
        <div class="col-sm-12">
          <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
            <thead>
              <tr role="row">
                <th width="0%" class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Name: activate to sort column descending" aria-sort="ascending">Quote Id</th>
                <th width="20%" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Email: activate to sort column ascending">Price</th>
                <th width="20%" class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Email: activate to sort column ascending">Description</th>
                <th width="0%" class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Email: activate to sort column ascending">Service Id</th>
                  <th width="0%" class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Email: activate to sort column ascending">Partner Id</th>
              </tr>
            </thead>
            <tbody>
            @foreach ($quotes as $quote)
                <tr role="row" class="odd">
                    <td class="hidden-xs">{{ $quote->quote_id }}</td>
                    <td class="hidden-xs">{{ $quote->price }}</td>
                  <td class="sorting_1">{{ $quote->description }}</td>
                    <td class="hidden-xs">{{ $quote->service_id }}</td>
                    <td class="hidden-xs">{{ $quote->partner_id }}</td>

                  <td>
                    <form class="row" method="POST" action="{{ route('quote-management.destroy', ['quote_id' => $quote->quote_id]) }}" onsubmit = "return confirm('Are you sure?')">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <a href="{{ route('quote-management.edit', ['quote_id' => $quote->quote_id]) }}" class="btn btn-warning col-sm-3 col-xs-5 btn-margin">
                        Update
                        </a>
                         <button type="submit" class="btn btn-danger col-sm-3 col-xs-5 btn-margin">
                          Delete
                        </button>
                    </form>
                  </td>
              </tr>
            @endforeach
            </tbody>
            <tfoot>
              <tr>
                <th width="10%" rowspan="1" colspan="1">quote_id</th>
                <th width="20%" rowspan="1" colspan="1">price</th>
                <th class="hidden-xs" width="20%" rowspan="1" colspan="1">description</th>
                <th class="hidden-xs" width="20%" rowspan="1" colspan="1">service_id</th>
                  <th class="hidden-xs" width="20%" rowspan="1" colspan="1">partner_id</th>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-4">
          <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Showing 1 to {{count($quotes)}} of {{count($quotes)}} entries</div>
        </div>
        <div class="col-sm-7">
          <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
            {{ $quotes->links() }}
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /.box-body -->
</div>
    </section>
    <!-- /.content -->
  </div>
@endsection