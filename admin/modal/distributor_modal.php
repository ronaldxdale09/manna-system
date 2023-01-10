<div class="modal fade" id="distributorList" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-xl  ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Distributor List</h5>
            </div>
            <div class="modal-body">
                <div class="inventory-table">
                    <div class="row">
                        <form class="col-md-5" method='POST' action='functions/distributor_action.php'>
                            <div class="mb-6">
                                <label for="category" class="form-label">Add Distributor</label>
                                <input type="text" class="form-control" name="name" aria-describedby="category"
                                    required>

                                <label for="category" class="form-label">Contact #</label>
                                <input type="text" class="form-control" name="contact" aria-describedby="category">
                                
                                <label for="category" class="form-label">Address</label>
                                <input type="text" class="form-control" name="address" aria-describedby="category">
                                
                             <br> 
                                <button type="submit" name='add' class="btn btn-success">Add Distributor</button>
                            </div>
                        </form>
                        <div class="col-md-7">

                            <?php
                                            $results  = mysqli_query($con, "SELECT * from distributor_details ORDER BY dis_id ASC "); ?>
                            <table id="expense_category" class="table table-hover" style="width:100%">
                                <thead class="table-dark">
                                    <tr>
                                        <th hidden></th>
                                        <th>Name</th>
                                        <th>Contact</th>
                                        <th>Address</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody style='font-size:15px'>
                                    <?php
                                        $count = 1;
                                        while ($row = mysqli_fetch_array($results)) { 
                                        ?>
                                    <tr>
                                        <td hidden> <?php echo $row['dis_id']?> </td>
                                        <td> <?php echo $row['distributor_name']?> </td>
                                        <td> <?php echo $row['distributor_contact']?> </td>
                                        <td> <?php echo $row['distributor_address']?> </td>
                                        <td>
                                            <button type="button" class="btn btn-info catUpdate"><i
                                                    class="fa fa-edit"></i></button>

                                            <button class="btn btn-danger m-1 btnDelete" type="button"
                                                class="btn btn-info"><i class="fa fa-trash"></i></button>
                                        </td>

                                    </tr>
                                    <?php } ?>
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>




<div class="modal fade" id="createTransaction" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createProductLabel">WALK-IN TRANSACTION</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method='POST' action='functions/newWalkin.php'>
                    <div class="row">

                        <div id="brand" class="form-text mb-3">Click New Transaction to proceed.</div>
                    </div>
            </div>

            <div class="modal-footer">
                <button type="submit" name='add' class="btn btn-success">NEW TRANSACTION</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

            </div>
            </form>
        </div>
    </div>
</div>