<?php
include('connect.php'); 
session_start();



?>
<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
</head>
<body>
    <h1>Name</h1><?php echo $_SESSION['name']; ?>
    <h1>Address</h1><?php echo $_SESSION['Uaddress']; ?>
    <h1>Email</h1><?php echo $_SESSION['email']; ?>
    <h1>User Name</h1><?php echo $_SESSION['username']; ?>

    <a href="logout.php">Log out</a>
</body>
</html> -->

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css"
    />
    <link rel="stylesheet" href="css/dataTables.bootstrap5.min.css" />
    <link rel="stylesheet" href="css/style.css" />
    <title>Shop Now</title>
  </head>
  <body>
    
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container-fluid">
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="offcanvas"
          data-bs-target="#sidebar"
          aria-controls="offcanvasExample"
        >
          <span class="navbar-toggler-icon" data-bs-target="#sidebar"></span>
        </button>
     
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#topNavBar"
          aria-controls="topNavBar"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="topNavBar">
          <form class="d-flex ms-auto my-3 my-lg-0">
            <div class="input-group">
              <input
                class="form-control"
                type="search"
                placeholder="Search"
                aria-label="Search"
              />
              <button class="btn btn-primary" type="submit">
                <i class="bi bi-search"></i>
              </button>
            </div>
          </form>
          <ul class="navbar-nav">
            <li class="nav-item dropdown">
              <a
                class="nav-link dropdown-toggle ms-2"
                href="#"
                role="button"
                data-bs-toggle="dropdown"
                aria-expanded="false"
              >
                <i class="bi bi-person-fill"></i>
              </a>
              <ul class="dropdown-menu dropdown-menu-end">
             
                
                <li><a class="dropdown-item" href="logout.php">Log out</a></li>
               
                
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    
    <div
      class="offcanvas offcanvas-start sidebar-nav bg-dark"
      tabindex="-1"
      id="sidebar"
    >
      <div class="offcanvas-body p-0">
        <nav class="navbar-dark">
          <ul class="navbar-nav">
            <li>
              <div class="text-muted small fw-bold text-uppercase px-3">
                CORE
              </div>
            </li>
            <li>
              <a href="#" class="nav-link px-3 active">
                <span class="me-2"><i class="bi bi-speedometer2"></i></span>
                <span>Dashboard</span>
              </a>
            </li>
            <li class="my-4"><hr class="dropdown-divider bg-light" /></li>
            <li>
              <div class="text-muted small fw-bold text-uppercase px-3 mb-3">
                Interface
              </div>
            </li>
            <li>
              <a
                class="nav-link px-3 sidebar-link"
                data-bs-toggle="collapse"
                href="#layouts"
              >
                <span class="me-2"><i class="bi bi-layout-split"></i></span>
                <span>Layouts</span>
                <span class="ms-auto">
                  <span class="right-icon">
                    <i class="bi bi-chevron-down"></i>
                  </span>
                </span>
              </a>
              <div class="collapse" id="layouts">
                <ul class="navbar-nav ps-3">
                  <li>
                    <a href="#" class="nav-link px-3">
                      <span class="me-2"
                        ><i class="bi bi-speedometer2"></i
                      ></span>
                      <span>Dashboard</span>
                    </a>
                  </li>
                </ul>
              </div>
            </li>
            <li>
              <a href="staffadditem.php" class="nav-link px-3">
                <span class="me-2"><i class="bi bi-book-fill"></i></span>
                <span>Add Items</span>
              </a>
            </li>
            <li class="my-4"><hr class="dropdown-divider bg-light" /></li>
            <li>
              <div class="text-muted small fw-bold text-uppercase px-3 mb-3">
                Addons
              </div>
            </li>
            <li>
              <a href="staffprofile.php" class="nav-link px-3">
                <span class="me-2"><i class="bi bi-table"></i></span>
                <span>Products</span>
              </a>
            </li>
            <li>
              <a href="membershipdashboard.php" class="nav-link px-3">
                <span class="me-2"><i class="bi bi-table"></i></span>
                <span>Memberships</span>
              </a>
            </li>
            <li>
              <a href="trainersdashboard.php" class="nav-link px-3">
                <span class="me-2"><i class="bi bi-table"></i></span>
                <span>Trainers</span>
              </a>
            </li>
            <li>
              <a href="blogdashboard.php" class="nav-link px-3">
                <span class="me-2"><i class="bi bi-table"></i></span>
                <span>Blog Posts</span>
              </a>
            </li>
           
           
          </ul>
        </nav>
      </div>
    </div>
    
    <main class="mt-5 pt-3">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <h4>Dashboard</h4>
          </div>
        </div>
        <div class="row">
         
        <div class="row">

        </div>
        <?php
        $sql='select* from product';
        $result=mysqli_query($conn,$sql);
        
        ?>
        <div class="row">
          <div class="col-md-12 mb-3">
            <div class="card">
              <div class="card-header">
                <span><i class="bi bi-table me-2"></i></span> Data Table <a class="btn btn-success" href="staffadditem.php">Add iteam</a>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table
                    id="example"
                    class="table table-striped data-table"
                    style="width: 100%"
                  >
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>PRODUCT NAME</th>
                        <th>PRODUCT PRICE</th>
                        
                        
                        <th>PRODUCT QUANTITY</th>
                        <th>PRODUCT IMAGE</th>
                        <th>CATEGORY</th>
                        <th>Edit</th>
                        <th>Delete</th>

                      </tr>
                    </thead>
                    <tbody>

                      <?php
                      while ($row=mysqli_fetch_assoc($result)){
                      ?>
                      
                      <tr>
                        <td><?php echo $row['id']?></td>
                        <td><?php echo $row['productname']?></td>
                        <td><?php echo $row['productprice']?></td>
                        <td><?php echo $row['productquantity']?></td>
                        <td><?php echo $row['productimage']?></td>
                        <td><?php echo $row['productcategory']?></td>
                        
                        <td><a href="staffitemupdate.php?id=<?php echo $row['id']?>" class="btn btn-primary">Update </a></td>
                       
                        <td>
    <a href="staffitemdelete.php?id=<?php echo urlencode($row['id']); ?>" 
       class="btn btn-danger" 
       onclick="return confirm('Are you sure you want to delete this product?');">
       Delete
    </a>
</td>

                      </tr>
                      <?php
                      }
                      
                      ?>

                    </tbody>
                    </tfoot>
                      <tr>
                      <th>ID</th>
                        <th>PRODUCT NAME</th>
                        <th>PRODUCT PRICE</th>
                        
                        
                        <th>PRODUCT QUANTITY</th>
                        <th>PRODUCT IMAGE</th>
                        <th>CATEGORY</th>
                        <th>Edit</th>
                        <th>Delete</th>
                      </tr>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
    <script src="./js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
    <script src="./js/jquery-3.5.1.js"></script>
    <script src="./js/jquery.dataTables.min.js"></script>
    <script src="./js/dataTables.bootstrap5.min.js"></script>
    <script src="./js/script.js"></script>
  </body>
</html>
