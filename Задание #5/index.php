<?php 

require_once 'Db.php';

try {
    $db = new \Db;

    // 1
    $sql = 'SELECT COUNT(*) FROM user WHERE user.user_id IN (SELECT user_id FROM company_user GROUP BY user_id HAVING COUNT(user_id) > 1)';
    $sth = $db->dbh->prepare($sql);
    $sth->execute();
    
    $sql = ($sth->fetch(PDO::FETCH_NUM))[0];
    echo 'Количество пользователей, привязанных больше, чем к одной компании: <b>' . $sql . '</b><br>';

    // 2
    $sql = 'SELECT company_id FROM company_user 
    WHERE company_user.company_id NOT IN 
    (SELECT company.company_id FROM company JOIN company_user cu ON company.company_id = cu.company_id 
    WHERE EXISTS ( SELECT cu.company_id FROM company_user u WHERE u.user_id = cu.user_id AND u.company_id != cu.company_id ))';

    $sth = $db->dbh->prepare($sql);
    $sth->execute();

    echo 'Компании, в которых состоят только пользователи, не привязанные к другим компаниям: <br>';
    $sql = $sth->fetchAll(PDO::FETCH_NUM);
    $result = array_unique($sql, SORT_REGULAR);

    foreach ($result as $k => $v) {
        $sth = $db->dbh->prepare('SELECT * FROM company WHERE company_id = ?');
        $sth->execute([$v[0]]);
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);
        echo ' ID: ' . $result[0]['company_id'] . ' Name: ' . $result[0]['company_name'] . '<br>';
    }
    
} catch (Exception $e) {
    echo $e->getMessage();
}

?>