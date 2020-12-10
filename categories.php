<?php 
  require_once('./includes/db.php'); 
  require_once('./includes/header.php'); 
?>
    <div class="fluid-container">
    <?php require_once('./includes/navbar.php'); ?>
      <section id="main" class="mx-5">
        <?php 
            if(isset($_GET['url'])){
              $id = $_GET['url'];
              $sql  = "SELECT * FROM categories WHERE category_id = :id ";
              $stmt = $pdo->prepare($sql);
              $stmt->execute([':id'=>$id]);                          
              while($row = $stmt->fetch(pdo::FETCH_ASSOC)){
                 $category_id   = $row['category_id'];
                 $category_name = $row['category_name'];?>
                 <h2 class="my-3">Category: <?php echo $category_name; ?></h2>
              <?php }
            }
         ?>
        
        <div class="row my-4 single-post">
          <?php
              $id = $_GET['id'];              
              $query = "SELECT * FROM posts WHERE post_cat_id = :cat_id";
              $stmt2 = $pdo->prepare($query);
              $stmt2->execute(['cat_id'=>$id]);
              while($post = $stmt2->fetch(PDO::FETCH_ASSOC)){
                 $post_id        = $post['post_id'];
                 $post_title     = $post['post_title'];
                 $post_desc      = $post['post_desc'];
                 $post_author    = $post['post_author'];
                 $post_image     = $post['post_image'];
                 $post_date      = $post['post_date'];
                 $post_category  = $post['post_cat_id']; ?>
                 <img class="col col-lg-4 col-md-12" src="./img/<?php echo $post_image; ?>" alt="Image">
                  <div class="media-body col col-lg-8 col-md-12">
                    <h5 class="mt-0"><a href="single.php?id=<?php echo $post_id; ?>"><?php echo $post_title; ?></a></h5>
                    <span class="posted"><a href="categories.php?url=<?php echo $category_id; ?>" class="category"><?php echo $category_name; ?></a> Posted by <?php echo $post_author; ?> at <?php echo $post_date; ?></span>
                    <p>
                      <?php echo $post_desc; ?>
                    </p>
                    <span><a href="<?php echo $post_id; ?>" class="d-block">See more &rarr;</a></span>
                  </div>
              <?php } ?>                     
        </div>
       <!--  <div class="row my-4 single-post">
          <img class="col col-lg-4 col-md-12" src="./img/nodejs.png" alt="Image">
          <div class="col col-lg-8 col-md-12">
            <h5 class="mt-0"><a href="#">Is NodeJS killing PHP?</a></h5>
            <span class="posted"><a href="categories.html" class="category">Laravel</a> Posted by John at 12, SEP 2019</span>
            <p>
              Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
            </p>
            <span><a href="#" class="d-block">See more &rarr;</a></span>
          </div>
        </div>
        <div class="row my-4 single-post">
          <img class="col col-lg-4 col-md-12" src="./img/jquery.png" alt="Image">
          <div class="col col-lg-8 col-md-12">
            <h5 class="mt-0"><a href="#">Is jQuery still worth learning?</a></h5>
            <span class="posted"><a href="categories.html" class="category">NOdeJS</a> Posted by John at 12, SEP 2019</span>
            <p>
              Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
            </p>
            <span><a href="#" class="d-block">See more &rarr;</a></span>
          </div>
        </div> -->
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