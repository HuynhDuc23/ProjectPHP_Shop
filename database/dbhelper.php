<?php
require_once('config.php');
// Execute insert, update, delete queries
function execute($sql)
{
  // Open connection
  $conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);

  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

  mysqli_set_charset($conn, 'utf8');

  // Execute query
  if (!mysqli_query($conn, $sql)) {
    echo "Error: " . mysqli_error($conn);
  }

  // Close connection
  mysqli_close($conn);
}

// Execute select queries and return results
function executeResult($sql, $isSingle = false)
{
  $data = null;

  // Open connection
  $conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);

  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

  mysqli_set_charset($conn, 'utf8');

  // Execute query
  $resultset = mysqli_query($conn, $sql);

  if ($resultset) {
    if ($isSingle) {
      $data = mysqli_fetch_array($resultset, MYSQLI_ASSOC);
    } else {
      // Fetch all results into an array
      $data = [];
      while ($row = mysqli_fetch_array($resultset, MYSQLI_ASSOC)) {
        $data[] = $row;
      }
    }
    // Free result set
    // Giải phóng kết quả
    mysqli_free_result($resultset);
  } else {
    echo "Error: " . mysqli_error($conn);
  }

  // Close connection
  mysqli_close($conn);

  return $data;
}
