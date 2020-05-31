;(function() {
		$(document).click('click',function(event){ 
			$('.selectbox ul').css('display','none');
			$('.selectbox2 ul').css('display','none');
			$('.selectbox3 ul').css('display','none');			
			$('.selectbox4 ul').css('display','none');
			$('.selectbox').removeClass('selected');
			$('.selectbox2').removeClass('selected');
			$('.selectbox3').removeClass('selected');
			$('.selectbox4').removeClass('selected');
		});
	
       $.fn.sliding=function(options){
			var obj=this;
			var config=$.extend(
			{
				wrapper:'.slide_wrapper',
				duration:5000,
				speed:500,
				obj:'#slide',
				move:500,
				easing:'easeInOutCubic',
				child:'div',
				leftbtn:'.arrow_l',
				rightbtn:'.arrow_r',
				control:'.num',
				now:'on',
				ctrid:undefined,
				moveValAuto:false
			},options);
			return this.each(function(){
				/* return */
				var roll_is={
					isOver:false,
					isRolling:false
				}
				var wp=$(config.wrapper);
				var leftMv=$(config.wrapper).find(config.leftbtn); // 슬라이드 왼쪽이동 버튼
				var rightMv=$(config.wrapper).find(config.rightbtn); // 슬라이드 오른쪽이동 버튼
				var ctr=$(config.wrapper).find(config.control); // 슬라이드 컨트롤러
				var view_idx=0; //슬라이드 인덱스넘버

				if(config.moveValAuto){
					if($(window).width()<1250){
						config.move=1250;
						$(config.child).css('width','1250px');
					}else{
						config.move=$(window).width();
						$(config.child).css('width',$(window).width()+'px');
					}

					$(window).resize(function(){
						//alert($(window).width());
						if($(window).width()<1250){
							//alert(view_idx)
							config.move=1250;
							$(config.child).css('width','1250px');
							$(config.obj).css('left',-view_idx*1250+'px');
						}else{
							config.move=$(window).width();
							//alert(view_idx)
							$(config.child).css('width',$(window).width()+'px');
							$(config.obj).css('left',-view_idx*$(window).width()+'px');
						}
						
					});
				}
				$.each($(config.obj).find(config.child),function(index,key){

					if(index==0){
						$(config.control).append('<span class="on">'+(index+1)+'</span>');
					}else{
						$(config.control).append('<span>'+(index+1)+'</span>');
					}
					if(config.ctrid){
						$(config.control).find('span').eq(index).attr('id',config.ctrid+(index+1));
					}
				});
				wp.bind({
					mouseover:function(){
						roll_is.isOver=true;
					},
					mouseout:function(){
						roll_is.isOver=false;
					}
				});

				/* 롤링 */
				var timer=setInterval(function(){
					if(roll_is.isOver){
						return;
					}
					roll_is.isRolling=true;					
					var left_val=Math.abs( parseInt( $(config.obj).css('left') ) );
					if( $(config.obj).find(config.child+':last-child').index()*config.move == left_val){  // 마지막 contents일때
						$(config.obj).animate({left:'0'},config.speed+300,config.easing);
						view_idx=0;
						ctrlOnOff(0);
					}else{
						$(config.obj).animate({left:'-='+config.move+'px'},config.speed,config.easing);
						view_idx=view_idx+1;
						ctrlOnOff(left_val/config.move+1);
					}
				},config.duration);
				/* 롤링 끝 */
				
				/* 컨트롤러 활성화 함수 */
				function ctrlOnOff(idx){
					ctr.find('span').each(function(){
						$(this).removeClass('on');
					});
					ctr.find('span').eq(idx).addClass('on');
				}
				/* 컨트롤러 활성화 함수 끝 */

				/* 슬라이드 왼쪽이동 버튼 */
				$(config.wrapper+'>'+config.leftbtn).bind('click',function(){

					ctr.find('span').each(function(){
						if( $(this).hasClass('on') ){
							view_idx=$(this).index();							
						}
					});

					if(view_idx==0){
						return;
					}
					$(config.obj).stop();
					$(config.obj).animate({left:-1*config.move*(view_idx-1)+'px'},config.speed,config.easing);
					view_idx=view_idx-1;
					ctrlOnOff(view_idx);
				});
				/* 슬라이드 왼쪽이동 버튼 끝*/

				/* 슬라이드 오른쪽이동 버튼 */
				$(config.wrapper+'>'+config.rightbtn).bind('click',function(){
					ctr.find('span').each(function(){
						if( $(this).hasClass('on') ){
							view_idx=$(this).index();
						}
					});
					if( view_idx==ctr.find('span:last-child').index() ){
						return;
					}
					$(config.obj).stop();
					$(config.obj).animate({left:-1*config.move*(view_idx+1)+'px'},config.speed,config.easing);
					view_idx=view_idx+1;
					ctrlOnOff(view_idx);
				});
				/* 슬라이드 오른쪽이동 버튼 끝*/

				/* 슬라이드 컨트롤러 버튼 */
				$(config.wrapper+'>'+config.control+' span').bind('click',function(){
					if($(this).index() == view_idx) return;
					ctrlOnOff($(this).index());
					$(config.obj).stop();
					$(config.obj).animate({left:-1*$(this).index()*config.move+'px'},config.speed+300,config.easing);
					view_idx=$(this).index();
				});
				/* 슬라이드 컨트롤러 버튼 끝*/

			});
			/* return end */
	   } 
	   /*fn.sliding end*/

		$.fn.mainVisual=function(options){
			var $obj=this;
			var config=$.extend(
				{
					control:$obj.find('.visual_banner_wrap ul li'),
					control_wrap:$obj.find('.visual_banner_wrap ul'),
					visual:$obj.find('.visual_contents>div'),
					vleft:$obj.find('.visual_arrow_l'),
					vright:$obj.find('.visual_arrow_r'),
					control_loc:0
				},options);

			return this.each(function(){
				var _current_idx=0;
				var autoRollingId;

				$obj.find('.visual_wrap').hover(function(){
					clearInterval(autoRollingId);	
				},function(){
					autoRollingId=setInterval(function(){
						var _changeIdx=_current_idx;
						if(_changeIdx==config.control.length-1){
							config.control_wrap.animate({
								left:0
							});
							_changeIdx=0;
							config.control_loc=0;
						}else{

							setControlPosition('right');
							_changeIdx=_changeIdx+1;					
						}
						setOnList(_changeIdx);
						changeCont(_changeIdx,_current_idx);
						_current_idx=_changeIdx;
					},5000);				
				});

				config.vleft.click(function(){
					if(_current_idx==0) return false;
					setOnList(_current_idx-1);
					changeCont(_current_idx-1,_current_idx);					
					
					if(config.control.length>4) {
						setControlPosition('left');
					}
					_current_idx=_current_idx-1;
					return false;
				});
				
				config.vright.click(function(){
					if(_current_idx==config.control.length-1) return false;
					setOnList(_current_idx+1);
					changeCont(_current_idx+1,_current_idx);
					
					if(config.control.length>4) {
						setControlPosition('right');
					}
					_current_idx=_current_idx+1;
					return false;					
				});
				
				config.control.click(function(){
					var _idx=$(this).index();
					if(_idx==_current_idx) return false;
					setOnList(_idx);
					changeCont(_idx,_current_idx);
					_current_idx=_idx;
					return false;
				});
				function changeCont(idx,pre_idx){
					config.visual.eq(idx).fadeIn(500);
					config.visual.eq(pre_idx).fadeOut(500);
				}
				/* 함수 changeCont end */

				function setControlPosition(direction){ /* len: 활성화(on) 되어있는 리스트, direction:움직인 방향 */

					var val=_current_idx-config.control_loc;

					if(val==3 && direction=='right'){
						config.control_wrap.animate({
							left:'-=240px'	
						});
						config.control_loc=config.control_loc+1;

						return false;
					}else if(val==0 && direction=='left'){
						config.control_wrap.animate({
							left:'+=240px'	
						});
						config.control_loc=config.control_loc-1;						
					}

				}
				/* 함수 setControlPosition end */

				function setOnList(idx){
					config.control.each(function(){
						$(this).find('a').removeClass('on');
					});
					config.control.eq(idx).find('a').addClass('on');
				}
				/* 함수 setOnList end */
				
				
				autoRollingId=setInterval(function(){
					var _changeIdx=_current_idx;
					if(_changeIdx==config.control.length-1){
						config.control_wrap.animate({
							left:0
						});
						_changeIdx=0;
						config.control_loc=0;
					}else{

						setControlPosition('right');
						_changeIdx=_changeIdx+1;					
					}
					setOnList(_changeIdx);
					changeCont(_changeIdx,_current_idx);
					_current_idx=_changeIdx;
				},5000);
			});
			/* return end */
		}
		
		$.fn.wjGallery=function(){
			var obj=$(this);
			return this.each(function(){
				var timeCtrl={
					isOpening:false,
					isChanging:false,
					isUpdown:false
				}
				var nowIdx=0;
				var viewIdx=0;
				var config={
					wrapper:$('.gallery_box_wrap'),
					gall_info:obj.find('.gall_info'),
					gall_a_b:obj.find('.gall_b_f .b_f_inner'),
					gall_a_b_length:obj.find('.gall_b_f .b_f_inner').length,
					gall_util:obj.find('.gall_util'),
					a_b_num:obj.find('.page_num'),
					gall_link:['/community/gallery.asp?Code=10&secCode=3','/community/gallery.asp?Code=10&secCode=3','/community/gallery.asp?Code=10&secCode=3','/community/gallery.asp?Code=10&secCode=3']
					/*
						임시 URL
						수술갤러리 URL이 생기면 가슴,양약,눈,코 순으로 넣어준다.
					*/
				}

				$('.gallery_wrap li a').click(function(){
					var _idx=$(this).parent('li').index();
					if(_idx == 4) return false;
					viewIdx=_idx;
					if(timeCtrl.isOpening) return false;
					timeCtrl.isOpening=true;
					$('.gallery_wrap li.btn a').css({backgroundImage:'url(images/btn_gall_close.jpg)'});
					$('.gallery_wrap li.btn').css({backgroundImage:'url(images/btn_gall_close.jpg)'});
					obj.animate({height:'469px'},800,'easeOutCirc');
					var pos=obj.position().top;
					jQuery("html, body").animate({scrollTop:pos-110},800,'easeOutCirc');
					setTimeout(function(){
						timeCtrl.isOpening=false;
					},820);	
					changeGallery(viewIdx);
					return false;

				});

				/* 전후사진보기 버튼 over out */
				$('.gallery .btn a').hover(
					function(){
						$(this).stop();
						$(this).animate({opacity:0});
					},function(){
						$(this).stop();
						$(this).animate({opacity:1});				
					}
				);	
				/* 전후사진보기 버튼 over out end */

				/* 전후사진보기 버튼클릭 */
				$('.gallery .btn a').toggle(
					function(){
						if(timeCtrl.isOpening) return;
						timeCtrl.isOpening=true;
						$(this).css({backgroundImage:'url(images/btn_gall_close.jpg)'});
						$(this).parent('li').css({backgroundImage:'url(images/btn_gall_close.jpg)'});
						obj.animate({height:'469px'},800,'easeOutCirc');
						var pos=obj.position().top;
						jQuery("html, body").animate({scrollTop:pos-110},800,'easeOutCirc');
						setTimeout(function(){
							timeCtrl.isOpening=false;
						},820);
					},function(){
						if(timeCtrl.isOpening) return;
						timeCtrl.isOpening=true;
						$(this).css({backgroundImage:'url(images/open.gif)'});
						$(this).parent('li').css({backgroundImage:'url(../../images/btn_gall_open_h.jpg)'});
						var pos=$("div.gallery").position().top;
						jQuery("html, body").animate({scrollTop:pos},800,'easeOutCirc');
						obj.animate({height:'0px'},800,'easeOutCirc');
						setTimeout(function(){
							resetGall();
							timeCtrl.isOpening=false;
						},820);
					}
				);

				/* 전후사진보기 버튼클릭 끝 */

				config.wrapper.find('.close').click(function(){
					if(timeCtrl.isOpening) return;
					timeCtrl.isOpening=true;
					$('.gallery .btn a').css({backgroundImage:'url(images/open.gif)'});
					$('.gallery .btn a').parent('li').css({backgroundImage:'url(../../images/btn_gall_open_h.jpg)'});
					var pos=$("div.gallery").position().top;
					jQuery("html, body").animate({scrollTop:pos},800,'easeOutCirc');
					obj.animate({height:'0px'},800,'easeOutCirc');
					setTimeout(function(){
						resetGall();
						timeCtrl.isOpening=false;
					},820);
				});

				config.gall_info.find('.next_gall').hover(
					function(){
						$(this).find('span').animate({right:'10px'},100);
					},function(){
						$(this).find('span').animate({right:'15px'},100);
					}
				);
				/*
					changeGallery 갤러리 전환 시 바꿔주는 함수
				*/
				config.gall_info.find('.gall_num a').each(function(index){
					$(this).bind('click',function(){changeGallery(index);return false});
				});

				config.gall_util.find('.page_num').text('/'+config.gall_a_b.eq(0).find('.af ul li').length);
				config.gall_util.find('.page_num').prepend('<em>1</em>');

				function setGall(){
					config.gall_a_b.each(function(){
						$(this).find('.bf ul').css('top','0');
						$(this).find('.af ul').css('top','0');
					});
				}

				function changeGallery(idx){
					nowIdx=getNowIdx();
					var _titnum=idx+1;
					if(idx==nowIdx) return false;
					setGall();
					viewIdx=idx;
					if(!isAdult && viewIdx==3){
						var $now=config.gall_a_b.eq(nowIdx);
						var $view=$('.identify_adult');
						config.gall_util.fadeOut();						
					}else{
						var $now=config.gall_a_b.eq(nowIdx);
						var $view=config.gall_a_b.eq(idx);					
					}
					if(!isAdult && viewIdx!=3){
						$('.identify_adult').fadeOut();
						config.gall_util.fadeIn();
					}
					$now.fadeOut(300);
					$view.fadeIn(300);
					config.gall_info.find('.gall_num a').each(function(_idx){
						if($(this).hasClass('on')) $(this).removeClass('on');
						if(_idx==idx){
							$(this).addClass('on');
						}
					});

					config.gall_util.find('.page_num').text('/'+$view.find('.af ul li').length);
					config.gall_util.find('.page_num').prepend('<em>1</em>');
					if(idx==config.gall_a_b_length-1){
						changeTitle(_titnum,1,config.gall_link[idx]);
					}else{
						changeTitle(_titnum,_titnum+1,config.gall_link[idx]);
					}

					return false;
				}
				/*
					getNowIdx 현재 보이고있는 콘텐츠 index값을 리턴해주는 함수
				*/
				function resetGall(){
					var $first=config.gall_a_b.eq(0);
					setGall();
					config.gall_info.find('.gall_num a').each(function(_idx){
						if($(this).hasClass('on')) $(this).removeClass('on');
						if(_idx==0){
							$(this).addClass('on');
						}
					});
					config.gall_a_b.each(function(){
						$(this).hide();
					});
					config.gall_a_b.eq(0).show();
					config.gall_util.find('.page_num').text('/'+$first.find('.af ul li').length);
					config.gall_util.find('.page_num').prepend('<em>1</em>');
					changeTitle(0,1,config.gall_link[0]);
					$('.identify_adult').hide();
					config.gall_util.show();
					viewIdx=0;
					return false;				
				}

				function getNowIdx(){
					var _val;
					config.gall_info.find('.gall_num a').each(function(index){
						if($(this).hasClass('on')){
							_val=index;
						}
					});
					return _val;
				}

				function getNextIdx(){
					var _nextval;
					if(viewIdx+1==config.gall_a_b_length){
						_nextval=0;
					}else{
						_nextval=viewIdx+1;
					}
					return _nextval;
				}

				config.gall_util.find('.top').bind('click',function(){
					gallMoveUp();
					return false;
				});
				config.gall_util.find('.btm').bind('click',function(){
					gallMoveDown();
					return false;
				});

				function changeTitle(idx,nextidx,link){
					config.gall_info.find('h3 span').attr('class','tit'+idx);
					//config.gall_info.find('.next_gall strong').attr('class','next_tit'+nextidx);
					//config.gall_util.find('.link_gall span').attr('class','gall_link'+idx);				
					config.gall_util.find('.link_gall').attr('href',link);
				}
				config.gall_info.find('.next_gall').bind('click',function(){changeGallery(getNextIdx())});

				function gallMoveUp(){	
					var $_bf=config.gall_a_b.eq(viewIdx).find('.bf ul');
					var $_af=config.gall_a_b.eq(viewIdx).find('.af ul');
					var $_pg_num=config.gall_util.find('.page_num em');
					var _length=$_af.find('li').length;
					var _lastval;
					var _moveval=parseInt( $_af.css('top') );
					_moveval=Math.abs(_moveval);
					_lastval=335*(_length-1);

					if(timeCtrl.isUpdown || _lastval==_moveval) return;

					timeCtrl.isUpdown=true;

					$_bf.animate({top:'-=335px'},500);
					$_af.animate({top:'-=335px'},500);
					setTimeout(function(){
						$_pg_num.text(_moveval/335+2);
						timeCtrl.isUpdown=false;
					},520);
				}
				/* 함수 gallMoveUp 끝 */

				function gallMoveDown(){
					var $_bf=config.gall_a_b.eq(viewIdx).find('.bf ul');
					var $_af=config.gall_a_b.eq(viewIdx).find('.af ul');
					var $_pg_num=config.gall_util.find('.page_num em');
					var _length=$_af.find('li').length;
					var _lastval;
					var _moveval=parseInt( $_af.css('top') );
					_moveval=Math.abs(_moveval);
					_lastval=335*(_length-1);

					if(timeCtrl.isUpdown || _moveval==0) return;

					timeCtrl.isUpdown=true;

					$_bf.animate({top:'+=335px'},500);
					$_af.animate({top:'+=335px'},500);
					setTimeout(function(){
						$_pg_num.text(_moveval/335);
						timeCtrl.isUpdown=false;					
					},520);
				}
				/* 함수 gallMoveDown 끝 */

			});
			/* return each end */
		}
		/* wjGallery end */

		$.fn.SubPage_bfAf=function(){
			var listobj=$('.thumb_slide li');
			var bigimg=$('.big_pic .img img');
			var img_tab=$('.opg_tab li');
			var nowidx=0;
			var obj=$(this);
			var imgObj={
				cont0:[
					$(listobj[0]).find('.img img').attr('src'),
					$(listobj[0]).find('.another_img img').eq(0).attr('src'),
					$(listobj[0]).find('.another_img img').eq(1).attr('src')
				],
				cont1:[
					$(listobj[1]).find('.img img').attr('src'),
					$(listobj[1]).find('.another_img img').eq(0).attr('src'),
					$(listobj[1]).find('.another_img img').eq(1).attr('src')
				],
				cont2:[
					$(listobj[2]).find('.img img').attr('src'),
					$(listobj[2]).find('.another_img img').eq(0).attr('src'),
					$(listobj[2]).find('.another_img img').eq(1).attr('src')
				],
				cont3:[
					$(listobj[3]).find('.img img').attr('src'),
					$(listobj[3]).find('.another_img img').eq(0).attr('src'),
					$(listobj[3]).find('.another_img img').eq(1).attr('src')
				]
			}

			return this.each(function(){

				function resetList(){
					$('.thumb_slide li').each(function(){
						$(this).removeClass('on');
					});
				}

				function resetSubTab(){
					$('.opg_tab li').each(function(){
						$(this).find('a').removeClass('on');
					});
				}

				$('.thumb_pic .arrow_r').click(function(){
					if($(this).hasClass('disable')) return;
					resetList();
					resetSubTab();
					nowidx=nowidx+1;
					$(listobj[nowidx]).addClass('on');
					img_tab.find('a').eq(0).addClass('on');
					bigImgSet();
					if(nowidx==listobj.length-1){
						$(this).addClass('disable');
					}
					$('.thumb_pic .arrow_l').removeClass('disable');
					return false;
				});

				$('.thumb_pic .arrow_l').click(function(){
					if($(this).hasClass('disable')) return;
					resetList();
					resetSubTab();
					nowidx=nowidx-1;
					$(listobj[nowidx]).addClass('on');
					img_tab.find('a').eq(0).addClass('on');
					bigImgSet();
					if(nowidx==0){
						$(this).addClass('disable');
					}
					$('.thumb_pic .arrow_r').removeClass('disable');
					return false;					
				});

				$('.thumb_slide li').click(function(){
					if(nowidx==$(this).index()) return false;
					resetList();
					resetSubTab();
					nowidx=$(this).index();
					$(listobj[nowidx]).addClass('on');
					img_tab.find('a').eq(0).addClass('on');
					bigImgSet();
					$('.thumb_pic .arrow_r').removeClass('disable');
					$('.thumb_pic .arrow_l').removeClass('disable');

					if(nowidx==0){
						$('.thumb_pic .arrow_l').addClass('disable');
					}else if(nowidx==listobj.length-1){
						$('.thumb_pic .arrow_r').addClass('disable');
					}
					return false
				});

				function bigImgSet(){
					switch(nowidx){
						case 0:bigimg.attr('src',imgObj.cont0[0]); break;
						case 1:bigimg.attr('src',imgObj.cont1[0]);break;
						case 2:bigimg.attr('src',imgObj.cont2[0]);break;
						case 3:bigimg.attr('src',imgObj.cont3[0]);break;
					}				
				}

				img_tab.find('a').click(function(){
					if($(this).hasClass('disable')) return false;

					var _tabidx=$(this).parent('li').index();
					switch(nowidx){
						case 0:bigimg.attr('src',imgObj.cont0[_tabidx]);break;
						case 1:bigimg.attr('src',imgObj.cont1[_tabidx]);break;
						case 2:bigimg.attr('src',imgObj.cont2[_tabidx]);break;
						case 3:bigimg.attr('src',imgObj.cont3[_tabidx]);break;
					}
					resetSubTab();
					$(img_tab[_tabidx]).find('a').addClass('on');
					return false;
				});
			});
		}
	   $(window).load(function(){

			var isOpen=false;
			var viewIdx;
			var viewedIdx;
			var list=$('.quick_list').find('li');
			var cont=$('.quick_contents >div');

			$('input:text').bind('focus',function(){ /* input박스 focus시 기본 value 제거해주는 함수  */
					if($(this).hasClass('noblur')) return;
					if($(this).val()==$(this).prop('defaultValue')){
						$(this).val('');
					}
				}
			);
			$('input:text').bind('blur',function(){ /* input박스 blur시 기본 value 넣어주는 함수  */
					if($(this).hasClass('noblur')) return;
					if($(this).val()==''){
						$(this).val($(this).prop('defaultValue'));
					}
				}
			);

			$('.language_layer').hover(function(){
				openLanguage();
			},function(){
				closeLanguage();
			});

			$('.quick').find('.quick_list').find('li').click(function(){ /* quick배너 오픈함수 */
				viewIdx=$(this).index();
				if(viewIdx==viewedIdx){
					return;
				}
				list.each(function(){
					viewedIdx=$(this).find('a').removeClass('on');
					list.addClass('open');
				});
				cont.each(function(index,item){
					$(this).hide();
				});
				$(this).find('a').addClass('on');
				$(cont[viewIdx]).show();
				if(isOpen==false){
					$('.quick').animate({right:0},400);
					isOpen=true;
				}
				return false;
			});
			/* li click */

			$('.quick').find('.close_q').click(function(){ /* quick배너 클로즈함수 */
				$('.quick').animate({right:'-500px'},400);
				cont.hide();
				list.each(function(){
					viewedIdx=$(this).find('a').removeClass('on');
					list.removeClass('open');
				});
				isOpen=false;
				return false;
			});
			/* close click*/
	   
	   });
	   /* fn.quickmenu end */
}());

