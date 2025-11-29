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
<main>
    <h2>STUDENT ENTRIES LIST</h2>
	    <h3>Double Click on the Selected</h3>
    <div class="table-contain">
	<table>
		<thead>
			<tr>
			<th>Name</th>
			<th>Email</th>
			<th>Updated</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($students as $student): ?>
				<tr onclick="makeRowClickable(this, <?php echo htmlspecialchars($student['student_ID']); ?>)">
	
					<td><?php echo htmlspecialchars($student['student_lname']).', '.
					htmlspecialchars($student['student_fname']); ?>
						<a href="../login/register.php?id=<?php echo htmlspecialchars($student['student_ID']); ?>" class="edit-link"></a>
					</td>
						<td><?php echo $student['student_email']; ?>
						<a href="../login/register.php?id=<?php echo htmlspecialchars($student['student_ID']); ?>" class="edit-link"></a>
					</td>
						</td>
						<td><?php echo $student['student_updated']; ?>
						<a href="../login/register.php?id=<?php echo htmlspecialchars($student['student_ID']); ?>" class="edit-link"></a>
					</td>
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
