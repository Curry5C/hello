<?php /* Smarty version 2.6.25, created on 2012-03-19 07:33:33
         compiled from header.html */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>天天新闻网</title>
    <?php echo '
    <style type="text/css">
   body,td,th {
	font-family: 宋体;
	font-size: 12px;
    }

   .xian {
	border-bottom-width: 1px;
	border-bottom-style: dashed;
	border-bottom-color: #333333;
    }

    </style>
    '; ?>

  </head>
  <body bgcolor="#cccccc" topmargin="0" marginheight="0" >
 <table align="center" width="700" bgcolor="#ffffff">
     <tr>
       <td ><b><font size="5px">www.ttnews.com</font></b></td>
       <td align="right"><img src="images/banner17.gif"></td>
     </tr>
     <tr>
       <td colspan="2" background="images/image1.gif" height="120">
         <table width="100%" height="99">
           <tr>
             <td align="center"><b><font size="6px" color="#ffffff">天天新闻网</font></b></td>
           </tr>
           <tr><td align="center" valign="bottom">
           <a href="index.php"><font color="#FFFFFF">主页</font></a>&nbsp;&nbsp;&nbsp;|
           <?php $_from = ($this->_tpl_vars['type']); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['v']):
?>
           <a href="news.php?id=<?php echo $this->_tpl_vars['v']['typeId']; ?>
"><font color="#FFFFFF"><?php echo $this->_tpl_vars['v']['typeName']; ?>
</font></a>&nbsp;&nbsp;&nbsp;|
           <?php endforeach; endif; unset($_from); ?>
           <a href="search.php"><font color="#FFFFFF">搜索</font></a>
          </td>
           </tr>
         </table>
       </td></tr>
   </table>