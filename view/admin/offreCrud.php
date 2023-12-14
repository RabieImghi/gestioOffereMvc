<?php
require_once "Autoloader.php";
if(isset($_SESSION['roleUser']) && $_SESSION['roleUser']==1){

ob_start();
?>
<section class="Agents px-4">
    <button data-bs-toggle="modal" data-bs-target="#addOffer" class="btn btn-success  mb-4 me-4"> Add Offer</button>                
    <table class="agent table align-middle bg-white">
        <thead class="bg-light">
            <tr>
                <th>Image</th>
                <th>Title</th>
                <th>description</th>
                <th>entreprise</th>
                <th>location</th>
                <th>Is Active</th>
                <th>Is Approve</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $indic=0;
            foreach($listJobs as $job){
            ?>
            <tr class="freelancer">
                <td>
                    <div class="d-flex align-items-center">
                        <img src="assest/uploads/<?=$job['imageURL']?>" alt=""
                            style="width: 45px; height: 45px" class="rounded-circle" />
                    </div>
                </td>
                <td>
                    <div class="">
                        <p class="fw-bold mb-1 f_name"><?=$job['title'] ?></p>
                    </div>
                </td>
                <td>
                    <p class="fw-normal mb-1 f_title"><?=$job['description'] ?> </p>
                </td>
                <td>
                    <p class="fw-normal mb-1 f_title"><?=$job['entreprise'] ?> </p>
                </td>
                <td>
                    <p class="fw-normal mb-1 f_title"><?=$job['location'] ?> </p>
                </td>
                <td class="f_position"><?php echo ($job['IsActive']==1)? "Active":"In Active"; ?> </td>
                <td class="f_position"><?php echo ($job['approve']==1)? "Aprouve":"In Aprouve"; ?> </td>
                <td>
                    <a href="index.php?deletJob=<?=$job['jobID']?>&action=deletJob"><img class="delet_user" src="assest/img/user-x.svg" alt=""></a>
                    <img class="ms-2 edit" data-bs-toggle="modal" data-bs-target="#edit<?=$indic?>" src="assest/img/edit.svg" alt="">
                </td>
                <div class="modal fade" id="edit<?=$indic?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog  modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form id="forms" method='POST' action="index.php">
                                    <div class="row mb-4">
                                        <div class="">
                                            <input placeholder="Title" value='<?=$job['title']?>' type="text" name='title'   class="form-control first_name" >
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="">
                                            <input placeholder="Description" value='<?=$job['description']?>' type="text" name='description'  class="form-control first_name" >
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="">
                                            <input placeholder="Entreprise" value='<?=$job['entreprise']?>' type="text" name='entreprise'  class="form-control first_name" >
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="">
                                            <input placeholder="Location" value='<?=$job['location']?>' type="text" name='location'  class="form-control first_name" >
                                        </div>
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label" >Active / In Active</label>
                                        <select name="IsActive" class="form-control email" id="">
                                            <?php
                                            
                                            for($i=0;$i<count($tempActiveTable);$i++){
                                            ?>
                                            <option value="<?=$i?>" <?php echo ($i==$job['IsActive'])? 'selected':'' ?>><?=$tempActiveTable[$i]?></option>
                                            <?php 
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label" >Approve / In Approve</label>
                                        <select name="approve" class="form-control email" id="">
                                            <?php
                                            for($i=0;$i<count($tempAprouveTable);$i++){
                                            ?>
                                            <option value="<?=$i?>" <?php echo ($i==$job['approve'])? 'selected':'' ?>><?=$tempAprouveTable[$i]?></option>
                                            <?php 
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <input type="hidden" name="id_Jobs" value='<?=$job['jobID']?>'>
                                    <div class="d-flex w-100 justify-content-center">
                                        <input type="submit" name='submit' value='updateJobs' value='Save Edit' class="btn btn-success  mb-4 me-4">
                                        <button class="btn btn-danger btn-block mb-4 " data-bs-dismiss="modal">Annuler</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </tr>
            <?php
            $indic++;
            }
            ?>
        </tbody>
    </table>

    
</section>
<div class="modal fade" id="addOffer" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="forms" method='POST' enctype="multipart/form-data" action="../Controller/controller.php">
                    <div class="row mb-4">
                        <div class="">
                            <input  type="file" name='photo'   class="form-control first_name" >
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="">
                            <input placeholder="Title" type="text" name='title'   class="form-control first_name" >
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="">
                            <input placeholder="Description" type="text" name='description'  class="form-control first_name" >
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="">
                            <input placeholder="Entreprise" type="text" name='entreprise'  class="form-control first_name" >
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="">
                            <input placeholder="Location" type="text" name='location'  class="form-control first_name" >
                        </div>
                    </div>
                    <div class="mb-4">
                        <label class="form-label" >Role User</label>
                        <select name="IsActive" class="form-control email" id="">
                            <option value="0">Is Active</option>
                            <option value="1">Inactive</option>
                        
                        </select>
                    </div>
                    <div class="mb-4">
                        <label class="form-label" >Role User</label>
                        <select name="approve" class="form-control email" id="">
                            <option value="0">Is Approve</option>
                            <option value="1">Inapprove</option>
                        </select>
                    </div>
                    <div class="d-flex w-100 justify-content-center">
                        <button type="submit" name='addOffer' value='' class="btn btn-success  mb-4 me-4">Add</button>
                        <button class="btn btn-danger btn-block mb-4 " data-bs-dismiss="modal">Annuler</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>       
<?php
$content=ob_get_clean();
include 'header.php';
}
?>