<?php
include '../db.php';

$student_number = $_GET['student_number'] ?? '';

if ($student_number != '') {
    $stmt = $conn->prepare("SELECT full_name, course, year_section FROM students WHERE student_number = ?");
    $stmt->bind_param("s", $student_number);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        echo json_encode([
            "success" => true,
            "full_name" => $row['full_name'],
            "course" => $row['course'],
            "year_section" => $row['year_section']
        ]);
    } else {
        echo json_encode(["success" => false]);
    }
} else {
    echo json_encode(["success" => false]);
}
