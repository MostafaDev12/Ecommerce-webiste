@extends('layouts.front_34')

@section('content')

<div class="acc-settings">
    <div class="row m-0">
        @include('includes.user-dashboard-34-sidebar')
        <div class="col-lg-10 col-md-9 hidden-classes mb-3">
            <div>
                <div class="settings-container">
                    <div class="settings-header d-flex justify-content-between align-items-center">
                        <h3>{{ $langg->lang356 }}</h3>
    					<a data-toggle="modal" data-target="#vendorform" class="btn btn-success" href="javascript:;"> <i class="fas fa-envelope"></i> {{ $langg->lang357 }}</a>
					</div>
                    <div class="no-orders text-center">
                         <div class="mr-table allproduct message-area  mt-4">
							@include('includes.form-success')
							<div class="table-responsive">
								<table id="example" class="table table-hover dt-responsive" cellspacing="0" width="100%">
									<thead>
										<tr>
											<th>{{ $langg->lang358 }}</th>
											<th>{{ $langg->lang359 }}</th>
											<th>{{ $langg->lang360 }}</th>
											<th>{{ $langg->lang361 }}</th>
										</tr>
									</thead>
									<tbody>
                                        @foreach($convs as $conv)
                                        <tr class="conv">
                                            <input type="hidden" value="{{$conv->id}}">
                                            @if($user->id == $conv->sent->id)
                                            <td>{{$conv->recieved->name}}</td>    
                                            @else
                                            <td>{{$conv->sent->name}}</td>
                                            @endif
                                            <td>{{$conv->subject}}</td>
                                            <td>{{$conv->created_at->diffForHumans()}}</td>
                                            <td>
                                                <a href="{{route('user-message-34',$conv->id)}}" class="link view"><i class="fas fa-eye text-success"></i></a>
                                                <a href="javascript:;" data-toggle="modal" data-target="#confirm-delete" data-href="{{route('user-message-delete',$conv->id)}}" class="link remove"><i class="fas fa-trash text-danger"></i></a>
                                            </td>
                                        </tr>
                                        @endforeach
									</tbody>
								</table>
							</div>
						</div>
                   </div>
                </div>
            </div> 
        </div>
    </div>
</div>


{{-- MESSAGE MODAL --}}
<div class="message-modal">
  <div class="modal fade" id="vendorform" tabindex="-1" role="dialog" aria-labelledby="vendorformLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header py-2">
          <h5 class="modal-title text-white" id="vendorformLabel">{{ $langg->lang362 }}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
      <div class="modal-body">
        <div class="container-fluid p-0">
          <div class="row">
            <div class="col-md-12">
              <div class="contact-form">
                <form id="emailreply">
                    {{csrf_field()}}
                    <input type="email" class="input-field form-control mb-3" id="eml" name="email" placeholder="{{ $langg->lang363 }} *" required="">
                    <input type="text" class="input-field form-control mb-3" id="subj" name="subject" placeholder="{{ $langg->lang364 }} *" required="">
                    <textarea class="input-field textarea form-control mb-3" name="message" id="msg" placeholder="{{ $langg->lang365 }} *" required=""></textarea>
                    <input type="hidden" name="name" value="{{ Auth::guard('web')->user()->name }}">
                    <input type="hidden" name="user_id" value="{{ Auth::guard('web')->user()->id }}">
                    <button class="submit-btn btn btn-success" id="emlsub" type="submit">{{ $langg->lang366 }}</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      </div>
    </div>
  </div>
</div>

{{-- MESSAGE MODAL ENDS --}}



<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="modal1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header d-block text-center">
                <h4 class="modal-title d-inline-block">{{ $langg->lang367 }}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p class="text-center">{{ $langg->lang368 }}</p>
                <p class="text-center">{{ $langg->lang369 }}</p>
            </div>
            <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-default" data-dismiss="modal">{{ $langg->lang370 }}</button>
                <a class="btn btn-danger btn-ok">{{ $langg->lang371 }}</a>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')

<script type="text/javascript">
    
$(document).on("submit", "#emailreply" , function(){
    var token = $(this).find('input[name=_token]').val();
    var subject = $(this).find('input[name=subject]').val();
    var message =  $(this).find('textarea[name=message]').val();
    var email = $(this).find('input[name=email]').val();
    var name = $(this).find('input[name=name]').val();
    var user_id = $(this).find('input[name=user_id]').val();
    $('#eml').prop('disabled', true);
    $('#subj').prop('disabled', true);
    $('#msg').prop('disabled', true);
    $('#emlsub').prop('disabled', true);
    $.ajax({
        type: 'post',
        url: "{{URL::to('/user/user/contact')}}",
        data: {
            '_token': token,
            'subject'   : subject,
            'message'  : message,
            'email'   : email,
            'name'  : name,
            'user_id'   : user_id
        },
        success: function( data) {
            $('#eml').prop('disabled', false);
            $('#subj').prop('disabled', false);
            $('#msg').prop('disabled', false);
            $('#subj').val('');
            $('#msg').val('');
            $('#emlsub').prop('disabled', false);
            if(data == 0)
            toastr.error("{{ $langg->email_not_found }}");
            else
            toastr.success("{{ $langg->message_sent }}");
            
            $('.ti-close').click();
        }
    });          
    return false;
});

</script>


<script type="text/javascript">

$('#confirm-delete').on('show.bs.modal', function(e) {
    $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
});

</script>

@endsection