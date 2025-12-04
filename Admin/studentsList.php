<?php session_start(); ?>
<!DOCTYPE html>
<!--
	Class:		cop4433
	Project:	ACE Tutoring Lab
	Author:		Jay King
	Created:	10-20-2025
	Filename:	studentsList.php
-->
<?php $_SESSION['statusFlag'] = 5;?>
<?php include '../model/database.php'; ?>
<?php include '../model/students_db.php'; ?>
<?php $students = get_students(); ?>
<html lang="en">
<?php include '../views/head.php';?>
<body>
<?php include '../views/header.php';?>

<?php
function datetimeFormat($mysql_datetime) {
    // Convert MySQL datetime string to a Unix timestamp
    $timestamp = strtotime($mysql_datetime);
    
    // Format the timestamp to the desired 'yy-mm-dd hour:minutes' format
    // 'y' for two-digit year, 'm' for month, 'd' for day
    // 'H' for 24-hour format, 'i' for minutes
    $formatted_datetime = date('y-m-d H:i', $timestamp);
    
    return $formatted_datetime;
}
?>
<main>
    <h2>STUDENT ENTRIES LIST</h2>
    <div class="table-container">
		<table>
			<thead>
				<tr>
					<th>ID</th>				
					<th>Name</th>
					<th>Email</th>
					<th>Updated</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($students as $student): ?>
					<tr onclick="makeRowClickable(this, <?php echo htmlspecialchars($student['student_ID']); ?>)">
						<a href="../login/register.php?id=<?php echo htmlspecialchars($student['student_ID']); ?>"></a>
						
						<td class="right-align"><?php echo $student['student_ID']; ?></td>		
						<td><?php echo htmlspecialchars($student['student_lname']).', '.
						htmlspecialchars($student['student_fname']); ?></td>
						<td><?php echo $student['student_email']; ?></td>
						<td><?php echo datetimeFormat($student['student_updated']); ?></td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</main>
<?php include '../views/footer.php';?>
<script>
    // JavaScript to make the entire row clickable
    function makeRowClickable(row, id) {
        row.addEventListener('click', function() {
            window.location.href = '../login/register.php?student_ID=' + id;
        });
    }
</script>
</body>
</html>
