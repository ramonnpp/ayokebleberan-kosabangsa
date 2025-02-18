function showArticle(id) {
  fetch("get_article.php?id=" + id)
    .then((response) => {
      if (!response.ok) {
        throw new Error("Gagal mengambil artikel");
      }
      return response.json();
    })
    .then((data) => {
      if (!data.tanggal || !data.judul || !data.konten) {
        throw new Error("Data artikel tidak lengkap");
      }

      // Format tanggal
      const tanggalUpload = new Date(data.tanggal);
      const formatTanggal = tanggalUpload.toLocaleDateString("id-ID", {
        day: "numeric",
        month: "long",
        year: "numeric",
      });

      // Format konten menjadi paragraf
      const paragraphs = data.konten.split("\n").filter((p) => p.trim() !== "");
      const formattedContent = paragraphs
        .map((p) => `<p>${p.trim()}</p>`)
        .join("");

      // Isi modal dengan konten artikel
      document.getElementById("articleFullContent").innerHTML = `
            <h2 class="article-modal-title">${data.judul}</h2>
            <img src="images/foto/${data.foto}" class="article-image-full" alt="${data.judul}">
            <div class="article-content-full">
                <div class="article-meta">
                    <i class="fa fa-calendar"></i> ${formatTanggal}
                </div>
                ${formattedContent}
            </div>
        `;

      // Tampilkan modal
      document.getElementById("articleModal").style.display = "block";
    })
    .catch((error) => {
      console.error("Error:", error.message);
      alert("Tidak dapat memuat artikel. Silakan coba lagi.");
    });
}

function closeModal() {
  document.getElementById("articleModal").style.display = "none";
}

// Menutup modal saat klik di luar konten
window.onclick = function (event) {
  const modal = document.getElementById("articleModal");
  if (event.target == modal) {
    modal.style.display = "none";
  }
};

// Drag & Drop File Handling
document.addEventListener("DOMContentLoaded", function () {
  const dropZone = document.getElementById("drop-zone");
  const fileInput = document.getElementById("foto");
  const fileName = document.getElementById("file-name");

  ["dragenter", "dragover", "dragleave", "drop"].forEach((eventName) => {
    dropZone.addEventListener(eventName, preventDefaults, false);
    document.body.addEventListener(eventName, preventDefaults, false);
  });

  ["dragenter", "dragover"].forEach((eventName) => {
    dropZone.addEventListener(eventName, highlight, false);
  });

  ["dragleave", "drop"].forEach((eventName) => {
    dropZone.addEventListener(eventName, unhighlight, false);
  });

  dropZone.addEventListener("drop", handleDrop, false);
  fileInput.addEventListener("change", handleFiles, false);

  function preventDefaults(e) {
    e.preventDefault();
    e.stopPropagation();
  }

  function highlight() {
    dropZone.classList.add("drag-over");
  }

  function unhighlight() {
    dropZone.classList.remove("drag-over");
  }

  function handleDrop(e) {
    const dt = e.dataTransfer;
    const files = dt.files;

    if (files.length) {
      fileInput.files = files;
      handleFiles();
    }
  }

  function handleFiles() {
    const file = fileInput.files[0];
    if (file) {
      // Validasi tipe file
      if (!file.type.startsWith("image/")) {
        alert("Hanya file gambar yang diperbolehkan.");
        fileInput.value = ""; // Reset input file
        fileName.textContent = "";
        return;
      }

      fileName.textContent = "File yang dipilih: " + file.name;
    }
  }
});
