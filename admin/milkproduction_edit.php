<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "regform";
$errors = array();
$conn = mysqli_connect($servername, $username, $password, $dbname);
if(empty($_GET['breed']))
{
	header("location:dashboard.php");
}
$reslt = mysqli_query($conn,"SELECT * from milkproduction where breed ='".$_GET['breed']."' ");
$res = mysqli_fetch_array($reslt);

if(isset($_POST['submit']))
	{
		$location = $_POST['location'];
		$breed = $_POST['breed'];
		$feed = $_POST['type'];
		$extraquantity = $_POST['quantity'];
		$description = $_POST['description'];
		$incharge = $_POST['incharge'];		
		$reslt = mysqli_query($conn,"update `milkproduction` set  `breed`='".$breed ."', `type`='".$feed ."', `quantity`='".$extraquantity ."', `description`='".$description ."', `incharge`='".$incharge."' where breed ='".$_GET['breed']."'  ");
		header("location:milkproduction_view.php?location=$location&breed=$breed&status=update");
	}
	include("index.php");  
?>

<div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
             <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">milkproduction</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                                    <li class="breadcrumb-item" aria-current="page">Library</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            
       <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
            <div class="row">
                    <div class="col-md-6">
                        <div class="card">

<form action="" method="post">
 <div class="card-body">
  
    <input class="form-control" type="hidden" value="<?php echo $res['location'] ;?>" name="location">
    <input  class="form-control" type="hidden" value="<?php echo $res['cid']  ;?>" name="cid">
	  
	
    <div class="form-group row">
	<label class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>breed</b></label>
	<div class="col-sm-9">
    <input class="form-control" type="text" value="<?php echo $res['breed'];?>" name="breed" required>
	</div>
	</div>
   
   <div class="form-group row">
	<label class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>type</b></label>
	<div class="col-sm-9">
    <input class="form-control" type="text" value="<?php echo $res['type'];?>" name="type" required>
	</div>
	</div>
   
    <div class="form-group row">
	<label class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>quantity</b></label>
	<div class="col-sm-9">
    <input class="form-control" type="text" value="<?php echo $res['quantity'];?>" name="quantity" required>
	</div>
	</div>


	<div class="form-group row">
	<label class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>Description</b></label><br>
		<div class="col-sm-9">
 <input  class="form-control" type="text" value="<?php echo $res['description'];?>" name="description" required>
 </div>
 </div>
      							

									
										<div class="form-group row">
										<label class="col-sm-3 text-right control-label col-form-label" for="psw-repeat"><b>Incharge</b></label>
 <div class="col-sm-9">
 <input class="form-control" type="text" value="<?php echo $res['incharge'];?>" name="incharge" required>
	</div>
										</div>									
	
	
	 
        <div class="card-body">
                <input  type="submit" class="btn btn-success" name="submit" value="Update" >
            </div>
       
	
	
	
  </div>
</form>

        </div>
                    </div>
                </div>
            </div>
			</div>
            