function openNavi(idx){ /* GNB 네비게이션 커서 오버 시 레이어 보여주는 함수 */
	var obj=$('#menu'+idx);
	obj.addClass('on');
	obj.find('.depth2').show();
}

function closeNavi(idx){ /* GNB 네비게이션 커서 아웃 시 레이어 숨기는 함수 */
	var obj=$('#menu'+idx);
	obj.removeClass('on');
	obj.find('.depth2').hide();
}


function selectboxOpen(obj,e){ /* 디자인 셀렉트박스 열어주는 함수 */
	var event = e || window.event;

	if(event.stopPropagation) event.stopPropagation();
	else event.cancelBubble=true;
	
	

	if($(obj).find('ul').css('display')!='none'){
		$(obj).find('ul').hide();
		$(obj).removeClass('selected');
	}else{
		$(document).find('.selectbox').each(function(){
			$(this).find('ul').hide();
			$(this).removeClass('selected');
		});
		$(document).find('.selectbox2').each(function(){
			$(this).find('ul').hide();
			$(this).removeClass('selected');
		});
		$(document).find('.selectbox3').each(function(){
			$(this).find('ul').hide();
			$(this).removeClass('selected');
		});
		$(obj).find('ul').show();			
		$(obj).addClass('selected');
	}
}

