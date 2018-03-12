
<?php

for ($i=1; $i < 3; $i++) { 
	echo $i."<br>";
}
echo '<br>';
	$connection = mysqli_connect("localhost", "root", "", "ams_semifinal_db");

	$sql = "SELECT * FROM `ams_r_asset_library` WHERE AL_ID IN(1,2,3)";

    $result = mysqli_query($connection, $sql) or die("Bad Query: $sql");

    $i = 0;

    while($row = mysqli_fetch_assoc($result))
    {
        $i++;
        $a_id = $row['AL_ID'];
        echo $a_id.'<br>';
    }

?>