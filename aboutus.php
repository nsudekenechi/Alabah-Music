<?php

$title="About us";
require("./includes/header.php");
$team=[
    [
        "name"=>"Ubasinachi Ugwu",
        "position"=>"CEO",
        "img"=>"PG.jpeg",
        "socials"=> ["facebook"=>"puffygreen",
        "twitter"=>"greendfishermen",
        "instagram"=>"puffygreen247"
        ]
    ],
    [
        "name"=>"Nsude Kenechi",
        "position"=>"Music Producer",
        "img"=>"Alabah.jpg",
        "socials"=> ["facebook"=>"Nsude Kenechi",
        "twitter"=>"1alabah",
        "instagram"=>"only1alabah"
        ]
    ],
]
?>

<main class="main-content">
    <div class="breadcrumb-area breadcrumb-height" data-bg-image="assets/images/breadcrumb/bg/1-1-1919x388.jpg">
        <div class="container h-100">
            <div class="row h-100">
                <div class="col-lg-12">
                    <div class="breadcrumb-item">
                        <h1 class="breadcrumb-heading">About Us</h1>
                        <ul>
                            <li>
                                <a href="./index.php">Home</a>
                            </li>
                            <li>About Us</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="about-area section-space-top-95">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="about-content">
                        <h2 class="about-title">Our <span>Story</span></h2>
                        <p class="about-desc">Dopemind studios, is a team of amazing arts, here in Enugu, Nigeria. Arts
                            ranging from music producers, song writers, lyricists, and lots more, Our production style
                            cuts across so many genres, Afropop, Afrohouse, Reggae, Pop, just to mention a few, Our song
                            writers and lyricists have such amazing talents laced with hot punchy lyrics, that will make
                            every listener turn their necks at the sound of their songs.</p>

                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="about-content">
                        <h2 class="about-title">Why <span>Choose us?</span></h2>
                        <p class="about-desc">Here at Dopemind studios we understand how creativity can be difficult for
                            individual artists,For this reason our team came together to put their gifts, hearts and
                            souls in other to strategize ways to create great master pieces and put this out so everyone
                            can become an amazing art</p>

                    </div>
                </div>
            </div>
        </div>
    </div>





    <div class="team-area section-space-top-100">
        <div class="container">
            <div class="section-title-wrap without-tab">
                <h2 class="section-title">Meet The Team</h2>

            </div>
            <div class="row">

                <?php
            foreach ($team as $item) {
                ?>
                <div class="col-lg-3 col-sm-6 pt-sm-5">
                    <div class="team-item">
                        <div class="team-img">
                            <img src="./Img/<?=$item["img"];?>"
                                alt="Ugwu Ubasinachi" style="border-radius:10px;">
                            <div class="inner-content">
                                <h2 class="team-member-name">
                                    <?=$item["name"];?>

                                </h2>
                                <span
                                    class="occupation"><?=$item["position"];?></span>
                                <div class="social-link with-border">
                                    <ul>
                                        <li>
                                            <a href="https://www.facebook.com/<?=$item["socials"]["facebook"];?>"
                                                data-tippy="Facebook" data-tippy-inertia="true"
                                                data-tippy-animation="shift-away" data-tippy-delay="50"
                                                data-tippy-arrow="true" data-tippy-theme="sharpborder" target="_blank">
                                                <i class="fa fa-facebook"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="https://www.twitter.com/<?=$item["socials"]["twitter"];?>"
                                                data-tippy="Twitter" data-tippy-inertia="true"
                                                data-tippy-animation="shift-away" data-tippy-delay="50"
                                                data-tippy-arrow="true" data-tippy-theme="sharpborder" target="_blank">
                                                <i class="fa fa-twitter"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="https://www.instagram.com/<?=$item["socials"]["instagram"];?>"
                                                data-tippy="Instagram" data-tippy-inertia="true"
                                                data-tippy-animation="shift-away" data-tippy-delay="50"
                                                data-tippy-arrow="true" data-tippy-theme="sharpborder" target="_blank">
                                                <i class="fa fa-instagram"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="team-content">
                            <h2 class="team-member-name mb-0">
                                <?=$item["name"];?>
                            </h2>
                        </div>
                    </div>

                </div>
                <?php
            }
?>




            </div>
        </div>
    </div>


</main>

<?php
require("./includes/footer.php");
?>