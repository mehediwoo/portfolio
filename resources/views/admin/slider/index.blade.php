@extends('admin.layout.app')
@section('title','Slider | Portfolio')
@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-12">
            <div class="bg-light rounded h-100 p-4">
                <div class="d-flex justify-content-center">
                    <h4 class="flex-fill">Slider</h4>
                    <a href="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">Add +</a>
                </div>
                <div class="table-responsive">
                    <table class="table" id="dataTable">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Intro</th>
                                <th scope="col">Title</th>
                                <th scope="col">Sub Title</th>
                                <th scope="col">Image</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody id="slider_table_body">

                        </tbody>
                    </table>
                </div>
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
        // Load Table
        function loadTable(){
            $.ajax({
                url:"{{ route('slider.show') }}",
                success:function(data){
                    $('#slider_table_body').html(data);
                    $("#dataTable").dataTable();
                },
            });
        }
        loadTable();

        // store slider data on database
        $(document).on('submit','#slider_form',function(event){
            event.preventDefault();
            $('#save_btn').addClass('d-none');
            $('#spinners').removeClass('d-none');

            let formData = new FormData(this);
            $.ajax({
                url:"{{ route('slider.store') }}",
                method: 'POST',
                data:formData,
                contentType: false,
                processData: false,
                success:function(data){
                    $('#addModal').modal('hide');
                    $('#slider_form').trigger('reset');
                    $('#save_btn').removeClass('d-none');
                    $('#spinners').addClass('d-none');
                    Swal.fire({
                        position: "top-end",
                        icon: "success",
                        title: "Your slider has been saved",
                        showConfirmButton: false,
                        timer: 1500
                    });
                    loadTable();
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

        // edit slider iteam
        $(document).on('click','#edit',function(){
            let id = $(this).attr('dataId');
            let intro = $(this).attr('intro');
            let title = $(this).attr('title');
            let sub_title = $(this).attr('sub_title');
            let image = $(this).attr('image');

            $('#editId').val(id);
            $('#slider_intro').val(intro);
            $('#slider_title').val(title);
            $('#sub_title').val(sub_title);
            let image_path ="{{ asset('storage') }}/"+image;
            $('#slider_images').attr('src',image_path);

        });

        // edit slider data on database
        $(document).on('submit','#slider_form_edit',function(event){
            event.preventDefault();
            $('#edit_btn').addClass('d-none');
            $('#edit_spinners').removeClass('d-none');

            let formData = new FormData(this);
            $.ajax({
                url:"{{ route('slider.update') }}",
                method: 'POST',
                data:formData,
                contentType: false,
                processData: false,
                success:function(data){
                    $('#editModal').modal('hide');
                    $('#slider_form_edit').trigger('reset');
                    $('#edit_btn').removeClass('d-none');
                    $('#edit_spinners').addClass('d-none');
                    Swal.fire({
                        position: "top-end",
                        icon: "success",
                        title: "Your slider has been updated",
                        showConfirmButton: false,
                        timer: 1500
                    });
                    loadTable();
                },
                error:function(error){
                    let err = error.responseJSON;
                    $.each(err.errors,function(index,value){
                        toastr.error(value);
                    });
                    $('#edit_btn').removeClass('d-none');
                    $('#edit_spinners').addClass('d-none');

                }
            });
        });

        // Delete Slider iteam
        $(document).on('click','#delete',function(){
            event.preventDefault();
            let id = $(this).attr('data');
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
            if (result.isConfirmed) {
                    $.ajax({
                        url:"{{ route('slider.destroy') }}",
                        method:'POST',
                        data:{id:id},
                        success: function(data){
                            Swal.fire({
                            title: "Deleted!",
                            text: "Your file has been deleted.",
                            icon: "success"
                            });
                            loadTable();
                        }
                    });
                }
            });
        });
    });
</script>
@endsection
