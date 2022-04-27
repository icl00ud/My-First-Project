/**
 * Copyright 2020 Google LLC
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *      http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

loadMapsJSAPI();
function runApp() {
  console.log('Maps loaded');
  const map = displayMap();
  const markers = addMarkers(map);
}

function loadMapsJSAPI() {
  const googleMapsAPIKey = 'AIzaSyCy7z0_R4tnPvrBmpZOXi9vvSaWzSKj1rM';
  const googleMapsAPIURI = `https://maps.googleapis.com/maps/api/js?key=${googleMapsAPIKey}&callback=runApp`;

  const script = document.createElement('script');
  script.src = googleMapsAPIURI;
  script.defer = true;
  script.async = true;

  window.runApp = runApp;

  document.head.appendChild(script);
}

function displayMap() {
  const mapOptions = {
    center: { lat:  -26.304516, lng:  -48.843380 },
    zoom: 12
  };
  const mapDiv = document.getElementById('map');
  return new google.maps.Map(mapDiv, mapOptions);
}

function addMarkers(map) {
  const locations = {
    marker: {},
  }
  const markers = [];
  for (const location in locations) {
    const markerOptions = {
      map: map,
      position: locations[location],
      icon: './images/custom_pin.png'
    }
    const marker = new google.maps.Marker(markerOptions);
    markers.push(marker);
  }
  return markers;
}



