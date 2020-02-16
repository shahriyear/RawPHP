<?php
/* @var Controller $this */
require "header.php";
?>



<div class="row-fulid mt-5">
    <div class="col-md-10 offset-lg-1">
        <div class="card">
            <div class="card-header">
                Data Form

                <a class="btn btn-sm btn-info float-right" href="../index.php?page=start">Entry</a>

            </div>
            <div class="card-body">
                <table class="table" id="myTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>ID</th>
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
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        foreach ($this->db->readAll('tbl_data') as $value) :
                        ?>
                            <tr>
                                <td><?php echo $i++ ?></td>
                                <td><?php echo $value['id']; ?></td>
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
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>










<script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
</script>




<?php
require "footer.php";
?>