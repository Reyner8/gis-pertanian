(function ($) {
	"use strict";

	/*================================
	Preloader
	==================================*/

	var preloader = $("#preloader");
	$(window).on("load", function () {
		setTimeout(function () {
			preloader.fadeOut("slow", function () {
				$(this).remove();
			});
		}, 300);
	});

	/*================================
	sidebar collapsing
	==================================*/
	if (window.innerWidth <= 1364) {
		$(".page-container").addClass("sbar_collapsed");
	}
	$(".nav-btn").on("click", function () {
		$(".page-container").toggleClass("sbar_collapsed");
	});

	/*================================
	Start Footer resizer
	==================================*/
	var e = function () {
		var e =
			(window.innerHeight > 0 ? window.innerHeight : this.screen.height) - 5;
		(e -= 67) < 1 && (e = 1),
			e > 67 && $(".main-content").css("min-height", e + "px");
	};
	$(window).ready(e), $(window).on("resize", e);

	/*================================
	sidebar menu
	==================================*/
	$("#menu").metisMenu();

	/*================================
	slimscroll activation
	==================================*/
	$(".menu-inner").slimScroll({
		height: "auto",
	});
	$(".nofity-list").slimScroll({
		height: "435px",
	});
	$(".timeline-area").slimScroll({
		height: "500px",
	});
	$(".recent-activity").slimScroll({
		height: "calc(100vh - 114px)",
	});
	$(".settings-list").slimScroll({
		height: "calc(100vh - 158px)",
	});

	/*================================
	stickey Header
	==================================*/
	$(window).on("scroll", function () {
		var scroll = $(window).scrollTop(),
			mainHeader = $("#sticky-header"),
			mainHeaderHeight = mainHeader.innerHeight();

		// console.log(mainHeader.innerHeight());
		if (scroll > 1) {
			$("#sticky-header").addClass("sticky-menu");
		} else {
			$("#sticky-header").removeClass("sticky-menu");
		}
	});

	/*================================
	form bootstrap validation
	==================================*/
	$('[data-toggle="popover"]').popover();

	/*------------- Start form Validation -------------*/
	window.addEventListener(
		"load",
		function () {
			// Fetch all the forms we want to apply custom Bootstrap validation styles to
			var forms = document.getElementsByClassName("needs-validation");
			// Loop over them and prevent submission
			var validation = Array.prototype.filter.call(forms, function (form) {
				form.addEventListener(
					"submit",
					function (event) {
						if (form.checkValidity() === false) {
							event.preventDefault();
							event.stopPropagation();
						}
						form.classList.add("was-validated");
					},
					false
				);
			});
		},
		false
	);

	// datatable
	$(document).ready(function () {
		$("#datatable").DataTable({
			responsive: true,
		});
	});
	$(document).ready(function () {
		$("#datatable-dua").DataTable({
			responsive: true,
		});
	});
	$(document).ready(function () {
		$("#datatable-tiga").DataTable({
			responsive: true,
		});
	});

	/*================================
	Slicknav mobile menu
	==================================*/
	$("ul#nav_menu").slicknav({
		prependTo: "#mobile_menu",
	});

	/*================================
	login form
	==================================*/
	$(".form-gp input").on("focus", function () {
		$(this).parent(".form-gp").addClass("focused");
	});
	$(".form-gp input").on("focusout", function () {
		if ($(this).val().length === 0) {
			$(this).parent(".form-gp").removeClass("focused");
		}
	});

	/*================================
	slider-area background setting
	==================================*/
	$(".settings-btn, .offset-close").on("click", function () {
		$(".offset-area").toggleClass("show_hide");
		$(".settings-btn").toggleClass("active");
	});

	/*================================
	Owl Carousel
	==================================*/
	function slider_area() {
		var owl = $(".testimonial-carousel").owlCarousel({
			margin: 50,
			loop: true,
			autoplay: false,
			nav: false,
			dots: true,
			responsive: {
				0: {
					items: 1,
				},
				450: {
					items: 1,
				},
				768: {
					items: 2,
				},
				1000: {
					items: 2,
				},
				1360: {
					items: 1,
				},
				1600: {
					items: 2,
				},
			},
		});
	}
	slider_area();

	/*================================
	Fullscreen Page
	==================================*/

	if ($("#full-view").length) {
		var requestFullscreen = function (ele) {
			if (ele.requestFullscreen) {
				ele.requestFullscreen();
			} else if (ele.webkitRequestFullscreen) {
				ele.webkitRequestFullscreen();
			} else if (ele.mozRequestFullScreen) {
				ele.mozRequestFullScreen();
			} else if (ele.msRequestFullscreen) {
				ele.msRequestFullscreen();
			} else {
				console.log("Fullscreen API is not supported.");
			}
		};

		var exitFullscreen = function () {
			if (document.exitFullscreen) {
				document.exitFullscreen();
			} else if (document.webkitExitFullscreen) {
				document.webkitExitFullscreen();
			} else if (document.mozCancelFullScreen) {
				document.mozCancelFullScreen();
			} else if (document.msExitFullscreen) {
				document.msExitFullscreen();
			} else {
				console.log("Fullscreen API is not supported.");
			}
		};

		var fsDocButton = document.getElementById("full-view");
		var fsExitDocButton = document.getElementById("full-view-exit");

		fsDocButton.addEventListener("click", function (e) {
			e.preventDefault();
			requestFullscreen(document.documentElement);
			$("body").addClass("expanded");
		});

		fsExitDocButton.addEventListener("click", function (e) {
			e.preventDefault();
			exitFullscreen();
			$("body").removeClass("expanded");
		});
	}
})(jQuery);

