document.addEventListener("DOMContentLoaded", function () {
    const modal = document.getElementById("imageModal");
    const images = document.querySelectorAll(".card-img-top");
    const modalImage = document.getElementById("modalImage");
    const closeButton = document.querySelector(".close");

    // Event listener untuk membuka modal saat gambar di-click
    images.forEach((img) => {
        img.addEventListener("click", () => {
            modal.style.display = "flex"; // Menampilkan modal
            modalImage.src = img.src; // Set sumber gambar pada modal
        });
    });

    // Event listener untuk menutup modal saat tombol close di-click
    closeButton.addEventListener("click", () => {
        modal.style.display = "none"; // Menyembunyikan modal
    });

    // Menutup modal jika klik di luar gambar
    window.addEventListener("click", (event) => {
        if (event.target === modal) {
            modal.style.display = "none"; // Menyembunyikan modal saat klik di luar gambar
        }
    });
});
