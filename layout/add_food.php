<?php include "header.php"?>
<div class="container">
       <div class="row">
              <div class="col-md-12">
                     <div class="card">
                            <div class="card-header">
                                   <h4>foods</h4>
                            </div>
                            <div class="card-body">
                                   <form action="" method="POST">
                                          <div class="row">
                                                 <div class="col-md-6">
                                                 <label style="color:black">name</label>
                                                 <input class="form-control" type="text" name="name" placeholder="enter the name of food" >
                                                 </div>
                                                 <div class="col-md-12">
                                                 <label style="color:black">price</label>
                                                 <input type="number" class="form-control"  name="price" placeholder="enter the price of food" >
                                                 </div>
                                                 <div class="col-md-12">
                                                 <label style="color:black">price_Discount</label>
                                                 <input class="form-control" type="number" name="discount" placeholder="enter the price after the Discount">
                                                 </div>
                                                 <div class="col-md-12">
                                                        <input  class="btn btn-primary"  type="submit" value="add foods" name ="add">
                                                 </div>
                                          </div>
                                   </form>
                     </div>
                     </div>
              </div>
       </div>

<?php 
       include 'db.php';
       if(isset($_POST["add"])){
              $name = $_POST['name'];
              $price = $_POST['price'];
              $discount = $_POST['discount']; 
              $sql = "insert into foods (name,price1,price_Discount) values ('$name','$price','$discount')";
              if ($con -> query($sql)){
                     echo "changed";
              }
              else{
                     echo "didn't change";
              };
       }
       ?>

<?php include "footer.php"; ?>