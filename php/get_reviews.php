<?php
header("Content-Type: application/json");

$conn = new mysqli("localhost:3380", "root", "", "book_reviews"); // default port change into 3380

if ($conn->connect_error) {
    die(json_encode(["error" => $conn->connect_error]));
}


if (isset($_GET['id'])) {
    $reviewId = $_GET['id'];
    $sql = "SELECT * FROM reviews WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $reviewId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $review = $result->fetch_assoc();
        echo json_encode(["success" => true, "review" => $review]);
    } else {
        echo json_encode(["success" => false, "error" => "Review not found"]);
    }
} else {
    $sql = "SELECT * FROM reviews ORDER BY date_added DESC";
    $result = $conn->query($sql);

    $reviews = [];

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $reviews[] = $row;
        }
    }

    echo json_encode(["success" => true, "reviews" => $reviews]);
}

$conn->close();
?>
