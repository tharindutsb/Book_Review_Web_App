<?php
header("Content-Type: application/json"); 
$data = json_decode(file_get_contents("php://input"), true); 

$conn = new mysqli("localhost:3380", "root", "", "book_reviews");// default port change into 3380

if ($conn->connect_error) {
    die(json_encode(["error" => $conn->connect_error]));
}

$sql = "INSERT INTO reviews (book_title, author, rating, review_text) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssis", $data["book_title"], $data["author"], $data["rating"], $data["review_text"]);

if ($stmt->execute()) {
    echo json_encode(["success" => true, "message" => "Review added successfully"]);
} else {
    echo json_encode(["success" => false, "error" => $stmt->error]);
}


$conn->close(); 
?>
