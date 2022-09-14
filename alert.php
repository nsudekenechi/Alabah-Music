

<?php
    if(isset($_GET["email"])){
       if($_GET["email"]=="sent"){
            ?>
            <script>
                swal("Email Sent Successfully","We will get back to you shortly","success")
            </script>
            <?php
       }else{
        ?>
        <script>
            swal("Email Sent Failed","Please Try again","error")
        </script>
        <?php
       }
    }else if(isset($_GET["checkout"])){
            if($_GET["checkout"]=="failed"){
                ?>
                <script>
                    swal("Could'nt Update Email","Please try again","error")
                </script>
                <?php
            }
            
     }
?>
