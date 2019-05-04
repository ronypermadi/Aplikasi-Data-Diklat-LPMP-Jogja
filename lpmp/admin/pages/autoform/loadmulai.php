<?php
require "../../functions/db.php";
include "../../functions/lpmp.php";

$load_mulai = load_mulai();   
    
    while($row=mysqli_fetch_array($load_mulai)){?>

        <option value="<?php echo $row["kode_diklat"] ?>"><?php echo list_tanggal($row['mulai']); ?></option><br>
   
    <?php
    }
    ?>