function layerOpen(objNm){   /* 레이어 보여주는 함수 */
	var o=$(objNm);
	$('.layer_bg').css({
		width:$(document).eq(0).width()+'px',
		height:$(document).height()+'px',
		opacity:0.65
	});
	$('.layer_bg').eq(0).fadeIn();
	if($(document).height() < o.height()){
		$('.layer_bg').eq(0).css({
			height:(o.height()+100)+'px'
		});
		$('#wrap').css({
			height:(o.height()+100)+'px'
		});		
	}
	setTimeout(function(){o.fadeIn();},500);
	$(window).scrollTop(0);
}

function layerClose(objNm){ /* 레이어 닫는 함수 */
	var o=$(objNm);
	$('.layer_bg').fadeOut();
	o.fadeOut();
	$('#wrap').css({
		height:'auto'
	});		
}

function inputFocus(obj){ /* input박스 focus시 focused 클래스 추가해주는 함수 */
	$(obj).addClass('focused');

}

function inputBlur(obj){ /* input박스 blur시 focused 클래스 추가해주는 함수 */
	$(obj).removeClass('focused');
}

function initialVideo(ytId,w,h){
	if(typeof ytId != 'object'){
		throw new Error('첫번째 인자의 유형이 Object가 아닙니다.');
		return;
	}
	var yt_obj=[];
	for(var val in ytId){
		var yt='<iframe width="'+ytId[val].w+'" height="'+ytId[val].h+'" src="http://www.youtube.com/embed/'+ytId[val].id+'?rel=0" frameborder="0" allowfullscreen></iframe>';			
		yt_obj.push(yt);
	}
	return yt_obj;
}

