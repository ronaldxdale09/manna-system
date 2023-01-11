<link rel="stylesheet" href="css/navbar.css" />
<script src="../js/navbar.js"></script>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
<link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css'
    integrity='sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=='
    crossorigin='anonymous' referrerpolicy='no-referrer' />

<div class="sidebar "> <BR>
    <div class="logo-details">
        <i class='bx bx-sdsds'></i>
        <span class="logo_name"> <img src="../assets/logo/logo_transparent.png" class="img-thumbnnail shadow"
                style="width: 100px;height: 70px;border-radius: 30px;"></span>
    </div>
    <ul class="nav-links">
        <li>
            <a href='dashboard.php'>
                <i class='bx bx-grid-alt'></i>
                <span class="link_name">Dashboard</span>
            </a>
            <hr style='color:white'>
        </li>
        <li>
            <a href='sales.php'>
                <i class='fa-solid fa-cash-register'></i>
                <span class="link_name">Sales</span>
            </a>
        </li>
        <li>
            <a href='orders.php'>
                <i class='fa-solid fa-book'></i>
                <span class="link_name">Orders</span>
            </a>
        </li>

        <li>
            <a href='rider_remit.php'>
                <i class='fa-solid fa-motorcycle'></i>
                <span class="link_name">Courier Remit</span>
            </a>
        </li>



        <li>
            <hr style='color:white'>
            <ul class='sub-menu blank'>
                <li><a class='link_name'>Inventory</a></li>
            </ul>
        </li>



        <li>
            <div class='iocn-link'>
                <a>
                    <i class='bx bx-collection'></i>
                    <span class='link_name'>Items</span>
                </a>
                <i class='bx bxs-chevron-down arrow'></i>
            </div>
            <ul class='sub-menu'>
                <br>
                <li><a href='products.php'>Item List</a></li>
                <li><a href='stock-in.php'>Stock-in</a></li>
                <li><a href='stock-out.php'>Stock-out</a></li>
            </ul>
        </li>




        <li>
            <a href='prod_report.php'>
                <i class='fa-solid fa-file'></i>
                <span class="link_name">Report</span>
            </a>
        </li>

        <hr style='color:white'>

        <li>
            <a href='categories.php'>
                <i class='fa-solid fa-list'></i>
                <span class="link_name">Categories</span>
            </a>
        </li>

        <li>
            <a href='promo.php'>
                <i class='fa-solid fa-tag'></i>
                <span class="link_name">Promo</span>
            </a>
        </li>
        <li>
            <a href='accounts.php'>
                <i class='fa-solid fa-user'></i>
                <span class="link_name">Manage Users</span>
            </a>
        </li>








        <hr style='color:white'>

        <li>
            <a href='walkin_record.php'>
                <i class='fa-solid fa-cash-register'></i>
                <span class="link_name">Walk-in POS</span>
            </a>
        </li>
        <li>
            <a href='distributor_record.php'>
                <i class='fa-solid fa-person'></i>
                <span class="link_name">Distributor</span>
            </a>
        </li>
        <hr style='color:white'>
        <li>
            <a type='button' data-bs-toggle="modal" data-bs-target="#settingsModal">
                <i class='fa-solid fa-gear'></i>
                <span class="link_name">Settings</span>
            </a>
        </li>

        <li>
            <div class='profile-details'>
                <div class='profile-content'>
                    <img src="../assets/logo/logo_transparent.png" class="img-thumbnnail shadow"
                        style="width: 60px;height: 20px;border-radius: 30px;">
                </div>
                <div class='name-job'>
                    <div class='profile_name'> <a href="profile.php">User </a></div>
                    <div class='job'>Administrator</div>
                </div>
                <a href="../log/logout.php">
                    <i class='bx bx-log-in'></i>
                </a>
            </div>
        </li>
    </ul>
</div>

<script>
const activePage = window.location.pathname;
const navLinks = document.querySelectorAll('.sidebar a').forEach(link => {
    if (link.href.includes(`${activePage}`)) {
        link.classList.add('active');
        console.log(activePage);
    }
})



let arrow = document.querySelectorAll(".arrow");
for (var i = 0; i < arrow.length; i++) {
    arrow[i].addEventListener("click", (e) => {
        let arrowParent = e.target.parentElement.parentElement; //selecting main parent of arrow
        arrowParent.classList.toggle("showMenu");
    });
}
let sidebar = document.querySelector(".sidebar");
let sidebarBtn = document.querySelector(".bx-menu");
console.log(sidebarBtn);
sidebarBtn.addEventListener("click", () => {
    sidebar.classList.toggle("close");
});
</script>


<!-- Modal -->
<div class="modal fade" id="settingsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Settings</h5>
                <button type="button" class="btn" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <label style="font-size: 14px" class="mb-1">Reciver Auto Received: </label>
                <select class="form-select mb-2" name="cat" style="font-size: 14px">
                    <option selected="selected" value="">1 Day Upon Delivery</option>
                    <option value="">2 Days Upon Delivery</option>
                    <option value="">3 Days Upon Delivery</option>
                    <option value="">Immediately </option>
                </select>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>