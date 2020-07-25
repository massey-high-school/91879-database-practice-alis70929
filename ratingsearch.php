<?php 
include "topbit.php";
if (isset($_POST['find_rating']))
{
    
$amount = test_input(mysqli_real_escape_string($dbconnect, $_POST['amount']));
$stars = test_input(mysqli_real_escape_string($dbconnect, $_POST['stars']));
if($amount == "exactly")
{
    $find_sql = "SELECT * FROM `2020_L1_Prac_ShaAli` WHERE `Rating` = $stars LIMIT 0 , 30";
}
else if($amount == "less")
{
    $find_sql = "SELECT * FROM `2020_L1_Prac_ShaAli` WHERE `Rating` <= $stars LIMIT 0 , 30";
}
else
{
     $find_sql = "SELECT * FROM `2020_L1_Prac_ShaAli` WHERE `Rating` >= $stars LIMIT 0 , 30";
}

$find_query = mysqli_query($dbconnect, $find_sql);
$find_rs = mysqli_fetch_assoc($find_query);
$count = mysqli_num_rows($find_query);
?>
       
        <div class="box main">
           
            <h2>Search by Rating</h2>
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
                        <p >Title:<span class = "sub_heading"><?php echo $find_rs['Title']; ?></span></p>
                        <p >Author:<span class = "sub_heading"><?php echo $find_rs['Author']; ?></span></p>
                        <p >Genre:<span class = "sub_heading"><?php echo $find_rs['Genre']; ?></span></p>
                        <p >Rating:<span class = "sub_heading">
                            
                            <?php 
                            for($x = 0; $x < $find_rs['Rating']; $x++)
                            {
                                echo "&#9733;";
                            }
                            ?>
                            
                            </span></p>
                        <p ><span class = "sub_heading">Review / Response</span></p>

                        <p>

                            <?php echo $find_rs['Review']; ?>

                        </p>

                    </div><!-- end results -->
                    <br /> <!-- To make a gap between each result box -->
                    <?php
                   
                    
                }// end do
                while($find_rs = mysqli_fetch_assoc($find_query));
                
                
            }// end else
} // end "isset"
            ?>
            
        </div>    <!-- / main -->
<?php 
include "bottombit.php";
?>

    
