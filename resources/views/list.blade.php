@extends('dashboard')
@section('content')
<script type="text/javascript">
        $(function () {
            $(".delete").click(function () {
                var title = "Bus Pass Portal";
                var body = "Are you sure??";
                $("#MyPopup .modal-title").html(title);
                $("#MyPopup .modal-body").html(body);
                $('#id').attr('name', $(this).attr('name'));
                $("#MyPopup").modal('show');
            });

            $(".email").click(function () {
                $.ajax({
                    url: '/email/'+$(this).attr('name'),
                    method:'POST',
                    headers: {
                    'X-CSRF-Token': $('input[name=token]').val() ,
                    "Accept": "application/json"
                    },
                    type: "DELETE",
                    data: { "_token": "{{ csrf_token() }}" },
                    beforeSend: function(){
                           
                        },
                        success: function(response){
                        },
                        complete:function(data){
                            alert("Email send sucessfully")
                        }
                    });
            });
            $("#yes").click(function () {

               $.ajax({
                    url: '/delete/'+$("#id").attr('name'),
                    method:'DELETE',
                    headers: {
                    'X-CSRF-Token': $('input[name=token]').val() ,
                    "Accept": "application/json"
                    },
                    type: "DELETE",
                    data: { "_token": "{{ csrf_token() }}" },
                    });
                    location.reload();
            });
        });
         
</script>
<div class="card-header">
    <span>{{ucfirst($listing_type)}} Details</span>
</div>

<table class="table" cellspacing="0" width="100%">
{{ csrf_field() }}
    <thead>
        <tr>
            <th  class="th-sm table-header" > Name</th>
            <th  class="th-sm table-header" > Email</th>
            <th  class="th-sm table-header" > Contact Number</th>
            <th  class="th-sm table-header" > Pass Issue Date</th>
            <th  class="th-sm table-header" > Pass Expiry Date </th>
            <th  class="th-sm table-header" > From </th>
            <th  class="th-sm table-header" > To </th>
            <th  class="th-sm table-header" > Distance </th>
            <th  class="th-sm table-header" > Amount </th>
            <th  class="th-sm table-header" > Action </th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
            <tr>
               <td>{{ $user->fname.' '.$user->lname }}</td>
               <td>{{ $user->email }}</td>
               <td>{{ $user->contact_number }}</td>
               <td>{{ $user->issue_date }}</td>
               <td>{{ $user->expiry_date }}</td>
               <td>{{ $user->from }}</td>
               <td>{{ $user->to }}</td>
               <td>{{ $user->distance }}</td>
               <td>{{ $user->amount }}</td>
               <td style='text-align:center'>
               <i id='{{$user->id}}' class="delete glyphicon glyphicon-trash" name="{{$user->id}}"></i>
               <i id="{{$user->id}}" class=" email glyphicon glyphicon-envelope" name="{{$user->id}}"></i>
            </td>
            </tr>
         @endforeach
   </tbody>
</table>
{{ $users->links() }}

<div id="MyPopup" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        &times;</button>
                    <h4 class="modal-title">
                    </h4>
                </div>
                <div class="modal-body">
                </div>
                <div class="modal-footer">
                    <button type="button" id='yes' class="btn btn-danger" data-dismiss="modal">
                            Yes Delete</button>
                    <button type="button" class="btn" data-dismiss="modal">
                            Cancel</button>
                    <input type="hidden" id="id" name="null">
                    <input type="hidden" name="token" value="{{csrf_token()}}">
                </div>
            </div>
        </div>
</div>
@endsection 