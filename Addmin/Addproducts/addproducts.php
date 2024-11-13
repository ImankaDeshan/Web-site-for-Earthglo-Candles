<?php
    require_once 'addprod.inc.php' ;
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Add Products</title>
    <link rel="stylesheet" href="addprod.css">
    
</head>
<body>
    <?php require_once '../Header.php'; ?>

    <div class="page-contents">
        <div class="productadd-form">
            <form action="" method ="POST" class="prodadd" enctype="multipart/form-data">
                <h class="head"> Adding New Products</h>
                <h class="head1"> For Earthglo</h>
                <p class = "msg"> <?php echo $newp ?> </p>

                <input type="Text" placeholder = "Enter Product Name" name ="prodname"> 
                <textarea id="productDescription" name="productDescription" rows="5" required placeholder ="Enter Produt's Description"></textarea>
                <input type="Text" placeholder = "Price" name ="prodprice" > 
                <input type="file" id="fileInput" name="image" accept="image/*" hidden>
                <label for="fileInput" class="custom-file-upload">Choose Image</label>
                <span id="fileName">No file chosen</span>
                
                <select class = "stauts" name="status" id="status">
                    <option value = "active"> Active </option> 
                    <option value="inactive"> Inactive </option>

                </select>


                <button type = "submit" class = "confirm" name = "Add" > Confirm </button>
            </form>
        </div>
    </div>
    
    <script> 
        document.getElementById('fileInput').addEventListener('change', function() {
    const fileName = this.files[0] ? this.files[0].name : 'No file chosen';
    document.getElementById('fileName').textContent = fileName;x
        });
    </script> 
</body>
</html>