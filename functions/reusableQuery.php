<?php
require('../config/config.php');

// check db connection success
if($mysqli->connect_error){
	die('database connection error'. $mysqli->connect_error);
}

/**
 * print data in readable format on screen
 */
function dd($value)
{
	echo "<pre>", print_r($value, true), "</pre>";
	die();
}

/**
 * select a record form database
 */
function selectOne($table, array $filters = []) {
  global $mysqli;

  // Build the WHERE clause dynamically based on filters
  $whereClause = "";
  if (!empty($filters)) {
    $placeholders = array_fill(0, count($filters), "?");
    $whereClause = " WHERE " . implode(" AND ", array_map(function ($key, $value) {
      return "$key = ?";
    }, array_keys($filters), $filters));
  }

  // Prepare and execute the query with parameterized statements for security
  $stmt = $mysqli->prepare("SELECT * FROM $table" . $whereClause);
  if (!empty($filters)) {
    $stmt->bind_param(str_repeat("s", count($filters)), ...array_values($filters));
  }
  $stmt->execute();

  // Fetch the result (assuming only one row is expected)
  $result = $stmt->get_result();
  $data = $result->fetch_assoc();

  // Close the statement and result
  $stmt->close();
  $result->close();

  return $data;
}

/**
 * select a value form db colum
 */
function selectItem($table, $column, array $filters = []) {
  global $mysqli;

  // Build the WHERE clause dynamically based on filters
  $whereClause = "";
  if (!empty($filters)) {
    $placeholders = array_fill(0, count($filters), "?");
    $whereClause = " WHERE " . implode(" AND ", array_map(function ($key, $value) {
      return "$key = ?";
    }, array_keys($filters), $filters));
  }

  // Prepare and execute the query with parameterized statements for security
  $stmt = $mysqli->prepare("SELECT $column FROM $table" . $whereClause);
  if (!empty($filters)) {
    $stmt->bind_param(str_repeat("s", count($filters)), ...array_values($filters));
  }
  $stmt->execute();

  // Fetch the result (assuming only one row is expected)
  $result = $stmt->get_result();
  $data = $result->fetch_assoc();

  // Close the statement and result
  $stmt->close();
  $result->close();

  return $data;
}

/**
 * Select multiple records from DB
 */
function selectMany($table, array $filters = []) {
  global $mysqli;

  // Build the WHERE clause dynamically based on filters
  $whereClause = "";
  if (!empty($filters)) {
    $placeholders = array_fill(0, count($filters), "?");
    $whereClause = " WHERE " . implode(" AND ", array_map(function ($key, $value) {
      return "$key = ?";
    }, array_keys($filters), $filters));
  }

  // Prepare and execute the query with parameterized statements for security
  $stmt = $mysqli->prepare("SELECT * FROM $table" . $whereClause);
  if (!empty($filters)) {
    $stmt->bind_param(str_repeat("s", count($filters)), ...array_values($filters));
  }
  $stmt->execute();

  // Fetch all results using a loop
  $results = $stmt->get_result();
  $data = [];
  while ($row = $results->fetch_assoc()) {
    $data[] = $row;
  }

  // Close the statement and result
  $stmt->close();
  $results->close();

  return $data;
}


/**
 * Uploading files
 */
function uploadFiles($filesArray=[], $id)
{
	$file_paths = [];
	//Create target upload directory		
	$destinationDir = "../storage/images/".$id;
	if (!is_dir($destinationDir)) {
		mkdir($destinationDir);
	}
	
	foreach ($filesArray as $key => $value) {
		//dd($value['name']);
		if(!empty($value['name'])){
			$file_name = time(). '_' .$value['name'];
			$file_path = $destinationDir."/".$file_name;
			$value['name'] = $file_name;
			$result = move_uploaded_file($value['tmp_name'], $file_path);
			if($result){
				array_push($file_paths, [$key=>$file_path]);
			}else{
				$err="File upoad failed, try again laiter";
				return 0;
			}
		}
	}
	return $file_paths;
}

/**
 * dynamicaly saving data into DB
 */
