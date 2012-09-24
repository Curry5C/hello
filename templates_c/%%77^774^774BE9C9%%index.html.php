<?php /* Smarty version 2.6.25, created on 2012-03-19 07:33:33
         compiled from index.html */ ?>
    <table align="center" width="700" bgcolor="#ffffff">
      <tr>
        <td width="213" valign="top">
          <table width="220">
            <tr>
              <td>
              <form method="post" action="index.php" name="frm">
                <table width="212" border="1" cellpadding="0" cellspacing="0" bordercolor="#C38490">
                  <tr><td bgcolor="#CC0000" colspan="2">会员登陆</td></tr>
                  <tr><td width="73">用户名:</td>
                  <td width="126"><input name="username" size="18" type="text"></td></tr>
                  <tr><td>密码:</td><td><input name="password" size="18" type="text"></td></tr>
                  <tr><td>验证码:</td><td><input name="yanzheng" size="6" type="text"><img src="yanzheng.php" align="absmiddle" id="code" onclick="change()"></td></tr>
                  <tr><td colspan="2" align="center"><input value="登陆" type="submit">&nbsp;&nbsp;&nbsp;<input value="重置" type="reset"></td></tr>
           </table>
           </form>
        </td>
            </tr>
            <tr><td height="10"></td></tr>
            <tr>
              <td>
                <table width="214" border="1" cellpadding="0" cellspacing="0" bordercolor="#C38490" winth="100%">
                <?php $_from = ($this->_tpl_vars['type']); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['v']):
?>
                  <tr><td bgcolor="#CC0000" style="line-height:25px"><?php echo $this->_tpl_vars['v']['typeName']; ?>
</td></tr>
                  
                  <tr>
                  <td width="182"><?php echo $this->_tpl_vars['v']['content']; ?>
</td>
                  </tr>
                  <?php endforeach; endif; unset($_from); ?>
                </table>
              </td>
            </tr>
          </table>
        </td>
        <td width="475" valign="top"><table width="470" border="0">
          <tr>
            <td><table width="470" border="0">
              <tr>
                <td bgcolor="#CC0000">热点新闻</td>
              </tr>
              <?php $_from = ($this->_tpl_vars['record']); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['v']):
?>
              <tr>
                <td><a href="content.php?cid=<?php echo $this->_tpl_vars['v']['articleId']; ?>
"><font color="red" style="line-height:25px">[<?php echo $this->_tpl_vars['v']['typeName']; ?>
]<?php echo $this->_tpl_vars['v']['title']; ?>
</font><font color="#000000"><?php echo $this->_tpl_vars['v']['dateandtime']; ?>
</font></a><img src="images/new1.gif" align="absmiddle"></td>
              </tr>
              <?php endforeach; endif; unset($_from); ?>
            </table></td>
          </tr>
          <tr>
            <td><table width="470" border="0">
              <tr>
                <td bgcolor="#CC0000">新闻分类导航</td>
              </tr>
              <tr>
                <td><font color="red">新闻总数:</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $this->_tpl_vars['total']; ?>
<br><br>
                <?php $_from = ($this->_tpl_vars['totalRow']); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['v']):
?>
                <font color="red"><?php echo $this->_tpl_vars['v']['typeName']; ?>
:</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $this->_tpl_vars['v']['articleNums']; ?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="news.php?id=<?php echo $this->_tpl_vars['v']['typeId']; ?>
"><img src="images/sch.gif" align="absmiddle" border="0"></a>
                <br><br>
                <?php endforeach; endif; unset($_from); ?>
                </td>
              </tr>
            </table></td>
          </tr>
        </table></td>
      </tr>
    </table>
    <?php echo '
     <script>
      function change(){
          frm.code.src="yanzheng.php?id="+Math.random();
          }
     </script>
    '; ?>

  </body>
</html>