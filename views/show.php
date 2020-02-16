<?php
/* @var Controller $this */
require "header.php";
?>



<div class="row-fulid mt-5">
    <div class="col-md-10 offset-lg-1">
        <div class="card">
            <div class="card-header">
                Data Form

                <a href="../index.php?page=start">Entry</a>
                <a href="../index.php?page=show">List</a>
            </div>
            <div class="card-body">
                <table class="table">
                    <tr>
                        <th>Buyer</th>
                        <th>Amount</th>
                        <th>Receipt Id</th>
                        <th>Items</th>
                        <th>Email</th>
                        <th>IP</th>
                        <th>Note</th>
                        <th>City</th>
                        <th>Phone</th>
                        <th>Entry At</th>
                        <th>Entry By</th>
                        <!-- <th>Hash</th> -->
                    </tr>
                    <?php
                    foreach ($this->db->readAll('tbl_data') as $value) :
                    ?>
                        <tr>
                            <td><?php echo $value['buyer']; ?></td>
                            <td><?php echo $value['amount']; ?></td>
                            <td><?php echo $value['receipt_id']; ?></td>
                            <td><?php echo $value['items']; ?></td>
                            <td><?php echo $value['buyer_email']; ?></td>
                            <td><?php echo $value['buyer_ip']; ?></td>
                            <td><?php echo $value['note']; ?></td>
                            <td><?php echo $value['city']; ?></td>
                            <td><?php echo $value['phone']; ?></td>
                            <td><?php echo $value['entry_at']; ?></td>
                            <td><?php echo $value['entry_by']; ?></td>
                            <td><?php //echo $value['hash_key']; 
                                ?></td>
                        </tr>
                    <?php endforeach; ?>

                </table>
            </div>

        </div>
    </div>
</div>















<?php
require "footer.php";
?>