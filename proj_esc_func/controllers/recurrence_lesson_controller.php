<?php 
require('C:\xampp\htdocs\sistema\proj_esc_func\model\recurrence_lesson.php');
require('C:\xampp\htdocs\sistema\proj_esc_func\controllers\recurrence_lesson_service.php');
require('C:\xampp\htdocs\sistema\proj_esc_func\connection.php');
$conn = new Connection();
$rec_lesson = new RecurrenceLesson();
if($action == 'cad'){
	if(isset($_POST['day_of_week']) || || isset($_POST['order_lesson']) || isset($_POST['id_subject_class'])){
		$day_of_week = $_POST['day_of_week'];
		$order_lesson = $_POST['order_lesson'];
		$id_subject_class = $_POST['id_subject_class'];
		
		$rec_lesson->__set('day_of_week', $day_of_week);
		$rec_lesson->__set('order_lesson', $order_lesson);
		$rec_lesson->__set('id_subject_class', $id_subject_class);

		$rec_lesson_service = new RecurrenceLessonService($conn, $rec_lesson);
		echo json_encode($rec_lesson_service->insert());	
	}else{
		echo json_encode("<p class='msg msg-warn'>Todos os dados devem ser preenchidos</p>");
	}
}
?>