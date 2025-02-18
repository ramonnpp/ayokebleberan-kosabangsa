
function showPackagePopup(name, price, description) {
    // Set the package name, price, and description in the popup
    document.getElementById("packageName").innerText = name;
    document.getElementById("packagePrice").innerText = "Harga: Rp " + price;
    document.getElementById("packageDescription").innerText = description;
    document.getElementById("packagePopup").style.display = "block";
}

// Menutup popup ketika tombol close diklik
document.getElementById("closePackagePopup").onclick = function() {
    document.getElementById("packagePopup").style.display = "none";
}

// Menutup popup ketika pengguna mengklik di luar konten popup
window.onclick = function(event) {
    var popup = document.getElementById("packagePopup");
    if (event.target == popup) {
        popup.style.display = "none";
    }
}