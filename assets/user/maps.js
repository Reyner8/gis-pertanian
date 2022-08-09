var map;
var marker;
var infowindow;
// Load Maps
async function initMap() {
	if (document.getElementById("maps")) {
		map = new google.maps.Map(document.getElementById("maps"), {
			zoom: 13,
			center: {
				lat: -9.471622,
				lng: 124.494334,
			},
		});

		// get Json from controller
		let dataLoc = await getLoc(`${baseUrl}lokasi/lokasiJSON`);

		// with attr data-id
		if (document.getElementById("maps").dataset.id) {
			dataLoc.forEach((dl) => {
				if (dl.id == document.getElementById("maps").dataset.id) {
					addMarker(dl);
				}
			});
		}
		// without attr data-id
		if (!document.getElementById("maps").dataset.id) {
			dataLoc.forEach((dl) => {
				addMarker(dl);
			});
		}
		// direction
		direction();
	}
}

// GET Data From Controller
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
		.catch((error) => console.log(error));
}

// function Marker
function addMarker(props) {
	// add marker
	marker = new google.maps.Marker({
		position: {
			lat: parseFloat(props.lat),
			lng: parseFloat(props.lng),
		},
		icon: `${baseUrl}assets/images/icon/icon-marker/${props.icon}`,
		size: new google.maps.Size(70, 80),
		map: map,
	});

	// popup window
	infowindow = new google.maps.InfoWindow();
	// event listener Popup Window
	marker.addListener("click", function (event) {
		infowindow.close();
		infowindow.open(map, marker);
		infowindow.setContent(content(props));
		infowindow.setPosition(event.latLng);
	});

	// filter : add event handler when looping
	if (document.querySelector("#kategori")) {
		filter(props, marker);
	}
}

// content popup fn
function content(data) {
	return `<div class="card">
				<div class="card-body">
					<h6>${data.nama}</h6>
					<p>Alamat - ${data.alamat}</p>
					<a href="${baseUrl}lokasi/detailKelompokTani/${data.id}">Detail</a>
				</div>
			  </div>`;
}

function filter(data, marker) {
	const searchBtn = document.querySelector("#search");
	searchBtn.addEventListener("click", function () {
		const kelurahan = document.querySelector("#kelurahan #kategori").value;

		if (kelurahan == 0) {
			marker.setVisible(true);
		} else {
			if (data.id_kelurahan != kelurahan) {
				marker.setVisible(false);
			} else {
				marker.setVisible(true);
			}
		}
	});
}

function direction() {
	const directionsService = new google.maps.DirectionsService();
	const directionsRenderer = new google.maps.DirectionsRenderer({
		suppressMarkers: true,
	});

	directionsRenderer.setMap(map);

	// panel direction
	directionsRenderer.setPanel(document.getElementById("direction-box"));
	const startEventHandler = function (e) {
		if (e.keyCode == 13) {
			calculateAndDisplayRoute(directionsService, directionsRenderer);
		}
	};
	const endEventHandler = function () {
		calculateAndDisplayRoute(directionsService, directionsRenderer);
	};

	const start = document.getElementById("start");
	const end = document.getElementById("end");
	autoComplete();
	if (start) {
		start.addEventListener("keydown", startEventHandler);
		end.addEventListener("change", endEventHandler);
	}
}

async function calculateAndDisplayRoute(directionsService, directionsRenderer) {
	// get icon
	let dataLoc = await getLoc(`${baseUrl}lokasi/lokasiJSON`);
	let iconDestination;
	dataLoc.forEach((dl) => {
		let getValue = document.getElementById("end").value;
		if (`${dl.latitude},${dl.longitude}` == getValue) {
			iconDestination = dl.icon;
		}
	});
	// set icon start and end
	var icons = {
		start: new google.maps.MarkerImage(
			`${baseUrl}assets/images/icon/starting-marker.png`
		),
		end: new google.maps.MarkerImage(
			`${baseUrl}assets/images/icon/icon-marker/${iconDestination}`
		),
	};
	directionsService.route(
		{
			origin: {
				query: document.getElementById("start").value,
			},
			destination: {
				query: document.getElementById("end").value,
			},
			travelMode: google.maps.TravelMode.DRIVING,
		},
		(response, status) => {
			if (status === "OK") {
				directionsRenderer.setDirections(response);
				var leg = response.routes[0].legs[0];
				makeMarker(leg.start_location, icons.start, "start");
				makeMarker(leg.end_location, icons.end, "end");
			} else {
				window.alert("Directions request failed due to " + status);
			}
		}
	);
}

function makeMarker(position, icon, title) {
	new google.maps.Marker({
		position: position,
		map: map,
		icon: icon,
		title: title,
	});
}

function autoComplete() {
	const input = document.getElementById("start");
	const autocomplete = new google.maps.places.Autocomplete(input);
	autocomplete.bindTo("bounds", map);
	autocomplete.setFields(["address_components", "geometry", "icon", "name"]);
}
