<?php
$title = "Add Song";
require_once("./includes/header.php");
?>
<link rel="stylesheet" href="plugins/font-icons/fontawesome/css/regular.css">
<link rel="stylesheet" href="plugins/font-icons/fontawesome/css/fontawesome.css">
<!--  BEGIN CONTENT AREA  -->
<div id="content" class="main-content">
    <?php
    if (isset($_GET["edit_song"])) {
        $songid = $_GET["edit_song"];
        $query = "SELECT * FROM add_song WHERE song_id='$songid'";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);
        $songId = $row["song_id"];
        $songName = $row["song_name"];
        $songCategory = $row["song_category"];
        $songGenre = $row["song_genre"];
        $songMood = $row["song_mood"];
        $basicAmount = $row["song_basic_amount"];
        $exclusiveAmount = $row["song_exclusive_amount"];
        $premiumAmount = $row["song_premium_amount"];
    ?>
        <form action="./handlers/edit_handler.php" method="POST" enctype="multipart/form-data">
            <input type="text" hidden name="" class="purchase-status">
            <input type="text" value="<?= $songId; ?>" hidden name="song_id">
            <div class="px-3 py-5">
                <h5>Edit a song</h5>
                <div class="row mt-4">
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                        <h6>Song name</h6>
                        <input type="text" name="song_name" required class="form-control" placeholder="Enter Name..." id="" value="<?= $songName; ?>">

                    </div>

                    <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                        <h6>Song Genre</h6>
                        <select name="song_genre" required id="" class="form-control px-3">
                            <option class="px-3" value="<?= $songGenre; ?>"><?= $songGenre; ?></option>
                            <?php

                            $query = "SELECT * FROM add_genre WHERE genre!='$songGenre'";
                            $result = mysqli_query($conn, $query);
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $genre = $row["genre"];
                            ?>
                                    <option class="px-3" value="<?= $genre; ?>"><?= $genre; ?></option>
                            <?php
                                }
                            }
                            ?>
                        </select>
                    </div>

                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 my-4">
                        <h6>Song Category</h6>
                        <select name="song_category" required id="" class="form-control px-3 select">
                            <option value="<?= $songCategory; ?>"><?= $songCategory; ?></option>


                        </select>
                    </div>

                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 my-4">
                        <h6>Song Mood</h6>
                        <select name="song_mood" required id="" class="form-control px-3">
                            <option class="px-3" value="<?= $songMood; ?>"><?= $songMood; ?></option>
                            <?php
                            $query = "SELECT * FROM add_lyrics_type WHERE lyrics_type!='$songMood'";
                            $result = mysqli_query($conn, $query);
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $lyrics_type = $row["lyrics_type"];
                            ?>
                                    <option class="px-3" value="<?= $lyrics_type; ?>"><?= $lyrics_type; ?></option>
                            <?php
                                }
                            }
                            ?>
                        </select>
                    </div>



                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 ">
                        <h6>Song Image</h6>
                        <div class="form-control p-0  m-0 d-flex align-items-center px-2">

                            <input type="file" name="image_file" class="" accept=".jpeg,.jpg,.png,.gif">

                        </div>
                    </div>

                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 ">
                        <h6>Song Preview (20 seconds)</h6>
                        <div class="form-control p-0  m-0 d-flex align-items-center px-2">

                            <input type="file" name="preview_file" class="" accept=".mp3">

                        </div>
                    </div>

                    <div class=" d-block col-12 col-sm-12 col-md-6 col-lg-6 my-4">
                        <h6>Song File (Audio + Lyrics)</h6>
                        <div class="form-control p-0  m-0 d-flex align-items-center px-2">

                            <input type="file" name="song_file" class="" accept=".zip,.rar,.rar4">

                        </div>
                    </div>




                </div>
                <div class="premimum-song row d-none py-0 my-0">



                    <div class=" col-12 col-sm-12 col-md-6 col-lg-6 ">
                        <h6>Amount For Basic Lease</h6>

                        <input type="text" class="form-control" placeholder="Enter Basic Lease Amount" name="song_basic_amount" value="<?= $basicAmount; ?>">
                    </div>





                    <div class=" col-12 col-sm-12 col-md-6 col-lg-6 ">
                        <h6>Amount For Exclusive Lease</h6>

                        <input type="text" name="song_exclusive_amount" class="form-control" placeholder="Enter Exclusive Lease Amount" value="<?= $exclusiveAmount; ?>">
                    </div>


                    <div class=" col-12 col-sm-12 col-md-6 col-lg-6 my-4">
                        <h6>Amount For Premium Lease</h6>

                        <input type="text" name="song_premium_amount" class="form-control" placeholder="Enter Premium Lease Amount" value="<?= $premiumAmount; ?>">
                    </div>





                </div>
                <div class="field-wrapper my-3">
                    <button type="submit" class="btn btn-primary add_song" value="" name="edit_song">Edit Song</button>
                </div>
            </div>


        </form>
    <?php
    } else {
    ?>
        <form action="./handlers/add_handler.php" method="POST" enctype="multipart/form-data">
            <input type="text" value="Free" hidden name="purchase_status" class="purchase-status">
            <div class="px-3 py-5">
                <h5>Add a song</h5>
                <div class="row mt-4">
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                        <h6>Song name</h6>
                        <input type="text" name="song_name" required autocomplete="no" class="form-control" placeholder="Enter Name..." id="">

                    </div>

                    <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                        <h6>Song Genre</h6>
                        <select name="song_genre" required id="" class="form-control px-3">
                            <?php
                            $query = "SELECT * FROM add_genre";
                            $result = mysqli_query($conn, $query);
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $genre = $row["genre"];
                            ?>
                                    <option class="px-3"><?= $genre; ?></option>
                            <?php
                                }
                            }
                            ?>
                        </select>
                    </div>

                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 my-4">
                        <h6>Song Category</h6>
                        <select name="song_category" required id="" class="form-control px-3 select">
                            <option value="Free">Free</option>
                            <option value="Premium">Premimum</option>

                        </select>
                    </div>

                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 my-4">
                        <h6>Song Mood</h6>
                        <select name="song_mood" required id="" class="form-control px-3">
                            <?php
                            $query = "SELECT * FROM add_lyrics_type";
                            $result = mysqli_query($conn, $query);
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $lyrics_type = $row["lyrics_type"];
                            ?>
                                    <option class="px-3" value="<?= $lyrics_type; ?>"><?= $lyrics_type; ?></option>
                            <?php
                                }
                            }
                            ?>
                        </select>
                    </div>



                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 ">
                        <h6>Song Image</h6>
                        <div class="form-control p-0  m-0 d-flex align-items-center px-2">

                            <input type="file" required name="image_file" class="" accept=".jpeg,.jpg,.png,.gif">

                        </div>
                    </div>

                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 ">
                        <h6>Song Preview (20 seconds)</h6>
                        <div class="form-control p-0  m-0 d-flex align-items-center px-2">

                            <input type="file" required name="preview_file" class="" accept=".mp3">

                        </div>
                    </div>

                    <div class=" d-block col-12 col-sm-12 col-md-6 col-lg-6 my-4">
                        <h6>Song File (Audio + Lyrics)</h6>
                        <div class="form-control p-0  m-0 d-flex align-items-center px-2">

                            <input type="file" required name="song_file" class="" accept=".zip,.rar,.rar4">

                        </div>
                    </div>

                    <div class="free-song d-block col-12 col-sm-12 col-md-6 col-lg-6 my-4">

                    </div>




                </div>
                <div class="premimum-song row d-none py-0 my-0">



                    <div class=" col-12 col-sm-12 col-md-6 col-lg-6 ">
                        <h6>Amount For Basic Lease</h6>

                        <input type="text" class="form-control" placeholder="Enter Basic Lease Amount" name="song_basic_amount">
                    </div>





                    <div class=" col-12 col-sm-12 col-md-6 col-lg-6 ">
                        <h6>Amount For Exclusive Lease</h6>

                        <input type="text" name="song_exclusive_amount" class="form-control" placeholder="Enter Exclusive Lease Amount">
                    </div>


                    <div class=" col-12 col-sm-12 col-md-6 col-lg-6 my-4">
                        <h6>Amount For Premium Lease</h6>

                        <input type="text" name="song_premium_amount" class="form-control" placeholder="Enter Premium Lease Amount">
                    </div>





                </div>
                <div class="field-wrapper my-3">
                    <button type="submit" class="btn btn-primary add_song" value="" name="add_song">Add song</button>
                </div>
            </div>


        </form>

        <div class="layout-px-spacing">
            <div class="row" id="cancel-row">

                <div class="col-xl-12 col-lg-12 col-sm-12 layout-top-spacing layout-spacing">

                    <div class="widget-content widget-content-area br-6">
                        <table id="invoice-list" class="table table-hover" style="width:100%">
                            <thead>
                                <tr>
                                    <th class="checkbox-column"> Record no. </th>

                                    <th>Song Name</th>
                                    <th>Song Category </th>
                                    <th>Song Genre</th>
                                    <th>Purchase Status</th>
                                    <th>Image</th>
                                    <th>Listen</th>
                                    <th>Discount</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = "SELECT * FROM add_song";
                                $result = mysqli_query($conn, $query);
                                $i = 0;
                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $song = $row["song_name"];
                                        $songid = $row["song_id"];
                                        $image = $row["song_image"];
                                        $category = $row["song_category"];
                                        $purchase_status = $row["purchase_status"];
                                        $genre = $row["song_genre"];
                                        $audio = $row["song_preview"];
                                        $discount = $row["discount"];
                                ?>
                                        <tr>
                                            <td class="checkbox-column"> 1 </td>
                                            <input type="text" hidden class="song_id" value="<?= $songid; ?>">

                                            <td>
                                                <div class="d-flex">
                                                    <p class="align-self-center mb-0 user-name"> <?= $song; ?></p>
                                                </div>
                                            </td>

                                            <td>
                                                <div class="d-flex">

                                                    <p class="align-self-center mb-0 user-name"> <?= $category; ?></p>
                                                </div>
                                            </td>

                                            <td>
                                                <div class="d-flex">

                                                    <p class="align-self-center mb-0 user-name"> <?= $genre; ?></p>
                                                </div>
                                            </td>

                                            <td>
                                                <div class="d-flex">
                                                    <?php
                                                    if ($purchase_status == "Free") {
                                                    ?>
                                                        <span class="shadow-none badge badge-success"><?= $purchase_status; ?></span>
                                                    <?php
                                                    } else {
                                                    ?>
                                                        <span class="shadow-none badge badge-danger"><?= $purchase_status; ?></span>
                                                    <?php
                                                    }
                                                    ?>

                                                </div>
                                            </td>




                                            <td>
                                                <div class="usr-img-frame  rounded-circle" style="background-image: url(Files/song/<?= $image; ?>);background-position:center;background-size:cover;">

                                                </div>
                                            </td>

                                            <td>
                                                <div class="d-flex">

                                                    <p class="align-self-center mb-0 play" style="cursor: pointer;"> <i data-feather="play" class="play-icon d-block"></i> <i data-feather="pause" class="pause-icon d-none"></i></p>
                                                    <audio src="Files/song/<?= $audio; ?>"></audio>
                                                </div>
                                            </td>

                                            <?php
                                            if ($category == "Premium") {
                                                if ($discount == "") {
                                                    $discountText = "Add  discount";
                                                } else {
                                                    $discountText = "Edit discount";
                                                }
                                            ?>
                                                <td>
                                                    <!-- Button trigger modal -->
                                                    <button type="button" class="btn btn-secondary btn-sm button-modal" data-toggle="modal" data-target="#loginModal" data-id="<?= $songid; ?>"><?= $discountText; ?></button>
                                                </td>
                                            <?php
                                            } else {
                                            ?>
                                                <td></td>
                                            <?php
                                            }
                                            ?>

                                            <td>
                                                <div class="dropdown">
                                                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal">
                                                            <circle cx="12" cy="12" r="1"></circle>
                                                            <circle cx="19" cy="12" r="1"></circle>
                                                            <circle cx="5" cy="12" r="1"></circle>
                                                        </svg>
                                                    </a>
                                                    <?php
                                                    if ($i == mysqli_num_rows($result) - 1) {
                                                    ?>
                                                        <div class="dropdown-menu mt-5" aria-labelledby="dropdownMenuLink2">
                                                            <a class="dropdown-item action-edit" href="addsong.php?edit_song=<?= $songid; ?>"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3">
                                                                    <path d="M12 20h9"></path>
                                                                    <path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path>
                                                                </svg>Edit</a>
                                                            <a class="dropdown-item action-delete" href="javascript:void(0);"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash">
                                                                    <polyline points="3 6 5 6 21 6"></polyline>
                                                                    <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                                                </svg>Delete</a>
                                                        </div>
                                                    <?php
                                                    } else {
                                                    ?>
                                                        <div class="dropdown-menu mt-4" aria-labelledby="dropdownMenuLink2">
                                                            <a class="dropdown-item action-edit" href="addsong.php?edit_song=<?= $songid; ?>"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3">
                                                                    <path d="M12 20h9"></path>
                                                                    <path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path>
                                                                </svg>Edit</a>
                                                            <a class="dropdown-item action-delete" href="javascript:void(0);"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash">
                                                                    <polyline points="3 6 5 6 21 6"></polyline>
                                                                    <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                                                </svg>Delete</a>
                                                        </div>

                                                    <?php
                                                    }
                                                    ?>
                                                </div>
                                            </td>


                                        </tr>
                                <?php
                                        $i++;
                                    }
                                }
                                ?>


                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
        <div class="modal fade login-modal" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">

                    <div class="modal-header" id="loginModalLabel">
                        <h4 class="modal-title">Add a discount</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                                <line x1="18" y1="6" x2="6" y2="18"></line>
                                <line x1="6" y1="6" x2="18" y2="18"></line>
                            </svg></button>
                    </div>
                    <div class="modal-body">
                        <form class="mt-0" action="./handlers/add_handler.php" method="POST">
                            <div class="form-group">
                                <input type="text" value="song" hidden id="type">
                                <h6>Discount(%)</h6>
                                <input type="number" class="form-control mb-2 discount" id="exampleInputEmail1" max="100" name="discount" placeholder="Enter Discount(%)">

                                <input type="date" class="form-control mb-2 " id="exampleInputEmail1" max="100" name="expirydate" placeholder="Enter Discount(%)">


                                <input type="text" class="modal-id" name="id" hidden>
                            </div>

                            <button name="add_song_discount" type="submit" class="btn btn-primary mt-2 mb-2 btn-block d-block">Add </button>



                            <button name="remove_song_discount" type="submit" class="btn btn-danger mt-2 mb-2 btn-block d-none">Remove </button>
                        </form>



                    </div>

                </div>
            </div>
        </div>

        <!--  END CONTENT AREA  -->
    <?php
    }
    ?>