function subTabToggle(obj){
	var cur_idx;
	var this_idx;
	var o=$(obj);
	this_idx=o.parent().index();
	var obj_cont=o.parent().parent().parent().siblings('.sub_tab_cont');
	obj_cont.children('div').each(function(){
		if( $(this).css('display') == 'block') cur_idx=$(this).index();
	});

	if(this_idx==cur_idx) return false;

	subTabContReset(obj_cont);
	obj_cont.find('div').eq(this_idx).show();
	o.addClass('on');

}

function subTabContReset(obj_cont){
	obj_cont.children('div').each(function(){
		$(this).hide();
	});
	obj_cont.siblings('.sub_tab_list').find('ul li').each(function(){
		$(this).find('a').removeClass('on');
	});
}

function subBreastTabToggle(obj){
	var cur_idx;
	var this_idx;
	var o=$(obj);
	this_idx=o.parent().index();
	var obj_cont=o.parent().parent().parent().siblings('.realbreast_tab_cont');
	obj_cont.children('div').each(function(){
		if( $(this).css('display') == 'block') cur_idx=$(this).index();
	});

	if((this_idx + 1)==cur_idx) return false;
	
	subBreastTabContReset(obj_cont);
	obj_cont.find('div').eq(this_idx + 1).show();
	obj_cont.find('div').eq(0).show();
	o.addClass('on');
}

