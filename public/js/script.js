document.addEventListener('DOMContentLoaded', () => {
  const flashMessage = document.querySelectorAll('.flash-message');
  flashMessage.forEach((message) => {
    message.classList.add('show');
  })
  setTimeout(() => {
    flashMessage.forEach((message) => {
      message.classList.add('hide');
      setTimeout(() => {
        message.style.display = 'none'
      }, 500);
    })
  }, 5000);
});

const map = L.map('map').setView([-3.445884, 114.84076], 17);
L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
  maxZoom: 19,
  attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
}).addTo(map);

fetch('/devices')
  .then(response => response.json())
  .then(data => {
    data.forEach(device => {
      L.marker([device.latitude, device.longitude])
        .addTo(map)
        .bindPopup(`<b>${device.device_name}</b><br>${device.location}`);
    });
  })
  .catch(error => console.error('Error fetching devices:', error));