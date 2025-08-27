<?php
include '../db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $student_number = $_POST['student_number'];
    $full_name = $_POST['full_name'];
    $course = $_POST['course'];
    $year_section = $_POST['year_section'];

    // Handle photo upload
    $photo_name = time() . "_" . basename($_FILES["photo"]["name"]);
    $target = "../uploads/" . $photo_name;

    if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target)) {
        $sql = "INSERT INTO student_id_cards (student_number, full_name, course, year_section, photo) 
                VALUES ('$student_number', '$full_name', '$course', '$year_section', '$photo_name')";
        if ($conn->query($sql)) {
            header("Location: id_generation.php?success=1");
        } else {
            echo "Error: " . $conn->error;
        }
    } else {
        echo "Error uploading photo.";
    }
}
?>
