<?php
//包含模型
require_once 'StudentModel.class.php';
//创建模型
$model = new StudentModel();
//获取数据
$arrs = $model -> fetchAll();
//包含首页视图
include 'StudentIndexView.html';