</div>


<?php
require_once("./includes/footer.php");
?>
<script src="assets/js/scrollspyNav.js"></script>
<script src="plugins/font-icons/feather/feather.min.js"></script>
<script type="text/javascript">
    feather.replace();
</script>
<script>
    const freesong = document.querySelector(".free-song")
    const premimumsong = document.querySelector(".premimum-song")
    const select = document.querySelector(".select");
    const amountInputs = document.querySelectorAll(".premimum-song input[type=text]")
    const fileInputs = document.querySelectorAll(".premimum-song input[type=file]")
    const fileInput = document.querySelector(".free-song input[type=file]")
    const addsongBtn = document.querySelector(".add_song");
    const purchaseStatus = document.querySelector(".purchase-status")


    select.onchange = function() {
        hideInput()
    }
    if (select.value == "Premium") {
        freesong.classList.replace("d-block", "d-none");
        premimumsong.classList.replace("d-none", "d-flex");
        //Changing purchase status of song
        purchaseStatus.value = "Not Sold"

        //Making all amount inputs required

        addRequired(amountInputs, fileInputs, fileInput)

    }

    function hideInput() {
        if (select.value == "Premium") {
            freesong.classList.replace("d-block", "d-none");
            premimumsong.classList.replace("d-none", "d-flex");
            //Changing purchase status of song
            purchaseStatus.value = "Not Sold"

            //Making all amount inputs required

            addRequired(amountInputs, fileInputs, fileInput)

        } else if (select.value == "Free") {
            freesong.classList.replace("d-none", "d-block");
            premimumsong.classList.replace("d-flex", "d-none");
            //Removing required from inputs
            purchaseStatus.value = "Free"

            removeRequired(amountInputs, fileInputs, fileInput)
        }
    }

    function addRequired(amountInputs, fileInputs, singleInput) {
        amountInputs.forEach(input => {
            input.setAttribute("required", true)

        })
        fileInputs.forEach(input => {
            input.setAttribute("required", true)

        })
        singleInput.removeAttribute("required")

    }

    function removeRequired(amountInputs, fileInputs, singleInput) {
        amountInputs.forEach(input => {
            input.removeAttribute("required")

        })
        fileInputs.forEach(input => {
            input.removeAttribute("required")

        })
        singleInput.setAttribute("required", true)

    }

    amountInputs.forEach(input => {
        input.onkeyup = function() {
            if (isNaN(input.value)) {
                addsongBtn.setAttribute("disabled", true)
            } else {
                addsongBtn.removeAttribute("disabled")
            }

        }
        input.onblur = function() {
            if (input.value != "") {
                input.value = parseFloat(input.value).toFixed(2)
            }

        }

    })

    const plays = document.querySelectorAll(".play")
    const playIcon = document.querySelectorAll(".play-icon")
    const pauseIcon = document.querySelectorAll(".pause-icon");
    const audio = document.querySelectorAll("audio")

    let arr = [];
    plays.forEach((play, index) => {

        arr.push(index)
        play.onclick = function() {

            if (playIcon[index].classList.contains("d-block")) {
                playIcon[index].classList.replace("d-block", "d-none");
                pauseIcon[index].classList.replace("d-none", "d-block")
                arr.forEach(arr => {
                    //Preventing two or more songs to play at the same time
                    if (arr != index) {

                        playIcon[arr].classList.replace("d-none", "d-block");
                        pauseIcon[arr].classList.replace("d-block", "d-none")
                        audio[arr].pause()
                    }
                })
                audio[index].play()
            } else {
                playIcon[index].classList.replace("d-none", "d-block");
                pauseIcon[index].classList.replace("d-block", "d-none")
                audio[index].pause()
            }
        }
    })

    const delets = document.querySelectorAll(".action-delete");
    const songids = document.querySelectorAll(".song_id")

    delets.forEach((delet, index) => {
        delet.onclick = function() {
            fetch(`./handlers/delete_handler.php?deletesong=${songids[index].value}`).then(e => e.text()).then(e => {

            })
        }
    })

    const audios = document.querySelectorAll("audio")
    let i = 0;

    //    audios.forEach((audio)=>{
    //        audio.onplay=function(){

    //         setInterval(()=>{
    //             if(i==10){

    //                 if(audio.currentTime>=2){
    //                     audio.currentTime=0
    //                     audio.pause()
    //                 }
    //               i=0
    //             }else{
    //                 i++
    //             }

    //    },1000)
    //        }
    //    })

    //    console.log(audios.played);
    //    audios.currentTime=122
</script>

<script src="./discount.js"></script>