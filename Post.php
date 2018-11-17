<?php
	class Post
	{
		private $postId;
		private $post;
		private $lecturerModuleId;
		
		public function __construct($postId,$post,$lecturerModuleId)
		{
			$this -> postId = $postId;
			$this -> post = $post;
			$this -> lecturerModuleId = $lecturerModuleId;
		}
		public function setPostId($postId)
		{
			$this -> postId = $postId;
		}
		public function getPostId()
		{
			return $this -> postId;
		}
		public function setPost($post)
		{
			$this -> post = $post;
		}
		public function getPost()
		{
			return $this -> post;
		}
		public function setLecturerModuleId($lecturerModuleId)
		{
			$this -> lecturerModuleId = $lecturerModuleId;
		}
		public function getLecturerModuleId()
		{
			return $this -> lecturerModuleId;
		}
	}
?>