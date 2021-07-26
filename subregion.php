<?php
try {
    //code...
    include "./includes/db_connection.php";

    $sql = "SELECT* FROM subregion";
    $result = $db->query($sql);
    //$count = $db->query("SELECT count(*) FROM country");
    $numrows = $result->num_rows;
    if (!$result) {
        # code...
        echo "database query failed" . mysqli_connect_error();
    }
    //$search = $_GET['search'];
   // $query = "SELECT FROM country WHERE country_name LIKE '%$search%" ;
    //$stmt = $db->prepare($query);
    // while ($row = mysqli_fetch_assoc(mysqli_query($db,$query))) {
    //     echo "<div id='link' onClick='addText(\"".$row['country_name']."\");'>" . $row['country_name'] . "</div>";  
    // }
    // //search variable must be declared before bind_parm method
    // $search = $_GET['search'];

    // $stmt->bind_param('s', $search);
    // $stmt->execute();
    
} catch (Exception $e) {
    //throw $e
    $error = $e->getMessage();
}

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
        <ul class="navbar-nav nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="#">Graphical presentaions</a>
            </li>
            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Dropdown
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="region.php">Regions</a></li>
                <li><a class="dropdown-item" href="subregion.php">Subregions</a></li>
                <li><a class="dropdown-item" href="#">Countries</a></li>
            </ul>
            </li>
            <li class="nav-item">
            <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">About</a>
            </li>
        </ul>
        </div>
    </div>
    </nav>
    <form class="d-flex sea_rch" action="#" method="get">
        <input class="form-control me-2" type="search" placeholder="Search" name="search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
    <div class="numrows">
        <?php 
        // if (isset($_GET['submit'])) {
            
        // $row = $stmt->fetch();
            if ($numrows == 0) {
                # code...
                echo "There are no results found.";
            }else{
        ?>
        <?php echo "The number of Subregions are: $numrows"; ?>
    </div>
        <div class="table-responsive country-table">
            <table class="table">
                <tr>
                    <th>No.</th>
                    <th>SUB-REGION</th>
                </tr>
                
                    <?php
                        while ($item = $result->fetch_object()) { ?>
                        <tr>
                            <td><?php echo $item->id; ?>  </td>
                            <td><?php echo $item->sub_name; ?> </td>
                        </tr>
                    <?php } 
                        mysqli_free_result($result);
                    ?>
            </table>
        </div> 

        <?php }?>  
        <?php  //} ?>        

        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="./assets/bootstrap/js/bootstrap.bundle.min.js" ></script>
  
    </body>
</html>
  