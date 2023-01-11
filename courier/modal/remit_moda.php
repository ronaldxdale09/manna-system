

<div class="modal fade" id="promptRemit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="receivingViewLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="receivingViewLabel">Remit Cash</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">


                <div class="row">
                    <div class="col-sm">
                        <label> Rider Name </label> <br>
                        <input id='p_name' value='<?php echo $rider_name?>' class='form-control'
                            style='font-size:25px;border: none;font-weight:bold;text-align:center' readonly>
                    </div>

                    <div class="col-sm">
                        <label> Rider ID</label> <br>
                        <input id='p_category' class='form-control' value='#<?php echo $courier_id?>'
                            style='font-size:25px;border: none;font-weight:bold;text-align:center' readonly>
                    </div>
                </div>
                <hr>


                <div class="row">
                    <div class="col-sm">
                        <label>Date </label> <br>
                        <input class='form-control' value='<?php echo $dateNow?>'
                            style='font-size:25px;border: none;font-weight:bold;text-align:center' readonly>
                    </div>

                    <div class="col-sm">
                        <label> Total Amount Delivered Today</label> <br>
                        <input id='p_category' class='form-control'
                            value="₱ <?php number_format($total_amount); ?>"
                            style='font-size:25px;border: none;font-weight:bold;text-align:center' readonly>
                    </div>
                </div>
                <hr>

                <div class="row">
                    <div class="col-sm">
                        <label>Cash on Hand </label> <br>
                        <input class='form-control' value="₱ <?php number_format($arr['total_cash_onhand']); ?>"
                            style='font-size:30px;border: none;font-weight:bold;text-align:center' readonly>
                    </div>

                    <div class="col-sm">
                        <label>Cash Remit</label> <br>
                        <input id='p_category' class='form-control' value='₱ '
                            style='font-size:30px;font-weight:bold;text-align:center'>
                    </div>
                </div>

                <hr>
                <label>Remaining Cash on Hand</label> <br>
                <input id='p_category' class='form-control' value='₱'
                    style='font-size:35px;border: none;font-weight:bold;text-align:center' readonly>





            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Return</button>
            </div>

        </div>
    </div>
</div>