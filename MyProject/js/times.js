window.onload = function(){
	// 创建标签
	var oDiv = document.getElementById('div1');
	var aDiv = document.createElement('div');
	var aBtn1 = document.createElement('button');
	var aBtn2 = document.createElement('button');
	var aBtn3 = document.createElement('button');
	var aBtn4 = document.createElement('button');
	var timeShow = document.createElement('p');
	var aBtn5 = document.createElement('button');
	var tm = null;

	oDiv.appendChild(aDiv);
	aDiv.appendChild(aBtn1);
	aDiv.appendChild(aBtn2);
	aDiv.appendChild(aBtn3);
	aDiv.appendChild(aBtn4);

	oDiv.appendChild(timeShow);
	oDiv.appendChild(aBtn5);

	// 标签里的内容
	aBtn1.innerHTML = '隐藏';
	aBtn2.innerHTML = '显示';
	aBtn3.innerHTML = '开始';
	aBtn4.innerHTML = '结束';
	aBtn5.innerHTML = '确定付款';


	// 给标签添加样式
	aBtn1.style.cssText = aBtn2.style.cssText = aBtn3.style.cssText = aBtn4.style.cssText = 'border:1px solid #ccc;background-color:rgba(255,255,255,0);margin-right:11px;cursor:pointer;outline: none;';
	  aBtn4.style.marginRight = '0';
	  aBtn5.style.cssText = 'display:block;margin:10px auto 0;cursor:pointer;outline: none;width:100px;height:40px;border:none;';
	  timeShow.style.cssText = 'width:194px;height:50px;text-align:center;line-height:50px;border:1px solid green;margin-top:10px;';
	  oDiv.style.cssText = 'padding:10px;width:196px;';

	clearInterval(tm);

	// 时分秒与秒之间的转换
	var num = 5;
	var h = parseInt(num/3600);//获取时
	var m = parseInt(num/60) % 60;//获取分
	var s = num%60;//获取秒
	//alert(m);

	//补零函数
	function rep(n){
	  if (n<10) {
	    return '0'+n;
	  }else{
	    return ''+n;
	  };
	};
	timeShow.innerHTML = '<span>'+ rep(h) +':'+ rep(m) +':'+ rep(s) +'</span>';

	// 时间递减
	function tick(){
	  if (num>0) {
	        num-=1;
	        var hours = parseInt(num/3600);//获取时
	        var min = parseInt(num/60) % 60;//获取分
	        var sec = num%60;//获取秒
	        timeShow.innerHTML = '<span>'+ rep(hours) +':'+ rep(min) +':'+ rep(sec) +'</span>';
	        console.info(num);
	  }else{
	    clearInterval(tm);
	    aBtn5.disabled = 'disabled';
	    alert('您已经不能够支付了');
	  };
	};
	 
	// 点击按钮执行倒计时
	aBtn3.onclick = function(){
	  tm = setInterval(tick,1000);
	};
	aBtn4.onclick = function(){
	  clearInterval(tm);
	};

//	点击隐藏时间框
	aBtn1.onclick = function(){
		timeShow.style.display = 'none';
	};

//	点击显示时间框
	aBtn2.onclick = function(){
		timeShow.style.display = 'block';
	};

};