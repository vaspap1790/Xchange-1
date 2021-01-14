<?php

    $favorites = array();
    global $ConnectingDB;

    if (confirm_Login() && !check_if_logged_user_profile()){
        $sqlFavorites  = "SELECT f.itemId FROM favorite f WHERE f.userId=" . $_SESSION["userId"];
        $stmtFavorites = $ConnectingDB->query($sqlFavorites);
        while ($favoritesRows = $stmtFavorites->fetch()) {
            array_push($favorites, $favoritesRows["itemId"]);
        }
    }

    $sqlProfileItems = "SELECT i.itemId as itemId, i.name as itemName, i.description as description,
    i.dateTime_ as dateTime, c.categoryId as categoryId, c.name as categoryName,
    u.userId as userId, u.username as username, p.name as photoName
    FROM item i
    INNER JOIN category c
    ON i.categoryId = c.categoryId
    INNER JOIN user u
    ON i.userId = u.userId
    INNER JOIN photo p
    ON i.itemId = p.itemId 
    WHERE u.username='" . getProfileUsername() . "'";

    $sorting = "ORDER BY i.itemId desc ";

    $sqlProfileItems .= $sorting;
    $stmtProfileItems = $ConnectingDB->query($sqlProfileItems);

    while ($profileItemsRows = $stmtProfileItems->fetch()) {

        $itemId         = $profileItemsRows["itemId"];
        $itemName       = $profileItemsRows["itemName"];
        $description    = $profileItemsRows["description"];
        $dateTime       = $profileItemsRows["dateTime"];
        $categoryId     = $profileItemsRows["categoryId"];
        $categoryName   = $profileItemsRows["categoryName"];
        $userId         = $profileItemsRows["userId"];
        $username       = $profileItemsRows["username"];
        $photoName      = $profileItemsRows["photoName"];

?>

	<div class="card text-center col-sm-12 col-md-6 col-lg-3 p-1">
		<img class="card-img-top" src="images/uploaded/<?php echo $photoName ?>" alt="" width="260" height="195">
		<div class="card-body">   

            <?php if (!check_if_logged_user_profile()){ ?>
                <?php if (confirm_Login()){ 
                    if(in_array($itemId, $favorites)){ ?>    
                    <a id="heart<?php echo $itemId?>" onclick="toggleFavorite(<?php echo $itemId?>,<?php echo $_SESSION['userId']?>,'unfavorite')" style ="font-size: 35px;">&#9829;</a>
                <?php } else { ?>
                    <a id="heart<?php echo $itemId?>" onclick="toggleFavorite(<?php echo $itemId?>,<?php echo $_SESSION['userId']?>,'favorite')" style ="font-size: 35px;">&#9825;</a>
                <?php } }?> 
            <?php } ?>
   

            <div>Category: <a href="items.php?categoryId=<?php echo $categoryId; ?>&page=1" title="<?php echo $categoryName; ?>"><?php 
                if(strlen($categoryName)>8){$categoryName= substr($categoryName,0,6).'..';}
                echo $categoryName;  
            ?></a></div>
            <div><small>Uploaded in <?php echo $dateTime ?></small></div>
            
			<hr style="margin-top: 0;">
            <p><?php echo $itemName ?></p>
            
            <?php if (!check_if_logged_user_profile()){ ?>
                <button type="button" class="btn btn-info btn-sm openItemModal" id="profileItem_<?php echo $itemId; ?>" data-toggle="modal"
				data-target="#itemModal">
				Exchange
			</button>
            <?php } else { ?>
                <div> 
                <button type="button" class="btn btn-info btn-sm openEditItemModal" id="editItem_<?php echo $itemId; ?>" data-toggle="modal"
				data-target="#editItemModal">
                    Edit
                </button>
                <button type="button" class="btn btn-info btn-sm openDeleteItemModal" id="deleteItem_<?php echo $itemId; ?>" data-toggle="modal"
                    data-target="#deleteModal">
                    Delete
                </button>
                </div>
            <?php } ?>


		</div>
	</div>

<?php } ?>

