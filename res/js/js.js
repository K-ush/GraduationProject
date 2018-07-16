setTimeout(function(){
	$(".load .gr").animate({"opacity":1},1200,function(){
		$(".load").animate({opacity:"0"},800);
		$(".gr").animate({opacity:"0"},800);
		setTimeout(function(){
			$(".load").remove();
			$(".gr").remove();
		},600);
	});
}, 1);
			
			

function getnow() {
	var date = new Date();
	var year = date.getFullYear();
	var month = date.getMonth()+1;	
	var day = date.getDate();
	if(date.getMonth() < 10){
		month = "0"+month;
	}
	return year+"-"+month+"-"+day;
}
			
$("#ani").slick({
	centerMode: true,
	slidesToShow: 4,
	centerPadding: '60px',
	variableWidth : true,
});

$('#date').val(getnow());

$('#date').datepicker({
	language: 'en',
	minDate: new Date() 
});


$(".contentbar span").click(function(){
	$(this).siblings().removeClass("this");
	$(this).addClass("this");

	var no = $(this).index();
	$(".contentbox").eq(no).css({display:"block"}).siblings(".contentbox").css({"display":"none"});
});