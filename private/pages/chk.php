<?php
require "message.php";
require "rdt.php";
$name=$_POST['name'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$message=$_POST['message'];
$submit=$_POST['submit'];

if(isset($submit)){
    $response=registerUser($name,$email,$phone,$message);
}
    ?>
		<script>
				alert('<?= $response ?>');

		</script>

<?php
red();
?>
