<?php 
session_start();
if(!isset($_SESSION['admin_id'])){
  header('location:../log/signin.php');
}
 ?>
<!DOCTYPE html>
<html>

<?php include 'head.php' ?>

<body style="background-color: white">
    <div class="wrapper">


        <nav class="sidenav shadow">
            <?php include 'navbar.php' ?>
        </nav>



        <section class="home-section">

            <div class="">
                <button class="btn btn-light text-dark" id="slideleft" style="font-size: 10px;"><i
                        class="fas fa-arrow-left"></i></button>

                <button class="btn btn-light text-dark d-none" id="slideright" style="font-size: 10px;"><i
                        class="fas fa-arrow-right"></i></button>
            </div>

            <div class="main_contents">
                <div class="container">

                    <h5 style="font-weight: bolder;">PROMOS</h5>
                    <hr>
                    <div class="card shadow-sm" style="">
                        <div class="card-body">


                            <button class="btn btn-warning  text-white mb-2" data-bs-toggle="modal"
                                data-bs-target="#addmodal" data-backdrop="static" data-keyboard="false"
                                style="font-size: 14px;">Add new <i class="fas fa-plus-circle"></i></button>

                            <!--
    <label style="font-size: 14px" class="mb-2 mt-4">Enter new Category:</label>
                      <input type="text" name="" class="form-control" style="font-size: 12px">
                      <hr>
                       <button class="btn btn-light  text-primary" style="font-size: 12px;float: right;" >Add new <i class="fas fa-plus-circle"></i></button>
                        -->




                            <div id="table_category">
                                <div class="spinner-grow text-dark" role="status">
                                    <span class="visually-hidden">Loading...</span>
                                </div>
                                <div class="spinner-grow text-dark" role="status">
                                    <span class="visually-hidden">Loading...</span>
                                </div>
                                <div class="spinner-grow text-dark" role="status">
                                    <span class="visually-hidden">Loading...</span>
                                </div>

                            </div>







                        </div>

                    </div>
                </div>



            </div>


            <div class="footer shadow">

            </div>






        </section>

    </div>


    <div class="modal fade" id="addmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">

                <div class="modal-body">
                    <button type="button" class="btn-close" style="float: right;" data-bs-dismiss="modal"
                        aria-label="Close"></button>

                    <br>
                    <form method="post" action="action_promo.php" onsubmit="return false" id="savenew">

                        <input type="hidden" name="savenew">

                        <label style="font-size: 14px" class="mb-3">Enter Promo Discount : </label>
                        <input type="text" name="discount"
                            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                            style="font-size: 14px" name="" class="form-control newcat mb-2" required="">

                        <label style="font-size: 14px" class="mb-3">Enter Minimum Purchase to Avail : </label>
                        <input type="text" name="minimum"
                            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                            style="font-size: 14px" name="" class="form-control newcat mb-2" required="">


                     


                        <hr>
                        <input type="checkbox" name='noExpiration' id="activateInput" checked> No Expiration<br>

                        <input type="datetime-local" class="form-control" name="xpdate" id='expirationDate'
                            min="<?php echo date("Y-m-d"); ?>" disabled required>





                        <button type="submit" id="disabledsave" class="btn btn-light text-dark mt-4"
                            style="font-size: 15px;float: right;">Save</button>

                    </form>

                </div>

            </div>
        </div>
    </div>


    <script>
    var checkbox = document.getElementById('activateInput');
    var inputField = document.getElementById('expirationDate');

    checkbox.addEventListener('change', function() {
        if (this.checked) {
            inputField.disabled = true;
        } else {
            inputField.disabled = false;
        }
    });
    </script>




    <div class="modal fade" id="editmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">

                <div class="modal-body">
                    <button type="button" class="btn-close" style="float: right;" data-bs-dismiss="modal"
                        aria-label="Close"></button>

                    <br>
                    <h6 style="font-weight: bolder;">Edit Promo Code</h6>
                    <form method="post" action="action_promo.php" onsubmit="return false" id="editcategory">

                        <input type="hidden" name="editcategory">

                        <label style="font-size: 14px" class="mb-3">Promo Discount : </label>
                        <input type="text" name="ediscount" id="ediscount"
                            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                            style="font-size: 14px" name="" class="form-control newcat mb-2" required="">

                        <label style="font-size: 14px" class="mb-3">Maximum amount to Avail : </label>
                        <input type="text" name="emaxamount" id="emaxamount"
                            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                            style="font-size: 14px" name="" class="form-control newcat mb-2" required="">


                        <label style="font-size: 14px" class="mb-3">Change Expiration Date: </label>
                        <input type="datetime-local" class="form-control" name="expdate"
                            min="<?php echo date("Y-m-d"); ?>" required>

                        <input type="hidden" id="promoid" name="promoid">
                        <button type="submit" id="disabledsaved" class="btn btn-light text-dark mt-4"
                            style="font-size: 15px;float: right;">Modify</button>

                    </form>

                </div>

            </div>
        </div>
    </div>





    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {

        $('#savenew').on('submit', function(event) {
            event.preventDefault();
            $.ajax({
                url: $(this).attr('action'),
                method: "POST",
                data: $(this).serialize(),
                success: function(data) {

                    table_category();
                    $.notify("Added Successfully!", "success");
                    $('.btn-close').click();
                }
            })

        });



        $('#editcategory').on('submit', function(event) {
            event.preventDefault();
            $.ajax({
                url: $(this).attr('action'),
                method: "POST",
                data: $(this).serialize(),
                success: function(data) {
                    table_category();
                    $.notify("Modified Successfully!", "success");
                    $('.btn-close').click();
                }
            })

        });

        var myModalEl = document.getElementById('addmodal')
        myModalEl.addEventListener('hidden.bs.modal', function(event) {
            $('.newcat').val('');
        })


        $('#newcat').keyup(function() {
            var val = $(this).val();

            if (val == '') {
                $('#msg').html('');
            } else {



                $.ajax({
                    url: "action_promo.php",
                    method: "POST",
                    data: {
                        checkifexistcat: 1,
                        val: val
                    },
                    success: function(data) {
                        if (data.match('exist')) {
                            $('#disabledsave').attr('disabled', true);
                            $('#msg').html(
                                '<span class="text-danger" style="font-size:12px">Already Exist!</span>'
                            );
                        } else {
                            $('#disabledsave').removeAttr('disabled');
                            $('#msg').html('');
                        }
                    }
                })
            }



        })

        $('#editcat').keyup(function() {

            var val = $(this).val();

            if (val == '') {

            } else {



                $.ajax({
                    url: "action_promo.php",
                    method: "POST",
                    data: {
                        checkifexistcat: 1,
                        val: val
                    },
                    success: function(data) {
                        if (data.match('exist')) {
                            $('#disabledsaved').attr('disabled', true);
                            $('#msgs').html(
                                '<span class="text-danger" style="font-size:12px">Already Exist!</span>'
                            );
                        } else {
                            $('#disabledsaved').removeAttr('disabled');
                            $('#msgs').html('');
                        }
                    }
                })
            }
        })


        table_category();

        function table_category() {


            $.ajax({
                url: "action_promo.php",
                method: "POST",
                data: {
                    category: 1
                },
                success: function(data) {
                    $('#table_category').html(data);
                }
            })


        }


    });
    </script>

    <script type="text/javascript" src="../js/sidebar.js?v=1"></script>



    <!--Bootstrap Plugins-->
    <script type="text/javascript" src="../js/notify.js"></script>
    <script type="text/javascript" src="../js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../js/popper.js"></script>
    <script type="text/javascript" src="../js/bootstrap.js"></script>
</body>

</html>