<nav class="navbar navbar-expand-lg navbar-dark bg-dark px-md-5 p-3">
        <a class="navbar-brand" href="#" style="font-size: 22px">Blog</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <?php 
               $sql  = "SELECT * FROM categories";
               $stmt = $pdo->prepare($sql);
               $stmt->execute();
               while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                  $category_id   = $row['category_id'];
                  $category_name = $row['category_name']; ?>
                  <li class="nav-item">
                    <a class="nav-link" href="categories.php?id=<?php echo $category_id; ?>"><?php echo $category_name; ?></a>
                  </li>                  
               <?php }            
             ?>                                   
          </ul>
          <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" style="font-size: 14px" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form>
        </div>
      </nav> <!--End nav-->