<?php
namespace Diet;

use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;

class Server implements MessageComponentInterface
{
    protected $clients;

    public function __construct()
    {
        $this->clients = new \SplObjectStorage;
        echo "Started";
    }

    public function onOpen(ConnectionInterface $conn)
    {
        // Store the new connection to send messages to later
        $this->clients->attach($conn);

        echo "New connection! ({$conn->resourceId})\n";
    }

    public function onMessage(ConnectionInterface $from, $msg)
    {
        $messageData = json_decode($msg, true);

        // Check if the message is a valid JSON and contains necessary fields
        if ($messageData && isset($messageData['user_info'])) {
            $userInfo = $messageData['user_info'];

            // Do something with the user information
            $this->handleUserInfo($from, $userInfo);
        } else {
            // The message is not in the expected format, handle it accordingly
            // For now, just echo the message
            echo "Received message from {$from->resourceId}: {$msg}\n";
        }
    }

    private function handleUserInfo(ConnectionInterface $from, array $userInfo)
    {
        // Perform actions with the received user information
        // For example, you can store it, broadcast it to other users, etc.

        // In this example, just echo the user information
        echo "Received user information from {$from->resourceId}: " . json_encode($userInfo) . "\n";

        // Send a response back to the user (optional)
        $response = [
            'status' => 'success',
            'message' => 'User information received successfully',
        ];

        $from->send(json_encode($response));
    }

    public function onClose(ConnectionInterface $conn)
    {
        // The connection is closed, remove it, as we can no longer send it messages
        $this->clients->detach($conn);

        echo "Connection {$conn->resourceId} has disconnected\n";
    }

    public function onError(ConnectionInterface $conn, \Exception $e)
    {
        echo "An error has occurred: {$e->getMessage()}\n";

        $conn->close();
    }
}