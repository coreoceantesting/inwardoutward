<x-admin.layout>
    <x-slot name="title">Outward List</x-slot>
    <x-slot name="heading">Outward List</x-slot>
    {{-- <x-slot name="subheading">Test</x-slot> --}}


    <div class="row">
        <div class="col-lg-12">
            <div class="card">

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="buttons-datatables" class="table table-bordered nowrap align-middle" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Formatted </th>
                                   <th> Delivery</th>
                                   <th>Letter</th>
                                    <th>User Type</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($inward_datas as $inward)
                                    <tr>
                                        <td>{{$inward->formatted_id }}</td>
                                        <td>{{$inward->delivery_id}}</td>
                                        <td>{{$inward->letter_id}}</td>
                                        <td>{{$inward->usertype}}</td>
                                        <td>

                                            <button class="btn text-primary change-password px-2 py-1" title="Change Password" data-id="{{ $inward->id }}"><i class="ri-eye-fill fs-16"></i></button>


                                            <button class="btn text-danger rem-element px-2 py-1" title="Delete inward" data-id="{{ $inward->id }}"><i  class="ri-mail-send-fill"></i> </button>

                                        </td>
                                    </tr>
                                @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade " id="change-password-modal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <form action="" id="changePasswordForm">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Inward Details</h5>
                        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <input type="hidden" id="inward_id" name="inward_id" value="">

                        <div class="col-sm-12">
                            <div class="card">
                                {{-- <form class="theme-form" name="addForm" id="addForm" enctype="multipart/form-data">
                                    @csrf --}}

                                    <div class="card-body">
                                        <div class="live-preview">
                                            <div class="row gy-4">
                                                <div class="col-xxl-3 col-md-6">
                                                    <div>
                                                        <label for="basiInput" class="form-label">Delivery Mode<span class="text-danger">*</span></label>

                                                        <select  class="form-select" id="delivery_id" name="delivery_id" aria-label="Delivery Mode" disabled>
                                                            <option disabled>--- Select Delivery Mode ---</option>
                                                            @foreach ($deliverymode_data as $deliverymode)
                                                                <option value="{{ $deliverymode->id }}">{{ $deliverymode->modename }}</option>
                                                            @endforeach
                                                        </select>

                                                    </div>
                                                </div>

                                                <div class="col-xxl-3 col-md-6">
                                                    <div>
                                                        <label for="basiInput" class="form-label">Letter Type<span class="text-danger">*</span></label>
                                                        <select class="form-select" id="letter_id" name="letter_id" aria-label="Delivery Mode" disabled>
                                                            <option disabled selected>--- Select Letter Type ---</option>
                                                            @foreach ($lettertypes as $lettertype)
                                                                <option value="{{ $lettertype->id }}">{{ $lettertype->lettertype }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-3 col-md-6">
                                                    <div>
                                                        <label for="usertype" class="form-label">User Type<span class="text-danger">*</span></label>
                                                        <input type="text" readonly id="usertype" name="usertype" class="form-control" id="exampleInputpassword" value="">
                                                    </div>
                                                </div>
                                                <div class="col-xxl-3 col-md-6">
                                                    <div>
                                                        <label for="fromwhom" class="form-label">From Whom<span class="text-danger">*</span></label>
                                                        <br>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" name="fromwhom" type="checkbox" id="inlineCheckbox1" readonly value="General">
                                                            <label class="form-check-label" for="inlineCheckbox1">General</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" name="fromwhom" type="checkbox" id="inlineCheckbox2" readonly value="Department">
                                                            <label class="form-check-label" for="inlineCheckbox2">Department</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" name="fromwhom" type="checkbox" id="inlineCheckbox3" readonly value="Organisation">
                                                            <label class="form-check-label" for="inlineCheckbox3">Organisation</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" name="fromwhom" type="checkbox" id="inlineCheckbox3" readonly value="VIP">
                                                            <label class="form-check-label" for="inlineCheckbox3">VIP</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                    </div>

                                    <div class="card-body">
                                        <div class="live-preview">
                                            <div class="row gy-4">
                                                <div class="col-xxl-3 col-md-6">
                                                    <div>
                                                        <label for="ward_id" class="form-label">Ward<span class="text-danger">*</span></label>
                                                        <select class="form-select" id="ward_id" name="ward_id" aria-label="ward" disabled>
                                                            <option disabled selected>--- Select ward ---</option>
                                                            @foreach ($wards as $ward)
                                                                <option value="{{ $ward->id }}">{{ $ward->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-xxl-3 col-md-6">
                                                    <div>
                                                        <label for="subject" class="form-label">Subject<span class="text-danger">*</span></label>
                                                        <input type="text" readonly class="form-control" id="subject" name="subject" value="">
                                                    </div>
                                                </div>

                                                <div class="col-xxl-3 col-md-6">
                                                    <div>
                                                        <label for="sendername_designation" class="form-label">Sender Name/Designation<span class="text-danger">*</span></label>
                                                        <input type="text" readonly class="form-control" id="sendername_designation" name="sendername_designation" value="">
                                                    </div>
                                                </div>

                                                <div class="col-xxl-3 col-md-6">
                                                    <div>
                                                        <label for="letter_ref_no" class="form-label">Letter Ref. Number</label>
                                                        <input type="text" readonly class="form-control" id="letter_ref_no" name="letter_ref_no" value="">
                                                    </div>
                                                </div>

                                            </div>
                                            <!--end row-->
                                        </div>
                                    </div>

                                    <div class="card-body">
                                        <div class="live-preview">
                                            <div class="row gy-4">
                                                <div class="col-xxl-3 col-md-6">
                                                    <div>
                                                        <label for="recevied_data" class="form-label">Recevied Date<span class="text-danger">*</span></label>
                                                        <input type="date" readonly class="form-control" id="recevied_data" name="recevied_data">
                                                    </div>
                                                </div>


                                                <div class="col-xxl-3 col-md-6">
                                                    <div>
                                                        <label for="letter_date" class="form-label">Letter Date<span class="text-danger">*</span></label>
                                                        <input type="date" readonly class="form-control" id="letter_date" name="letter_date">
                                                    </div>
                                                </div>

                                                <div class="col-xxl-3 col-md-6">
                                                    <div>
                                                        <label for="daily_date" class="form-label">Daily Date<span class="text-danger">*</span></label>
                                                        <input type="date" readonly class="form-control" id="daily_date" name="daily_date">
                                                    </div>
                                                </div>


                                                <div class="col-xxl-3 col-md-6">
                                                    <div>
                                                        <label for="file_upload" class="form-label">File Upload</label>

                                                        <input class="form-control" readonly type="file" id="file_upload" name="file_upload" multiple>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="card-body">
                                        <div class="live-preview">
                                            <div class="row gy-4">

                                                <div class="col-xxl-3 col-md-6">
                                                    <div>
                                                        <label for="mobile" class="form-label">Mobile<span class="text-danger">*</span></label>
                                                        <input type="text" readonly class="form-control" id="mobile" name="mobile" value="">
                                                    </div>
                                                </div>

                                                <div class="col-xxl-3 col-md-6">
                                                    <div>
                                                        <label for="email" class="form-label">Email<span class="text-danger">*</span></label>
                                                        <input type="text" readonly class="form-control" id="email" name="email" value="">
                                                    </div>
                                                </div>

                                                <div class="col-xxl-3 col-md-6">
                                                    <div>
                                                        <label for="comments" class="form-label">Comments<span class="text-danger">*</span></label>
                                                        <textarea type="text" readonly class="form-control" id="comments" name="comments"  value=""></textarea>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                {{-- </form> --}}
                            </div>
                        </div>

                    </div>

                </div>
            </form>
        </div>
    </div>


    <div class="modal fade" id="rem-element-modal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            {{-- <form action="" id="changePasswordForm">
                @csrf --}}
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Send Inward Details</h5>
                        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="inward_id" name="inward_id" value="">
                        <div class="col-sm-12">
                            <div class="card">
                                <form class="theme-form" name="updateForm" id="updateForm" enctype="multipart/form-data">
                                    @csrf

                                    <div class="card-body">
                                        <div class="live-preview">
                                            <div class="row gy-4">
                                                <div class="col-xxl-3 col-md-6">
                                                    <div>
                                                        <label for="basiInput" class="form-label">Department<span class="text-danger">*</span></label>

                                                        <select  class="form-select" id="department_id" name="department_id" aria-label="department Mode" >
                                                            <option disabled>---Select Department---</option>
                                                            @foreach ($department as $dep)
                                                                <option value="{{ $dep->id }}">{{ $dep->departmentname }}</option>
                                                            @endforeach
                                                        </select>

                                                    </div>
                                                </div>


                                            </div>

                                        </div>

                                    </div>


                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary" id="addSubmit">Send</button>

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            {{-- </form> --}}
        </div>
    </div>


</x-admin.layout>
<script>
    $(document).ready(function() {
    // Show the modal and populate inward_id when the button is clicked
    $("#buttons-datatables").on("click", ".rem-element", function(e) {
        e.preventDefault();

        var inward_id = $(this).attr("data-id");
        $('#inward_id').val(inward_id);
        $('#rem-element-modal').modal('show');
    });

    // Handle the form submission inside the modal
    $('#updateForm').on('submit', function(e) {
        e.preventDefault(); // Prevent the default form submission

        var inwardId = $('#inward_id').val();
        var departmentId = $('#department_id').val();

        // Construct the route with the inward_id parameter
        var url = '{{ url("inwardfile") }}/' + inwardId;

        // Send the data via AJAX
        $.ajax({
            url: url,  // The URL now includes the inward_id
            type: 'PUT',  // Use PUT since we're updating a record
            data: {
                _token: $('input[name="_token"]').val(), // CSRF token
                department_id: departmentId
            },
            success: function(response) {
                // Handle success: close the modal and show a success message
                $('#rem-element-modal').modal('hide');
                alert('Inward status and department updated successfully!');
                location.reload();  // Reload the page to see the changes
            },
            error: function(xhr, status, error) {
                // Handle error
                alert('Failed to update inward status. Please try again.');
            }
        });
    });
});


</script>
<script>
    $("#buttons-datatables").on("click", ".change-password", function(e) {
    e.preventDefault();

    var inward_id = $(this).attr("data-id");

    $('#inward_id').val(inward_id);
    $('#change-password-modal').modal('show');

    $.ajax({
        url: '{{ route("outwardfile.edit", ":id") }}'.replace(':id', inward_id),
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            console.log(response.data);
            $('#usertype').val(response.data.usertype);
            $('#delivery_id').val(response.data.delivery_id);
            $('#delivery_id').trigger('change');
            $('#letter_id').val(response.data.letter_id);
            $('#letter_id').trigger('change');

            $('#ward_id').val(response.data.ward_id);
            $('#ward_id').trigger('change');

            $('#subject').val(response.data.subject);

            $('#sendername_designation').val(response.data.sendername_designation);
            $('#letter_ref_no').val(response.data.letter_ref_no);
            $('#recevied_data').val(response.data.recevied_data);
            $('#letter_date').val(response.data.letter_date);
            $('#daily_date').val(response.data.daily_date);

            $('#mobile').val(response.data.mobile);
            $('#email').val(response.data.email);
            $('#comments').val(response.data.comments);

            $('input[name="fromwhom"][value="' + response.data.fromwhom + '"]').prop('checked', true);
        },
        error: function(xhr) {
            console.log("Error fetching data");
        }
    });
});

</script>

