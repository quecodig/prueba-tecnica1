<?php
	namespace App\Model;
	class ProductsModel {
		private $db;

		public function __construct($databaseConnection) {
			$this->db = $databaseConnection;
		}

		public function all() {
			$stmt = $this->db->prepare("SELECT * FROM products");
			$stmt->execute();
			return $stmt->fetchAll(\PDO::FETCH_ASSOC);
		}

		public function find($id) {
			$stmt = $this->db->prepare("SELECT * FROM products WHERE id = :id");
			$stmt->bindParam(':id', $id);
			$stmt->execute();
			return $stmt->fetch(\PDO::FETCH_ASSOC);
		}

		public function create($data) {
			$stmt = $this->db->prepare("INSERT INTO products (name, description) VALUES (:name, :description)");
			$stmt->bindParam(':name', $data['name']);
			$stmt->bindParam(':description', $data['description']);
			return $stmt->execute();
		}

		public function update($id, $data) {
			$stmt = $this->db->prepare("UPDATE products SET name = :name, description = :description WHERE id = :id");
			$stmt->bindParam(':name', $data['name']);
			$stmt->bindParam(':description', $data['description']);
			$stmt->bindParam(':id', $id);
			return $stmt->execute();
		}

		public function delete($id) {
			$stmt = $this->db->prepare("DELETE FROM products WHERE id = :id");
			$stmt->bindParam(':id', $id);
			return $stmt->execute();
		}
	}