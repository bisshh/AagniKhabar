window.addEventListener("load", () => {
	//Clock
	function clock() {
		offset = '+5.75'
		var d = new Date(),
			utc = d.getTime() + (d.getTimezoneOffset() * 60000);
		time = new Date(utc + (3600000 * offset));
		hours = time.getHours(),
			minutes = time.getMinutes(),
			seconds = time.getSeconds();
		var hour = harold(hours)
	
		document.querySelectorAll('.clock')[0].innerHTML = ToNepaliDigit(harold(hours)) + ":" + ToNepaliDigit(harold(minutes)) + ":" + ToNepaliDigit(harold(seconds));
	
		function harold(standIn) {
			if (standIn < 10) {
				standIn = '0' + standIn
			}
			return standIn;
		}
	}
	setInterval(clock, 1000);
	const ToNepaliDigit = number => {
		var number = number.toString();
		var sliced = [];
		var numberlen = number.length;
		var nepali_digits = ["०", "१", "२", "३", "४", "५", "६", "७", "८", "९"];
		// console.log(nepali_digits);
	  
		for (var i = 0; i < numberlen; i++) {
		  sliced.push(nepali_digits[number.substr(number.length - 1)]);
		  number = number.slice(0, -1);
		}
		return commafy(sliced.reverse().join("").toString());
		// return sliced.reverse().join("").toString();
	  };
	  const lastThree = number => {
		return this.substr(this.length - 3);
	  };
	  const removeLastThree = number => {
		return this.slice(0, -3);
	  };
	  const sliceToTwo = number => {
		var sliced = [];
		// var number = this;
		var numberLength = number.length;
		for (var i = 0; i < numberLength; i++) {
		  sliced.push(number.substr(number.length - 2));
		  number = number.slice(0, -2);
		  numberLength = numberLength - 1;
		}
		return sliced;
	  };
	  String.prototype.lastThree = function () {
		return this.substr(this.length - 3);
	  };
	  String.prototype.sliceToTwo = function () {
		var sliced = [];
		var number = this;
		var numberLength = number.length;
		for (i = 0; 1 <= number.length; i++) {
		  sliced.push(parseInt(number.substr(number.length - 2)).toString());
		  number = number.slice(0, -2);
		}
		return sliced;
	  };
	  String.prototype.removeLastThree = function () {
		return this.slice(0, -3);
	  };
	  
	  function commafy(number) {
		var str = number.toString();
		var length = str.length;
		if (length > 3) {
		  // get last three digits of given number
		  var lastThree = str.lastThree();
	  
		  // remove last three digit and take remaining digits
		  var number = str.slice(0, -3);
		  var sliced = [];
		  var numberLength = number.length;
		  for (i = 0; 1 <= number.length; i++) {
			sliced.push(number.substr(number.length - 2));
			number = number.slice(0, -2);
		  }
	  
		  // make a array
		  var remStrips = sliced.reverse().join(",") + "," + lastThree;
		  return remStrips;
		} else {
		  return str;
		}
	  }
	  try {
		catchData();
		//   catchNepalData();
		console.log("Internal");
		console.log("Internal");
	  } catch (error) {
		console.log(error);
	  }
	  
	$(document).mouseup(function (e) {
		var container = $(".rd-search");
		$(".rdsearch").click(function () {
			$(".rd-search").toggle();
		});
		// if the target of the click isn't the container nor a descendant of the container
		if (!container.is(e.target) && container.has(e.target).length === 0) {
			container.hide();
		}
	});

	//Back to Top
	var btn = $('#back-top');

	$(window).scroll(function () {
		if ($(window).scrollTop() > 300) {
			btn.addClass('show');
		} else {
			btn.removeClass('show');
		}
	});

	btn.on('click', function (e) {
		e.preventDefault();
		$('html, body').animate({ scrollTop: 0 }, '300');
	});

	$(function () {
		var stickyHeaderTop = $('.rd-display').offset().top;
		$(window).scroll(function () {
			if ($(window).scrollTop() > stickyHeaderTop) {
				$('.rd-display').addClass('fix');
			} else {
				$('.rd-display').removeClass('fix');
			}
		});
	});
	$(".news-detail img").addClass("img-fluid");
		
	//Video Slider
	// jQuery('.carousel-main').flickity({
	// 	contain: true,
	// 	pageDots: false,
	// 	prevNextButtons: false,
	// });
	jQuery('.carousel-main').on('settle.flickity', function () {
		newTarg = jQuery(".carousel-cell.flex-video").not('.is-selected');
		jQuery(newTarg).find('iframe').each(function () {
			var src = $(this).attr('src');
			$(this).attr('src', src);
		});
		console.log('slide changes');

	});

	//Back to Top
	var btn = $('#back-top');

	$(window).scroll(function () {
		if ($(window).scrollTop() > 300) {
			btn.addClass('show');
		} else {
			btn.removeClass('show');
		}
	});

	btn.on('click', function (e) {
		e.preventDefault();
		$('html, body').animate({ scrollTop: 0 }, '300');
	});

	//footer popup
	let fpop = document.getElementById('popup');
	let span = document.getElementsByClassName("close")[0];
	if(span){
		span.onclick = function () {
			fpop.style.display = "none";
		}	
	}
	
	window.onclick = function (event) {
		if (event.target == modal) {
			fpop.style.display = "none";
		}
	}
	
	let timeout=3000;
	let widgets=document.querySelectorAll(".widgets");
	if(widgets!==null){
		widgets.forEach((widget)=>{
			let adName=widget.getAttribute("data-adName");
			getAdData(adName,(images)=>{
				widget.innerHTML+=images;
			});
		});
	}	
});

function getAdData(adName,func){
	let formData=new FormData();
	formData.append("action","getAdData");
	formData.append('adName',adName);
	
	fetch(ajaxObj.ajaxURL,{
		method:"POST",
		body:formData
	}).then(res=>res.json()).then((res)=>{
		if(res.images.length>0){
			let img="";
			res.images.forEach((image)=>{
				img+=`<a href="${image.link_url}" target="_blank"><img src="${image.url}" class="mw-100" /></a>`;
			});
			if(typeof func === 'function'){
				func(img);
			}	
		}
	});
}