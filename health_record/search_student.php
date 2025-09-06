<?php
include '../db.php';

if (isset($_POST['studentID'])) {
    $studentID = $conn->real_escape_string($_POST['studentID']);

    // Get student + master health record
    $sql = "SELECT 
                p.studentID,
                CONCAT_WS(' ', p.FirstName, p.MiddleName, p.LastName) AS full_name,
                p.CurrentCourse as Course,
                p.CurrentYearLevel,
                hr.Height,
                hr.Weight,
                hr.BloodType,
                hr.MedicalCondition,
                hr.Notes
            FROM personalinfo p
            LEFT JOIN healthrecord hr ON p.PersonalID = hr.PersonalID
            WHERE p.studentID = '$studentID'
            LIMIT 1";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        echo "
        <div class='d-flex align-items-center mb-3'>
          <img src='https://via.placeholder.com/100' class='rounded-circle me-3'>
          <div>
            <h5>{$row['full_name']}</h5>
            <p class='mb-0'><strong>ID:</strong> {$row['studentID']} | <strong>Course:</strong> {$row['Course']} | <strong>Year:</strong> {$row['CurrentYearLevel']}</p>
            <p class='mb-0'><strong>Height:</strong> {$row['Height']} | <strong>Weight:</strong> {$row['Weight']}</p>
            <p class='mb-0'><strong>Blood Type:</strong> {$row['BloodType']} | <strong>Condition:</strong> {$row['MedicalCondition']}</p>
            <p class='mb-0 text-muted'>{$row['Notes']}</p>
          </div>
        </div>";

        // Fetch visit logs
        $sqlLogs = "SELECT * FROM health_record_log WHERE studentID = '$studentID' ORDER BY visitDate DESC";
        $logs = $conn->query($sqlLogs);

        echo "<h6 class='mt-4'>Visit History</h6>";
        echo "<div class='table-responsive' style='max-height:250px; overflow-y:auto;'>
                <table class='table table-bordered table-sm text-center'>
                  <thead class='table-light'>
                    <tr>
                      <th>Date</th>
                      <th>Purpose</th>
                      <th>Diagnosis</th>
                      <th>Medicine</th>
                      <th>Nurse</th>
                    </tr>
                  </thead>
                  <tbody>";
        if ($logs->num_rows > 0) {
            while ($log = $logs->fetch_assoc()) {
                echo "<tr>
                        <td>{$log['visitDate']}</td>
                        <td>{$log['visitPurpose']}</td>
                        <td>{$log['diagnosis']}</td>
                        <td>{$log['medicine_given']}</td>
                        <td>{$log['attending_nurse']}</td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='5' class='text-muted'>No visit logs found.</td></tr>";
        }
        echo "  </tbody>
              </table>
            </div>";
    } else {
        echo "<p class='text-danger'>No student found with ID: $studentID</p>";
    }
}
?>
