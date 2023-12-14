<?php
if(isset($_SESSION['roleUser']) && $_SESSION['roleUser']==1){
	header("locaton:dashboard/dashboard.php");
}
ob_start();
?>
<!--------------------------  card  --------------------->
<section class="light">
	<div class='m-4 p-4'>
		<?php
		if(isset($_SESSION['idUser'])){
			foreach($jobsNotif as $notif){
				if($notif['notification']==1){
			?>
				<div class="alert alert-success mb-4" id='<?=$notif['ApplyOnlineID']?>' role="alert">
					Congradulation <?=$notif['username']?> ! your Offer Job <?=$notif['title']?> On <?=$notif['entreprise']?> Is accepted.
				</div>

			<?php
				}
			}
		}
		?>
	</div>
</section>
<?php
$content=ob_get_clean();
include 'header.php'
?>