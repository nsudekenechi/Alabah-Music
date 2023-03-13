<?php
    $title = "Download page";
    require_once("./includes/header.php");
    if(isset($_GET["reference"])){
        $reference = $_GET["reference"];
        $query = "SELECT * FROM view_sold WHERE reference_id='$reference'";
        $result = mysqli_query($conn,$query);
        if(mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_assoc($result);
            $fileNames = json_decode($row["files"],true);
            $itemNames = json_decode($row["item_name"],true);
            $location = json_decode($row["item_type"],true);
            $leaseTypes =json_decode($row["item_lease_type"],true);
            $ids = json_decode($row["item_id"],true);
        }
    }

    
   
?>

<main class="main-content">
    <div class="breadcrumb-area breadcrumb-height" data-bg-image="assets/images/breadcrumb/bg/1-1-1919x388.jpg">
        <div class="container h-100">
            <div class="row h-100">
                <div class="col-lg-12">
                    <div class="breadcrumb-item">

                        <ul class="my-3">


                            <?php
                                   
                                       for($i=0;$i<=count($fileNames)-1;$i++){
                                        $extension = explode(".",$fileNames[$i])[1];
                                        $itemName=trim($itemNames[$i]).".$extension";
                                        $leaseType=$leaseTypes[$i];
                                       
                                       
                                            ?>
                            <a href="./admin/Files/<?=$location[$i];?>/<?=$fileNames[$i];?>" download="<?=$itemName;?>"
                                class="downloads" hidden data-type="<?=$location;?>" data-leaseType="<?=$leaseType;?>"
                                data-id="<?=$ids[$i];?>"></a>
                            <?php
                                       }
                                    ?>
                        </ul>
                        <div class="group-btn_wrap  gap-2">

                            <a class="btn w-100 btn-dark start-download">Click here if download doesn't start
                                automatically</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>
<?php
require_once("./includes/footer.php");
?>

<script>
function startdownload() {
    document.querySelectorAll(".downloads").forEach(download => {
        download.click();
    })
}
// Starting download automatically
startdownload();
// Starting download if button was clicked
document.querySelector(".start-download").onclick = function() {
    startdownload();
}
</script>
</body>

</html>