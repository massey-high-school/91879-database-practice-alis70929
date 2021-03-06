<!DOCTYPE HTML>

<html lang="en">
<?php 
    session_start();   
    include("config.php");
    include("functions.php");
    
    // Connect to database
    $dbconnect = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
    
    if(mysqli_connect_errno())
    {
        echo "Connection failed:".mysqli_connect_errno();
        exit;
    }

?>
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Book Review Database">
    <meta name="keywords" content="books, reading, fiction, non-fiction, genre, reviews">
    <meta name="author" content="Shazeel Ali 11HCV">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Shazeels Book Review Database</title>
    
    <!-- Edit the link below / replace with your chosen google font -->
    <link href="https://fonts.googleapis.com/css?family=Lato%7cUbuntu" rel="stylesheet"> 
    
    <!-- Edit the name of your style sheet - 'foo' is not a valid name!! -->
    <link rel="stylesheet" href="css/font-awesome.min.css"> 
    <link rel="stylesheet" href="css/book-style.css"> 
    
</head>
    
<body>
    
    <div class="wrapper">
    

        
        <div class="box banner">
            
        <!-- logo image linking to home page goes here -->
        <a href="index.php">
            <div class="box logo"  title="Logo - Click here to go to the Home Page">
            <img class="img-circle" src="images/gen_logo.png" width="150" height="150" alt="generic logo" />
            
            </div>    <!-- / logo -->
        </a>
            
            <h1>Shazeels Book Review Database</h1>
        </div>    <!-- / banner -->

       <div class="box side"> 
        
           <h2>Search | <a class = "side" href = "showall.php">Show all</a></h2>
           
           <i>Type part of tutle or author name if desired</i>
           
           <hr />
          <!-- Title Search -->
           
           <form method = "post" action = "titlesearch.php" enctype="multipart/form-data">
           
           <input class = "search" type = "text" name = "title" size = "40" value = "" required placeholder = "Title..."/>
            
            <input class = "submit" type = "submit" name = "find_title" value = "&#xf002;" />
           </form>
           
           
           
           
           <!-- End of Title Search -->
           
            <!-- Author Search -->
           
           <form method = "post" action = "authorsearch.php" enctype="multipart/form-data">
           
           <input class = "search" type = "text" name = "author" size = "40" value = "" required placeholder = "Author..."/>
            
            <input class = "submit" type = "submit" name = "find_author" value = "&#xf002;" />
           </form>
           
           <!-- End of Author Search -->
           <hr />
           <i>Use the dropdown menus to search by genre or rating </i>
           <hr />
            <!-- Genre Search -->
           
           <form method = "post" action = "genresearch.php" enctype="multipart/form-data">
           
           <select name = "genre" required>
               <option value = "" disabled selected>Genre...</option>
               
              <?php 
               $genre_sql = "SELECT DISTINCT `Genre` FROM `2020_L1_Prac_ShaAli` ORDER BY `2020_L1_Prac_ShaAli`.`Genre` ASC LIMIT 0 , 30";
               $genre_query = mysqli_query($dbconnect, $genre_sql); ;
               $genre_rs = mysqli_fetch_assoc($genre_query) ;
               
               do{
                   
               ?>
               
               <option value = "<?php echo $genre_rs['Genre']; ?>"><?php echo $genre_rs['Genre']; ?></option>
               
               <?php
               }// end of genre retrival
               
               while($genre_rs =mysqli_fetch_assoc($genre_query));
               

               ?>
               
            </select>
            
            <input class = "submit" type = "submit" name = "find_genre" value = "&#xf002;" />
           </form>
           
           
           
           
           <!-- End of Genre Search -->
           <!-- Ratings Search -->
           
           <form method = "post" action = "ratingsearch.php" enctype="multipart/form-data">
           <select class = "halfwidth"name = "amount">
               <option value ="exactly">Exactly...</option>
               <option value ="more">At Least...</option>
               <option value ="less">At Most...</option>
            </select>
           <select class = "halfwidth" name = "stars" required>
               
               <option value = "1">&#9733;</option>
               <option value = "2">&#9733;&#9733;</option>
               <option value = "3">&#9733;&#9733;&#9733;</option>
               <option value = "4">&#9733;&#9733;&#9733;&#9733;</option>
               <option value = "5">&#9733;&#9733;&#9733;&#9733;&#9733;</option>
               
               
            </select>
            
            <input class = "submit" type = "submit" name = "find_rating" value = "&#xf002;" />
           </form>
           
           
           
           
           <!-- End of Ratings Search -->
          
           
           
           
        </div>