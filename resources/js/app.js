require('./bootstrap');
import Alpine from 'alpinejs';
import L from 'leaflet';

window.Alpine = Alpine;

Alpine.start();


let clickteacher;

if (document.getElementById('mapid')) {
    // start map
    var map = L.map('mapid', {attributionControl: false, zoomControl: false});
    var icon = L.icon({iconUrl: "/images/vendor/leaflet/dist/marker-icon.png"});
    icon.options.shadowSize = [0, 0];
    var ONE_HOUR = 60 * 60 * 1000;
    var mapBounds = L.latLngBounds([
        [150 , -150 ],
        [-100 , 100 ]
    ]);

    map.fitBounds(mapBounds);
    map.setMaxBounds(map.getBounds());
    L.tileLayer('img/kaartopleiding.png', {
        maxZoom: 1,
        minZoom: 1,
        tileSize: L.point(980, 580),
        tms: true,
        noWrap: true,
        bounds: mapBounds
    }).addTo(map);
    map.setView(new L.LatLng(0, 165), 0);

    // Get current locations
    fetch('/ajax/getlocations')
        .then(response =>
            response.json().then(data => ({
                    data: data,
                    status: response.status
                })
            )
        .then(teachersWithLocations => {
            teachersWithLocations.data.forEach(function (row) {
                if ((new Date - new Date(row.lastlocation.created_at)) > ONE_HOUR) {
                    alert('docent ' + row.fullname + ' niet gezien');
                } else {
                    var picture = L.divIcon({className: 'leaflet-marker-icon-custom', html: '<img data-teacher="' + row.id + '" src="/storage/' + row.picture + '" style="border: 2px solid ' + row.border  + '" />', iconSize: [55, 55]});
                    L.marker([row.lastlocation.x, row.lastlocation.y], {icon: picture}).addTo(map);
                }
            });
        }));

    // Function click on map
    function onMapClick(e) {
        if (clickteacher) {
            // 2. Add trough store
            fetch('/locations/store', {
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                },
                method: 'POST',
                body: JSON.stringify({
                    _token: token,
                    teacher: clickteacher,
                    x: e.latlng.lat,
                    y: e.latlng.lng
                })
            })
                .then(response => response.json())
                .then(newteacher => {

                    // remove last marker
                    let currentTeachers = document.querySelectorAll('.leaflet-marker-icon-custom img');
                    currentTeachers.forEach(function(teacher) {
                       if (teacher.dataset.teacher == newteacher.id) {
                           teacher.parentNode.remove();
                       }
                    });
                    // add new marker
                    var picture = L.divIcon({className: 'leaflet-marker-icon-custom', html: '<img data-teacher="' + newteacher.id + '" src="/storage/' + newteacher.picture + '" />', iconSize: [55, 55]});
                    L.marker([e.latlng.lat, e.latlng.lng], {icon: picture}).addTo(map);

                    // add new date onclick teacher
                    var d = new Date(newteacher.lastlocation.created_at);
                    document.querySelector('#teacher-' + clickteacher + ' .created_at').innerHTML = 'Laatst gezien: <br> ' + d.getHours() + ":" + d.getMinutes();
                });
        } else {
            alert('je bent vergeten een docent te selecteren');
        }
    }
    map.on('click', onMapClick);
}

function removeClickFromClasslist() {
    let teachers = document.querySelectorAll('.click-teacher');
    teachers.forEach(function (teacher) {
        teacher.classList.remove('click');
    });
}

// click on teacher
let teachers = document.querySelectorAll('.click-teacher');
teachers.forEach(function(teacher) {


    teacher.addEventListener('click', function() {
        clickteacher = teacher.dataset.id;
        removeClickFromClasslist();
        teacher.classList.add('click');
    });
});
