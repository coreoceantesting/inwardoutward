<x-admin.layout>
    <x-slot name="title">Inward</x-slot>
    <x-slot name="heading">Inward</x-slot>
    {{-- <x-slot name="subheading">Test</x-slot> --}}


        <!-- Add Form -->
        <div class="row" id="addContainer" >
            <div class="col-sm-12">
                <div class="card">
                    <form class="theme-form" name="addForm" id="addForm" enctype="multipart/form-data">
                        @csrf

                        <div class="card-header">
                            <h4 class="card-title">Add Inward</h4>
                        </div>

                        <div class="card-body">
                            <div class="live-preview">
                                <div class="row gy-4">
                                    <div class="col-xxl-3 col-md-6">
                                        <div>
                                            <label for="basiInput" class="form-label">Delivery Mode<span class="text-danger">*</span></label>
                                            <select class="form-select" id="delivery_id" name="delivery_id" aria-label="Delivery Mode">
                                                <option disabled selected>--- Select Delivery Mode ---</option>
                                                @foreach ($deliverymode_data as $deliverymode)
                                                    <option value="{{ $deliverymode->id }}">{{ $deliverymode->modename }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-xxl-3 col-md-6">
                                        <div>
                                            <label for="basiInput" class="form-label">Letter Type<span class="text-danger">*</span></label>
                                            <select class="form-select" id="letter_id" name="letter_id" aria-label="Delivery Mode">
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
                                            <input type="text" id="usertype" name="usertype" class="form-control" id="exampleInputpassword" value="">
                                        </div>
                                    </div>
                                    <div class="col-xxl-3 col-md-6">
                                        <div>
                                            <label for="fromwhom" class="form-label">From Whom<span class="text-danger">*</span></label>
                                            <br>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" name="fromwhom" type="checkbox" id="inlineCheckbox1" value="General">
                                                <label class="form-check-label" for="inlineCheckbox1">General</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" name="fromwhom" type="checkbox" id="inlineCheckbox2" value="Department">
                                                <label class="form-check-label" for="inlineCheckbox2">Department</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" name="fromwhom" type="checkbox" id="inlineCheckbox3" value="Organisation">
                                                <label class="form-check-label" for="inlineCheckbox3">Organisation</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" name="fromwhom" type="checkbox" id="inlineCheckbox3" value="VIP">
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
                                            <select class="form-select" id="ward_id" name="ward_id" aria-label="ward">
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
                                            <input type="text" class="form-control" id="subject" name="subject" value="">
                                        </div>
                                    </div>

                                    <div class="col-xxl-3 col-md-6">
                                        <div>
                                            <label for="sendername_designation" class="form-label">Sender Name/Designation<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="sendername_designation" name="sendername_designation" value="">
                                        </div>
                                    </div>

                                    <div class="col-xxl-3 col-md-6">
                                        <div>
                                            <label for="letter_ref_no" class="form-label">Letter Ref. Number</label>
                                            <input type="text" class="form-control" id="letter_ref_no" name="letter_ref_no" value="">
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
                                            <input type="date" class="form-control" id="recevied_data" name="recevied_data">
                                        </div>
                                    </div>


                                    <div class="col-xxl-3 col-md-6">
                                        <div>
                                            <label for="letter_date" class="form-label">Letter Date<span class="text-danger">*</span></label>
                                            <input type="date" class="form-control" id="letter_date" name="letter_date">
                                        </div>
                                    </div>

                                    <div class="col-xxl-3 col-md-6">
                                        <div>
                                            <label for="daily_date" class="form-label">Daily Date<span class="text-danger">*</span></label>
                                            <input type="date" class="form-control" id="daily_date" name="daily_date">
                                        </div>
                                    </div>


                                    <div class="col-xxl-3 col-md-6">
                                        <div>
                                            <label for="file_upload" class="form-label">File Upload</label>

                                            <input class="form-control" type="file" id="file_upload" name="file_upload" multiple>
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
                                            <input type="text" class="form-control" id="mobile" name="mobile" value="">
                                        </div>
                                    </div>

                                    <div class="col-xxl-3 col-md-6">
                                        <div>
                                            <label for="email" class="form-label">Email<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="email" name="email" value="">
                                        </div>
                                    </div>

                                    <div class="col-xxl-3 col-md-6">
                                        <div>
                                            <label for="comments" class="form-label">Comments<span class="text-danger">*</span></label>
                                            <textarea type="text" class="form-control" id="comments" name="comments"  value=""></textarea>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary" id="addSubmit">Submit</button>
                            <button type="reset" class="btn btn-warning">Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>





</x-admin.layout>

<script>
    $("#addForm").submit(function(e) {
        e.preventDefault();
        $("#addSubmit").prop('disabled', true);

        var formdata = new FormData(this);
        // alert(formdata);
        $.ajax({
            url: '{{ route('inwardfile.store') }}',
            type: 'POST',
            data: formdata,
            contentType: false,
            processData: false,
            success: function(data)
            {
                $("#addSubmit").prop('disabled', false);
                if (!data.error2)
                    swal("Successful!", data.success, "success")
                        .then((action) => {
                            window.location.href = '{{ route('inwardfile.index') }}';
                        });
                else
                    swal("Error!", data.error2, "error");
            },
            statusCode: {
                422: function(responseObject, textStatus, jqXHR) {
                    $("#addSubmit").prop('disabled', false);
                    resetErrors();
                    printErrMsg(responseObject.responseJSON.errors);
                },
                500: function(responseObject, textStatus, errorThrown) {
                    $("#addSubmit").prop('disabled', false);
                    swal("Error occured!", "Something went wrong please try again", "error");
                }
            }
        });

    });
</script>
