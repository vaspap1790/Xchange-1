<?php
    global $ConnectingDB;

    $sqlFavorites  = "SELECT f.itemId FROM favorite f WHERE f.userId=" . $_SESSION["userId"];
    $stmtFavorites = $ConnectingDB->query($sqlFavorites);
    $favorites = array();
    while ($favoritesRows = $stmtFavorites->fetch()) {
        array_push($favorites, $favoritesRows["itemId"]);
    }

    $sqlCount = "SELECT COUNT(*) FROM item i
    INNER JOIN category c
    ON i.categoryId = c.categoryId
    INNER JOIN user u
    ON i.userId = u.userId
    INNER JOIN photo p
    ON i.itemId = p.itemId ";

    $sql = "SELECT i.itemId as itemId, i.name as itemName, i.description as description,
    i.dateTime_ as dateTime, c.categoryId as categoryId, c.name as categoryName,
    u.userId as userId, u.username as username, p.name as photoName
    FROM item i
    INNER JOIN category c
    ON i.categoryId = c.categoryId
    INNER JOIN user u
    ON i.userId = u.userId
    INNER JOIN photo p
    ON i.itemId = p.itemId ";

    $sorting = "ORDER BY i.itemId desc ";
    $pagination = "";

    // Query when pagination is active
    if (isset($_GET["page"])) {

        $page = $_GET["page"];
        $numberOfItemsForEachPage = 8;

        if($page<1){
            $showPostFrom = 0;
        }else {
            $showPostFrom=($page * $numberOfItemsForEachPage) - $numberOfItemsForEachPage;
        }

        $pagination .= "LIMIT " . $showPostFrom . "," . $numberOfItemsForEachPage . " ";

    }

    // SQL query when Searh button is active
    if(isset($_GET["search"])){

        $search = $_GET["search"];

        // Count query before pagination
        $sqlCount .= "WHERE i.description LIKE :search
        OR i.name LIKE :search
        OR c.name LIKE :search
        OR u.username LIKE :search ";
        $stmtCount = $ConnectingDB->prepare($sqlCount);
        $stmtCount->bindValue(':search', '%' . $search . '%');
        $stmtCount->execute();
        $countItems = $stmtCount->rowcount();

        // Fetch Data query with pagination
        $sql .= "WHERE i.description LIKE :search
        OR i.name LIKE :search
        OR c.name LIKE :search
        OR u.username LIKE :search ";
        $sql .= $sorting;
        $sql .= $pagination;

        $stmt = $ConnectingDB->prepare($sql);
        $stmt->bindValue(':search', '%' . $search . '%');
        $stmt->execute();
    }

    // Query when category is active in URL Tab
    elseif (isset($_GET["categoryId"])) {

        $categoryId = $_GET["categoryId"];

        // Count query before pagination
        $sqlCount .= "WHERE c.categoryId LIKE :categoryId ";
        $stmtCount = $ConnectingDB->prepare($sqlCount);
        $stmtCount->bindValue(':categoryId', $categoryId);
        $stmtCount->execute();
        $countItems = $stmtCount->rowcount();

        // Fetch Data query with pagination
        $sql .= "WHERE c.categoryId LIKE :categoryId ";
        $sql .= $sorting;
        $sql .= $pagination;

        $stmt = $ConnectingDB->prepare($sql);
        $stmt->bindValue(':categoryId', $categoryId);
        $stmt->execute();
    }

    // No filters
    else{

        // Count query before pagination
        $stmtCount = $ConnectingDB->query($sqlCount);
        $totalRows = $stmtCount->fetch();
        $countItems = array_shift($totalRows);

        // Fetch Data query with pagination
        $sql .= $sorting;
        $sql .= $pagination;
        $stmt = $ConnectingDB->query($sql);
    }

    while ($dataRows = $stmt->fetch()) {

        $countItems++;

        $itemId         = $dataRows["itemId"];
        $itemName       = $dataRows["itemName"];
        $description    = $dataRows["description"];
        $dateTime       = $dataRows["dateTime"];
        $categoryId     = $dataRows["categoryId"];
        $categoryName   = $dataRows["categoryName"];
        $userId         = $dataRows["userId"];
        $username       = $dataRows["username"];
        $photoName      = $dataRows["photoName"];

        $sqlRatings     = "SELECT rating FROM rating WHERE userRatedId = '$userId'";
        $stmtRatings    = $ConnectingDB->query($sqlRatings);
        $sum = 0;
        $countRatings = 0;

        while($ratingRows = $stmtRatings->fetch()){
            $sum += $ratingRows["rating"];
            $countRatings++;
        }
        $rating = ceil( $sum / $countRatings);

?>

	<div class="card text-center col-3 p-1">
		<img class="card-img-top" src="images/uploaded/<?php echo $photoName ?>" alt="" width="260" height="195">
		<div class="card-body">   

            <?php 
                if(in_array($itemId, $favorites)){       
            ?>    

                <a id="heart<?php echo $itemId?>" onclick="toggleFavorite(<?php echo $itemId?>,<?php echo $_SESSION['userId']?>,'unfavorite')" style ="font-size: 35px;">&#9829;</a>

            <?php } else { ?>
  
                <a id="heart<?php echo $itemId?>" onclick="toggleFavorite(<?php echo $itemId?>,<?php echo $_SESSION['userId']?>,'favorite')" style ="font-size: 35px;">&#9825;</a>

            <?php } ?>    

			<div><small>Uploaded in <?php echo $dateTime ?></small></div>
			<div>by <a> <?php echo $username ?> </a></div>
			<div class="rating">
				<span style="font-size: x-small; margin-top: 1.6%;">(<?php echo $countRatings; ?>) </span>

                <?php  for( $i=5; $i>$rating; $i-- ){  ?>
                    <input type="radio" name="rating<?php echo $itemId . $i; ?>" value="<?php echo $i; ?>" 
                    id="rating<?php echo $itemId . $i; ?>"><label for="rating<?php echo $itemId . $i; ?>">☆</label>
                <?php } ?>

                <?php  for( $i=$rating; $i>=1; $i-- ){  ?>
                    <input type="radio" name="rating<?php echo $itemId . $i; ?>" checked="checked" value="<?php echo $i; ?>" 
                    id="rating<?php echo $itemId . $i; ?>"><label for="rating<?php echo $itemId . $i; ?>">☆</label>
                <?php } ?>

			</div>
			<hr style="margin-top: 0;">
			<p><?php echo $itemName ?>
			</p>
			<button type="button" class="btn btn-info btn-sm" data-toggle="modal"
				data-target="#requestModal">
				Exchange
			</button>
		</div>
	</div>

<?php } ?>

