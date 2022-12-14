<?php 

class EmpController  
{

    public function __construct(private EmpGateway $gateway)
    {
    }
    
    public function processRequest(string $method, ?string $id): void
    {
        if ($id) {
            
            
            
        } else {
            
            $this->processCollectionRequest($method);
            
        }
    }
    
    
    private function processCollectionRequest(string $method): void
    {
        switch ($method) {
            case "GET":
                echo json_encode($this->gateway->getAll());
                break;
                
            
        }
    }
    


}

?>