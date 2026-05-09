<?php
require_once "config/database.php";

class User
{
    private $conn;

    public function __construct(){
        $db = new database();
        $this->conn = $db->conn;
    }

    // ==========================================
    // SECTION: USERS TABLE FUNCTIONS (tbl_users)
    // ==========================================

    public function getById($id)
    {
        $sql = "SELECT * FROM tbl_users WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function update($id, $username, $password)
    {
        
        $sql = "UPDATE tbl_users SET username = ?, password = ? WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssi", $username, $password, $id);
        $stmt->execute();
        header("Location: index.php");
        exit(); 
    }

    public function delete($id)
    {
        $sql = "DELETE FROM tbl_users WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        header("Location: index.php");
        exit();
    }

    public function getAllUsers()
    {
        $db = new database();
       $sql = "SELECT * FROM tbl_users";
       $stmt = $db->conn->prepare($sql);
       $stmt->execute();
       return $stmt->get_result();
    }

    public function insert($username, $password)
    {
        
        $sql = "INSERT INTO tbl_users (username, password) VALUES (?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        header("Location: index.php");
        exit();
    }

    // ==========================================
    // SECTION: EMPLOYEES TABLE FUNCTIONS (tbl_employees)
    // ==========================================

    public function getInstructById($id)
    {
        $sql = "SELECT * FROM tbl_employees WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function getAllInstruct()
    {
        $sql = "SELECT * FROM tbl_employees";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->get_result();
    }

    public function insertInstruct($name, $nameEnglish, $department, $note)
    {
        $sql = "INSERT INTO tbl_employees (name, nameEnglish, department, note) VALUES (?,?,?,?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssss", $name, $nameEnglish, $department, $note);
        $stmt->execute();
        header("Location: instruct.php");
        exit();
    }

    public function updateInstruct($id, $name, $nameEnglish, $department, $note)
    {
        $sql = "UPDATE tbl_employees SET name = ?, nameEnglish = ?, department = ?, note = ? WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssssi", $name, $nameEnglish, $department, $note, $id);
        $stmt->execute();
        header("Location: instruct.php");
        exit();
    }

    public function deleteInstruct($id)
    {
        $sql = "DELETE FROM tbl_employees WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        header("Location: instruct.php");
        exit();
    }
}