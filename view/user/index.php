<?php
ob_start();
?>
<section action="#" method="get" class="search">
    <h2>Find Your Dream Job</h2>
    <form class="form-inline">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon3">Search by Title Job</span>
            </div>
            <input type="text" class="form-control" id='title' onkeyup="search('title')" aria-describedby="basic-addon3">
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon3">Search by Location Job</span>
            </div>
            <input type="text" class="form-control"  id='location' onkeyup="search('location')" aria-describedby="basic-addon3">
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon3">Search by Entreprise Job</span>
            </div>
            <input type="text" class="form-control" id='entreprise' onkeyup="search('entreprise')" aria-describedby="basic-addon3">
        </div>
        <!-- <button type="submit" class="btn btn-primary mb-2">Search</button> -->
    </form>
</section>
   
<section >
    <h2 class="text-center py-3">Latest Job Listings</h2>
    <div class="container py-2 gridArticle" id="articles">
        <?php
        foreach($listJobs as $job){
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
        <?php
        }
        ?>
    </div>
</section>
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
<script>
    function addOffer(idOffer){
        var xml = new XMLHttpRequest();
        xml.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                if(xml.responseText=="ok"){
                    Swal.fire({
                        position: "top-end",
                        icon: "success",
                        title: "You have Apply this Offer with Succes",
                        showConfirmButton: false,
                        timer: 1500
                    });
                }else{
                    Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: "Errore ! You have Already Apply this Offer",
                    });
                    
                }
                // console.log(xml.responseText);
            }
        };
        let url = "index.php?applyOffre="+idOffer+"&action=addOffer";
        xml.open("GET", url, true);
        xml.send();
    }
    function search(typeSearch){
        let input = document.getElementById(typeSearch);
        let url = "index.php?value="+input.value+"&type="+typeSearch+"&action=searchJob";
        let xml = new XMLHttpRequest();
        xml.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("articles").innerHTML=xml.responseText;
            }
        };
        xml.open("GET", url, true);
        xml.send();
    }
</script> 
<?php
$content=ob_get_clean();
include 'header.php'
?>
