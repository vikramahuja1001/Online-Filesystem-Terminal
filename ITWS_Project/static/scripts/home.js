function hide(){
	container.hide();
	flag=0;
};

$(document).ready(function(){

		/* Converting the #box div into a bounceBox: */
		$('#box').bounceBox();

		/* Listening for the click event and toggling the box: */
		$('a.button').click(function(e){

			$('#box').bounceBoxToggle();
			e.preventDefault();
			});
		/*$('#box').blurjs({ source: 'body', radius: 30 });*/

		//		$('a.button').click(function(){
		//	    		$('#box').toggle('bounce',300)
		//	   	 });

		$('#box').blurjs({
source: 'body',
radius : 10,
draggable :true,
overlay: 'rgba(0, 0, 0, 0.2)'
});

/* When the box is clicked, hide it: */
//		$('#box').click(function(){
//			$('#box').bounceBoxHide();
//		});

});

$(window).load(function() {
		$(".loader").fadeOut(4000);
		})

document.addEventListener("mousedown", function(e) {

		if (e.which === 3) { // right click = 3, left click = 1
			if(flag == 0)
			{
				container.css({ top: e.pageY + "px", left: e.pageX + "px" }).show(100);
				flag=1;
			}
			else
			{
				container.css({ top: e.pageY + "px", left: e.pageX + "px" }).hide();
				flag=0;
			}
		}
//		else if(e.which === 1){
//			container.hide(100);
//			flag=0;
//		}
	});

// prevent context menu show up
document.addEventListener('contextmenu', function(e) {
		e.preventDefault();
		}, false);


var flag=0;
var container = $("#custom-menu");
