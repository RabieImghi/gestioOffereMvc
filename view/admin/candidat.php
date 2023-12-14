<?php
require_once "Autoloader.php";
if(isset($_SESSION['roleUser']) && $_SESSION['roleUser']==1){
ob_start();
?>
<section class="Agents px-4">
    <table class="agent table align-middle bg-white">
        <thead class="bg-light">
            <tr>
                <th>Name</th>
                <th>Title</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $indic=0;
            foreach($listUsers as $users){
            ?>
            <tr class="freelancer">
                <td>
                    <div class="d-flex align-items-center">
                        <img src="https://mdbootstrap.com/img/new/avatars/8.jpg" alt=""
                            style="width: 45px; height: 45px" class="rounded-circle" />
                        <div class="ms-3">
                            <p class="fw-bold mb-1 f_name"><?=$users['username'] ?></p>
                        </div>
                    </div>
                </td>
                <td>
                    <p class="fw-normal mb-1 f_title"><?=$users['email'] ?> </p>
                    
                </td>
                <td class="f_position"><?php echo ($users['roleuserID']==1)? "admin":"user"; ?> </td>
                <td>
                    <a href="../Controller/controller.php?deletUser=<?=$users['userID']?>"><img class="delet_user" src="assest/img/user-x.svg" alt=""></a>
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
                                <form  method='POST' action="index.php">
                                    <div class="row mb-4">
                                        <div class="">
                                            <label class="form-label" >First name</label>
                                            <input type="text" name='name' value='<?=$users['username'] ?>' class="form-control first_name" >
                                        </div>
                                    </div>
                                
                                    <div class="mb-4">
                                        <label class="form-label" >Email</label>
                                        <input type="text" name='email' value='<?=$users['email']?>' class="form-control email" >
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label" >Role User</label>
                                        <select name="roleuserID" class="form-control email" id="">
                                            <?php
                                            foreach($RoleUsers as $RoleUser){
                                            ?>
                                            <option value="<?=$RoleUser['roleuserID']?>" <?php echo ($RoleUser['roleuserID']==$users['roleuserID'])?"selected":""; ?>><?=$RoleUser['name']?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <input type="hidden" name="id_user" value='<?=$users['userID']?>'>
                                    <div class="d-flex w-100 justify-content-center">
                                        <button type="submit" name="submit" value='updateUser' class="btn btn-success  mb-4 me-4">Save Edit</button>
                                        <button class="btn btn-danger " data-bs-dismiss="modal">Annuler</button>
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
<?php
$content=ob_get_clean();
include 'header.php';
}
?>