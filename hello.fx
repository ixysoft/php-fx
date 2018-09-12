//单行注释
/*
	基本输入输出
	条件判断
	循环语句
*/

导入<通用文件>
导入"文件"

输出 "你好,吃了吗?"
输入 n
设定(i=0;i<100;i++){
	输出 "你输入了:"+i;
}

i=0
当(i<100){
	输出 "i当前为{i}";
	如果(i = 50) 中断
	i++
}

执行{
	输出 i;
	如果(i = 50) 跳过
	i++
}当(i<100);

输入 "请输入一个数字",n
如果(n<50){
	输出 "n<50";
}否则当(n<80){
	输出 "50<=n<80";
}否则{
	输出 "80<=n";
}

判断(n){
	分支 1:
	分支 2:
	分支 3:
	分支 4:
	分支 5:
		输出 "n在1到5之间";
	中断
	分支 6 ... 15:
		输出 "n在6到15之间";
	中断
	分支 n>15:
		输出 "n大于15";
	中断
	默认情况:
		输出 "n不在上面所有的范围内";
}

fd=打开文件("test.ini",只写)
//写入一百行数据
设定(i=0;i<100;i++)
	写入一行(fd,"你好,世界")
关闭文件(fd)

//打开方式:只读,只写,读写,加强只读,加强只写,二进制只读,二进制只写,二进制读写
fd=打开文件("test.ini",只读)
当(!读完(fd)){	//当没有读取完毕文件
	line=读取一行(fd)
	输出 line;
}
关闭文件(fd)

//返回两个值中的最大值
函数 max(a,b){
	返回 (a>b?a:b);
}

定义数组 buf[100];
设定(i=0;i<100;i++){
	buf[i] = i
	输出 buf[i]
}

//直接解析PHP代码
<?php
	echo 'Hello,World!';
?>