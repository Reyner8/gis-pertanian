$(document).ready( function () {
  $('#datatable').DataTable();
} );

// add class name 'active'
const currentLoc = location.href;
const menu = document.querySelectorAll('.nav-item');
menu.forEach((e) => {
	if (e.childNodes[1].href === currentLoc) {
		e.classList.add('active')
	}
});


// category - button 'semua'
$('#semua').on('click', function (e) {
	e.preventDefault()
	$('#pills-tips').tab('show')
	$('#pills-berita').tab('show')
})

$(document).ready(function(){
 
  // Initialize select2
  $("#end").select2();

  // Read selected option
  $('#but_read').click(function(){
    var username = $('#end option:selected').text();
    var userid = $('#end').val();
  });
});

$('#carouselExampleControls-1').carousel({
  interval: 4000,
  wrap: true,
  keyboard: true
});
$('#carouselExampleControls-2').carousel({
  interval: 4000,
  wrap: true,
  keyboard: true
});

window.addEventListener("beforeunload", function (e) {
  var confirmationMessage = 'Anda Ingin Keluar ?'
                          + 'Sebelum keluar kami butuh kritik & saran';

  (e || window.event).returnValue = confirmationMessage; //Gecko + IE
  return confirmationMessage; //Gecko + Webkit, Safari, Chrome etc.
});


// Live Search
const searchInput = document.getElementById('searchInput');
const contentBox = document.getElementById('content');
console.log('seeee');
searchInput.addEventListener('input', async function(e) {
  console.log(e.target.value)
  let dataDokter = await getDokter(`${baseUrl}dokter/searchData/${e.value}`);

  dataDokter.forEach(data => {
    contentItem(data);
  });
});

function getDokter(url = '') {
	return fetch(url)
		.then(response => {
			if (response.status == 200) {
				return response.json()
			} else {
				throw new Error(`Something Went Wrong !!!`);
			}
		})
		.then(response => response)
		.catch(error => console.log(error))
}

function contentItem(data) {
  return `<div class="col-md-4 my-3">
  <div class="card profile-card">
     <div class="card-img-container">
        <img class="card-img-top" src="${baseUrl}assets/images/dokter/${data.foto} ?>" alt="Card image cap">
     </div>
     <div class="card-body pt-0">
        <h5 class="card-title mb-1">${data.namaDokter}</h5>
        <p class="card-text">Dokter ${data.namaSpesialis} ?></p>
        <a href="${base_url}dokter/detailDokter/${data.idDokter}" class="btn btn-mod">Detail</a>
     </div>
  </div>
  </div>`;
}



