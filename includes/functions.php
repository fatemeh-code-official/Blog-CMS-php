<?php

function countCategory($id){
    global $connection;
    $count_posts=$connection->query("SELECT * FROM posts WHERE category_id=$id")->rowCount();
    return $count_posts;
}

function delete_from_table($id,$table){
    global $connection;
    $delete=$connection->query("DELETE FROM $table WHERE id=$id");

}

?>