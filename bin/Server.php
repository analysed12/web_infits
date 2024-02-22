<?php
	require 'C:\xampp\htdocs\web_infits-main\vendor\autoload.php';
	
	use Ratchet\ConnectionInterface;
	use Ratchet\MessageComponentInterface;
	use Ratchet\Server\IoServer;
	use Ratchet\WebSocket\WsServer;
	use Ratchet\Http\HttpServer;
    
	
		class DietitianServer implements MessageComponentInterface{
		  
			protected $clients=[];
			protected $dietitians=[];
			
			public function onOpen(ConnectionInterface $conn)
            {
                // query parameter to determine if connection is from client or dietitian
                $query = $conn->httpRequest->getUri()->getQuery();

                $isDietitian = false;

                // checking for a specific query parameter
                parse_str($query, $queryParameters);

                $role = isset($queryParameters['role']) ? $queryParameters['role'] : 'client';

                if ($role == 'dietitian') {
                    // Connection is from dietitian
                    $this->dietitians[$conn->resourceId] = $conn;
                } else {
                    // Connection is from client
                    $this->clients[$conn->resourceId] = $conn;
                }
            }

					
			public function onMessage(ConnectionInterface $from,$msg){
				
				$messageData=json_decode($msg,true);
					if($messageData && isset($messageData['sender'])&& isset($messageData['receipent'])){
						$senderId     =$messageData['sender'];
						$receipentId  =$messageData['receipent'];
						
						//Routing the message based on sender and receipent
						
						if(isset ($this->clients[$receipentId])){
						   $this->clients[$receipentId]->send($msg);
						}
						
						elseif(isset ($this->dietitians[$receipentId])){
							$this->dietitians[$receipentId]->send($msg);
						}
					}
				}
				
				
				public function onClose(ConnectionInterface $conn) {
        if (isset($this->dietitians[$conn->resourceId])) {
            // Remove the connection from the dietitians list
            unset($this->dietitians[$conn->resourceId]);
        } elseif (isset($this->clients[$conn->resourceId])) {
            // Remove the connection from the clients list
            unset($this->clients[$conn->resourceId]);
        }
    }

    public function onError(ConnectionInterface $conn, \Exception $e) {
        $conn->close();
    }
}

$server = IoServer::factory(
    new HttpServer(
        new WsServer(
            new DietitianServer()
        )
    ),
    8080

   
);

$server->run();