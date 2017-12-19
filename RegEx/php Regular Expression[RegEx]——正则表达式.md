# php Regular Expression[RegEx]——正则表达式

## 1. 介绍

​	正则表达式，大家在开发中应该是经常用到，现在很多开发语言都有正则表达式的应用，如js,java,.net,php等等，工作中应用广泛，而且正则可高效的处理业务问题，缩减代码量，故抓紧学之~~

> 学习正则需知道的术语—高逼格
>
> - 定界符
> - 字符域
> - 修饰符
> - 限定符
> - 脱字符
> - 通配符(正向预查,反向预查)
> - 反向引用
> - 惰性匹配
> - 注释
> - 零字符宽

定位：不是所有的字符操作都用正则，php在某些方面用正则反而影响效率。当我们遇到**复杂文本数据**的解析时候，用正则是比较好的选择，当然随机应变咯~~

优点：可提高工作效率，节省代码量

缺点：复杂的正则表达式会加大代码的复杂度，所有添加注释是增加代码可读性比较好的选择

## 2.通用模式

- 定界符，通常用“/”作为定界符开始和结束，也可以使用“#”，什么时候使用“#”呢？一般是在你的字符串中有很多“/”字符的时候，因为正则的这种字符需要转义，比如uri。

```php
$regex = '/^http:\/\/([\w.]+)\/([\w]+)\/([\w]+)\.html$/i';
$str = 'http://www.youku.com/show_page/id_ABCDEFG.html';
$matches = array();

if(preg_match($regex, $str, $matches))
{
    var_dump($matches);
}

//输出结果
array (size=4)
  0 => string 'http://www.youku.com/show_page/id_ABCDEFG.html' (length=46)
  1 => string 'www.youku.com' (length=13)
  2 => string 'show_page' (length=9)
  3 => string 'id_ABCDEFG' (length=10)
  
 #使用“#”定界符就不用的对“/”转义了
  $regex = '#^http://([\w.]+)/([\w]+)/([\w]+)\.html$#i';
```

- 修饰符，用于改变正则表达式的行为，上实例中“i“就是修饰符，表示忽略大小写，还有一个经常用的是”x“表示忽略空格

```php
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
#结果 YES i:Valid Successful!
```

- 字符域 ，[\w]用方括号括起来的部分就是字符与
- 限定符，如[\w]{3,5}或者[\w]*或者[\w]+这些[\w]后面的符号都表示限定
  - {3,5}表示3-5个字符
  - {3,}超过3个字符
  - {,5}最多5个字符
  - {3}3个字符
  - *表示0到多个
  - +表示1到多个
- 脱字符^
  - 放在字符域(如：[\^\w])中表示否定(不包括的意思)—“反向选择”
  - 放在表达式之前，表示以当前这个字符开始(/^n/i,表示以n开头)
  - 注意我们经常管“\”叫“跳脱字符”，用于转义一些特殊符号，如“.”,"/"

## 3.通配符

## 4.捕获数据

## 5.惰性匹配

## 6.注释(?#注释内容)