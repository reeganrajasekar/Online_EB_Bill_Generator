<?php require("./layout/Header.php") ?>
<?php require("./layout/db.php") ?>

<div class="container mt-3">
    <h3 class="mt-4" style="color:#2b74e2;display:flex;flex-direction:row;justify-content:space-between">
        <span>Waiting List Bills :</span>
    </h3>
    <div class="table-responsive">        
    <table class="table table-striped table-bordered">
        <thead style="text-align:center">
            <tr>
                <th>#</th>
                <th>EB No</th>
                <th>Image</th>
                <th>Total Amount</th>
            </tr>
        </thead>
        <tbody>
        <?php
            $result = $conn->query("SELECT * FROM bill WHERE rate='Waiting List' ORDER BY id DESC");
            if($result->num_rows > 0){
                $i=0;
                while($row = $result->fetch_assoc()){
                    $id=$row["uid"];
                    $result1 = $conn->query("SELECT * FROM user WHERE id='$id'");
                    while($row1 = $result1->fetch_assoc()){
                    $i++;
                    ?>
                        <tr>
                            <td style="text-align:center"><?php echo($i) ?></td>
                            <td><?php echo($row1["ebno"]) ?></td>
                            <td><a href="/user/uploads/<?php echo($row["img"]) ?>" target="_blank">Click here</a></td>
                            <td>
                                <form action="/admin/action/update.php" method="post">
                                    <input type="hidden" name="id" value="<?php echo($row["id"]) ?>">
                                    <input class="border rounded p-1" placeholder="Amount" type="number" name="rate" >
                                    <input class="btn btn-primary p-1" placeholder="Amount" type="submit" value="submit">
                                </form>
                            </td>
                        </tr>
                    <?php
                }
            }}else{
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

    <h3 class="mt-4" style="color:#2b74e2;display:flex;flex-direction:row;justify-content:space-between">
        <span>Bills :</span>
    </h3>
    <div class="table-responsive">        
    <table class="table table-striped table-bordered">
        <thead style="text-align:center">
            <tr>
                <th>#</th>
                <th>EB No</th>
                <th>Image</th>
                <th>Total Amount</th>
            </tr>
        </thead>
        <tbody>
        <?php
            $result = $conn->query("SELECT * FROM bill WHERE NOT rate='Waiting List' ORDER BY id DESC");
            if($result->num_rows > 0){
                $i=0;
                while($row = $result->fetch_assoc()){
                    $result1 = $conn->query("SELECT * FROM user WHERE id='$id'");
                    while($row1 = $result1->fetch_assoc()){
                    $i++;
                    ?>
                        <tr>
                            <td style="text-align:center"><?php echo($i) ?></td>
                            <td><?php echo($row1["ebno"]) ?></td>
                            <td><a href="/user/uploads/<?php echo($row["img"]) ?>" target="_blank">Click here</a></td>
                            <td><?php echo($row["rate"]) ?></td>
                        </tr>
                    <?php
                }
            }}else{
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


<?php require("./layout/Footer.php") ?>