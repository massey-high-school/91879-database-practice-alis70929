<?php 
include "topbit.php";

$showall_sql = "SELECT * FROM `91879_book_reviews` ORDER BY `91879_book_reviews`.`Title` ASC
LIMIT 0 , 30
";
$showall_query = mysqli_query($dbconnect, $showall_sql);
$showall_rs = mysqli_fetch_assoc($showall_query);
$count = mysqli_num_rows($showall_query);
?>
       
        <div class="box main">
           
            <h2>All Items</h2>
            <!-- Results go here -->
            
           <?php 
            // Check if there are any results,
            
            // No results then display error
            if ($count < 1)
            {
                ?>
                <div class = "error"> Sorry!, No results match your searh, please try again</div>
                <?php
                  
            }// end count if
            
            // If there are results display them
            else
            {
                do
                {
                    ?>
                    <div class = "results">
                        <p >Title:<span class = "sub_heading"><?php echo $showall_rs['Title']; ?></span></p>
                        <p >Author:<span class = "sub_heading"><?php echo $showall_rs['Author']; ?></span></p>
                        <p >Genre:<span class = "sub_heading"><?php echo $showall_rs['Genre']; ?></span></p>
                        <p >Rating:<span class = "sub_heading">
                            
                            <?php 
                            for($x = 0; $x < $showall_rs['Rating']; $x++)
                            {
                                echo "&#9733;";
                            }
                            ?>
                            
                            </span></p>
                        <p ><span class = "sub_heading">Review / Response</span></p>

                        <p>

                            <?php echo $showall_rs['Review']; ?>

                        </p>

                    </div><!-- end results -->
                    <br /> <!-- To make a gap between each result box -->
                    <?php
                   
                    
                }// end do
                while($showall_rs = mysqli_fetch_assoc($showall_query));
                
                
            }// end else
            
            ?>
            
        </div>    <!-- / main -->
<?php 
include "bottombit.php";
?>

    
