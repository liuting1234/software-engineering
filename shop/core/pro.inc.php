<?php
require_once '../include.php';

function addPro(){
    $arr=$_POST;
  
    $path="../uploads";
    $uploadFiles=uploadFile($path);
	if(is_array($uploadFiles)&&$uploadFiles){
		foreach($uploadFiles as $key=>$uploadFile){
			thumb($path."/".$uploadFile['name'],"../image_50/".$uploadFile['name'],50,50);
			thumb($path."/".$uploadFile['name'],"../image_220/".$uploadFile['name'],220,220);
			thumb($path."/".$uploadFile['name'],"../image_350/".$uploadFile['name'],350,350);
			thumb($path."/".$uploadFile['name'],"../image_800/".$uploadFile['name'],800,800);
		}
	}
	$res=insert("cake_info",$arr);
	$name=$arr['Cname'];
	$sql="select * from cake_info where Cname = '{$name}'";
	$arr2=fetchOne($sql);
	$pid=$arr2['cake_id'];
	
	if(!$res&&$pid){
		foreach($uploadFiles as $uploadFile){
			$arr1['pid']=$pid;
			$arr1['albumPath']=$uploadFile['name'];
			addAlbum($arr1);
		}
		$mes="<p>添加成功!</p><a href='addPro.php' target='mainFrame'>继续添加</a>|<a href='listPro.php' target='mainFrame'>查看商品列表</a>";
	}else{
		foreach($uploadFiles as $uploadFile){
			if(file_exists("../image_800/".$uploadFile['name'])){
				unlink("../image_800/".$uploadFile['name']);
			}
			if(file_exists("../image_50/".$uploadFile['name'])){
				unlink("../image_50/".$uploadFile['name']);
			}
			if(file_exists("../image_220/".$uploadFile['name'])){
				unlink("../image_220/".$uploadFile['name']);
			}
			if(file_exists("../image_350/".$uploadFile['name'])){
				unlink("../image_350/".$uploadFile['name']);
			}
		}
		$mes="<p>添加失败!</p><a href='addPro.php' target='mainFrame'>重新添加</a>";
		
	}
	return $mes;
	
}

/**
 *编辑商品
 * @param int $id
 * @return string
 */
function editPro($id){
    $arr=$_POST;
    $path="../uploads";
    $uploadFiles=uploadFile($path);
    if(is_array($uploadFiles)&&$uploadFiles){
        foreach($uploadFiles as $key=>$uploadFile){
            thumb($path."/".$uploadFile['name'],"../image_50/".$uploadFile['name'],50,50);
            thumb($path."/".$uploadFile['name'],"../image_220/".$uploadFile['name'],220,220);
            thumb($path."/".$uploadFile['name'],"../image_350/".$uploadFile['name'],350,350);
            thumb($path."/".$uploadFile['name'],"../image_800/".$uploadFile['name'],800,800);
        }
    }
    $where="cake_id={$id}";
    $res=update("cake_info",$arr,$where);
    $pid=$id;
    if($res&&$pid){
        if($uploadFiles &&is_array($uploadFiles)){
            foreach($uploadFiles as $uploadFile){
                $arr1['pid']=$pid;
                $arr1['albumPath']=$uploadFile['name'];
                addAlbum($arr1);
            }
        }
        $mes="<p>编辑成功!</p><a href='listPro.php' target='mainFrame'>查看商品列表</a>";
    }else{
        if(is_array($uploadFiles)&&$uploadFiles){
            foreach($uploadFiles as $uploadFile){
                if(file_exists("../image_800/".$uploadFile['name'])){
                    unlink("../image_800/".$uploadFile['name']);
                }
                if(file_exists("../image_50/".$uploadFile['name'])){
                    unlink("../image_50/".$uploadFile['name']);
                }
                if(file_exists("../image_220/".$uploadFile['name'])){
                    unlink("../image_220/".$uploadFile['name']);
                }
                if(file_exists("../image_350/".$uploadFile['name'])){
                    unlink("../image_350/".$uploadFile['name']);
                }
            }
        }
        $mes="<p>编辑失败!</p><a href='listPro.php' target='mainFrame'>重新编辑</a>";

    }
    return $mes;
}



//删除商品
function delPro($id){
    $where="cake_id=$id";
    $res=del("cake_info",$where);
    $proImgs=getAllImgByProId($id);
    if($proImgs&&is_array($proImgs)){
        foreach($proImgs as $proImg){
            if(file_exists("uploads/".$proImg['albumPath'])){
                unlink("uploads/".$proImg['albumPath']);
            }
            if(file_exists("../image_50/".$proImg['albumPath'])){
                unlink("../image_50/".$proImg['albumPath']);
            }
            if(file_exists("../image_220/".$proImg['albumPath'])){
                unlink("../image_220/".$proImg['albumPath']);
            }
            if(file_exists("../image_350/".$proImg['albumPath'])){
                unlink("../image_350/".$proImg['albumPath']);
            }
            if(file_exists("../image_800/".$proImg['albumPath'])){
                unlink("../image_800/".$proImg['albumPath']);
            }
            	
        }
    }
    $where1="pid={$id}";
    $res1=del("album",$where1);
    if($res&&$res1){
        $mes="删除成功!<br/><a href='listPro.php' target='mainFrame'>查看商品列表</a>";
    }else{
        $mes="删除失败!<br/><a href='listPro.php' target='mainFrame'>重新删除</a>";
    }
    return $mes;
}

/**
 * 得到商品的所有信息
 * @return array
 */
function getAllProByAdmin(){
    $sql="select * from cake_info";
    $rows=fetchAll($sql);
    return $rows;
}

/**
 *根据商品id得到商品图片
 * @param int $id
 * @return array
 */
function getAllImgByProId($id){
    $sql="select a.albumPath from album a where pid={$id}";
    $rows=fetchAll($sql);
    return $rows;
}

/**
 * 根据id得到商品的详细信息
 * @param int $id
 * @return array
 */
function getProById($id){
    $sql="select * from cake_info as p where p.cake_id={$id}";
    $row=fetchOne($sql);
    return $row;
}

function addToCart($id){
  session_start();
 
  if($_SESSION[user_name]==""){
      $mes=alertMes("请先登录", "../login.php");
  }
  $arr1['user_name']=$_SESSION[user_name];
  $arr1['cake_id']=$id;
  $res=insert("cart",$arr1);
  if(!$res){
      $mes=alertMes("成功加入购物车", "../Pro/cart2.php");
      
  }
  return $mes;
}

function delCartPro($id){
    session_start();
    $arr1=$_SESSION[user_name];
    $sql="delete from cart where cake_id = {$id} and user_name='{$arr1}'";
   
    if(del("cart","cake_id = {$id} and user_name='{$arr1}'")){
        $mes=alertMes("删除成功", "../Pro/cart2.php");
    }else{
       $mes=alertMes("删除失败", "../Pro/cart2.php");
    }
    return $mes;
}


function delALLPro(){
    session_start();
    $arr1=$_SESSION[user_name];
    if(del("cart","user_name='{$arr1}'")){
        $mes=alertMes("已全部删除！", "../Pro/cart2.php");
    }else{
        $mes=alertMes("删除失败", "../Pro/cart2.php");
    }
    return $mes;
}