const provinsi = document.getElementById('provinsi');
const kota = document.getElementById('kota');

getProvinsi();

function getProvinsi() {
    fetch(`${baseUrl}/src/api/location/getProvince.php`, {
          method: 'GET',
      })
          .then(function (response) {
              return response.json();
          })
          .then(function (response) {
              if (response.code > 200) {
                  throw new Error(response.message);
              }
  
              let content = '';
              response.data.forEach((data) => {
                  content += `
                    <option value="${data.id}">${data.name}</option>
                `;
              });
              provinsi.innerHTML = content;
          });
}

provinsi.addEventListener("change", function () {
fetch(`${baseUrl}/src/api/location/getCity.php?province_id=` + provinsi.value, {
    method: "GET",
})
    .then(function (response) {
    return response.json();
    })
    .then (function (response) {
    if (response.code > 200) {
        throw new Error(response.message);
    }

    let content = "";
    response.data.forEach(data => {
        content += `
        <option value="${data.id}">${data.name}</option>
        `
    });
    kota.innerHTML = content;
    })
})

function getJob() {
    const dataLowongan = document.getElementById("data-lowongan");

    fetch("http://localhost/findart/src/api/art/get.php", {
        method: "GET",
    })
        .then(function (response) {
            return response.json();
        })
        .then(function (response) {
            let contentData = "";

            response.data.forEach((data) => {
                contentData += `
                    <div class="card">
                        <div class="left">
                            <img src="${data.thumbnail}" alt="thumbnail.jpg">
                            <p class="card-header">Rp. ${data.job_payment}</p><p style="padding: 30px;">/bulan</p>
                            <p class="user">${data.finder}</p>
                            <p class="location">${data.province}, ${data.city}</p>
                        </div>
                        <a class="link primary-button" href="detail.php?id=${data.id}">Detail</a>
                    </div>
                `;
            });
            dataLowongan.innerHTML = contentData;
        })
}

function getDetail(id) {
    return fetch(`http://localhost/findart/src/api/art/detail.php?id=${id}`, {
        method: "GET"
    })
    .then(function (response) {
        return response.json();
    });
}