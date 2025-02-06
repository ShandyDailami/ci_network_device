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

document.addEventListener('DOMContentLoaded', () => {
  const editBtn = document.querySelectorAll('#edit');
  let selectedId = null;

  editBtn.forEach((btn) => {
    btn.addEventListener('click', (e) => {
      selectedId = btn.dataset.id;

      window.location.href = 'edit/' + selectedId;
    });
  });
});

document.addEventListener('DOMContentLoaded', () => {
  const deleteBtn = document.querySelectorAll('[data-bs-target="#delete"]');
  const confirmBtn = document.getElementById('confirm');
  let selectedId = null;

  deleteBtn.forEach((btn) => {
    btn.addEventListener('click', (e) => {
      selectedId = btn.dataset.id;
    });
  });

  confirmBtn.addEventListener('click', () => {
    window.location.href = 'delete/' + selectedId;
  });
});

const map = L.map('map', {
  center: [-3.445584, 114.84050],
  zoom: 20,
  zoomControl: false,
  dragging: false,
  scrollWheelZoom: false,
  doubleClickZoom: false,
  touchZoom: false,
  boxZoom: false,
  keyboard: false
});

L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
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