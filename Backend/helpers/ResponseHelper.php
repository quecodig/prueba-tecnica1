<?php
	namespace App\Helpers;
	class ResponseHelper {
		public static function sendSuccess($data, $message = 'Success', $statusCode = 200) {
			http_response_code($statusCode);
			header('Content-Type: application/json');
			echo json_encode([
				'status' => 'success',
				'message' => $message,
				'data' => $data
			]);
			exit;
		}

		public static function sendError($message, $statusCode = 400) {
			http_response_code($statusCode);
			header('Content-Type: application/json');
			echo json_encode([
				'status' => 'error',
				'message' => $message
			]);
			exit;
		}
	}