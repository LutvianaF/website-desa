// Dropdown on hover (desktop)
document.addEventListener("DOMContentLoaded", function () {
  const dropdowns = document.querySelectorAll(".nav-item.dropdown");

  dropdowns.forEach((dropdown) => {
    dropdown.addEventListener("mouseenter", function () {
      const menu = this.querySelector(".dropdown-menu");
      if (menu) {
        menu.style.display = "block";
      }
    });

    dropdown.addEventListener("mouseleave", function () {
      const menu = this.querySelector(".dropdown-menu");
      if (menu) {
        menu.style.display = "none";
      }
    });
  });
});

document.addEventListener("DOMContentLoaded", () => {
  const stats = document.querySelectorAll(".stat-number");
  stats.forEach((stat) => {
    const value = stat.getAttribute("data-value");
    stat.style.width = value + "%"; // lebar sesuai angka
  });
});

const sections = document.querySelectorAll('.reveal');

  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add('active');
      }
    });
  }, {
    threshold: 0.2
  });

  sections.forEach(section => {
    observer.observe(section);
  });

  function toggleLi(id) {
    const box = document.getElementById(id);
    const icon = document.getElementById("icon-" + id);

    if (box.style.display === "block") {
      box.style.display = "none";
      icon.classList.remove("rotate");
    } else {
      box.style.display = "block";
      icon.classList.add("rotate");
    }
  }