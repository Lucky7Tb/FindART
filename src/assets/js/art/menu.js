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
                <p class="card-header">${data.job_payment}</p><p style="padding: 15px;">/bulan</p>
                <p class="user">${data.finder}</p>
                <p style="padding: 0 0 15px 0;">${data.job_description}</p>
                <p class="location">${data.province}, ${data.city}</p>
                </div>
                <a class="link" href="detail.php">Detail</a>
            </div>
            `;
        });
        dataLowongan.innerHTML = contentData;
    })