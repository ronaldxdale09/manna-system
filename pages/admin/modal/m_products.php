<!-- Modal -->
<div class="modal fade" id="addItem" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">ADD PRODUCT</h5>
                <button type="button" class="btn" data-bs-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="card">
                            <form name="upload" method="post" action="../../function/admin/addProduct.php" enctype="multipart/form-data"
                                accept-charset="utf-8">
                                <div class="row">
                                    <div class="col-md-12 col-md-offset-3 center">
                                        <div class="btn-container">
                                            <!--the three icons: default, ok file (img), error file (not an img)-->
                                            <h1 class="imgupload"><i class="fa fa-file-image-o"></i></h1>
                                            <br>
                                            <img id="image_prod" src="#" />
                                            <!--this field changes dinamically displaying the filename we are trying to upload-->
                                            <p id="namefile">Only pics allowed! (jpg,jpeg,bmp,png)</p>
                                            <!--our custom btn which which stays under the actual one-->
                                            <button type="button" id="btnup" class="btn btn-primary btn-lg">Browse for
                                                your
                                                pic!</button>
                                            <!--this is the actual file input, is set with opacity=0 beacause we wanna see our custom one-->
                                            <input type="file" value="" accept="image/*" capture="camera" name="uploadfile" required
                                                id="fileup" onchange="readURL(this);">
                                        </div>
                                    </div>
                                </div>
                                <!--additional fields-->


                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-md-12">Barcode</label>
                                    <div class="col-md-12">
                                        <input type="text" name='barcode' id='barcode'
                                            class="form-control form-control-line" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-md-12">Product Name</label>
                                    <div class="col-md-12">
                                        <input type="text" name='name' id='name' class="form-control form-control-line" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <!--  -->
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-md-12">Size</label>
                                    <div class="col-md-12">
                                        <input type="number" name='size' id='size'
                                            class="form-control form-control-line" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-md-12">Packing Case</label>
                                    <div class="col-md-12">
                                        <input type="number" name='packing' id='packing'
                                            class="form-control form-control-line" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>


                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-md-12">Quantity</label>
                                    <div class="col-md-12">
                                        <input type="text" name='quantity' id='quantity'
                                            class="form-control form-control-line" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-md-12">Price</label>
                                    <div class="col-md-12">
                                        <input type="text" name='price' id='price'
                                            class="form-control form-control-line" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" name='add' class="btn btn-primary">ADD</button>
            </div>
            </form>
        </div>
    </div>
</div>

<script>
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            $('#image_prod')
                .attr('src', e.target.result)
                .width(200)
                .height(200);
        };

        reader.readAsDataURL(input.files[0]);
    }
}
</script>