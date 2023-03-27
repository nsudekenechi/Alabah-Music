<?php
$title = "Add Sample";
require_once("./includes/header.php");
?>
<div id="content" class="main-content">
    <?php
    if (isset($_GET["edit_sample"])) {
    ?>
        <form action="./handlers/edit_handler.php" method="POST" enctype="multipart/form-data">
            <input type="text" value="Free" hidden name="purchase_status" class="purchase-status">
            <div class="px-3 py-5">
                <h5>Edit a sample</h5>
                <?php
                $sampleId = $_GET["edit_sample"];
                $query = "SELECT * FROM `add_sample` WHERE sample_id='$sampleId'";
                $result = mysqli_query($conn, $query);
                while ($row = mysqli_fetch_assoc($result)) {
                    $sampleName = $row["sample_name"];
                    $sampleCategory = $row["sample_category"];
                    $amount = $row["sample_amount"];
                }
                ?>
                <div class="row mt-4">
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                        <input type="text" hidden value="<?= $sampleId; ?>" name="sample_id">
                        <h6>Sample name</h6>
                        <input type="text" value="<?= $sampleName; ?>" name="sample_name" class="form-control" placeholder="Enter Name..." id="">

                    </div>


                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 ">
                        <h6>Sample Category</h6>
                        <select name="sample_category" id="" class="form-control px-3 select">
                            <option value="<?= $sampleCategory; ?>"><?= $sampleCategory; ?></option>
                        </select>
                    </div>



                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 my-4">
                        <h6>Sample Image</h6>
                        <div class="form-control p-0  m-0 d-flex align-items-center px-2">

                            <input type="file" name="image_file" class="" accept=".jpeg,.jpg,.png,.gif">

                        </div>
                    </div>

                    <div class=" d-block col-12 col-sm-12 col-md-6 col-lg-6 my-4">
                        <h6>Sample File </h6>
                        <div class="form-control p-0  m-0 d-flex align-items-center px-2">

                            <input type="file" name="sample_file" class="" accept=".rar,.zip,.rar4">

                        </div>
                    </div>







                    <div class="d-none premimum-sample col-12 col-sm-12 col-md-6 col-lg-6 ">
                        <h6>Amount</h6>

                        <input type="text" name="sample_amount" value="<?= $amount; ?>" class="form-control" placeholder="Enter Sample Amount">




                    </div>

                </div>

                <div class="field-wrapper my-3">
                    <button type="submit" class="btn btn-primary add_sample" value="" name="edit_sample">Edit Sample</button>
                </div>
            </div>


        </form>
    <?php
    } else {
    ?>
        <form action="./handlers/add_handler.php" method="POST" enctype="multipart/form-data">
            <input type="text" value="Free" hidden name="purchase_status" class="purchase-status">
            <div class="px-3 py-5">
                <h5>Add a sample</h5>
                <div class="row mt-4">
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                        <h6>Sample name</h6>
                        <input type="text" name="sample_name" required class="form-control" placeholder="Enter Name..." id="">

                    </div>


                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 ">
                        <h6>Sample Category</h6>
                        <select name="sample_category" required id="" class="form-control px-3 select">
                            <option value="Free">Free</option>
                            <option value="Premium">Premimum</option>

                        </select>
                    </div>



                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 my-4">
                        <h6>Sample Image</h6>
                        <div class="form-control p-0  m-0 d-flex align-items-center px-2">

                            <input type="file" required name="image_file" class="" accept=".jpeg,.jpg,.png,.gif">

                        </div>
                    </div>

                    <div class=" d-block col-12 col-sm-12 col-md-6 col-lg-6 my-4">
                        <h6>Sample File </h6>
                        <div class="form-control p-0  m-0 d-flex align-items-center px-2">

                            <input type="file" required name="sample_file" class="" accept=".rar,.zip,.rar4">

                        </div>
                    </div>







                    <div class="d-none premimum-sample col-12 col-sm-12 col-md-6 col-lg-6 ">
                        <h6>Amount</h6>

                        <input type="text" name="sample_amount" class="form-control" placeholder="Enter Sample Amount">




                    </div>

                </div>

                <div class="field-wrapper my-3">
                    <button type="submit" class="btn btn-primary add_sample" value="" name="add_sample">Add Sample</button>
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

                                    <th>Sample Name</th>
                                    <th>Sample Category </th>


                                    <th>Image</th>
                                    <th>Amount</th>
                                    <th>Discount</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = "SELECT * FROM add_sample";
                                $result = mysqli_query($conn, $query);
                                $i = 0;
                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $sample = $row["sample_name"];
                                        $sampleid = $row["sample_id"];
                                        $image = $row["sample_image"];
                                        $category = $row["sample_category"];
                                        $amount = $row["sample_amount"];
                                        $discount = $row["discount"];
                                        if ($amount == "") {
                                            $amount = "";
                                        } else {
                                            $amount = "$$amount";
                                        }

                                ?>
                                        <tr>
                                            <td class="checkbox-column"> 1 </td>
                                            <input type="text" hidden class="sample_id" value="<?= $sampleid; ?>">

                                            <td>
                                                <div class="d-flex">
                                                    <p class="align-self-center mb-0 user-name"> <?= $sample; ?></p>
                                                </div>
                                            </td>

                                            <td>
                                                <div class="d-flex">

                                                    <p class="align-self-center mb-0 user-name"> <?= $category; ?></p>
                                                </div>
                                            </td>







                                            <td>
                                                <div class="usr-img-frame  rounded-circle" style="background-image: url('Files/sample/<?= $image; ?>');background-position:center;background-size:cover;">

                                                </div>
                                            </td>

                                            <td>
                                                <div class="d-flex">

                                                    <p class="align-self-center mb-0 user-name"> <?= $amount; ?></p>
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
                                                    <button type="button" class="btn btn-secondary btn-sm button-modal" data-toggle="modal" data-target="#loginModal" data-id="<?= $sampleid; ?>"><?= $discountText; ?></button>
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
                                                            <a class="dropdown-item action-edit" href="addsample.php?edit_sample=<?= $sampleid; ?>"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3">
                                                                    <path d="M12 20h9"></path>
                                                                    <path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path>
                                                                </svg>Edit</a>
                                                            <a class="dropdown-item action-delete delete-sample" href="javascript:void(0);"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash">
                                                                    <polyline points="3 6 5 6 21 6"></polyline>
                                                                    <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                                                </svg>Delete</a>
                                                        </div>
                                                    <?php
                                                    } else {
                                                    ?>
                                                        <div class="dropdown-menu mt-4" aria-labelledby="dropdownMenuLink2">
                                                            <a class="dropdown-item action-edit" href="addsample.php?edit_sample=<?= $sampleid; ?>"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3">
                                                                    <path d="M12 20h9"></path>
                                                                    <path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path>
                                                                </svg>Edit</a>
                                                            <a class="dropdown-item action-delete delete-sample" href="javascript:void(0);"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash">
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
                                <h6>Discount(%)</h6>
                                <input type="number" class="form-control mb-2 discount" id="exampleInputEmail1" name="discount" placeholder="Enter Discount(%)">

                                <input type="date" class="form-control mb-2 expirydate" id="exampleInputEmail1" name="expirydate">

                                <input type="text" class="modal-id" name="id" hidden>
                                <input type="text" hidden value="sample" id="type">

                            </div>

                            <button name="add_sample_discount" type="submit" class="btn btn-primary mt-2 mb-2 btn-block d-block">Add </button>



                            <button name="remove_sample_discount" type="submit" class="btn btn-danger mt-2 mb-2 btn-block d-none">Remove </button>
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
<script>
    const freesample = document.querySelector(".free-sample")
    const premimumsample = document.querySelector(".premimum-sample")
    const select = document.querySelector(".select");
    const amountInputs = document.querySelectorAll(".premimum-sample input[type=text]")

    const addsampleBtn = document.querySelector(".add_sample");
    const purchaseStatus = document.querySelector(".purchase-status")


    select.onchange = function() {
        hideInput()
    }
    if (select.value == "Premium") {

        premimumsample.classList.toggle("d-none");
        //Changing purchase status of sample
        purchaseStatus.value = "Not Sold"

        //Making all amount inputs required

        addRequired(amountInputs)

    }

    function hideInput() {
        if (select.value == "Premium") {

            premimumsample.classList.toggle("d-none");
            //Changing purchase status of sample
            purchaseStatus.value = "Not Sold"

            //Making all amount inputs required

            addRequired(amountInputs)

        } else if (select.value == "Free") {

            premimumsample.classList.toggle("d-none");
            //Removing required from inputs
            purchaseStatus.value = "Free"

            removeRequired(amountInputs)
        }
    }

    function addRequired(amountInputs) {
        amountInputs.forEach(input => {
            input.setAttribute("required", true)

        })


    }

    function removeRequired(amountInputs) {
        amountInputs.forEach(input => {
            input.removeAttribute("required")

        })

    }

    amountInputs.forEach(input => {
        input.onkeyup = function() {
            if (isNaN(input.value)) {
                addsampleBtn.setAttribute("disabled", true)
            } else {
                addsampleBtn.removeAttribute("disabled")
            }

        }
        input.onblur = function() {
            input.value = parseFloat(input.value).toFixed(2)
        }

    })

    const delets = document.querySelectorAll(".action-delete");
    const sampleids = document.querySelectorAll(".sample_id")

    delets.forEach((delet, index) => {
        delet.onclick = function() {
            fetch(`./handlers/delete_handler.php?delete_sample=${sampleids[index].value}`).then(e => e.text()).then(e => {
                if (e == "true") {
                    swal("Deleted", "", "success")
                }
            })
        }
    })
</script>
<script src="./discount.js"></script>