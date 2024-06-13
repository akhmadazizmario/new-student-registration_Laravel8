function getURL(e) {
    const pageURL = window.location.search.substring(1);
    const urlVariable = pageURL.split("&");

    for (let i = 0; i < urlVariable.length; i++) {
        const parameterName = urlVariable[i].split("=");
        if (parameterName[0] == e) {
            return parameterName[1];
        }
    }
}

const nomorsurat = getURL("nomorsurat");

function getSurat() {
    fetch(`https://equran.id/api/surat/${nomorsurat}`)
        .then((response) => response.json())
        .then((response) => {
            // judul surat
            const judulSurat = document.querySelector(".judul-surat");
            const cardJudulSurat = `
            <strong>${response.nama_latin} - ${response.nama} </strong>
                        <p>${response.jumlah_ayat} (${response.arti})</p>
                        <button class="btn btn-primary audio-button-play"><i class="bi bi-play-circle-fill"></i> Dengarkan</button>
                        <button class="btn btn-danger hidden-button audio-button-pause"><i class="bi bi-stop-circle-fill"></i> Stop</button>
                        <audio class="audio-tag" src="${response.audio}"></audio>
            `;
            judulSurat.innerHTML = cardJudulSurat;

            //play and pause audio
            const buttonPlay = document.querySelector(".audio-button-play");
            const buttonPause = document.querySelector(".audio-button-pause");
            const audioSurat = document.querySelector(".audio-tag");

            // play
            buttonPlay.addEventListener("click", function () {
                buttonPlay.classList.add("hidden-button");
                buttonPause.classList.remove("hidden-button");
                audioSurat.play();
            });
            //pause
            buttonPause.addEventListener("click", function () {
                buttonPause.classList.add("hidden-button");
                buttonPlay.classList.remove("hidden-button");
                audioSurat.pause();
            });
            // end judul surat

            //isi Surat
            const cardIsiSurat = document.querySelector(".card-isi-surat");
            const surat = response.ayat;
            let isiSurat = "";
            surat.forEach((s) => {
                isiSurat += `
                <div class="card mb-3 ">
                    <div class="card-body">
                        <p>${s.nomor}.</p>
                        <h2 class="text-end">${s.ar}</h2>
                        <p>${s.tr}</p>
                        <p>${s.idn}</p>
                    </div>
                </div>
                `;
            });
            cardIsiSurat.innerHTML = isiSurat;

            // event listener for search input
            const searchInput = document.getElementById("searchInput");
            searchInput.addEventListener("input", function () {
                const query = searchInput.value;
                filterAyat(query, surat);
            });
        });
}

function filterAyat(query, surat) {
    const cardIsiSurat = document.querySelector(".card-isi-surat");
    let filteredSurat = "";

    surat.forEach((s) => {
        if (s.nomor.toString().includes(query)) {
            filteredSurat += `
            <div class="card mb-3">
                <div class="card-body">
                    <p>${s.nomor}.</p>
                    <h2 class="text-end">${s.ar}</h2>
                    <p>${s.tr}</p>
                    <p>${s.idn}</p>
                </div>
            </div>
            `;
        }
    });

    cardIsiSurat.innerHTML = filteredSurat;
}

getSurat();
