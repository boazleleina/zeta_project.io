<?php


// initialize
session_start();

include 'handle/config.php';

include "admin/header.php";
include "admin/navbar.php";
?>

<div class="container-fluid">
	
	<div class="col-lg-12">
		<div class="row">
			<!-- FORM Panel -->
			<div class="col-md-4">
			<form action="handle/handleclass.php" method="post" enctype="multipart/form-data">
				<div class="card">
					<div class="card-header">
						    Class Form
				  	</div>
					<div class="card-body">
							<input type="hidden" name="id">
							<div id="msg"></div>
							<select name="course_id" id="course_id" class="custom-select select2">
								<option value=""></option>
								<?php 
								$coursename = $link->query("SELECT * FROM courses order by coursename asc");
								while($row=$coursename->fetch_assoc()):
								?>
								<option value="<?php echo $row['id'] ?>"><?php echo $row['coursename'] ?></option>
							<?php endwhile; ?>
							</select>
							<div class="form-group">
								<label class="control-label">Year</label>
								<input type="text" class="form-control" name="year">
							</div>
							<div class="form-group">
								<label class="control-label">Semester</label>
								<input type="text" class="form-control" name="semester">
							</div>
							
					</div>
							
					<div class="card-footer">
						<div class="row">
							<div class="col-md-12">
                            <button class="btn btn-sm btn-primary col-sm-3 offset-md-3" name="uploaddata"> Save</button>
								<button class="btn btn-sm btn-default col-sm-3" type="reset"> Cancel</button>
							</div>
						</div>
					</div>
				</div>
			</form>
			</div>
			<!-- FORM Panel -->

			<!-- Table Panel -->
			<div class="col-md-8">
				<div class="card">
					<div class="card-header">
						<b>Class List</b>
					</div>
					<div class="card-body">
						<table class="table table-bordered table-hover">

							<thead>
								<tr>
									<th class="text-center" width="5%">#</th>
									<th class="text-center">Class</th>
									<th class="text-center" width="25%">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								$i = 1;
								$class = $link->query("SELECT c.*,concat(co.coursename,' ',c.year,'-',c.semester) as `class` FROM `class` c inner join courses co on co.id = c.course_id order by concat(co.coursename,' ',c.year,'-',c.semester) asc");
								while($row=$class->fetch_assoc()):
								?>
								<tr>
									<td class="text-center"><?php echo $i++ ?></td>
									<td class="">
										<p><b><?php echo $row['class'] ?></b></p>
									</td>
									<td class="text-center">
										<button class="btn btn-sm btn-primary edit_class" type="button" data-id="<?php echo $row['id'] ?>"  data-course_id="<?php echo $row['course_id'] ?>"  data-level="<?php echo $row['year'] ?>" data-section="<?php echo $row['semester'] ?>" >Edit</button>
										<button class="btn btn-sm btn-danger delete_class" type="button" data-id="<?php echo $row['id'] ?>">Delete</button>
									</td>
								</tr>
								<?php endwhile; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<!-- Table Panel -->
		</div>
	</div>	

</div>
<style>
	
	td{
		vertical-align: middle !important;
	}
	td p {
	    margin: unset;
	}
</style>

<?php
include "admin/scripts.php";
include "admin/footer.php";
?>
