@extends('service-mgmt.base')
@section('action-content')
    <!-- Main content -->
    <section class="content">
      <div class="box">
  <div class="box-header">
    <div class="row">
        <div class="col-sm-8">
          <h3 class="box-title">List of Services</h3>
        </div>
        <div class="col-sm-4">
          <a class="btn btn-primary" href="{{ route('service-management.create') }}">Add new Service</a>
        </div>
    </div>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
      <div class="row">
        <div class="col-sm-6"></div>
        <div class="col-sm-6"></div>
      </div>
      {{--<form method="POST" action="{{ route('service-management.search') }}">--}}
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
                <th width="0%" class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Name: activate to sort column descending" aria-sort="ascending">User_Id</th>
                <th width="20%" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Email: activate to sort column ascending">Password</th>
                <th width="20%" class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Email: activate to sort column ascending">Name</th>
                <th width="20%" class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Email: activate to sort column ascending">Cnic</th>
                  <th width="20%" class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Email: activate to sort column ascending">Phone</th>
                  <th width="20%" class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Email: activate to sort column ascending">Email</th>
                  <th width="20%" class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Email: activate to sort column ascending">Rating</th>
              </tr>
            </thead>
            <tbody>
            @foreach ($services as $service)
                <tr role="row" class="odd">
                    <td class="hidden-xs">{{ $service->service_id }}</td>
                    <td class="hidden-xs">{{ $service->service_name }}</td>
                  <td class="sorting_1">{{ $service->category }}</td>
                    <td class="hidden-xs">{{ $service->location }}</td>
                    <td class="hidden-xs">{{ $service->quotes }}</td>

                  <td>
                    <form class="row" method="POST" action="{{ route('service-management.destroy', ['service_id' => $service->service_id]) }}" onsubmit = "return confirm('Are you sure?')">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <a href="{{ route('service-management.edit', ['service_id' => $service->service_id]) }}" class="btn btn-warning col-sm-3 col-xs-5 btn-margin">
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
                <th width="10%" rowspan="1" colspan="1">service_id</th>
                <th width="20%" rowspan="1" colspan="1">service_name</th>
                <th class="hidden-xs" width="20%" rowspan="1" colspan="1">category</th>
                <th class="hidden-xs" width="20%" rowspan="1" colspan="1">location</th>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-4">
          <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Showing 1 to {{count($services)}} of {{count($services)}} entries</div>
        </div>
        <div class="col-sm-7">
          <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
            {{ $services->links() }}
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