function saveData($postArray, $table) {

	global $mysqli;
    
	/* Extracting and sanitizing input data */
	$sanitizedData = [];
	foreach ($postArray as $key => $value) {
		$sanitizedData[$key] = mysqli_real_escape_string($mysqli, $value);
	}
	
	/* Constructing the column names and values for the insert query */
	$columns = implode(', ', array_keys($sanitizedData));
	$values = "'" . implode("', '", $sanitizedData) . "'";
	
	/* Constructing and executing the insert query */
	$add_query_res = "INSERT INTO $table ({$columns}) VALUES ({$values})";
	$res = mysqli_query($mysqli, $add_query_res); 

	return $res;
	
}
/**
 * dynamicaly saving data into DB
 */
function saveDatas($postArray, $table) {

	global $mysqli;
    
	/* Extracting and sanitizing input data */
	$sanitizedData = [];
	foreach ($postArray as $key => $value) {
		$sanitizedData[$key] = mysqli_real_escape_string($mysqli, $value);
	}
	
	/* Constructing the column names and values for the insert query */
	$columns = implode(', ', array_keys($sanitizedData));
	$values = "'" . implode("', '", $sanitizedData) . "'";
	
	/* Constructing and executing the insert query */
	$add_query_res = "INSERT INTO $table ({$columns}) VALUES ({$values})";
	$res = mysqli_query($mysqli, $add_query_res); 

	 /* Returning the ID of the saved data if insert was successful */
	 if ($res) {
        return mysqli_insert_id($mysqli);
    } else {
        return false;
    }
	
}

/**
 * Updating DB Column
 */
function updateDetails($postArray, $table, $keyy, $keyValue) {

	global $mysqli;
	//$sessionAttacheeId = $_SESSION['attachee_id'];
	//dd($postArray);
    
        /* Extracting and sanitizing input data */
        //$attachee_id = mysqli_real_escape_string($mysqli, $sessionAttacheeId);
        $fieldsToUpdate = [];
        foreach ($postArray as $key => $value) {
            $escapedValue = ucwords(strtolower(mysqli_real_escape_string($mysqli, $value)));
            $fieldsToUpdate[$key] = $escapedValue;
        }
        
        /* Constructing the SQL query */
        $setClauses = [];
        foreach ($fieldsToUpdate as $field => $value) {
            $setClauses[] = "{$field} = '{$value}'";
        }
        $setClauseString = implode(', ', $setClauses);
        
        /* Executing the update query */
        $updateQuery = "UPDATE $table SET {$setClauseString} WHERE $keyy = '{$keyValue}'";
		//dd($updateQuery);
        $updateResult = mysqli_query($mysqli, $updateQuery);
		if (!$updateResult = mysqli_query($mysqli, $updateQuery)) {
			// Handle the error
			echo "Error updating record: " . mysqli_error($mysqli) . PHP_EOL;
			return false; // Or throw an exception
		  }		
		return true;
      
}

/**
 * count number of rows in database
 */
function countTableRows($tableName, array $conditions = []) {
	global $mysqli;
	$query = "SELECT COUNT(*) FROM $tableName";
  
	  // Add WHERE clause with optional conditions
	if (!empty($conditions)) {
		$whereClause = [];
		$placeholders = array_fill(0, count($conditions), "?"); // Create placeholders
		foreach ($conditions as $field => $value) {
			$whereClause[] = "$field = $placeholders[0]"; // Use placeholder from array
			array_shift($placeholders); // Remove used placeholder
		}
		$query .= " WHERE " . implode(" AND ", $whereClause);
	}
	$stmt = $mysqli->prepare($query);
  
	if (!$stmt) {
	  // Handle potential prepare errors here (e.g., throw exception)
	  return false;
	}
  
	// Bind values for conditions (if any)
	if (!empty($conditions)) {
	$bindParams = array_fill(0, count($conditions), "s"); // "s" for string type
	$bindValues = array_values($conditions);
	$stmt->bind_param(...array_merge($bindParams, $bindValues));
	} else {
	
	}
  
	$stmt->execute();
	$stmt->bind_result($rowCount);
	$stmt->fetch();
	$stmt->close();
  
	return $rowCount;
  }
  