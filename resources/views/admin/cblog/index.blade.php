@extends('layouts.admin') 

@section('content')  
<input type="hidden" id="headerdata" value="{{ __('CATEGORY') }}">
<div class="content-area">
    <div class="home-head mb-4 mb-md-5">
        <h3>{{ __("Categories") }} <span>Manage your categories</span></h3>
        <nav class="mt-3" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __("Dashboard") }}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.marketing-kit') }}">{{ __("Marketing kit") }}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin-cblog-index') }}">{{ __("Blog") }}</a></li>
                <li class="breadcrumb-item">{{ __("Categories") }}</li>
            </ol>
        </nav>
    </div>
    @include('includes.admin.navs.blogs_nav')
	<div class="product-area">
		<div class="row">
			<div class="col-lg-12">
				<div class="mr-table allproduct default-box">
                @include('includes.admin.form-success')  
					<div class="table-responsiv">
						<table id="example" class="table table-hover dt-responsive" cellspacing="0" width="100%">
							<thead>
								<tr>
			                        <th>{{ __('Name') }}</th>
			                        <th>{{ __('Arabic Name') }}</th>
			                        <th>{{ __('Slug') }}</th>
			                        <th>{{ __('Options') }}</th>
								</tr>
							</thead>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


{{-- ADD / EDIT MODAL --}}

<div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="modal1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="submit-loader">
                <img  src="{{asset('assets/images/'.$gs->admin_loader)}}" alt="">
            </div>
            <div class="modal-header">
                <h5 class="modal-title"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">{{ __('Close') }}</button>
            </div>
        </div>
    </div>
</div>

{{-- ADD / EDIT MODAL ENDS --}}

{{-- DELETE MODAL --}}

<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="modal1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title d-inline-block">{{ __('Confirm Delete') }}</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <p class="text-center">{{ __('You are about to delete this Category. Everything will be deleted under this Category.') }}</p>
                <p class="text-center mb-0">{{ __('Do you want to proceed?') }}</p>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-default" data-bs-dismiss="modal">{{ __('Cancel') }}</button>
                <a class="btn btn-danger">{{ __('Delete') }}</a>
            </div>
        </div>
    </div>
</div>

{{-- DELETE MODAL ENDS --}}

@endsection    



@section('scripts')

<script type="text/javascript">

	var table = $('#example').DataTable({
		   ordering: false,
           processing: true,
           serverSide: true,
           ajax: '{{ route('admin-cblog-datatables') }}',
           columns: [
                    { data: 'name', name: 'name' },
                    { data: 'name_ar', name: 'name_ar' },
                    { data: 'slug', name: 'slug' },
        			{ data: 'action', searchable: false, orderable: false }

                 ],
           language: {
            	processing: '<img src="{{asset('assets/images/'.$gs->admin_loader)}}">'
            }
        });

  	$(function() {
    $(".btn-area").append('<div class="col-sm-4 text-end">'+
    	'<a class="main-dark-btn" data-href="{{route('admin-cblog-create')}}" id="add-data" data-bs-toggle="modal" data-bs-target="#modal1">'+
      '<i class="fas fa-plus"></i> {{ __('Add New Category') }}'+
      '</a>'+
      '</div>');
  });												
									
</script>
@endsection   