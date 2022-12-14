<?php 
class EmpGateway
{
    private PDO $conn;
    
    public function __construct(Database $database)
    {
        $this->conn = $database->getConnection();
    }
    
    public function getAll(): array
    {
        $sql = "SELECT *
                FROM employees e, hr h
                WHERE e.id=h.id";
                
        $stmt = $this->conn->query($sql);
        
        $data = [];
        
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            
            // $row["is_available"] = (bool) $row["is_available"];
            
            $data[] = $row;
        }
        
        return $data;
    }
    

    
}
?>