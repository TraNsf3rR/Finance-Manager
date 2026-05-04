<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);
$userId = $_SESSION['user']['id'];

// Handle GET request - fetch all user's income sources
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $sql = 'SELECT id, source_name FROM income_sources WHERE user_id = :user_id ORDER BY source_name ASC';
    $sources = $db->query($sql, ['user_id' => $userId])->get();
    
    header('Content-Type: application/json');
    echo json_encode($sources);
    exit;
}

// Handle POST request - add new income source
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = json_decode(file_get_contents('php://input'), true);
    
    if (!isset($input['source_name']) || empty(trim($input['source_name']))) {
        http_response_code(400);
        echo json_encode(['error' => 'Source name is required']);
        exit;
    }
    
    $sourceName = trim($input['source_name']);
    
    // Check if source already exists for this user
    $checkSql = 'SELECT id FROM income_sources WHERE user_id = :user_id AND LOWER(source_name) = LOWER(:source_name)';
    $existing = $db->query($checkSql, [
        'user_id' => $userId,
        'source_name' => $sourceName
    ])->find();
    
    if ($existing) {
        http_response_code(409);
        echo json_encode(['error' => 'This income source already exists']);
        exit;
    }
    
    // Insert new source
    $sql = 'INSERT INTO income_sources (user_id, source_name) VALUES (:user_id, :source_name)';
    $db->query($sql, [
        'user_id' => $userId,
        'source_name' => $sourceName
    ]);
    
    // Return the newly created source
    $newSource = [
        'id' => $db->connection->lastInsertId(),
        'source_name' => $sourceName
    ];
    
    header('Content-Type: application/json');
    http_response_code(201);
    echo json_encode($newSource);
    exit;
}
