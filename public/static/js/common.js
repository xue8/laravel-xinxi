//获取社区状况信息
function getWebBasciInfo()
{
	$.get('/api/webBasicInfo', function(res){
		var data = res.success;	
		$('#usernum').html(data.usernum)
		$('#questionnum').html(data.questionnum)
		$('#articlenum').html(data.articlenum)		
	});	
}
//获取评论
function getComment(qid, cnid, perpagenum, page)
{
	$.get('/api/comment?qid=' + qid + '&cnid=' + cnid  + "&perpagenum=" + perpagenum + "&page=" + page, function(res){
		var commentObj = res.success;	
		var dataArr = commentObj.data;
		
		//回复内容
		if( commentObj.total == 0)
		{
			$('#comment-wrap').hide();		
		}
		if( commentObj.last_page == 1)
		{
			$('.pagination').hide();	
		}
		$('.commemt-replay').text( commentObj.total + '条回复');
		$.each(dataArr, function(i, v) {
			var co ='<div class="comment clearfix ht-auto">'
					+	'<div class="comment-logo">'
					+		'<img src="/static/images/userLogo/moren.png" />'
					+	'</div>'
					+	'<div class="comment-body">'
					+		'<div class="comment-body-header">'
					+			'<a href="/u/' + dataArr[i].uid +  '" id="username">' + dataArr[i].uid + '</a>'
					+			'<span class="comment-date"> ' + timestampFormat(Date.parse(dataArr[i].created_at)/1000) + '</span>'
					+		'</div>'	
					+		'<div class="comment-body-content">'
					+ 		dataArr[i].content
					+		'</div>	'		
					+	'</div>'
					+ '</div>'		
			$('.body-mac').append(co);
		});
		
		//分页
		var paginationNum = commentObj.last_page;
		for(var i = 1; i <= paginationNum; i++)
		{
			var co ='<li class="card-li padding-li" id="paginationli">' + i
					+ '</li>'		
			$('.pagination-ul').append(co);			
		}	
//		console.log(commentObj);
	});	
}

//问答、文章分页
function pagination(paginationNum, currentPage, mobile)
{
	//分页
	//	var paginationNum = {{ $data['question']->lastPage() }};
	if(mobile)
	{
		if(currentPage)
		{
			$('.pagination-ul').empty();
			if(currentPage <= 4)
			{
				for(var i = 1; i<=paginationNum; i++)
				{
					var co ='<li class="card-li padding-li" id="paginationli">' + i
							+ '</li>'		
					$('.pagination-ul').append(co);					
				}
				return ;
			}
			if(currentPage == '')
			{
				return ;
			}
			
			for(var i = 4; i > 0; i--)
			{
				var n = (parseInt(currentPage) - parseInt(i));
							console.log('----' + n);
				if(n<=0)
				{
					break ;
				}			
				var co ='<li class="card-li padding-li" id="paginationli">' + n
						+ '</li>'		
				$('.pagination-ul').append(co);			
			}
			for(var i = 0; i <= 25; i++)
			{
				var n = (parseInt(currentPage) + parseInt(i));
				console.log(n);
				if(n>paginationNum)
				{
					break ;
				}
				var co ='<li class="card-li padding-li" id="paginationli">' + n
						+ '</li>'		
				$('.pagination-ul').append(co);			
			}		
		}else {
			for(var i = 1; i <= paginationNum; i++)
			{
				if( i >= 30)
				{
					break ;
				}
				var co ='<li class="card-li padding-li" id="paginationli">' + i
						+ '</li>'		
				$('.pagination-ul').append(co);			
			}			
		}	
	}else{
		if(currentPage)
		{
			$('.pagination-ul').empty();
			if(currentPage <= 8)
			{
				for(var i = 1; i<=paginationNum; i++)
				{
					var co ='<li class="card-li padding-li" id="paginationli">' + i
							+ '</li>'		
					$('.pagination-ul').append(co);					
				}
				return ;
			}
			if(currentPage == '')
			{
				return ;
			}
			
			for(var i = 8; i > 0; i--)
			{
				var n = (parseInt(currentPage) - parseInt(i));
							console.log('----' + n);
				if(n<=0)
				{
					break ;
				}			
				var co ='<li class="card-li padding-li" id="paginationli">' + n
						+ '</li>'		
				$('.pagination-ul').append(co);			
			}
			for(var i = 0; i <= 25; i++)
			{
				var n = (parseInt(currentPage) + parseInt(i));
				console.log(n);
				if(n>paginationNum)
				{
					break ;
				}
				var co ='<li class="card-li padding-li" id="paginationli">' + n
						+ '</li>'		
				$('.pagination-ul').append(co);			
			}		
		}else {
			for(var i = 1; i <= paginationNum; i++)
			{
				if( i >= 30)
				{
					break ;
				}
				var co ='<li class="card-li padding-li" id="paginationli">' + i
						+ '</li>'		
				$('.pagination-ul').append(co);			
			}			
		}			
	}
}

//时间转成XX分钟前格式
function timestampFormat( timestamp ) {
    function zeroize( num ) {
        return (String(num).length == 1 ? '0' : '') + num;
    }
 
    var curTimestamp = parseInt(new Date().getTime() / 1000); //当前时间戳
    var timestampDiff = curTimestamp - timestamp; // 参数时间戳与当前时间戳相差秒数
 
    var curDate = new Date( curTimestamp * 1000 ); // 当前时间日期对象
    var tmDate = new Date( timestamp * 1000 );  // 参数时间戳转换成的日期对象
 
    var Y = tmDate.getFullYear(), m = tmDate.getMonth() + 1, d = tmDate.getDate();
    var H = tmDate.getHours(), i = tmDate.getMinutes(), s = tmDate.getSeconds();
 
    if ( timestampDiff < 60 ) { // 一分钟以内
        return "刚刚";
    } else if( timestampDiff < 3600 ) { // 一小时前之内
        return Math.floor( timestampDiff / 60 ) + "分钟前";
    } else if ( curDate.getFullYear() == Y && curDate.getMonth()+1 == m && curDate.getDate() == d ) {
        return '今天' + zeroize(H) + ':' + zeroize(i);
    } else {
        var newDate = new Date( (curTimestamp - 86400) * 1000 ); // 参数中的时间戳加一天转换成的日期对象
        if ( newDate.getFullYear() == Y && newDate.getMonth()+1 == m && newDate.getDate() == d ) {
            return '昨天' + zeroize(H) + ':' + zeroize(i);
        } else if ( curDate.getFullYear() == Y ) {
            return  zeroize(m) + '月' + zeroize(d) + '日 ' + zeroize(H) + ':' + zeroize(i);
        } else {
            return  Y + '年' + zeroize(m) + '月' + zeroize(d) + '日 ' + zeroize(H) + ':' + zeroize(i);
        }
    }
}
//timestampFormat(1326170770); //2012年01月10日 12:46
//timestampFormat(Date.parse('2016-10-11 15:26:10')/1000); //刚刚
//timestampFormat(Date.parse('2016-10-11 15:10:10')/1000); //16分钟前
//timestampFormat(Date.parse('2016-10-11 10:10:10')/1000); //今天10:10
//timestampFormat(Date.parse('2016-10-10 10:10:10')/1000); //昨天10:10
//timestampFormat(Date.parse('2016-02-10 10:10:10')/1000); //02月10日 10:10
//timestampFormat(Date.parse('2012-10-10 10:10:10')/1000); //2012年10月10日 10:10