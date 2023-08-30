<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="apple-touch-icon" sizes="180x180" href="/assets/dist/img/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="/assets/dist/img/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="/assets/dist/img/favicon-16x16.png">

	<title><?= isset($title) ? $title : "Manage Stories"?></title>

	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?=base_url('/assets/plugins/fontawesome-free/css/all.min.css')?>">
	
    <link rel="stylesheet" href="<?=base_url('/assets/css/bootstrap.min.css')?>">

	<link rel="stylesheet" href="<?=base_url('/assets/css/style.css')?>">

	
	<script type="text/javascript">
		var baseUrl = "<?php echo base_url()?>";
	</script>

	<!-- jQuery -->
	<script src="<?=base_url('/assets/js/jquery-3.6.0.min.js')?>"></script>

	<!-- Bootstrap 5.1.3 -->
	<script src="<?=base_url('/assets/js/bootstrap.min.js')?>"></script>

    <!-- DataTables  & Plugins -->
    <script src="<?=base_url('/assets/plugins/datatables/jquery.dataTables.min.js')?>"></script>
    <script src="<?=base_url('/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')?>"></script>
    <script src="<?=base_url('/assets/plugins/datatables-responsive/js/dataTables.responsive.min.js')?>"></script>
	<script src="<?=base_url('/assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')?>"></script>
	<script src="<?=base_url('/assets/plugins/datatables-buttons/js/dataTables.buttons.min.js')?>"></script>
	<script src="<?=base_url('/assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')?>"></script>

    <script src="<?=base_url('/assets/js/global.js')?>"></script>
</head>
<body>
    <div class="header">
        <div class="container-lg">
            <a href="<?=base_url()?>"><img class="header-logo-img" src="<?=base_url('/assets/img/logo.png')?>"></a>
        </div>
        <div class="header-blue-line"></div>
        </div>
    </div>
    <?php
    if(isset($page)) {
        include($page.'.php');
    }
    ?>
    <div class="footer mt-5 pb-5">
        <div class="container-lg">
            <p class="text-center">© 2023-24 400words.org |  <a href="mailto:400wordseditor@gmail.com">Contact</a> | <a href="<?= base_url('/guide')?>">About Us</a>
            <div class="text-center">
                <a href="#"><img class="social-icon" src="<?=base_url('/assets/img/icon-fb.png')?>"></a>
                <a href="#"><img class="social-icon" src="<?=base_url('/assets/img/icon-ig.png')?>"></a>
                <a href="#"><img class="social-icon" src="<?=base_url('/assets/img/icon-rd.png')?>"></a>
                <a href="#"><img class="social-icon" src="<?=base_url('/assets/img/icon-x.png')?>"></a>
                <a href="#"><img class="social-icon" src="<?=base_url('/assets/img/icon-th.png')?>"></a>
            </div>
        </div>
    </div>
</body>
</html>