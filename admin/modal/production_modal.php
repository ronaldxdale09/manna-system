<div class="modal fade" id="viewProductionDetails" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="receivingViewLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="receivingViewLabel">Product Production Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

               
                <label> Product Name </label> <br>
                <input id='p_name'  class='form-control'
                    style='font-size:20px;border: none;font-weight:bold' readonly>
                <hr>
                <div class="row">
                    <div class="col-sm">
                        <label> Category </label> <br>
                        <input id='p_category' class='form-control'
                            style='font-size:20px;border: none;font-weight:bold' readonly>
                    </div>
                    <div class="col-sm">
                        <label> Current Cost :</label> <br>
                        <input id='p_cost' class='form-control' style='font-size:20px;border: none;font-weight:bold'
                            readonly>
                    </div>
                    <div class="col-sm">
                        <label> Current Price</label> <br>
                        <input id='p_price' name='voucher' class='form-control'
                            style='font-size:20px;border: none;font-weight:bold' readonly>
                    </div>
                </div>

                <br>
               


                <hr>
                <div id='view_prod_history'> </div>
            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Return</button>
            </div>

        </div>
    </div>
</div>