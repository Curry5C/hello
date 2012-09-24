/*在jquery中如何使得页面一加载就做呢*/
/*$(document).ready(function(){
  alert("helloWorld");
}); 这段代码可以简写*/
$(function()
{
	/*隔行显示背景色
	  需要找到单行的<tr>元素
	  $("标签名")--->找所有的这个标签元素
	  $("#id")---->找id的元素
	  $(标签:odd/even)
	  css(样式属性) 获取该样式属性的值
	  css(样式属性,值) 给这个样式设值
	*/
	$("tbody tr:even").css("background-color","#AB9DEF");
	/*获取tbody 1 3 5单元格 并加上点击事件*/
	$("tbody td").click(function()
	{
		/*把单元格的内容变成文本框放进去
		  1.把当前点击的单元格的内容取出
		    html()取值说明内容可以有标签
			text()内容只能由文本
			val() 标签有value属性
			上面三个函数如果有参数就变成设置
		  2.创建文本框
		  3.把当前点击的单元格的内容赋给文本框的内容
		  4.把文本框追加给当前点击单元格
		*/
		//得到当前的单元格
		var tdObj = $(this);
		//获取单元格的内容
		var text = tdObj.html();
		//清空td
		tdObj.html("");
		//创建文本框
		var inputObj = $("<input type='text'>");
		//给文本框添加内容
		inputObj.val(text);
		//把文本框的样式设置一下 宽度应该跟td的宽度相同,不希望别人看出来时文本框，把边界的宽度去掉
		inputObj.css("width",tdObj.width())
			.css("border-width",0).css("font-size","24px");
		
		//把文本框追加给当前的单元格
		inputObj.appendTo(tdObj);
		
		//获得焦点，并全部选中状态
		var domObj = $(inputObj);//把jquery对象转换成dom对象
		domObj.focus();
		domObj.select();
		//变成文本框后，文本框不能操作点击事件

		inputObj.click(function()
		{
			return false;
		});

		//文本框修改后按下回车键希望有变回成普通的td里面的内容是文本框的内容
		//键盘事件
        inputObj.keyup(function(event)
		{
			//解决浏览器兼容问题
			var myevent = window.event||event;
			var keycode = myevent.keyCode;
			//如果按下回车
			if(keycode==13)
			{
				//把文本框的内容作为了td的全部内容
				var inputValue=inputObj.val();
				tdObj.html(inputValue);
			}
			//如果按下esc
			if(keycode==27)
			{
				//回到初始状态
				tdObj.html(text);
			}
		});

	});
});
