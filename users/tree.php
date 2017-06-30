<?php
session_start();

class Tree
{
	private $_dbh;
	private $_elements = array();

	public function __construct()
	{
		try{
			$this->_dbh = new PDO("mysql:host=localhost;dbname=negocios", "root", "mysql");
			//$this->_dbh = new PDO("mysql:host=sql305.260mb.net;dbname=n260m_13805882_negocios", "n260m_13805882", "d4rkm1nd");
			$this->_dbh->exec("SET CHARACTER SET utf8");
			$this->_dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$this->_dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
		}
		catch (PDOException $e)
		{
			print "Error!: " . $e->getMessage();
			die();
		}
	}

	public function get()
	{
		$id = $_SESSION['user_session'];
		$user_afiliado = $_SESSION['user_afiliado'];
		$query = $this->_dbh->prepare("SELECT * FROM tbl_users");
		$query->execute();
		$this->_elements["masters"] = $this->_elements["childrens"] = array();

		if($query->rowCount() > 0)
		{
			foreach($query->fetchAll() as $element)
			{
				if($element["usuario_afiliado"] == $user_afiliado && $element["user_id"] == $id )
				{
					array_push($this->_elements["masters"], $element);
				}
				else
				{
					array_push($this->_elements["childrens"], $element);
				}
			}
		}
		return $this->_elements;
	}

	public function getReg($id)
	{
		
		$query = $this->_dbh->prepare("SELECT * FROM tbl_users");
		$query->execute();		

		$this->_elements["masters"] = $this->_elements["childrens"] = array();

		if($query->rowCount() > 0)
		{
			//count(_elements)
			$sw = 0;
			foreach($query->fetchAll() as $key)
			{
				//echo $id."***<br>";

				$sqlQuery = $this->_dbh->prepare("SELECT * FROM tbl_users");
				$sqlQuery->execute();

				foreach ($sqlQuery->fetchAll() as $element){
					
					//echo $element["user_id"]."<br>";
					//echo $element["usuario_afiliado"]."<br>";
					if( $element["user_id"] == $id  && $sw == 0 ){
						$sw =1;
						$id = $element["usuario_afiliado"];
						array_push($this->_elements["masters"], $element);
					}
					elseif ( $element["user_id"] == $id ) {
						$id = $element["usuario_afiliado"];
						array_push($this->_elements["childrens"], $element);
					}

				}
			}
		}
		return $this->_elements;
	}

	public static function nested($rows = array(), $usuario_afiliado = 0)
	{
		$html = "";
		if(!empty($rows))
		{
			$html.="<ul>";
			foreach($rows as $row)
			{
				if($row["usuario_afiliado"] == $usuario_afiliado)
				{
					$html.="<li style='margin:5px 0px'>";
					$html.="<span><i class='glyphicon glyphicon-user'></i></span>";
					$html.="<a href='#' data-status='{$row["nivel"]}' style='margin: 5px 6px' class='btn btn-warning btn-folder'>";
					/*if($row["nivel"] != 1)
					{*/
						//$html.="<span class='glyphicon glyphicon-minus-sign'></span> ".$row['user_name']."</a>";
					/*}
					else
					{*/
						$html.="<span class='glyphicon glyphicon-plus-sign'></span> ".$row['user_name']."</a>";
					/*}*/
					$html.=self::nested($rows, $row["user_id"]);
					$html.="</li>";
				}
			}
			$html.="</ul>";
		}
		return $html;
	}
}
