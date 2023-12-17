<?php

foreach($result as $job){
?>
   <article class="postcard light green">
            <a class="postcard__img_link" href="#">
                <img class="postcard__img" style='width:300px' src="assest/uploads/<?=$job['imageURL']?>" alt="Image Title" />
            </a>
            <div class="postcard__text t-dark">
                <h3 class="postcard__title green"><a href="#"><?=$job["title"]?></a></h3>
                <div class="postcard__subtitle small">
                    <time datetime="2020-05-25 12:00:00">
                        <i class="fas fa-calendar-alt mr-2"></i>Mon, May 26th 2023
                    </time>
                </div>
                <div class="postcard__bar"></div>
                <div class="postcard__preview-txt"><?=$job["description"]?></div>
                <ul class="postcard__tagbox">
                    <li class="tag__item"> <img src="assest/img/office-building.png" style='width:20px;margin-right:10px' alt=""><?=$job["entreprise"]?></li>
                    <li class="tag__item"><img src="assest/img/location.png" style='width:20px;margin-right:10px' alt=""><?=$job["location"]?></li>
                    <li class=>
                    <?php
                    if($job["approve"]==1){
                        echo "<span style='color:red'>Already aprouved</span>";
                    }else{
                        if(isset($_SESSION['idUser'])){
                    ?>
                        <form>
                            <button type='button' name='applyOffre'  onclick="addOffer(<?=$job['jobID']?>)" class="btn btn-success">Add Offer</button>   
                        </form>   
                    <?php
                        }else{
                    ?>       
                        <a href="index.php?action=login" class="btn btn-success">Add Offer</a>
                    <?php 
                        }
                    }
                    ?>
                    </li>
                </ul>
            </div>
        </article>
            <style>
            article{
                padding:50px;
                display: flex;
                align-items:center;
                gap:40px;
                background: linear-gradient(to right, #6abdf468, #a0fac5) !important;
            }
            article ul {
                display:flex !important;
                gap:20px;
                align-items:center;
                list-style:none;
                margin-top:20px
            }
            article ul li.tag__item{
                background: white;
                padding:7px;
                border-radius:5px;
            }
            .postcard__text:before{
                background: transparent !important;
            }
        </style>
<?php
}