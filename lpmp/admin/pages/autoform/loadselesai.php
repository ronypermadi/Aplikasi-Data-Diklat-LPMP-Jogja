<?php
require "../../functions/db.php";
include "../../functions/lpmp.php";

$load_selesai = load_selesai();   
    
    while($row=mysqli_fetch_array($load_selesai)){?>

        <option value="<?php echo $row["kode_diklat"] ?>"><?php echo list_tanggal($row['selesai']); ?></option><br>
   
    <?php
    }
    ?>