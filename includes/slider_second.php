<div class="carousel-item item_image">
            <div class="carousel-caption second_slide">
              <form id="image_upload_form" class="row">
                <div class="col-lg-6">
                  <div class="link_wrapper text-center">
                      <h2>Select your favorite photo or capture one</h2>
                        <p>Please give us a little information over you.</p>
                        <button class="link_btn-pushable my-2 camera_btn" role="button">
                          <span class="link_btn-shadow"></span>
                            <span class="link_btn-edge"></span>
                            <span class="link_btn-front text">
                                Camera
                            </span>
                        </button>

                        <label class="link_btn-pushable my-2" role="button">
                            <input type="file" name="upload_image" id="upload-img-input" onchange="document.getElementById('prev-img').src = window.URL.createObjectURL(this.files[0]);" required>
                            <span class="link_btn-shadow"></span>
                            <span class="link_btn-edge"></span>
                            <span class="link_btn-front text">
                                Upload
                            </span>
                        </label>
                        <img src="uploads/slider-img4.webp" class="w-75" alt="doodle">
                  </div>
                </div>

                <div class="col-lg-6">
                  <div class="static_img">
                    <img src="uploads/slider-img5.webp" class="w-75" alt="preview-img">
                  </div>
                  <div class="preview_wrapper d-none">
                    <img id="prev-img" />
                    <br>
                    <button type="button" class="btn btn-primary upload_again_photo_btn mt-4 me-4">Try Again</button>
                    <button type="submit" class="btn pink_btn mt-4">Save the Image</button>
                  </div>

                  <div class="live_camera_photo d-none">
                    <div class="d-xl-flex align-items-center gap-5">
                      <div id="camera_live" class="m-auto"></div>
                      <div id="image_results" class="d-none"></div>
                    </div>

                    <button type="button" class="btn btn-primary d-none take_again_photo_btn my-3">Try Again</button>
                    <button type="button" class="btn pink_btn d-none save_take_photo_btn my-3">Save</button>
                    <br>
                    <input type=button class="btn btn-primary" value="Take Snapshot" id="take_photo">
                    <input type="hidden" name="image" class="image-tag">
                    
                  </div>
                </div>
              </form>

            </div>

          </div>