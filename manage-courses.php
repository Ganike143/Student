<?php session_start();
//error_reporting(0);
include('dbconnect.php');
if (strlen($_SESSION['aid']==0)) {
  header('location:logout.php');
  } else{

if(isset($_GET['del'])){  
$courseid=$_GET['del'];
$query=mysqli_query($con,"delete from tbl_course where cid='$courseid'");
echo '<script>alert(" Deleted")</script>';
echo '<script>window.location.href=manage-courses.php</script>';

}
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Student Details</title>
    <link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
    <link href="bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">
    <link href="bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">
	<link rel="stylesheet" href="assests/nav.css">
    <link href="bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
   
</head>

<body>
  <ul>
        <li><a href="#home">Tailwebs</a></li>
        <li style="float:right"><a  href="logout.php">Logout</a></li>
        <li style="float:right"><a class="active" href="#Home">Home</a></li>
      </ul>
    <div id="wrapper">

        <!-- Navigation -->
      
     

           
         <nav>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Student Details
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>S No</th>
                                            <th>Student Name</th>
                                            <th>Subject</th>
                                            <th>Marks</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    <?php $query=mysqli_query($con,"select * from tbl_course");
                                    $sn=1;
                                     while($res=mysqli_fetch_array($query)){?>	
                                        <tr class="odd gradeX">
                                            <td><?php echo $sn?></td>
                                            <td><?php echo htmlentities(strtoupper($res['cshort']));?></td>
                                            <td><?php echo htmlentities(strtoupper($res['cfull']));?></td>
                                            <td><?php echo htmlentities($res['cdate']);?></td>
                                             <td>&nbsp;&nbsp;<a href="edit-course.php?cid=<?php echo htmlentities($res['cid']);?>" class="btn btn-primary">Edit</a> &nbsp;
                                             <a href="manage-courses.php?del=<?php echo htmlentities($res['cid']); ?>" class="btn btn-danger" onclick="return confirm('Do you really wan to delete?');">Delete</a></td>
                                            
                                        </tr>
                                        
                                    <?php $sn++;}?>   	           
                                    </tbody>
                                </table>
								<a  class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal" href="add-course.php">ADD</a>

                            </div>
                            <!-- /.table-responsive -->
                           
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
           
            
           
        </div>
        <!-- /#page-wrapper -->

	
    </div>
    <!-- /#wrapper -->
     


<!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">
    <!-- Modal body -->
      <div class="modal-body">
      <?php 
//error_reporting(0);
include('dbconnect.php');
if (strlen($_SESSION['aid']==0)) {
  header('location:logout.php');
  } else{

if(isset($_POST['submit'])){
	
$cshortname=$_POST['course-short'];
$cfullname=$_POST['course-full'];
$cdate=$_POST['cdate'];
$query=mysqli_query($con,"insert into tbl_course(cshort,cfull,cdate)values('$cshortname','$cfullname','$cdate')");
if($query){
echo '<script>alert("Added successfully")</script>';
echo "<script>window.location.href='manage-courses.php'</script>";
} else{
echo '<script>alert("Something went wrong. Please try again")</script>';
echo '<script>window.location.href=add-course.php</script>';
}
}
?>

<form method="post" >
	<div id="wrapper">

		<!-- Navigation -->

<!--nav-->
		<div id="page-wrapper">
			<div class="row">
				<div class="col-lg-12">
				</div>
				<!-- /.col-lg-12 -->
			</div>
			<!-- /.row -->
			<div class="row">
				<div class="col-lg-12">
					<div class="panel panel-default">
						<div class="panel-heading">Add Student Details</div>
						<div class="panel-body">
							<div class="row">
						 	<div class="col-lg-10">
									
										<div class="form-group">
											<div class="col-lg-4">
					 <label>Student Name<span id="" style="font-size:11px;color:red">*</span>	</label>
											</div>
											<div class="col-lg-6">
			
  <input class="form-control" name="course-short" id="cshort" required="required"  onblur="courseAvailability()">       
							<span id="course-availability-status" style="font-size:12px;"></span>				</div>
											
										</div>	
										
								<br><br>
								
		<div class="form-group">
		<div class="col-lg-4">
		<label>Subject<span id="" style="font-size:11px;color:red">*</span></label>
		</div>
		<div class="col-lg-6">
		<input class="form-control" name="course-full" id="cfull" required="required"  onblur="coursefullAvail()">         
	<span id="course-status" style="font-size:12px;"></span>				</div>
	 </div>	
										
	 <br><br>								
										
	<div class="form-group">
	<div class="col-lg-4">
	 <label>Marks</label>
	</div>
	<div class="col-lg-6">
	<input class="form-control" value=""  name="cdate">
	
	</div>
	</div>
	</div>	
										
		<br><br>		
		
							<div class="form-group">
											<div class="col-lg-4">
												
											</div>
											<div class="col-lg-6"><br><br>
							<input type="submit" class="btn btn-primary" name="submit" value="ADD"></button>
											</div>
											
										</div>		
													
				</div>

					</div>
								
							</div>
							
						</div>
						
					</div>
					
				</div>
				
			</div>
			
		</div>
		

	</div>

	
	<script>
function courseAvailability() {
	$("#loaderIcon").show();
jQuery.ajax({
url: "course_availability.php",
data:'cshort='+$("#cshort").val(),
type: "POST",
success:function(data){
$("#course-availability-status").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}

function coursefullAvail() {
	$("#loaderIcon").show();
jQuery.ajax({
url: "course_availability.php",
data:'cfull='+$("#cfull").val(),
type: "POST",
success:function(data){
$("#course-status").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script>
</form>

<?php } ?>

      </div>

    </div>
  </div>
</div>

                                   
    <!-- jQuery -->
    <script src="bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    
	<script src="bower_components/bootstrap/dist/js/bootstrap.bundle.js"
		type="text/javascript"></script>
		
		<script src="bower_components/bootstrap/dist/js/bootstrap.bundle.min.js"
		type="text/javascript"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
    </script>
</body>
</html>
<?php } ?>
