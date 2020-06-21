<?php $db = new Conexion; ?>

<section class="container">
    <div class="col-md-5 mx-auto pt-5">
        <form action="upload.php" method="POST" enctype="multipart/form-data">   
            <div class="form-group">
                <h1>   <label for="exampleFormControlFile1">Example file input</label> </h1>
                <input type="file" class="form-control-file" id="exampleFormControlFile1" name="file">
            </div>        
            <div class="form-group">
                <input type="submit" value="Upload" class="btn btn-primary btn-block">
            </div>
        </form>
    </div>    
</section>

<?php 

    $query = $db->connect()->prepare('SELECT * FROM img');
    $query->execute();
        
    while ($row = $query->fetch(PDO::FETCH_ASSOC)) { ?>
        <img src="<?php echo $row['ruleImg'] . $row['id'] . '.' . $row['imgExten'] ; ?>" class="img-thumbnail img-fluid" alt="Responsive image">
 <?php } ?>