// check element is exist
if (document.getElementById("image-preview") != null) {
	// preview image
	const inputFile = document.getElementById("gambar");
	const imageContainer = document.getElementById("image-preview");
	const imagePreview = imageContainer.querySelector(".image-preview-chosen");
	const imageDefaultText = imageContainer.querySelector(
		".image-preview-default"
	);

	function action() {
		const file = this.files[0];

		if (file) {
			const reader = new FileReader();
			imageDefaultText.style.display = "none";
			imagePreview.style.display = "block";

			reader.addEventListener("load", function () {
				imagePreview.setAttribute("src", this.result);
			});

			reader.readAsDataURL(file);
		} else {
			imageDefaultText.style.display = null;
			imagePreview.style.display = null;
			imagePreview.setAttribute("src", "");
		}
	}
	inputFile.addEventListener("change", action);

	// update Image
	if (imagePreview.src != "") {
		imageDefaultText.style.display = "none";
		imagePreview.style.display = "block";
	} else {
		imageDefaultText.style.display = null;
		imagePreview.style.display = null;
	}
}

// passing data to modal
$("#exampleModalLong").on("show.bs.modal", function (event) {
	let value = $(event.relatedTarget).data("value");
	$(this).find(".modal-body").html(value);
});

/* Modal Update */

// Update Spesialis
const updateBtn = document.querySelectorAll("#update-btn");
updateBtn.forEach((el) => {
	el.addEventListener("click", function () {
		document.querySelector('#update-modal input[name="nama"]').value =
			this.dataset.nama;
		const url = document.querySelector("#update-modal").action;
		document.querySelector("#update-modal").action =
			url + "/" + this.dataset.id;
	});
});

