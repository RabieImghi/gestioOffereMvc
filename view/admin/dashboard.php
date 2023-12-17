<?php
require_once "Autoloader.php";
if(isset($_SESSION['roleUser']) && $_SESSION['roleUser']==1){
    $home=3;
ob_start();
?>
<section class="overview">
    <div class="row p-4">
        <div class="col-xl-3 col-sm-6 col-12 mb-4">
            <div class="card">
                <div class="card-body  p-4">
                    <div class="d-flex justify-content-between px-md-1">
                        <div>
                            <p class="mb-0">Offres</p>
                            <div class="mt-4">
                                <h3><strong>
                                    <?php
                                    echo $res1["totalJobs"];
                                    ?>
                                </strong></h3>
                                
                            </div>
                        </div>
                        <div class="cursor">
                            <img src="assest/img/project-icon-1.svg" alt="icon">
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 col-12 mb-4">
            <div class="card">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between px-md-1">
                        <div>
                            <p class="mb-0">Active Offres</p>
                            <div class="mt-4">
                                <h3><strong>
                                <?php
                                    
                                    echo $res2["totalJobsActInact"];
                                    ?>
                                </strong></h3>
                                
                            </div>
                        </div>
                        <div class="">
                            <img src="assest/img/project-icon-1.svg" alt="icon">
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 col-12 mb-4">
            <div class="card">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between px-md-1">
                        <div>
                            <p class="mb-0">InaActive Offres</p>
                            <div class="mt-4">
                                <h3><strong>
                                <?php
                                    
                                    echo $res3["totalJobsActInact"];
                                    ?>
                                </strong></h3>
                                
                            </div>
                        </div>
                        <div class="">
                            <img src="assest/img/project-icon-1.svg" alt="icon">
                        </div>
                    </div>

                </div>
            </div>
        </div>
        
        <div class="col-xl-3 col-sm-6 col-12 mb-4">
            <div class="card">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between px-md-1">
                        <div>
                            <p class="mb-0">Aprouve Offres</p>
                            <div class="mt-4">
                                <h3><strong>
                                <?php
                                    
                                    echo $res4["Jobapprove"];
                                    ?>
                                </strong></h3>
                                
                            </div>
                        </div>
                        <div class="">
                        <img src="assest/img/project-icon-4.svg" alt="icon">
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

<div class="px-4">
    <div class="card mb-3">
        <div class="row g-0 px-2">
            <div class="col-xl-8 col-md-12 col-sm-12 col-12 p-4 ">
                <div>
                    <h4>Today’s trends</h4>
                    <p>as of 27 oct 2023, 22:48 PM</p>
                </div>
                <div class="w-100" id="chart">
                </div>
            </div>

        </div>
    </div>
</div>

<div class="px-4 row">
    <div class="col-xl-6 col-md-12 col-sm-12 col-12 ">
        <div class="card">
            <div class="row p-4">
                <div class="col">
                    <p class="title">Unresolved Offres</p>
                    <p><span>Group:</span> Support</p>
                </div>
                <a class="col d-flex justify-content-end fw-medium" href="#">View details</a>

            </div>
            
            </div>
        </div>
    </div>
</div>
<?php
$content=ob_get_clean();
include 'header.php';
}
?>