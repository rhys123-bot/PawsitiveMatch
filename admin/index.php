<?php include('partials/menu.php'); ?>
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Tailwind Admin Dashboard, A fully featured admin theme which can be used to build CRM, CMS, etc." name="description">
    <meta name="description" content="Download a Tailwind admin template, designed to create responsive and customizable admin dashboards quickly and efficiently. Ideal for developers and startups. ">
    <meta name="description" content="Explore a Tailwind admin dashboard template that offers sleek, responsive designs and easy customization, perfect for managing admin interfaces with modern UI components.">
    <meta name="description" content="Explore a Tailwind admin dashboard template with sleek, responsive designs and easy customization. Perfect for managing modern admin interfaces with top-notch UI components.">
    <meta content="MyraStudio" name="author">
<!-- Main Content Section Starts -->
<div class="main-content">
    <div class="wrapper">
        <h1 class="page-title">Dashboard</h1>


        <?php 
            if(isset($_SESSION['login'])) {
                echo $_SESSION['login'];
                unset($_SESSION['login']);
            }
        ?>

    

        <!-- Dashboard Stats Section -->
        <div class="row">
            <!-- Revenue Here -->
            <!-- Revenue -->
            <div class="col-4">
                <?php 
                    $sql9 = "SELECT SUM(total) AS Total FROM tabl_order WHERE status='Delivered'";
                    $res9 = mysqli_query($conn, $sql9);
                    $row9 = mysqli_fetch_assoc($res9);
                    $total_revenue = $row9['Total'];
                ?>
                <div class="stat-box revenue">
                    <i class="fa fa-money-bill-wave fa-2x"></i>
                    <h1>₹<?php echo $total_revenue; ?></h1>
                    <p>Revenue Generated</p>
                </div>
            </div>
            

            <!-- Pets -->
            <div class="col-4">
                <?php 
                    $sql2 = "SELECT * FROM tbl_pet";
                    $res2 = mysqli_query($conn, $sql2);
                    $count2 = mysqli_num_rows($res2);
                ?>
                <div class="stat-box pet">
                    <i class="fa fa-paw fa-2x"></i>
                    <h1><?php echo $count2; ?></h1>
                    <p>All Pets</p>
                </div>
            </div>

            <!-- Total Orders -->
            <div class="col-4">
                <?php 
                    $sql3 = "SELECT * FROM tabl_order";
                    $res3 = mysqli_query($conn, $sql3);
                    $count3 = mysqli_num_rows($res3);
                ?>
                <div class="stat-box orders">
                    <i class="fa fa-cart-arrow-down fa-2x"></i>
                    <h1><?php echo $count3; ?></h1>
                    <p>Total Adoption</p>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- New Orders -->
            <div class="col-4">
                <?php 
                    $sql4 = "SELECT * FROM tabl_order WHERE status='Ordered'";
                    $res4 = mysqli_query($conn, $sql4);
                    $count4 = mysqli_num_rows($res4);
                ?>
                <div class="stat-box new-orders">
                    <i class="fa fa-cart-plus fa-2x"></i>
                    <h1><?php echo $count4; ?></h1>
                    <p>New Application</p>
                </div>
            </div>

            <!-- Cancelled Orders -->
            <div class="col-4">
                <?php 
                    $sql5 = "SELECT * FROM tabl_order WHERE status='Cancelled'";
                    $res5 = mysqli_query($conn, $sql5);
                    $count5 = mysqli_num_rows($res5);
                ?>
                <div class="stat-box cancelled-orders">
                    <i class="fa fa-ban fa-2x"></i>
                    <h1><?php echo $count5; ?></h1>
                    <p>Cancelled Application</p>
                </div>
            </div>

            <!-- On Delivery -->
            <div class="col-4">
                <?php 
                    $sql6 = "SELECT * FROM tabl_order WHERE status='On Delivery'";
                    $res6 = mysqli_query($conn, $sql6);
                    $count6 = mysqli_num_rows($res6);
                ?>
                <div class="stat-box on-delivery">
                    <i class="fa fa-truck fa-2x"></i>
                    <h1><?php echo $count6; ?></h1>
                    <p>On Process</p>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Delivered Orders -->
            <div class="col-4">
                <?php 
                    $sql7 = "SELECT * FROM tabl_order WHERE status='Delivered'";
                    $res7 = mysqli_query($conn, $sql7);
                    $count7 = mysqli_num_rows($res7);
                ?>
                <div class="stat-box delivered">
                    <i class="fa fa-check-circle fa-2x"></i>
                    <h1><?php echo $count7; ?></h1>
                    <p>Delivered Pets</p>
                </div>
            </div>

            <!-- Users -->
            <div class="col-4">
                <?php 
                    $sql8 = "SELECT * FROM users";
                    $res8 = mysqli_query($conn, $sql8);
                    $count8 = mysqli_num_rows($res8);
                ?>
                <div class="stat-box users">
                    <i class="fa fa-users fa-2x"></i>
                    <h1><?php echo $count8; ?></h1>
                    <p>Users</p>
                </div>
            </div>

            <!-- Categories Here -->
             <!-- Categories -->
            <div class="col-4">
                <?php 
                    $sql = "SELECT * FROM tbl_category";
                    $res = mysqli_query($conn, $sql);
                    $count = mysqli_num_rows($res);
                ?>
                <div class="stat-box category">
                    <i class="fa fa-list fa-2x"></i>
                    <h1><?php echo $count; ?></h1>
                    <p>Categories</p>
                </div>
            </div>
        </div>

        <div class="clearfix"></div>
    </div>
</div>
<!-- Main Content Section Ends -->

<?php include('partials/footer.php') ?>

<!-- Styles -->
<style>
    .main-content {
        padding: 20px;
        background-color: #f4f7fc;
    }

    .page-title {
        font-size: 30px;
        font-weight: bold;
        color: #333;
        text-align: center;
        margin-bottom: 20px;
    }

    .row {
        display: flex;
        justify-content: space-between;
        gap: 20px;
        margin-bottom: 20px;
    }

    .col-4 {
        width: 30%;
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        padding: 20px;
        text-align: center;
    }

    .stat-box {
        padding: 20px;
        border-radius: 8px;
        transition: 0.3s ease-in-out;
    }

    .stat-box i {
        color: #4c86c7;
        margin-bottom: 15px;
    }

    .stat-box h1 {
        font-size: 36px;
        font-weight: bold;
        margin-bottom: 10px;
    }

    .stat-box p {
        font-size: 16px;
        color: #555;
    }

    .stat-box:hover {
        transform: scale(1.05);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }

    .category { background-color: #f1f1f1; }
    .pet { background-color: #eaf5f4; }
    .orders { background-color: #ffefeb; }
    .new-orders { background-color: #e2f4d4; }
    .cancelled-orders { background-color: #f7d1d1; }
    .on-delivery { background-color: #e1f7f5; }
    .delivered { background-color: #d1ffd5; }
    .users { background-color: #f3e1d0; }
    .revenue { background-color: #e0f5fa; }

    @media (max-width: 768px) {
        .col-4 {
            width: 100%;
            margin-bottom: 20px;
        }
    }
</style>

<!-- Add Font Awesome for icons -->
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
