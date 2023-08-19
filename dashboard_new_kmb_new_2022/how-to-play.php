<?php 
include('header.php');
include('sidebar.php');?>

<?php $htp = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM how_to_play WHERE id='1'"));?>
 // script for ckeditor
 <script src="//cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>

<div class="main-content">	

<div class="page-content">				  
	<div class="container-fluid">

                <?php $htp = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM how_to_play WHERE id='1'"));?>
                <div class="col-sm-12 col-md-8 mr-auto ml-auto">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">How To Play</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                        <form method="POST" action="action-code/how-to-play.php">

                                            <div class="form-group">
                                                <label>How To Play Content</label>
                                                <textarea name="description" id="editor"><?php echo $htp['description'];?></textarea>
                                            </div>
                                            
<script>
CKEDITOR.replace( 'description' );
</script>
                                            
                                            <div class="form-group">
                                                <label>Video Link</label>
                                                <input type="text" class="form-control" placeholder="Enter Video Link" name="video_link" value="<?php echo $htp['video_link'];?>" required>
                                            </div>
                                            
                                            
                                        
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
                                    </div>
                                </div>
                            </div>
                        </div>
					
</div>	
<?php include('footer.php');?>