function subBreastTabContReset(obj_cont){
	obj_cont.children('div').each(function(){
		$(this).hide();
	});
	obj_cont.siblings('.realbreast_tab_list').find('ul li').each(function(){
		$(this).find('a').removeClass('on');
	});
}

var lang_time_id;		

function openLanguage(){
	try{
	if(!$.isEmptyObject(lang_time_id))clearTimeout(lang_time_id);	
	}catch(e){
	
	}

	$('.language_layer').show();
}

function closeLanguage(){
	lang_time_id=setTimeout(function(){
		$('.language_layer').hide();
	},1000);
}

function storyLayerOpen(pg_type){
	$('.layer_bg').eq(0).css({
		width:$(document).eq(0).width()+'px',
		height:$(document).height()+'px',
		opacity:0.65
	});
	if(pg_type=='main'){ /* 리얼다이어리 메인 */

		var h=parseInt($('#story1').css('height'));
		$('.stoty_body').css('height',(h+60)+'px');
		if(h+175>$(document).height()-50){
			$('.layer_bg').eq(0).css('height',(h+350)+'px');
		}else{
			$('.layer_bg').eq(0).css('height',$(document).height()+'px');
		}

	}else{ /* 리얼다이어리 상세보기 */

		var h=$('.story_view').height()+30;
		$('.stoty_body').css('height',h+'px');
		$('.layer_bg').eq(0).css('height',(h+300)+'px');	
	}

	setTimeout(function(){$('.story_layer').fadeIn();},500);
	$('.layer_bg').eq(0).fadeIn();

}

function changeStoryLayer(pg_type,ht){	
	if(pg_type=='main'){ /* 리얼다이어리 메인으로 이동 */		
		//var h=parseInt($('#story1').css('height'));
		var h=ht+43;
		$('.stoty_body').css('height',h+'px');
		
		if(h+175 > $(document).height()-50){
			$('.layer_bg').eq(0).css('height',(h+350)+'px');
		}else{
			$('.layer_bg').eq(0).css('height',$(document).height()+'px');
		}
		$('.story_main').fadeIn();
		$('.story_view').fadeOut();

	}else{ /* 리얼다이어리 상세보기로 이동 */

		var h=$('.story_view').height();	
		$('.stoty_body').css('height',(h+30)+'px');
		if(h+175 > $(document).height()-50){
			$('.layer_bg').eq(0).css('height',(h+350)+'px');
		}else{
			$('.layer_bg').eq(0).css('height',$(document).height()+'px');
		}			
		$('.story_main').fadeOut();
		$('.story_view').fadeIn();
	}
}