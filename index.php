<?php
require_once __DIR__ .'/UserRepository.php';

$repo = new UserRepository();

$method = $_SERVER['REQUEST_METHOD'];
$path = $_SERVER['REQUEST_URI'];
print_r($path);

if($method === 'GET' && $path ==='/users'){
    $users = $repo->getAll();
    echo json_encode($users);
    exit;
}

if($method === 'GET' && preg_match('#^/users/(\d+)$#', $path, $matches)){
    $id=$matches[1];
    $user=$repo->getById($id);
    echo json_encode($user);
    exit;
}

if($method==='POST' && $path==='/users'){
    $data= json_decode(file_get_contents('php://input'), true);
    $user=$repo->create($data['name'], $data['email']);
    echo json_encode($user);
    exit;
}

if($method === 'PUT' && preg_match('#^/user/(\d+)$#',$path,$m)){
    $id = $m[1];
    $data=json_decode(file_get_contents('php://input'), true);
    $user = $repo->update($id,$data['name'], $data['email']);
    echo json_encode($user);
    exit;
}

if($method==='DELETE' && preg_match('#^/users/(\d)$#', $path, $m)){
    $id=$m[1];
    $repo->delete($id);
    echo json_encode(["status" => "deleted"]);
    exit;
}