/*��jquery�����ʹ��ҳ��һ���ؾ�����*/
/*$(document).ready(function(){
  alert("helloWorld");
}); ��δ�����Լ�д*/
$(function()
{
	/*������ʾ����ɫ
	  ��Ҫ�ҵ����е�<tr>Ԫ��
	  $("��ǩ��")--->�����е������ǩԪ��
	  $("#id")---->��id��Ԫ��
	  $(��ǩ:odd/even)
	  css(��ʽ����) ��ȡ����ʽ���Ե�ֵ
	  css(��ʽ����,ֵ) �������ʽ��ֵ
	*/
	$("tbody tr:even").css("background-color","#AB9DEF");
	/*��ȡtbody 1 3 5��Ԫ�� �����ϵ���¼�*/
	$("tbody td").click(function()
	{
		/*�ѵ�Ԫ������ݱ���ı���Ž�ȥ
		  1.�ѵ�ǰ����ĵ�Ԫ�������ȡ��
		    html()ȡֵ˵�����ݿ����б�ǩ
			text()����ֻ�����ı�
			val() ��ǩ��value����
			����������������в����ͱ������
		  2.�����ı���
		  3.�ѵ�ǰ����ĵ�Ԫ������ݸ����ı��������
		  4.���ı���׷�Ӹ���ǰ�����Ԫ��
		*/
		//�õ���ǰ�ĵ�Ԫ��
		var tdObj = $(this);
		//��ȡ��Ԫ�������
		var text = tdObj.html();
		//���td
		tdObj.html("");
		//�����ı���
		var inputObj = $("<input type='text'>");
		//���ı����������
		inputObj.val(text);
		//���ı������ʽ����һ�� ���Ӧ�ø�td�Ŀ����ͬ,��ϣ�����˿�����ʱ�ı��򣬰ѱ߽�Ŀ��ȥ��
		inputObj.css("width",tdObj.width())
			.css("border-width",0).css("font-size","24px");
		
		//���ı���׷�Ӹ���ǰ�ĵ�Ԫ��
		inputObj.appendTo(tdObj);
		
		//��ý��㣬��ȫ��ѡ��״̬
		var domObj = $(inputObj);//��jquery����ת����dom����
		domObj.focus();
		domObj.select();
		//����ı�����ı����ܲ�������¼�

		inputObj.click(function()
		{
			return false;
		});

		//�ı����޸ĺ��»س���ϣ���б�س���ͨ��td������������ı��������
		//�����¼�
        inputObj.keyup(function(event)
		{
			//����������������
			var myevent = window.event||event;
			var keycode = myevent.keyCode;
			//������»س�
			if(keycode==13)
			{
				//���ı����������Ϊ��td��ȫ������
				var inputValue=inputObj.val();
				tdObj.html(inputValue);
			}
			//�������esc
			if(keycode==27)
			{
				//�ص���ʼ״̬
				tdObj.html(text);
			}
		});

	});
});
