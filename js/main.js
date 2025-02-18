document.addEventListener("DOMContentLoaded", function () {
  // Mengambil elemen-elemen yang diperlukan
  const header = document.getElementById("header");
  const navToggle = document.querySelector(".nav-toggle");
  const navigation = document.querySelector(".navigation");
  const navLinks = document.querySelectorAll(".nav-link");
  const dropdownToggle = document.querySelector(
    ".wisata-dropdown .dropdown-toggle"
  );
  const dropdown = document.querySelector(".wisata-dropdown");
  const body = document.body;
  let lastScroll = 0;

  // Pengecekan dan event listener untuk dropdown
  if (dropdownToggle && dropdown) {
    dropdownToggle.addEventListener("click", function (e) {
      e.preventDefault();
      console.log("Dropdown clicked");
      dropdown.classList.toggle("active");
      console.log("Is active:", dropdown.classList.contains("active"));

      // Mengubah rotasi icon
      const dropdownIcon = this.querySelector(".dropdown-icon");
      if (dropdownIcon) {
        dropdownIcon.style.transform = dropdown.classList.contains("active")
          ? "rotate(180deg)"
          : "rotate(0)";
      }
    });

    // Menutup dropdown saat klik di luar
    document.addEventListener("click", function (e) {
      // Hanya jalankan jika bukan click pada dropdown toggle
      if (!dropdownToggle.contains(e.target)) {
        if (!dropdown.contains(e.target)) {
          dropdown.classList.remove("active");
          const dropdownIcon = dropdownToggle.querySelector(".dropdown-icon");
          if (dropdownIcon) {
            dropdownIcon.style.transform = "rotate(0)";
          }
        }
      }
    });
  }

  // Menangani toggle menu navigasi mobile
  navToggle.addEventListener("click", function () {
    this.classList.toggle("active");
    navigation.classList.toggle("open");
    body.classList.toggle("menu-open");
  });

  // Mengatur perilaku header saat scroll
  window.addEventListener("scroll", () => {
    const currentScroll = window.pageYOffset;

    // Menambahkan class scrolled saat halaman di-scroll lebih dari 100px
    if (currentScroll > 100) {
      header.classList.add("scrolled");
    } else {
      header.classList.remove("scrolled");
    }

    // Menyembunyikan/menampilkan header saat scroll
    if (currentScroll > lastScroll && currentScroll > 100) {
      header.style.transform = "translateY(-100%)";
    } else {
      header.style.transform = "translateY(0)";
    }

    lastScroll = currentScroll;
  });

  // Menutup menu saat mengklik di luar area menu
  document.addEventListener("click", (e) => {
    if (!navigation.contains(e.target) && !navToggle.contains(e.target)) {
      navToggle.classList.remove("active");
      navigation.classList.remove("open");
      body.classList.remove("menu-open");
    }
  });

  // Implementasi smooth scroll untuk link navigasi
  document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
    anchor.addEventListener("click", function (e) {
      e.preventDefault();
      const targetId = this.getAttribute("href");

      // Memeriksa apakah target ada dan bukan hanya "#"
      if (targetId !== "#") {
        const target = document.querySelector(targetId);
        if (target) {
          // Mendapatkan tinggi header untuk offset
          const headerHeight = header.offsetHeight;
          const targetPosition =
            target.getBoundingClientRect().top + window.pageYOffset;

          // Scroll ke target dengan kompensasi tinggi header
          window.scrollTo({
            top: targetPosition - headerHeight,
            behavior: "smooth",
          });
        }
      }
    });
  });

  // Menangani perubahan viewport pada mobile (keyboard/orientasi)
  let vh = window.innerHeight * 0.01;
  document.documentElement.style.setProperty("--vh", `${vh}px`);

  // Update variabel viewport height saat ukuran window berubah
  window.addEventListener("resize", () => {
    vh = window.innerHeight * 0.01;
    document.documentElement.style.setProperty("--vh", `${vh}px`);
  });
});

function updateVisitorCounter() {
  fetch("counter.php") // Panggil file counter.php
    .then((response) => response.json())
    .then((data) => {
      // Perbarui elemen dengan ID stat-number
      document.querySelector(".stat-number").textContent =
        data.visitor_counter + "+";
    })
    .catch((error) => console.error("Error fetching visitor counter:", error));
}

// Panggil sekali saat halaman dimuat untuk mengambil data pengunjung
updateVisitorCounter();
