<?php
header("Content-Type: application/json");

$data = json_decode(file_get_contents("php://input"), true);


if (!isset($data["id"])) {
    echo json_encode(["success" => false, "error" => "Review ID is required"]);
    exit; 
}

$conn = new mysqli("localhost:3380", "root", "", "book_reviews"); //  port 3380


if ($conn->connect_error) {
    echo json_encode(["success" => false, "error" => $conn->connect_error]);
    exit();
}

$sql = "DELETE FROM reviews WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $data["id"]);

if ($stmt->execute()) {
    if ($stmt->affected_rows > 0) {
        echo json_encode(["success" => true, "message" => "Review deleted successfully"]);
    } else {
        echo json_encode(["success" => false, "error" => "No review found with the specified ID"]);
    }
} else {
    echo json_encode(["success" => false, "error" => $stmt->error]);
}

$conn->close(); 
?>
