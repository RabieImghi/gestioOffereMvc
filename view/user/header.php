<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>
		JobEase
	</title>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script src="https://code.jquery.com/jquery-3.7.1.min.js" ></script>
	
	<link rel="stylesheet" href="assest/styles/style.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>
  <header style='background: white !important; position: sticky !important ;top: 0 !important;z-index: 1000; ' class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
    <a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
      <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"></use></svg>
    </a>

    <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
      <li><a href="index.php?action=home" class="nav-link " style='color:black;font-weight: bold;'>Home</a></li>
      <li><a href="index.php?action=notification" class="nav-link" style='color:black;font-weight: bold;'>Notification</a></li>
      <li><a href="#" class="nav-link " style='color:black; font-weight: bold;'>Pricing</a></li>
      <li><a href="#" class="nav-link " style='color:black; font-weight: bold;'>FAQs</a></li>
      <li><a href="#" class="nav-link " style='color:black; font-weight: bold;'>About</a></li>
    </ul>

    <div class="col-md-3 text-end">
      <?php 
      if(!isset($_SESSION['roleUser'])){
      ?>
        <a class="btn btn-outline-primary me-2" href="index.php?action=login">Login</a>
      <?php }else{ ?>
        <a class="btn btn-primary" href="index.php?action=logout">logout</a>

      <?php } ?>
    </div>
  </header>
        <?=$content?>
	<footer>
		<p>© 2023 JobEase </p>
	</footer>
</body>
<style>
</style>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</html>