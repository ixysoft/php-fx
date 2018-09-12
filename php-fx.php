<?php
/**
*	Fx解释器
*/
class FxInterpreter{
	private $path;		//文件路径
	private $content;	//文件内容
	private $incPath;	//引用库

	const DECODE=0;
	const ENCODE=1;

	public function __construct($path){
		if(!file_exists($path)){
			die('文件不存在');
		}
		$this->content = file_get_contents($path);
		$this->path = $path;
		$this->incPath = '/opt/phpfx/inc';
	}

	//处理回车
	private function processLn($type=self::ENCODE){
		if($type == self::ENCODE)$this->content=str_replace(PHP_EOL,'{{nextline}}',$this->content);
		else $this->content = str_replace('{{nextline}}',PHP_EOL,$this->content);
	}

	//处理中文标点
	private function processPunct(){
	}

	//处理注释
	private function processComment(){	//删除注释
		//多行注释
		$this->content = preg_replace("/(\/\*.*\*\/)|(\/\/.*?\n)/s", '', str_replace(array("\r\n", "\r"), "\n", $this->content));
		$this->content = preg_replace('/^\n+/','',$this->content);
		$this->content = preg_replace('/\n{3,}/',PHP_EOL.PHP_EOL,$this->content);
	}

	//处理关键字
	private function processKeyword(){
		$cnt = $this->content;
		$cnt = preg_replace('/导入\s*<([^>]+)>/u','require "'.$this->incPath.'/\1";',$cnt);		//导入文件
		$cnt = preg_replace('/导入\s*(.*)/','require \1;',$cnt);
		//输入
		$cnt = preg_replace('/输出 \"([\"]+)\"/','echo "\1";',$cnt);
		$this->content = $cnt;
	}

	private function parse(){
		//$this->processLn(self::ENCODE);	//换行加密
		$this->processPunct();
		$this->processComment();
		$this->processKeyword();
		//$this->processLn(self::DECODE);	//换行解密
	}

	/**
	*	输出内容
	*/
	public function output(){
		$this->parse();
		$ret=nl2br(htmlspecialchars($this->content));
		echo $ret;
	}
}

$fx = new FxInterpreter('hello.fx');
$fx->output();