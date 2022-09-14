<?php
$title="View Sold";
require_once("./includes/header.php");
?>
<link rel="stylesheet" type="text/css" href="plugins/table/datatable/datatables.css">
    <link rel="stylesheet" type="text/css" href="assets/css/forms/theme-checkbox-radio.css">
    <link rel="stylesheet" type="text/css" href="plugins/table/datatable/dt-global_style.css">
    <link rel="stylesheet" type="text/css" href="plugins/table/datatable/custom_dt_custom.css">
    <div id="content" class="main-content">
        
    <div class="layout-px-spacing">
<div class="row layout-spacing">
    
                    <div class="col-lg-12">
                        <div class="statbox widget box box-shadow">
                        <div class="page-header">
                            <div class="page-title">
                                <h3>View sold</h3>
                            </div>
                        </div>
                
                            <?php
                                if($adminType=="Low"){
                                    ?>
                                    <div class="widget-content widget-content-area">
                                
                                <table id="invoice-list" class="table style-3  table-hover">
                                    <thead>
                                        <tr class="text-center">
                                            <th class="checkbox-column ">S/N</th>
                                            <th class="">Item Name</th>
                                            
                                            <th>Sold To</th>
                                            <th class="">Amount Sold</th>
                                            <th>Lease Type</th>
                                            <th>Date Sold</th>
                                            <th> Type</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        <?php
                                            $query="SELECT * FROM view_sold";
                                            $result=mysqli_query($conn,$query);
                                            
                                            while($row=mysqli_fetch_assoc($result)){
                                                $beatName=json_decode($row["item_name"],true);
                                                $leaseType=json_decode($row["item_lease_type"],true);
                                                $Type=json_decode($row["item_type"],true);
                                               $dateSold = $row["date_sold"];
                                                $soldto=$row["sold_to"];
                                                $amountSold=json_decode($row["amount_sold"],true);
                                                // print_r($beatName);
                                                $i=0;
                                                while($i<count($beatName)){
                                                    ?>
                                            <tr class="text-center">
                                          
                                            <td class="checkbox-column text-center"> 1 </td>
                                            <td class="text-center">

                                                <span><?=$beatName[$i];?></span>
                                            </td>
                                           
                                            
                                            <td><?=$soldto;?></td>
                                            
                                            <td>$<?=$amountSold[$i];?></td>
                                            <td><?=$leaseType[$i];?></td>
                                            <td><?=$dateSold;?></td>
                                            <td><?=$Type[$i];?></td>
                                                    </tr>
                                                    <?php
                                                   
                                                    $i++;
                                                }

                                                    ?>
                                                        
                                                    
                                                

                                        

                                                <?php
                                            }
                                        ?>
                                        
                                       
                                        
                                    </tbody>
                                </table>
                            </div>
                                    <?php
                                }else{
                                    ?>
                                    <table id="invoice-list" class="table style-3  table-hover">
                                    <thead>
                                        <tr class="text-center">
                                            <th class="checkbox-column ">S/N</th>
                                            <th class="">Item Name</th>
                                            
                                           
                                            <th class="">Amount Sold</th>
                                            <th>Lease Type</th>
                                            <th>Date Sold</th>
                                          
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        <?php
                                            $query="SELECT * FROM view_sold";
                                            $result=mysqli_query($conn,$query);
                                            
                                            while($row=mysqli_fetch_assoc($result)){
                                                $beatName=json_decode($row["item_name"],true);
                                                $leaseType=json_decode($row["item_lease_type"],true);
                                                $Type=json_decode($row["item_type"],true);
                                               $dateSold = $row["date_sold"];
                                                $soldto=$row["sold_to"];
                                                $amountSold=json_decode($row["amount_sold"],true);
                                                // print_r($beatName);
                                                $i=0;
                                                while($i<count($beatName)){
                                                    ?>
                                            <tr class="text-center">
                                          
                                            <td class="checkbox-column text-center"> 1 </td>
                                            <td class="text-center">

                                                <span><?=$beatName[$i];?></span>
                                            </td>
                                           
                                            
                                          
                                            
                                            <td>$<?=$amountSold[$i];?></td>
                                            <td><?=$leaseType[$i];?></td>
                                            <td><?=$dateSold;?></td>
                                          
                                                    </tr>
                                                    <?php
                                                   
                                                    $i++;
                                                }

                                                    ?>
                                                        
                                                    
                                                

                                        

                                                <?php
                                            }
                                        ?>
                                        
                                       
                                        
                                    </tbody>
                                </table>
                                    <?php
                                }
                            ?>
                        </div>
                    </div>
                </div>
    </div>
    </div>
                                      
<?php
require_once("./includes/footer.php");
?>

<script>
    const deleteButton = document.querySelector(".dt-delete")
    deleteButton.firstChild.innerHTML="Delete all"
    deleteButton.addEventListener("click",()=>{
        const tr = document.querySelector("tr")
        const tbody = document.querySelector("tbody");
        
       
       
       
        
        fetch("./handlers/delete_handler.php?delete_viewbeat").then(e=>e.text()).then(e=>{
            if(e=="true"){
                tbody.innerHTML="<tr><td valign='top' colspan='6' class='dataTables_empty'>No data available in table</td></tr>"
                swal("Deleted","","success");
            }
        })
    })
</script>