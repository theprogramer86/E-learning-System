<div style="100%;margin-top: 50px">
    <div style="width:100%; background-color: black; color: white;padding: 10px">
        <p>Media Type</p>
    </div>
    <div style="width:100%; background-color: white; color: black;padding: 10px;border: 1px solid black">
        <a href="books.php?type=all&&<?php echo 'lagn='.$lagn.'&&'; ?><?php echo 'cat='.$cat.''; ?>" style="text-decoration: none; color: black;"><p><input type="checkbox" <?php if($type == 'all'){ echo 'checked'; }?> onclick="redirectALL()"> All</p></a>
        <a href="books.php?type=ebook&&<?php echo 'lagn='.$lagn.'&&'; ?><?php echo 'cat='.$cat.''; ?>" style="text-decoration: none; color: black;"><p><input type="checkbox" <?php if($type == 'ebook'){ echo 'checked'; }?> onclick="redirectBook()"> eBook</p></a>
        <a href="books.php?type=video&&<?php echo 'lagn='.$lagn.'&&'; ?><?php echo 'cat='.$cat.''; ?>" style="text-decoration: none; color: black;"><p><input type="checkbox" <?php if($type == 'video'){ echo 'checked'; }?> onclick="redirectVideo()"> Video</p></a>
    </div>
</div>

<!-- <div style="100%;margin-top: 10px">
    <div style="width:100%; background-color: black; color: white;padding: 10px">
        <p>Language</p>
    </div>
    <div style="width:100%; background-color: white; color: black;padding: 10px;border: 1px solid black">
        <a href="books.php?<?php echo 'type='.$type.'&&'; ?><?php echo 'lagn=all'; ?><?php echo 'cat='.$cat.''; ?>" style="text-decoration: none; color: black;"><p><input type="checkbox" <?php if($lagn == 'all'){ echo 'checked'; }?> onclick="redirectALL()"> All</p></a>
        <?php
        $books = "SELECT DISTINCT `language` FROM item Group By language";
        $books_result = $conn->query($books);
            while($row = $books_result->fetch_assoc()) {
                ?>
                <a href="books.php?<?php echo 'type='.$type.'&&'; ?><?php echo 'lagn='.$row['language'].'&&'; ?><?php echo 'cat='.$cat.''; ?>" style="text-decoration: none; color: black;"><p><input type="checkbox" <?php if($lagn == $row['language']){ echo 'checked'; }?> onclick="redirectALL()"> <?php echo $row['language'];?></p></a>
                <?php
            }
        ?>
        
    </div>
</div>

<div style="100%;margin-top: 10px">
    <div style="width:100%; background-color: black; color: white;padding: 10px">
        <p>Education Level</p>
    </div>
    <div style="width:100%; background-color: white; color: black;padding: 10px;border: 1px solid black">
        <a href="books.php?<?php echo 'type='.$type.'&&'; ?><?php echo 'lagn='.$lagn.'&&'; ?><?php echo 'cat=all'; ?>" style="text-decoration: none; color: black;"><p><input type="checkbox" <?php if($cat == 'all'){ echo 'checked'; }?> onclick="redirectALL()"> All</p></a>
        <?php
            $books = "SELECT DISTINCT `category` FROM item Group By category";
            $books_result = $conn->query($books);
            while($row = $books_result->fetch_assoc()) {
                ?>
                <a href="books.php?<?php echo 'type='.$type.'&&'; ?><?php echo 'lagn='.$lagn.'&&'; ?><?php echo 'cat='.$row['category'].''; ?>" style="text-decoration: none; color: black;">
                    <p><input type="checkbox" <?php if($cat == $row['category']){ echo 'checked'; }?> onclick="redirectALL()"> <?php echo $row['category'];?></p>
                </a>
                <?php
            }
        ?>
        
    </div>
</div> -->

<script>
    function redirectALL() 
    {
        window.location.replace("books.php");
    }
    function redirectBook() 
    {
        window.location.replace("books.php?type=ebook");
    }
    function redirectVideo() 
    {
        window.location.replace("books.php?type=video");
    }
</script>