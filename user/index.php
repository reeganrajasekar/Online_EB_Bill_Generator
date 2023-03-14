<?php require("../admin/layout/db.php");
if(!isset($_SESSION)) 
{ 
    session_start(); 
}
$sid = $_SESSION["id"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>User Home</title>
    <link rel="stylesheet" href="/static/css/bootstrap.min.css">
    <link rel="stylesheet" href="/static/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="/static/js/moment.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg sticky-top" style="background:white;box-shadow:1px 1px 2px #aaa;">
        <div class="container">
            <a class="navbar-brand" style="font-size:22px;font-weight:900;color:#2b74e2" href="">
                User
            </a>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
					<li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/user">Home</a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" onclick="return confirm('Do you want to Logout?')" href="/">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
<div class="container mt-3">
    <h3 class="mt-4" style="color:#2b74e2;display:flex;flex-direction:row;justify-content:space-between">
        <span>Bill :</span>
        <span>
            <button type="button" style="color:#fff;background-color:#2b74e2"  class="btn" data-bs-toggle="modal" data-bs-target="#myModal">
                Add
            </button>
        </span>
    </h3>

    <div class="modal fade" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" style="color:#2b74e2">Add Bill</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form onsubmit="document.getElementById('loader').style.display='block'" action="/user/add.php" method="post" enctype="multipart/form-data">
                    <div class="form-floating mb-3 ">
                        <input required type="file" class="form-control"  name="image" placeholder="Image">
                        <label>Image</label>
                    </div>
                    <div style="display:flex;justify-content:flex-end">
                        <button class="btn mt-3 w-25" style="background-color:#2b74e2;color:#fff">Upload</button>
                    </div>
                </form>
            </div>

            </div>
        </div>
    </div>
    <br>  
    <div class="table-responsive">        
    <table class="table table-striped table-bordered">
        <thead style="text-align:center">
            <tr>
                <th>#</th>
                <th>Bill No</th>
                <th>Image</th>
                <th>Rate</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
        <?php
            $result = $conn->query("SELECT * FROM bill WHERE uid='$sid' ORDER BY id DESC");
            if($result->num_rows > 0){
                $i=0;
                while($row = $result->fetch_assoc()){
                    $i++;
                    ?>
                        <tr>
                            <td style="text-align:center"><?php echo($i) ?></td>
                            <td><?php echo($row["id"]) ?></td>
                            <td><a href="/user/uploads/<?php echo($row["img"]) ?>" target="_blank">Click here</a></td>
                            <td><?php echo($row["rate"]) ?></td>
                            <td><script>document.write(moment("<?php echo($row["reg_date"]) ?>").format("lll"))</script></td>
                        </tr>
                    <?php
                }
            }else{
            ?>
            <tr>
                <td style="text-align:center" colspan="5">Nothing Found</td>
            </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
    </div>
    <br>
</div>





<script>
    const queryString = window.location.search;
    const urlParams = new URLSearchParams(queryString);
    if(urlParams.get('err')){
      document.write("<div id='err' style='position:fixed;bottom:30px; right:30px;background-color:#FF0000;padding:10px;border-radius:10px;box-shadow:2px 2px 4px #aaa;color:white;font-weight:600'>"+urlParams.get('err')+"</div>")
    }
    setTimeout(()=>{
        document.getElementById("err").style.display="none"
    }, 3000)
</script>

<script>
    if(urlParams.get('msg')){
      document.write("<div id='msg' style='position:fixed;bottom:30px; right:30px;background-color:#4CAF50;padding:10px;border-radius:10px;box-shadow:2px 2px 4px #aaa;color:white;font-weight:600'>"+urlParams.get('msg')+"</div>")
    }
    setTimeout(()=>{
        document.getElementById("msg").style.display="none"
    }, 3000)
</script>
<script src="/static/js/bootstrap.bundle.js"></script>

</body>
</html>