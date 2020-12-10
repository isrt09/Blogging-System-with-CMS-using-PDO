<?php 
  require_once('./includes/db.php'); 
  require_once('./includes/header.php'); 
?>
    <div class="fluid-container">
      <?php require_once('./includes/navbar.php'); ?>
      <section id="main" class="mx-5">
        <h2 class="my-3">All Posts</h2>
        <?php 
           $sql  = "SELECT * FROM posts";
           $stmt = $pdo->prepare($sql);
           $stmt->execute();
           while($row       = $stmt->fetch(PDO::FETCH_ASSOC)){
              $post_id      = $row['post_id'];
              $post_title   = $row['post_title'];
              $post_desc    = $row['post_desc'];              
              $post_author  = $row['post_author'];              
              $post_date    = $row['post_date'];              
              $post_image   = $row['post_image'];              
              $post_category= $row['post_cat_id'];              
              $post_status  = $row['post_status']; ?>              
              <div class="row my-4 single-post">
                <img class="col col-lg-4 col-md-12" src="./img/<?php echo $post_image; ?>" alt="Image">
                <div class="media-body col col-lg-8 col-md-12">
                  <h5 class="mt-0"><a href="single.php?id=<?php echo $post_id; ?>"><?php echo $post_title; ?> </a></h5>

                  <span class="posted"><a href="categories.html" class="category">                    
                      <?php 
                        $query = "SELECT * FROM categories WHERE category_id=:id";
                        $stmt1  = $pdo->prepare($query);
                        $stmt1->execute([':id'=>$post_category]);
                        while($row = $stmt1->fetch(PDO::FETCH_ASSOC)){          
                          $category_name = $row['category_name'];                           
                        }
                        echo $category_name;                        
                      ?>
                    </a> Posted by <?php echo $post_author; ?> at <?php echo $post_date; ?></span>
                  <p>
                    <?php echo $post_desc; ?>.
                  </p>
                  <span><a href="single.php?id=<?php echo $post_id; ?>" class="d-block">See more &rarr;</a></span>
                </div>
              </div>
           <?php }
         ?>
        

       
      </section>

      <ul class="pagination px-5">
        <li class="page-item disabled">
          <a class="page-link" href="#" tabindex="-1">Previous</a>
        </li>
        <li class="page-item"><a class="page-link" href="#">1</a></li>
        <li class="page-item active">
          <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
        </li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item">
          <a class="page-link" href="#">Next</a>
        </li>
      </ul>
<?php require_once('./includes/footer.php'); ?>