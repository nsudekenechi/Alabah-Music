    <?php
        require_once('includes/header.php');
        function calcAmount($itemType,$type,$amount){
               
                
            if($itemType==$type){
                return $amount;
            }
        }

        
            $query = "SELECT * FROM view_sold";
            $result = mysqli_query($conn,$query);
            $beatAmount = $sampleAmount = $lyricsAmount =$songAmount = $beatCount = $sampleCount=$lyricsCount = $songCount = 0;
            
            
            while($row=mysqli_fetch_assoc($result)){
                $itemType = json_decode($row["item_type"],true);
                $amount = json_decode($row["amount_sold"],true);
                $i = 0;
                while($i < count($itemType)){
                    
                    $beatAmount += calcAmount($itemType[$i],"beat",$amount[$i],$i);
                    $sampleAmount += calcAmount($itemType[$i],"sample",$amount[$i]);
                    $lyricsAmount += calcAmount($itemType[$i],"lyrics",$amount[$i]);
                    $songAmount += calcAmount($itemType[$i],"song",$amount[$i]);

                    // Storing Number Of Beats
                    $beatCount += calcAmount($itemType[$i],"beat",1);
                    $sampleCount += calcAmount($itemType[$i],"sample",1);
                    $lyricsCount += calcAmount($itemType[$i],"lyrics",1);
                    $songCount += calcAmount($itemType[$i],"song",1);
                    
                    

                    $i++;
                }
                
            }
         
        if($adminRole=="Producer"){
           $query = "SELECT * FROM add_beat";
           $result = mysqli_query($conn,$query);
           $numberofbeats=mysqli_num_rows($result);

           $query = "SELECT * FROM add_sample";
           $result = mysqli_query($conn,$query);
           $numberofsample=mysqli_num_rows($result); 
            
         
           $soldbeats = $beatCount;
           $soldsamples=$sampleCount;
           $beatAmount = $beatAmount;
           $sampleAmount = $sampleAmount;
           $beats="Beats";
           $samples="Samples";
           //Total Amount Made
            $totalamount=number_format($sampleAmount+$beatAmount,2);
            // $percent/=10;

       

            
        }else{
            $query = "SELECT * FROM add_lyrics";
            $result = mysqli_query($conn,$query);
            $numberofbeats=mysqli_num_rows($result);
            
           
           $query = "SELECT * FROM add_song";
           $result = mysqli_query($conn,$query);
           $numberofsample=mysqli_num_rows($result); 

           $soldbeats = $lyricsCount;
           $soldsamples=$songCount;
           $beatAmount = $lyricsAmount;
           $sampleAmount = $sampleAmount;
           $beats="Lyrics";
           $samples="Songs";

          
        }

        
    ?>
        
        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
            
            <div class="layout-px-spacing">

                <div class="row layout-top-spacing">

                   
                   
                    
                    
                    
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                        <div class="widget widget-card-four">
                            <div class="widget-content">
                                <div class="w-header">
                                    <div class="w-info">
                                        <h6 class="value">Total Amount Made</h6>
                                    </div>
                                    <div class="task-action">
                                        <div class="dropdown">
                                            <a class="dropdown-toggle" href="#" role="button" id="pendingTask" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                                            </a>

                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="pendingTask" style="will-change: transform;">
                                                <a class="dropdown-item" href="javascript:void(0);">This Week</a>
                                                <a class="dropdown-item" href="javascript:void(0);">Last Week</a>
                                                <a class="dropdown-item" href="javascript:void(0);">Last Month</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="w-content">

                                    <div class="w-info">
                                        <p class="value">$<?=$totalamount;?> </p>
                                    </div>
                                    
                                </div>

                                <div class="w-progress-stats">                                            
                                    <div class="progress">
                                        <div class="progress-bar bg-gradient-secondary" role="progressbar" style="width: 100%" aria-valuenow="57" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>

                                    
                                    
                                </div>
                            </div>
                        </div>
                    </div>  

                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                        <div class="widget widget-card-four">
                            <div class="widget-content">
                                <div class="w-header">
                                    <div class="w-info">
                                        <h6 class="value">Amount From <?=$beats;?></h6>
                                    </div>
                                    <div class="task-action">
                                        <div class="dropdown">
                                            <a class="dropdown-toggle" href="#" role="button" id="pendingTask" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                                            </a>

                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="pendingTask" style="will-change: transform;">
                                                <a class="dropdown-item" href="javascript:void(0);">This Week</a>
                                                <a class="dropdown-item" href="javascript:void(0);">Last Week</a>
                                                <a class="dropdown-item" href="javascript:void(0);">Last Month</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="w-content">

                                    <div class="w-info">
                                        <p class="value">$<?=number_format($beatAmount,2);?> </p>
                                    </div>
                                    
                                </div>

                                <div class="w-progress-stats">                                            
                                    <div class="progress">
                                        <div class="progress-bar bg-gradient-secondary" role="progressbar" style="width: 100%" aria-valuenow="57" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                 </div>
                            </div>
                        </div>
                    </div>  
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                        <div class="widget widget-card-four">
                            <div class="widget-content">
                                <div class="w-header">
                                    <div class="w-info">
                                        <h6 class="value">Amount From <?=$samples;?></h6>
                                    </div>
                                    <div class="task-action">
                                        <div class="dropdown">
                                            <a class="dropdown-toggle" href="#" role="button" id="pendingTask" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                                            </a>

                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="pendingTask" style="will-change: transform;">
                                                <a class="dropdown-item" href="javascript:void(0);">This Week</a>
                                                <a class="dropdown-item" href="javascript:void(0);">Last Week</a>
                                                <a class="dropdown-item" href="javascript:void(0);">Last Month</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="w-content">

                                    <div class="w-info">
                                        <p class="value">$<?=number_format($sampleAmount,2);?> </p>
                                    </div>
                                    
                                </div>

                                <div class="w-progress-stats">                                            
                                    <div class="progress">
                                        <div class="progress-bar bg-gradient-secondary" role="progressbar" style="width: 100%" aria-valuenow="57" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>

                                    
                                    
                                </div>
                            </div>
                        </div>
                    </div>

                   
                   

                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="row widget-statistic">
                            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-4 col-12 layout-spacing">
                                <div class="widget widget-one_hybrid widget-followers">
                                    <div class="widget-heading">
                                        <div class="w-title">
                                            <div class="w-icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                                            </div>
                                            <div class="">
                                                <p class="w-value"><?=$numberofbeats?></p>
                                                <h5 class="">Uploaded <?=$beats;?></h5>
                                            </div>
                                        </div>
                                    </div>
                                   
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-4 col-12 layout-spacing">
                                <div class="widget widget-one_hybrid widget-referral">
                                    <div class="widget-heading">
                                        <div class="w-title">
                                            <div class="w-icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-link"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"></path><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"></path></svg>
                                            </div>
                                            <div class="">
                                                <p class="w-value"><?=$soldbeats;?></p>
                                                <h5 class="">Sold <?=$beats;?></h5>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-4 col-12 layout-spacing">
                                <div class="widget widget-one_hybrid widget-engagement">
                                    <div class="widget-heading">
                                        <div class="w-title">
                                            <div class="w-icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-circle"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path></svg>
                                            </div>
                                            <div class="">
                                                <p class="w-value"><?=$numberofsample?></p>
                                                <h5 class="">Uploaded <?=$samples;?></h5>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>

                            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-4 col-12 layout-spacing">
                                <div class="widget widget-one_hybrid widget-engagement">
                                    <div class="widget-heading">
                                        <div class="w-title">
                                            <div class="w-icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-circle"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path></svg>
                                            </div>
                                            <div class="">
                                                <p class="w-value"><?=$soldsamples;?></p>
                                                <h5 class="">Sold <?=$samples;?></h5>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                        <div class="widget widget-five">

                            <div class="widget-heading">

                                <a href="javascript:void(0)" class="task-info">

                                    <div class="usr-avatar">
                                        <span>FD</span>
                                    </div>

                                    <div class="w-title">

                                        <h5>Figma Design</h5>
                                        <span>Design Reset</span>
                                        
                                    </div>

                                </a>

                                <div class="task-action">
                                    <div class="dropdown">
                                        <a class="dropdown-toggle" href="#" role="button" id="pendingTask" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="pendingTask" style="will-change: transform;">
                                            <a class="dropdown-item" href="javascript:void(0);">View Project</a>
                                            <a class="dropdown-item" href="javascript:void(0);">Edit Project</a>
                                            <a class="dropdown-item" href="javascript:void(0);">Mark as Done</a>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            
                            
                            <div class="widget-content">

                                <p>Doloribus nisi vel suscipit modi, optio ex repudiandae voluptatibus officiis commodi. Nesciunt quas aut neque incidunt!</p>

                                <div class="progress-data">

                                    <div class="progress-info">
                                        <div class="task-count"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-square"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg><p>5 Tasks</p></div>
                                        <div class="progress-stats"><p>86.2%</p></div>
                                    </div>
                                    
                                    <div class="progress">
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 65%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    
                                </div>

                                <div class="meta-info">

                                    <div class="due-time">
                                        <p><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-clock"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg> 3 Days Left</p>
                                    </div>
                                    

                                    <div class="avatar--group">

                                        <div class="avatar translateY-axis more-group">
                                            <span class="avatar-title">+6</span>
                                        </div>
                                        <div class="avatar translateY-axis">
                                            <img alt="avatar" src="assets/img/90x90.jpg"/>
                                        </div>
                                        <div class="avatar translateY-axis">
                                            <img alt="avatar" src="assets/img/90x90.jpg"/>
                                        </div>
                                        <div class="avatar translateY-axis">
                                            <img alt="avatar" src="assets/img/90x90.jpg"/>
                                        </div>
                                        
                                    </div>

                                </div>
                                
                                
                            </div>

                        </div>

                    </div>

                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                        <div class="widget widget-card-one">
                            <div class="widget-content">

                                <div class="media">
                                    <div class="w-img">
                                        <img src="assets/img/90x90.jpg" alt="avatar">
                                    </div>
                                    <div class="media-body">
                                        <h6>Jimmy Turner</h6>
                                        <p class="meta-date-time">Monday, Nov 18</p>
                                    </div>
                                </div>

                                <p>"Duis aute irure dolor" in reprehenderit in voluptate velit esse cillum "dolore eu fugiat" nulla pariatur. Excepteur sint occaecat cupidatat non proident.</p>

                                <div class="w-action">
                                    <div class="card-like">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-thumbs-up"><path d="M14 9V5a3 3 0 0 0-3-3l-4 9v11h11.28a2 2 0 0 0 2-1.7l1.38-9a2 2 0 0 0-2-2.3zM7 22H4a2 2 0 0 1-2-2v-7a2 2 0 0 1 2-2h3"></path></svg>
                                        <span>551 Likes</span>
                                    </div>

                                    <div class="read-more">
                                        <a href="javascript:void(0);">Read More <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevrons-right"><polyline points="13 17 18 12 13 7"></polyline><polyline points="6 17 11 12 6 7"></polyline></svg></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                        <div class="widget widget-card-two">
                            <div class="widget-content">

                                <div class="media">
                                    <div class="w-img">
                                        <img src="assets/img/90x90.jpg" alt="avatar">
                                    </div>
                                    <div class="media-body">
                                        <h6>Dev Summit - New York</h6>
                                        <p class="meta-date-time">Bronx, NY</p>
                                    </div>
                                </div>

                                <div class="card-bottom-section">
                                    <h5>4 Members Going</h5>
                                    <div class="img-group">
                                        <img src="assets/img/90x90.jpg" alt="avatar">
                                        <img src="assets/img/90x90.jpg" alt="avatar">
                                        <img src="assets/img/90x90.jpg" alt="avatar">
                                        <img src="assets/img/90x90.jpg" alt="avatar">
                                    </div>
                                    <a href="javascript:void(0);" class="btn">View Details</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
        <!--  END CONTENT AREA  -->
<?php
    require_once('includes/footer.php');
?>
  