<?php
require_once "Autoloader.php";
if(isset($_SESSION['roleUser']) && $_SESSION['roleUser']==1){

ob_start();
?>
<section class="Agents px-4">
    <table class="agent table align-middle bg-white" style="min-width: 700px;">
        <thead class="bg-light">
            <tr>
                <th>Name Candidat</th>
                <th>Name Offer</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($listApplyOnline as $ApplyOnline ){
            ?>
            
            <tr class="freelancer">
                <td>
                    <div class="d-flex align-items-center">
                        
                        <div class="ms-3">
                            <p class="fw-bold mb-1 f_name"><?=$ApplyOnline["username"]?></p>
                        </div>
                    </div>
                </td>
                <td>
                    <p class="fw-normal mb-1 f_title"><?=$ApplyOnline["title"]?></p>
                </td>
                <td>
                    <p class="fw-normal mb-1 f_title"><?=$ApplyOnline["description"]?></p>
                </td>
                <td class="">
                    <form action="index.php" method="POST">
                        <input type="hidden" value='<?=$ApplyOnline["ApplyOnlineID"]?>' name='idOffer'>
                        <button type="submit" name='submit' value='aprouve' class="btn btn-success">Apouve</button>
                        <button type="submit" name='submit' value='decline' class="btn btn-danger">Decline</button>
                    </form>
                </td>
            </tr>
            <?php      
                }
            ?>
        </tbody>
    </table>


</section>
<?php
$content=ob_get_clean();
include 'header.php';
}
?>