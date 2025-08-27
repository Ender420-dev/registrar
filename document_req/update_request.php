<?php
include '../db.php';

$id = $_GET['id'] ?? 0;
$status = $_GET['status'] ?? '';

if ($id > 0 && in_array($status, ['Approved','Rejected','Released'])) {
    $stmt = $conn->prepare("UPDATE document_requests SET status = ?, updated_at = NOW() WHERE id = ?");
    $stmt->bind_param("si", $status, $id);
    if ($stmt->execute()) {
        header("Location: document_request_admin.php?msg=updated");
    } else {
        echo "Error updating status.";
    }
} else {
    echo "Invalid request.";
}
