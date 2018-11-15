<?php
require_once __DIR__ . '/connection.php';

/**
 * Create a new user
 *
 * This funcion create a new entry in the database and return the id
 * of the inserted element
 *
 * @param string $username
 * @param string $password
 * @return int
 */
function createUser(string $username, string $password, int $roleId=1): int
{
    /**
     *
     * @var PDO $connection
     */
    global $connection;
    
    $preparedQuery = $connection->prepare("INSERT INTO User(nickname,`password`,roleId) VALUE (:nickname, :password, :roleId)");
    $preparedQuery->bindValue('nickname',$username);
    $preparedQuery->bindValue('password',$password);
    $preparedQuery->bindValue('roleId',$roleId);
    $result = $preparedQuery->execute();
    if (!$result) {
        throw new Exception($connection->errorCode());
    }
    return $connection->lastInsertId();
}

function findUser(string $username): ?array
{
    /**
     *
     * @var PDO $connection
     */
    global $connection;
    
    $preparedQuery = $connection->prepare("SELECT * FROM user WHERE nickname= :nickname");
    $preparedQuery->bindValue('nickname',$username);
    $result = $preparedQuery->execute();
    if ($result===false) {
        throw new Exception($connection->errorCode());
    }
    $result=$preparedQuery->fetch();
    if($result){
        return $result;
    }
    return null;
}

/**
 * Log the user with session
 * 
 * Will store the user information in the session superglobal. Return true on 
 * success, false on failure.
 * 
 * @param array $user
 * @return bool
 */
function logInUser(array $user): bool{
    $_SESSION['USER']=$user;
    return true;
}

/**
 * Get current user
 * 
 * Return the current logged user if exist in the session. If not, return null.
 *  
 * @return array
 */
function getCurrentUser() : ?array{
    return $_SESSION['USER'] ?? null;
}

/**
 * Logout
 * 
 * Remove the session storage. Return ture on success, false on failure.
 * 
 * @return bool
 */
function logout() :bool{
    $_SESSION=[];
    session_destroy();
    return true;
}