// Update Lokasi
const updateBtnLoc = document.querySelectorAll("#update-btn-loc");
updateBtnLoc.forEach((el) => {
	el.addEventListener("click", function () {
		document.querySelector('#update-modal input[name="lat"]').value =
			this.dataset.lat;
		document.querySelector('#update-modal input[name="lng"]').value =
			this.dataset.lng;
		document.querySelector('#update-modal input[name="namaLokasi"]').value =
			this.dataset.namalokasi;
		document.querySelector('#update-modal input[name="alamat"]').value =
			this.dataset.alamat;
		Array.from(
			document.querySelector('#update-modal select[name="apotik"]').options
		).forEach((elOpt) => {
			if (elOpt.value == this.dataset.apotik) {
				elOpt.selected = true;
			}
		});
		Array.from(
			document.querySelector('#update-modal select[name="wifi"]').options
		).forEach((elOpt) => {
			if (elOpt.value == this.dataset.wifi) {
				elOpt.selected = true;
			}
		});
		Array.from(
			document.querySelector('#update-modal select[name="ac"]').options
		).forEach((elOpt) => {
			if (elOpt.value == this.dataset.ac) {
				elOpt.selected = true;
			}
		});
		Array.from(
			document.querySelector('#update-modal select[name="ruang_asi"]').options
		).forEach((elOpt) => {
			if (elOpt.value == this.dataset.ruangasi) {
				elOpt.selected = true;
			}
		});
		Array.from(
			document.querySelector('#update-modal select[name="ruang_tunggu"]')
				.options
		).forEach((elOpt) => {
			if (elOpt.value == this.dataset.ruangtunggu) {
				elOpt.selected = true;
			}
		});
		Array.from(
			document.querySelector('#update-modal select[name="nebulizer"]').options
		).forEach((elOpt) => {
			if (elOpt.value == this.dataset.nebulizer) {
				elOpt.selected = true;
			}
		});
		Array.from(
			document.querySelector('#update-modal select[name="kelurahan"]').options
		).forEach((elOpt) => {
			if (elOpt.value == this.dataset.kelurahan) {
				elOpt.selected = true;
			}
		});
		const url = document.querySelector("#update-modal").action;
		document.querySelector("#update-modal").action =
			url + "/" + this.dataset.id;
	});
});

// Update Kecamatan
const updateBtnKec = document.querySelectorAll("#update-btn-kec");
updateBtnKec.forEach((el) => {
	el.addEventListener("click", function () {
		document.querySelector("#update-modal input[name=kecamatan]").value =
			this.dataset.nama;
		const url = document.querySelector("#update-modal").action;
		document.querySelector("#update-modal").action =
			url + "/" + this.dataset.id;
	});
});
// Update Jenis
const updateBtnJenis = document.querySelectorAll("#update-btn-jenis");
updateBtnJenis.forEach((el) => {
	el.addEventListener("click", function () {
		document.querySelector("#update-modal input[name=nama]").value =
			this.dataset.nama;
		const url = document.querySelector("#update-modal").action;
		document.querySelector("#update-modal").action =
			url + "/" + this.dataset.id;
	});
});

// Update Kelurahan
const updateBtnKel = document.querySelectorAll("#update-btn-kel");
updateBtnKel.forEach((element) => {
	element.addEventListener("click", function (e) {
		document.querySelector('#update-modal input[name="kelurahan"]').value =
			this.dataset.kelurahan;
		Array.from(
			document.querySelector('#update-modal select[name="kecamatan"]').options
		).forEach((elOpt) => {
			if (elOpt.value == this.dataset.kecamatan) {
				elOpt.selected = true;
			}
		});
		const url = document.querySelector("#update-modal").action;
		document.querySelector("#update-modal").action =
			url + "/" + this.dataset.id;
	});
});

/* End: Modal Update */

/*  Jadwal */

// Fetching Data
function getLoc(url = "") {
	return fetch(url)
		.then((response) => {
			if (response.status == 200) {
				return response.json();
			} else {
				throw new Error(`Something Went Wrong !!!`);
			}
		})
		.then((response) => response)
		.catch((err) => alert(err));
}

// event dropdown
const elementSelectDokter = document.getElementById("dokter");
if (elementSelectDokter) {
	elementSelectDokter.addEventListener("change", async function () {
		const elementSelectLokasi = document.getElementById("lokasi");
		// set to empty string
		elementSelectLokasi.innerHTML = "";

		let dataLocation = await getLoc(`${baseUrl}admin/jadwal/lokasiPraktikJSON`);
		dataLocation.forEach((data) => {
			if (data.id_dokter == this.value) {
				var node = document.createElement("option"); // Create a <option> node
				var textnode = document.createTextNode(data.nama_tempat); // Create a text node
				node.setAttribute("value", `${data.id_lokasi}`); // set attr value
				node.appendChild(textnode); // Append the text to <option>
				elementSelectLokasi.appendChild(node); // Append <option> to <select> with id="lokasi"
			}
		});
	});
}

/*  End: Jadwal */
