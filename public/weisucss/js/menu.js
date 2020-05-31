// JavaScript Document
jQuery(document).ready(function($) {
	$(".navs li").hover(function(){
		$(this).find('ul:first').slideDown("fast").css({visibility: "visible",display: "block"});
	},function(){
		$(this).find('ul:first').slideUp("fast").css({visibility: "hidden"});
	});
	if($(".nav li ul li:has(ul)").length > 0)         
	{   
		$(".nav li ul li ul").parent().addClass("arrow");
	}

	$(".head_nav>ul>li>ul").hover(
		   
	  function () {
		$(this).parent().addClass("hover");
		
	  },
	  function () {
		$(this).parent().removeClass("hover");
	  }
	);

});

$(function() {
    //经典项目 start
    var nowNewTitle = $(".scenery .sceneryCont .newsList .item .newsBox .newsTitle").eq(0);
    var nowNewCont = $(".scenery .sceneryCont .newsList .item .newsBox .newsCont").eq(0);
    var newTitleList = $(".scenery .sceneryCont .newsList .item .newsBox .newsTitle");
    var newContList = $(".scenery .sceneryCont .newsList .item .newsBox .newsCont");

    newTitleList.show();
    newContList.hide();
    nowNewTitle.hide();
    nowNewCont.show();
    $(".scenery .sceneryCont .newsList .item .newsBox").hover(function(){
        nowNewTitle.show();
        nowNewCont.hide();
        nowNewTitle = $(this).find(".newsTitle");
		$(this).find(".Title").stop().animate({'padding-left':'25px'});
        nowNewCont = $(this).find(".newsCont")
        nowNewTitle.hide();
        nowNewCont.show();
    },function(){
      $(this).find(".Title").stop().animate({'padding-left':'0px'});
    });
    //经典项目  end
	//footer 返回顶部 start
    $(".gotop").click(function(){
        $("html,body").animate({scrollTop: $(".bodyTop").offset().top}, 1000);
    });
});