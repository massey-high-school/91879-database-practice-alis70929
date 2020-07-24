<?php 
include "topbit.php";

$showall_sql = "SELECT * FROM `91879_book_reviews` ORDER BY `91879_book_reviews`.`Title` ASC
LIMIT 0 , 30
";
$showall_query = mysqli_query($dbconnect, $showall_sql);
$showall_rs = mysqli_fetch_assoc($showall_query);
$count = mysqli_num_rows($showall_rs);
?>
       
        <div class="box main">
           
            <h2>All Items</h2>
            <!-- Results go here -->
            
            <div class = "results">
            
                <p >Title:<span class = "sub-heading">Title Holder</span></p>
                <p >Author:<span class = "sub-heading">Author Holder</span></p>
                <p >Genre:<span class = "sub-heading">Genre Holder</span></p>
                <p >Rating:<span class = "sub-heading">Rating Holder</span></p>
                <p ><span class = "sub-heading">Review / Response</span></p>
                
                <p>
                
                    Review Holder
                
                </p>
                
            </div>
            
        </div>    <!-- / main -->
<?php 
include "bottombit.php";
?>

    
