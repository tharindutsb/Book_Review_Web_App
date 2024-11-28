<?php
header("Content-Type: application/json");
$data = json_decode(file_get_contents("php://input"), true); 

$conn = new mysqli("localhost:3380", "root", "", "book_reviews");  // default port change into 3380

if ($conn->connect_error) {
    die(json_encode(["error" => $conn->connect_error]));
}


if (!isset($data["id"]) || !isset($data["book_title"]) || !isset($data["author"]) || !isset($data["rating"]) || !isset($data["review_text"])) {
    echo json_encode(["success" => false, "error" => "Missing required fields"]);
    exit;
}

$sql = "UPDATE reviews SET book_title = ?, author = ?, rating = ?, review_text = ? WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssisi", $data["book_title"], $data["author"], $data["rating"], $data["review_text"], $data["id"]);

if ($stmt->execute()) {
    if ($stmt->affected_rows > 0) {
        echo json_encode(["success" => true, "message" => "Review updated successfully"]);
    } else {
        echo json_encode(["success" => false, "error" => "No review found with the specified ID"]);
    }
} else {
    echo json_encode(["success" => false, "error" => $stmt->error]);
}

$conn->close();
?>
