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
		// direction();
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
	// console.log('test');
	// add marker
	marker = new google.maps.Marker({
		position: {
			lat: parseFloat(props.lat),
			lng: parseFloat(props.lng),
		},
		icon: `${baseUrl}assets/images/icon/icon-marker/${props.icon}`,
		size: new google.maps.Size(70, 80),
		map: map,
		label: { color: 'black', fontWeight: 'bold',  fontSize: '14px', text: `Kelurahan ${props.namaKelurahan}` }
	});

	// popup window
	infowindow = new google.maps.InfoWindow();
	// event listener Popup Window
	marker.addListener("click", function (event) {
		draw(this, props)
		
	});

	// filter : add event handler when looping
	if (document.querySelector("#kategori")) {
		filter(props, marker);
		
	}
}


function drawButton() {
	return '<div><button>Hello</button></div>';
}

function filter(data, marker) {
	const searchBtn = document.querySelector("#search");
	searchBtn.addEventListener("click", function () {
		const kelurahan = document.querySelector("#kelurahan #kategori").value;
		if (kelurahan == 0) {
			marker.setVisible(true);
		} else {
			if (data.idKelurahan != kelurahan) {
				marker.setVisible(false);
			} else {
				marker.setVisible(true);
			}
		}
	});
}

function draw(marker, props) {
	// console.log(props.dataColumns);
	// console.log(props.dataRows);
	// console.log(props.tahun);
	// console.log(props.data);
	
	// Create the data table.
	var data = new google.visualization.DataTable()
	data.addColumn('string', 'Tahun');
	props.dataColumns.forEach(column => data.addColumn('number', column));
	
	// result : [['tahun', hasilangka1, hasilangka2, dst]] 
	data.addRows(props.dataRows);

	// Set chart options
	var options = {'title':`Hasil Pertanian Kelurahan ${props.namaKelurahan}`,
				   'width':200,
				   'height':150,
				   'bar': {groupWidth: "95%"},
				   'legend': { position: "none" }};
				   
	var node        = document.createElement('div'),
		infoWindow  = new google.maps.InfoWindow(),
		chart       = new google.visualization.ColumnChart(node);

		
		chart.draw(data, options);
		infoWindow.setContent(node);
		infoWindow.open(marker.getMap(),marker);
  }


google.load('visualization', '1.0', {'packages':['corechart']});