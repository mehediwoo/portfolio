@extends('admin.layout.app')
@section('title','Slider | Portfolio')
@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-md-12">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">About of me..</h6>
                <form action="{{ route('about.update') }}" method="post" id="about_forms" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group mt-2">
                                <label for="">Name</label>
                                <input class="form-control form-control-sm" name="name" type="text" value="{{ $about->name }}">
                            </div>

                            <div class="form-group mt-2">
                                <label for="">Email</label>
                                <input class="form-control form-control-sm" name="email" type="text" value="{{ $about->email }}">
                            </div>

                            <div class="form-group mt-2">
                                <label for="">Birth Date</label>
                                <input class="form-control form-control-sm" name="birth_date" value="{{ $about->birth_date }}" type="date">
                            </div>

                            <div class="form-group mt-2">
                                <label for="">Post Code</label>
                                <input class="form-control form-control-sm" name="post_code" type="number" value="{{ $about->post_code }}">
                            </div>

                            <div class="form-group mt-2">
                                <label for="">Phone</label>
                                <input class="form-control form-control-sm" name="phone" type="number" value="{{ $about->phone }}">
                            </div>

                            <div class="form-group mt-2">
                                <label for="">About of you !</label>
                                <textarea name="about_text" class="form-control form-control-sm" rows="3">{{ $about->about_text }}</textarea>
                            </div>

                            <div class="form-group mt-2">
                                <label for="">Address</label>
                                <textarea name="address" class="form-control form-control-sm">{{ $about->address }}</textarea>
                            </div>
                        </div>

                        <div class="col-md-6 col-sm-12">
                            <div class="form-group mt-2">
                                <label for="">How Many Project Done ?</label>
                                <input class="form-control form-control-sm" name="done_project" type="text" value="{{ $about->done_project }}">
                            </div>

                            <div class="form-group mt-2">
                                <label for="">About Image</label>
                                <input type="file" class="dropify" name="image">
                            </div>

                            <div class="form-group mt-2">
                                <label for="">Resume</label>
                                <input type="file" class="dropify" name="resume_file">
                            </div>

                            <div class="modal-footer">
                                <input type="submit" class="btn btn-primary" id="save_btn" value="Save">

                                <button id="spinners" class="btn btn-primary d-none" type="button" disabled>
                                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                    Loading...
                                </button>
                            </div>
                        </div>
                    </div>
                </form>


            </div>
        </div>
    </div>
</div>
@include('admin.slider.ajax.add')
@include('admin.slider.ajax.edit')
@endsection

@section('script')
<script type="text/javascript">
    $(document).ready(function(){

        // store slider data on database
        $(document).on('submit','#about_form',function(event){
            event.preventDefault();
            $('#save_btn').addClass('d-none');
            $('#spinners').removeClass('d-none');

            let formData = new FormData(this);
            $.ajax({
                url:"{{ route('about.update') }}",
                method: 'POST',
                data:formData,
                contentType: false,
                processData: false,
                success:function(data){
                    $('#save_btn').removeClass('d-none');
                    $('#spinners').addClass('d-none');
                    Swal.fire({
                        position: "top-end",
                        icon: "success",
                        title: "Your content has been saved",
                        showConfirmButton: false,
                        timer: 1500
                    });
                },
                error:function(error){
                    let err = error.responseJSON;
                    $.each(err.errors,function(index,value){
                        toastr.error(value);
                    });
                    $('#save_btn').removeClass('d-none');
                    $('#spinners').addClass('d-none');

                }
            });
        });
    });
</script>
@endsection
