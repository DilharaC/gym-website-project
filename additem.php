<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="additem.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
</head>
<body>
    <header>
        <div class="navbar">
            <a href="admin.php">Cancel<i class='bx bx-x'></i></a>
            
           
        </div>
    </header>
    <section class="form" id="form">
        <div class="container">
        <form action="productdb.php" method="post" enctype="multipart/form-data">
    

            <div class="fullbox">
                <div class="topic">
                    <h1>ADD PRODUCT</h1>
                   
                </div>
                <div class="input-group">
                    
                    <label>Product Name</label>
                    <input type="text" name="pName" id="pName" placeholder="Enter the Product Name" required>
                    
                </div>
                <div class="input-group">
    <label for="pCategory">Product Category</label>
    <select name="pCategory" id="pCategory" required>
        <option value="" disabled selected>Select a category</option>
        <option value="Fitness Equipment">Fitness Equipment</option>
        <option value="Apparel">Apparel</option>
        <option value="Nutrition and Supplements">Nutrition and Supplements</option>
       
    </select>
</div>
                <div class="input-group">
                    <label>Product Price</label>
                   
                    <input type="number" name="pPrice" id="pPrice" min="0" placeholder="Enter the Product Price" required>
                </div>
               
                    <div class="input-group">
                        <label>Product Quantity</label>
                        <input type="number" name="pQuantity" id="pQuantity" placeholder="Enter the Product Quantity" required>
                    </div>
                    <div class="input-group">
                        <label>Product Image</label>
                        <input type="file" name="pImage" id="pImage" accept="image/png, image/jpg, image/jpeg" placeholder="Email" required>
                    </div>
                   
               
                
                 
                    <br>
                    <input type="submit" class="btn" value="ADD" name="product">
               
                   
               
            </div>
        </form>
        </div>
    </section>
</body>
</html>