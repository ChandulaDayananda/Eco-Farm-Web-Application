<?php require "config/config.php";?>
<?php require "libs/App.php";?>
<?php require "includes/header.php";?>

            <div class="container-xxl py-5 bg-dark hero-header mb-5">
                <div class="container text-center my-5 pt-5 pb-4">
                    <h1 class="display-3 text-white mb-3 animated slideInDown">Search</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center text-uppercase">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Search</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Navigation Bar End -->


        <!-- Search Form -->
        <center>
        <form class="form-inline">
        <input class="form-control form-control-sm ml-3 w-75" type="text" placeholder="Search"
            aria-label="Search" id="live_search" autocomplete="off">
        </form>
        </center>
        <!-- Search Form End -->


        <div id = "searchresult"></div>
        
        <?php require "includes/footer.php";?>