<?php
include_once("./libs/PHPExcel.php");
include_once("./libs/PHPExcel/Writer/Excel2007.php");
require_once('./libs/PHPExcel/Writer/Excel5.php');  
require_once('./libs/PHPExcel/IOFactory.php'); 

//-.生成简单Excel
$fileName = "demo";
$headArr = array("姓名","学号","成绩");
$data = array(array("范冰冰","2035123","93"),array("潘玮柏","2034324","88"),array("刘思思","2933748","99"));
getExcel($fileName, $headArr, $data);

function getExcel($fileName, $headArr, $data)
{
    if(empty($data) || !is_array($data))
    {
        exit("data must be a array");
    }
    if(empty($fileName))
    {
        exit;
    }
    $date = date("Y-m-d",time());
    $fileName .= "_{$date}.xlsx";

    //创建新的phpexcel对象
    $objPHPExcel = new PHPExcel;
    $objProps = $objPHPExcel->getProperties();

    //设置表头 从第二列开始
    $key = ord("B");
    foreach($headArr as $v)
    {
        $column = chr($key);
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue($column.'1', $v);
        $key += 1;
    }

    $column = 2;
    $objActSheet = $objPHPExcel->getActiveSheet();

    //遍历二维数组
    foreach($data as $key=>$rows)
    {
        $span = ord("B");
        //列写入
        foreach($rows as $keyName=>$value)
        {
            $j = chr($span);
            //按照B2,C2,D2的顺序逐个写入单元格数据  
            $objActSheet->setCellValue($j.$column, $value);
            //移动到当前行右边的单元格
            $span++;
        }
        //下一行
        $column++;
    }
    $fileName = iconv("utf-8","gb2312", $fileName);
    //重命名
    $objPHPExcel->getActiveSheet()->setTitle('simple');
    //设置活动单指数到第一个表,所以Excel打开这是第一个表  
    $objPHPExcel->setActiveSheetIndex(0);  
    
    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');  
    //脚本方式运行，保存在当前目录  
    $objWriter->save("./docs/$fileName");   
        
    // 输出文档到页面    
    // header('Content-Type: application/vnd.ms-excel');    
    // header('Content-Disposition: attachment;filename="test.xls"');    
    // header('Cache-Control: max-age=0');    
    // $objWriter->save("php://output");    
    exit;  
   
    
}