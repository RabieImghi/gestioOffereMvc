<?php
ob_start();
?>
<section action="#" method="get" class="search">
    <h2>Find Your Dream Job</h2>
    <form class="form-inline">
        <div class="form-group mb-2">
            <input type="text" id='title' onkeyup="search('title')" name="keywords" placeholder="Keywords">
        </div>
        <div class="form-group mx-sm-3 mb-2">
            <input type="text" id='location' onkeyup="search('location')" name="company" placeholder="Location">
        </div>
        <div class="form-group mx-sm-3 mb-2">
            <input type="text"  id='entreprise' onkeyup="search('entreprise')" name="location" placeholder="Company">
        </div>
        <!-- <button type="submit" class="btn btn-primary mb-2">Search</button> -->
    </form>
    <script>
        
    </script>
</section>

<section class="light">
    <h2 class="text-center py-3">Latest Job Listings</h2>
    <div class="container py-2" id="articles">
        <?php
        foreach($listJobs as $job){
        ?>
        <article class="postcard light green">
            <a class="postcard__img_link" href="#">
                <img class="postcard__img" src="assest/uploads/<?=$job['imageURL']?>" alt="Image Title" />
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
                    <li class="tag__item">Enreprise : <?=$job["entreprise"]?></li>
                    <li class="tag__item">Location : <?=$job["location"]?></li>
                    <li class="tag__item play green">
                        <?php
                        if($job["approve"]==1){
                            echo "<span style='color:red'>Already aprouved</span>";
                        }else{
                            if(isset($_SESSION['idUser'])){
                        ?>
                            <form >
                                <button type='button' name='applyOffre'  onclick="addOffer(<?=$job['jobID']?>)" class="btn btn-success">Add Offer</button>   
                            </form>    
                            
                            <?php
                            }else{
                            ?>       
                            <a href="index.php?action=login" class="btn btn-success">Add Offer</a>
                            <?php } ?>
                        <?php
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