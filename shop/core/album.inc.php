<?php

function addAlbum($arr){
	insert("album", $arr);
}

/**
 * 根据商品id得到商品图片
 * @param int $id
 * @return array
 */
function getProImgById($id){
	$sql="select albumPath from album where pid={$id} limit 1";
	$row=fetchOne($sql);
	return $row;
}

/**
 * 根据商品id得到所有图片
 * @param int $id
 * @return array
 */
function getProImgsById($id){
	$sql="select albumPath from album where pid={$id} ";
	$rows=fetchAll($sql);
	return $rows;
}
