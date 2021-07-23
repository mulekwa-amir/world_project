<?php
include "./includes/db_connection.php";
?>
<!DOCTYPE html>
  <html lang="en">
    <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
  
      <!-- Bootstrap CSS -->
      <link href="./assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
      <link href="./assets/style.css" rel="stylesheet" type="text/css" >
  
      <title>Word statsistics</title>
    </head>
    <body>
  
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">WORLD STATSITICS</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Link</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Dropdown
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <form class="d-flex sea_rch" action="./table.html">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>


        <div class="table-responsive country-table">
            <table class="table">
                <tr>
                    <th>No.</th>
                    <th>COUNTRY NAME</th>
                    <th>CAPITAL</th>
                </tr>
                <?php
                    $sql = "SELECT* FROM country";
                    $result = mysqli_connect($db, $sql);
                    if (!$result) {
                        # code...
                        echo "database query failed" . mysqli_connect_error();
                    }
                    while ($item = $result->fetch_object()) {
                ?>
                <tr>
                    <?php
                        echo "<td>  $item->id  </td>";
                        echo "<td>  $item->country_name  </td>";
                        echo "<td>  $item->country_capital  </td>";
                       }
                       mysqli_free_result($result);
                    ?>
                </tr>
            </table>
        </div> 

        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="./assets/bootstrap/js/bootstrap.bundle.min.js" ></script>
  
    </body>
</html>
  