  <!-- Modal -->
  <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="editModalLabel">Edit Slider Content</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form id="slider_form_edit" method="POST">
                <input type="hidden" name="editId" id="editId">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mt-2">
                            <label for="">Slider Intro</label>
                            <input type="text" name="slider_intro" id="slider_intro" class="form-control" >
                        </div>

                        <div class="form-group mt-2">
                            <label for="">Slider Title</label>
                            <input type="text" name="slider_title" id="slider_title" class="form-control" >
                        </div>

                        <div class="form-group mt-2">
                            <label for="">Slider Sub Titles</label>
                            <input type="text" name="slider_subtitle" id="sub_title" class="form-control" >
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Thumbnail</label>
                            <input type="file" name="thumb" class="dropify" >
                        </div>
                    </div>
                    <div class="col-md-6 mt-3 text-center">
                        <p>Slider Images</p>
                    </div>
                    <div class="col-md-6 mt-3">
                        <img src="" alt="" id="slider_images" style="height: 150px;width:120px">
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" id="edit_btn" value="Save">

                    <button id="edit_spinners" class="btn btn-primary d-none" type="button" disabled>
                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                        Loading...
                      </button>
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>
