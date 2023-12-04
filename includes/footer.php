
<script src="js/action.js"></script>
<script type="text/javascript">
  // live camera function define
  $(document).ready(function(){

    
  Webcam.set({
        width: 500,
        height: 380,
        image_format: 'jpeg',
        jpeg_quality: 90
    });
  
    Webcam.attach('#camera_live');
  
    $("#take_photo").click(function() {
        Webcam.snap( function(data_uri) {
            $(".image-tag").val(data_uri);
            $('#image_results').html("");
            $('#image_results').html('<img src="'+data_uri+'"/>');
            $('.save_take_photo_btn').removeClass('d-none');
        } );
    })
    $(".save_take_photo_btn").click(function(){

          const take_photo_data = $(".image-tag").val();

            $.ajax({
              url: "includes/save_data_cor.php",
              type: "POST",
              dataType: "JSON",
              data: {take_photo_image: take_photo_data},
              success: function(data) { 
                console.log(data);
                if(data.status == true){

                  $(".uploaded_img_wrapper").html(`
                    <div class="upload_text_wrapper text-start" style='width:60%'>
                        <img class="save_desktop_img" src="uploads/${data.massage}" alt="user photo" />
                        <div class="upload_text d-flex gap-2 mt-2 align-items-center">
                            <div>
                                <a href="download.php" class="btn upload_download_btn px-5 py-2" role="button">
                                    Download
                                </a>
                            </div>
                            <div class="share_wrapper">
                                <span>Share on</span>
                                <ul class="p-0 m-0 d-flex gap-3">
                                    <li>
                                        <a href="download.php">
                                            <img src="uploads/ico-facebook.webp"/>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="download.php">
                                            <img src="uploads/ico-instagram.webp"/>
                                        </a>
                                        
                                    </li>
                                </ul>
                            </div>
                        </div>
                        </div>
                        <div class="upload_text_wrapper text-start" style='width:40%'>
                            <img class="save_mobile_img" src="uploads/${data.massage}" alt="user photo" />
                            <div class="upload_text d-flex gap-2 mt-2 align-items-center">
                            <div>
                                <a href="download.php" class="btn upload_download_btn px-5 py-2" role="button">
                                    Download
                                </a>
                            </div>
                            <div class="share_wrapper">
                                <span>Share on</span>
                                <ul class="p-0 m-0 d-flex gap-3">
                                    <li>
                                        <a href="download.php">
                                            <img src="uploads/ico-facebook.webp"/>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="download.php">
                                            <img src="uploads/ico-instagram.webp"/>
                                        </a>
                                        
                                    </li>
                                </ul>
                            </div>
                        </div>
                        </div>
                  `);
                  $(".carousel-control-next").click();

                }else{
                  alert(data.massage);
                }
              }
            });
    });


  })
</script>
  </body>
</html>