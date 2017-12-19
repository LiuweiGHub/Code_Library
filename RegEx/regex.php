<?php
#定界符实例
$regex = '/^http:\/\/([\w.]+)\/([\w]+)\/([\w]+)\.html$/i';
$str = 'http://www.youku.com/show_page/id_ABCDEFG.html';
$matches = array();

if(preg_match($regex, $str, $matches))
{
    var_dump($matches);
}

#修饰符实例
$regex = '/HELLO/';
$str = 'hello world';
if(preg_match($regex, $str , $matches))
{
    echo "No i:Valid Successful!",PHP_EOL;
}
if(preg_match($regex.'i', $str, $matches))
{
    echo "YES i:Valid Successful!","\n";
}