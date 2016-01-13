/*
** author 吟梦
** link https://github.com/kirainmoe/Image-Box
*/
$(function(){
	$(".ImageBox").click(function(){

		/* 添加元素 */
		$("body").append('<div class="image-box-plugin"><div class="image-box-container"><img src="'+$(this).attr('src')+'"></div></div>');

		/* 定义变量 */
		var imgW = $(this).width(),
		imgH = $(this).height(),
		scrW = document.body.clientWidth,
		scrH = window.screen.availHeight;

		var newW = $(this).width(),
		newH = $(this).height(),
		scale = imgW/imgH;		//定义比例

		/* 缩放图片 */
		if(imgW>scrW){
			newW = scrW;
			newH = newW/scale;
			console.log(newH);
			console.log(scrH);
			$(".image-box-plugin img").css({"height":''});
			$(".image-box-plugin img").css({"width":newW});
			if(newH > scrH){
				newH = scrH;
				newW = newH*scale;
				console.log('2333');
				$(".image-box-plugin img").css({"width":''});
				$(".image-box-plugin img").css({"height":newH});
			}
		}
		else if(imgH>scrH){
			newH = scrH;
			newW = newH*scale;
			$(".image-box-plugin img").css({"width":''});
			$(".image-box-plugin img").css({"height":newH});
			if(newW > scrW){
				newW = scrW;
				newH = newW/scale;
				$(".image-box-plugin img").css({"height":''});
				$(".image-box-plugin img").css({"width":newW});
			}
		}

		/* 显示出DIV */
		$(".image-box-plugin").fadeIn(500,function(){
			$(".image-box-plugin").css({"display":"table"});
		});

		/* 绑定点击消失事件 */
		$(".image-box-plugin img, .image-box-plugin, .image-box-container").bind("click",function(){
			$(".image-box-plugin").fadeOut(500,function(){
				$(".image-box-plugin").remove();
			});
		});
	});

});