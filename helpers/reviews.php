<?php
 
 require_once('../functions/reusableQuery.php');
 
 
 /** submit a reviews */
 if (isset($_POST['submitReview'])) {
	 unset($_POST['submitReview']);
	 
	 $res = saveData($_POST, 'reviews');
	 if ($res) {
		 $success = "Review submited successfuly. Thank you.";
	 }else{
		 $err = "Error, Failed to submit";
	 }
	 
 }

/* Update */
if (isset($_POST['Update'])) {
	//dd($_POST);
	unset($_POST['Update']);
	$res = updateDetails($_POST, 'reviews', 'review_id', $_POST['review_id']);
   
    if ($res) {
        $success = "Updated Successfuly";
    } else {
        $err = "Failed, please try again";
    }
}


/** publish review*/
if (isset($_POST['publish'])) {
	//dd($_POST);
	$datas = [
		'review_published' => 1
	];
	
	$res= updateDetails($datas, 'reviews', 'review_id', $_POST['review_id']);
	if ($res) {
		$success = "Published successfuly";
	}else{
		$err = "Error, Failed to published";
	}
	
}

/** unpublish review*/
if (isset($_POST['unpublish'])) {
	//dd($_POST);

	$datas = [
		'review_published' => 0
	];
	
	$res= updateDetails($datas, 'reviews', 'review_id', $_POST['review_id']);
	if ($res) {
		$success = "unpublished successfuly";
	}else{
		$err = "Error, Failed to unpublished";
	}
	
}

?>