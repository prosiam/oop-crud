<?php 

	namespace App\controllers;
	use App\support\Database;

	/**
	 * Student data and file management
	 */
	class Student extends Database
	{
		// data catch from student form
		public function addNewStudent($name,$email,$cell,$photo){
			
			//call a file upload method for uploading file and generating a unique file name
			$unique_file_name=$this -> fileUpload($photo,'media/img/students/');


			//data send to insert method
			$data=$this -> insert('students',[
				'name' => $name,
				'email'=> $email,
				'cell' => $cell,
				'photo' => $unique_file_name
			]);
			if ($data) {
				return "<p class='alert alert-success'>Student added successful !<button class='btn btn-primary btn-sm close' data-dismiss='alert'>&times</button></p>";
			}

		}

		/**
		 * get all students information from students table
		 */
		public function allStudent(){
			$data=$this -> all('students','DESC');
			if ($data) {
				return $data;
			}	
		}

		/**
		 * Delete student from student table
		 */
		public function deleteStudent($id){
			$data=$this -> delete('students',$id);
			if ($data) {
				return "<p class='alert alert-success'>Student deleted successfully !<button class='btn btn-primary btn-sm close' data-dismiss='alert'>&times</button></p>";
			}
		}
		/**
		 * Show single student's data
		 */
		public function singleStudent($id){
			$data=$this -> find("students",$id);
			if ($data) {
				return $data -> fetch_assoc();
			}
		}
		/**
		 * File uploading
		 */
		public function upload($photo,$location){
			//call a file upload method for uploading file and generating a unique file name
			$unique_file_name=$this -> fileUpload($photo,$location);
			if ($unique_file_name) {
				return $unique_file_name;
			}
		}

		/**
		 * Update student information
		 */
		public function updateStudent($name,$email,$cell,$photo_name='',$id){
			
			
				
				//data send to update method
				$data=$this -> update('students',$id,"name='$name',email='$email',cell='$cell',photo='$photo_name'");
			
				if ($data) {
				return "<p class='alert alert-success'>Information updated successfuly !<button class='btn btn-primary btn-sm close' data-dismiss='alert'>&times</button></p>";
			}
		}
		
		
	}















