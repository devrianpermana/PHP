<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php 
foreach($css_files as $file): ?>
	<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
<?php endforeach; ?>
<link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>assets/generic.css">
</head>
<body>
	<img src="<?php echo base_url();?>/assets/uploads/files/isyef-logo.jpg" height="15%" width="15%"/>
	<div class="topnav">
		<a href='<?php echo site_url('main/participants_management')?>'>Peserta</a>
		<a href='<?php echo site_url('main/organizations_management')?>'>Organisasi</a>		
	</div>
    <div style="padding: 10px">
		<?php echo $output; ?>
    </div>
    <?php foreach($js_files as $file): ?>
        <script src="<?php echo $file; ?>"></script>
    <?php endforeach; ?>
	
</body>
</html>
