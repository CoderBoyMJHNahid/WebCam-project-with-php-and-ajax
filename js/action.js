$(document).ready(function(){

    // user data form submit function define
    $("#user_details_form").submit(function(e){
        e.preventDefault();
        
        const username = $("#user_name").val();
        const city = $("#city").val();
        const phone = $("#phone").val();

        const data = {
            username,
            city,
            phone
        }

        if (username == "" || city == "" || phone == "") {
            
            $("#user_details_form #notification").html(` <div class="alert alert-danger my-2"><p>All fields are mandatory</p></div>`)
            
        }else{

            if (phone.length == 10) {

                $.ajax({
                    url:"./includes/user_data_cor.php",
                    type:"POST",
                    data: data,
                    success:function(res){
                        console.log(res);
                        if (res != "error") {

                            $(".carousel-control-next").click();

                        } else {

                            alert("Something is wrong!!")

                        }
                    }
                })


                

            } else {

                $("#user_details_form #notification").html(` <div class="alert alert-danger my-2"><p>The phone number field should be must 10 characters</p></div>`);

            }
        }
       

    })

    $("#image_upload_form").submit(function(e){
        e.preventDefault();

        const data = new FormData(this);
        data.append("upload_image",'true');

        $.ajax({
            url:"./includes/save_data_cor.php",
            type:"POST",
            dataType:"json",
            data:data,
            contentType:false,
            processData:false,
            success:function(res){
                console.log(res);

                if(res.status == true){

                    $(".uploaded_img_wrapper").html(`
                        <div class="upload_text_wrapper text-start" style='width:60%'>
                        <img class="save_desktop_img" src="uploads/${res.massage}" alt="user photo" />
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
                            <img class="save_mobile_img" src="uploads/${res.massage}" alt="user photo" />
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
                    alert(res.massage);
                }
            }
        })


    })
    
    // camera button click handler
    $(".camera_btn").click(function(){
        $('.live_camera_photo').removeClass('d-none');
        $('.preview_wrapper').addClass('d-none');
        $('.static_img').hide();
    });
    $("#take_photo").click(function(){
        $("#image_results").removeClass('d-none');
        $("#camera_live").hide();
        $(this).hide();
        $(".take_again_photo_btn").removeClass('d-none');
    })
    $(".take_again_photo_btn").click(function(){
        $("#image_results").addClass('d-none');
        $("#camera_live").show();
        $(this).addClass('d-none');
        $(".save_take_photo_btn").addClass('d-none');
        $("#take_photo").show();
    })

    // upload photo button click handler
    $("#upload-img-input").on("change", function(){
        $('.preview_wrapper').removeClass('d-none');
        $(".live_camera_photo").addClass('d-none');
        $('.static_img').hide();
    })
    $(".upload_again_photo_btn").on("click", function(){
        $('.preview_wrapper').addClass('d-none');
        $('.static_img').show();
        $("#upload-img-input").val('');
    })



});