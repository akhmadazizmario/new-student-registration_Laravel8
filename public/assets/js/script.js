async function getSurat() {
    try {
        const response = await fetch("https://equran.id/api/surat");
        const data = await response.json();
        renderSurat(data);

        // Tambahkan event listener untuk pencarian
        const searchInput = document.getElementById("searchInput");
        searchInput.addEventListener("input", function () {
            const searchTerm = searchInput.value.toLowerCase();
            const filteredSurat = data.filter((surat) =>
                surat.nama_latin.toLowerCase().includes(searchTerm)
            );
            renderSurat(filteredSurat);
        });
    } catch (error) {
        console.error("Error fetching data:", error);
    }
}

function renderSurat(suratList) {
    const listSurat = document.querySelector(".card-surat-list");
    let cardSurat = "";
    suratList.forEach((surat) => {
        cardSurat += `
            <div class="col-lg-3 col-md-4 col-sm-12">
                <div class="card mb-4 card-surat">
                    <div class="card-body" onclick="location.href='http://127.0.0.1:8000/quran/show?nomorsurat=${surat.nomor}'">
                        <h5 class="card-title">${surat.nomor}. ${surat.nama_latin}</h5>
                        <h3 class="card-subtitle mb-2 text-body-secondary text-muted text-end">${surat.nama}</h3>
                        <p class="card-text text-end">${surat.arti}</p>
                    </div>
                </div>
            </div>
        `;
    });
    listSurat.innerHTML = cardSurat;
}

getSurat();

// async function getSurat() {
//     fetch("https://equran.id/api/surat")
//         .then((response) => response.json())
//         .then((response) => {
//             let cardSurat = "";
//             response.forEach((surat) => {
//                 cardSurat += `
//                 <div class="col-lg-3 col-md-4 col-sm-12">
//                 <div class="card mb-4 card-surat ">
//                     <div class="card-body" onclick="location.href='http://127.0.0.1:8000/quran/show?nomorsurat=${surat.nomor}'">
//                         <h5 class="card-title">${surat.nomor}. ${surat.nama_latin}</h5>
//                         <h3 class="card-subtitle mb-2 text-body-secondary text-muted text-end">${surat.nama}</h3>
//                         <p class="card-text text-end">${surat.arti}</p>
//                     </div>
//                 </div>
//             </div>
//                 `;
//             });
//             const listSurat = document.querySelector(".card-surat-list");
//             listSurat.innerHTML = cardSurat;

//             console.log(response);
//         });
// }

// getSurat();
