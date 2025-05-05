// Array of welcome texts in different languages
const texts = [
    "Bienvenue",
    "Bienvenido",
    "연락처 양식",
    "Willkommen",
    "Benvenuto",
    "歡迎",
    "いらっしゃいませ"
];

let index = 0;
const welcomeText = document.getElementById('welcome-text');

// Function to change the welcome text with a fade effect
function changeLanguage() {
    // Fade out
    welcomeText.style.transition = 'opacity 0.5s ease-in-out';
    welcomeText.style.opacity = 0;

    setTimeout(() => {
        // Change text
        welcomeText.textContent = texts[index];
        index = (index + 1) % texts.length;
        
        // Fade in
        setTimeout(() => {
            welcomeText.style.opacity = 1;
        }, 50); // Small delay to ensure smooth transition
    }, 500); // Wait for fade out to complete
}

// Change the welcome text every 2 seconds (2000 ms)
setInterval(changeLanguage, 2000);

// Remove the scroll-based animation
document.addEventListener("DOMContentLoaded", () => {
    const steps = document.querySelectorAll('.step');

    const observer = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    // Animate each step with a staggered effect
                    steps.forEach((step, index) => {
                        setTimeout(() => {
                            step.style.transform = 'scale(1)';
                        }, 1000 + index * 800);
                    });

                    observer.unobserve(entry.target); // Stop observing once animation starts
                }
            });
        },
        {
            threshold: 0.5 // Animation starts when 50% of the element is visible
        }
    );

    // Only observe the steps, not the fil element
    steps.forEach(step => observer.observe(step));
});

// Add click event listeners to elements with the 'raise' class
const raiseElements = document.getElementsByClassName('raise');
const workTextElements = document.querySelectorAll('.work-text');
const fil = document.querySelector('.fil');

Array.from(raiseElements).forEach(element => {
    element.addEventListener('click', () => {
        // Reset the vertical line height to 0 before animating
        fil.style.height = '0';
        
        // Animate the vertical line after a small delay to ensure the reset is visible
        setTimeout(() => {
            fil.style.height = '100%';
        }, 50);

        // Transition for work-text elements
        workTextElements.forEach((workText, index) => {
            workText.style.opacity = 0; // Start with opacity 0
            setTimeout(() => {
                workText.style.transition = 'opacity 1s ease-in-out';
                workText.style.opacity = 1; // Fade in to opacity 1
            }, index * 400); // Stagger the animation
        });

        // Transition for work-right figures
        const workRightFigures = document.querySelectorAll('.work-right .figure');
        workRightFigures.forEach((figure, index) => {
            figure.style.opacity = 0; // Start with opacity 0
            setTimeout(() => {
                figure.style.transition = 'opacity 1s ease-in-out';
                figure.style.opacity = 1; // Fade in to opacity 1
            }, index * 400); // Stagger the animation
        });
    });
});

// Config for branches: [angle, distance]
const branchesConfig = [
    { angle: 0, distance: 100 },    // Right
    { angle: 90, distance: 100 },   // Up
    { angle: 180, distance: 100 },  // Left
    { angle: 270, distance: 100 }   // Down
];

let isOpen = false;

document.getElementById("hubTrigger").addEventListener("click", function () {
    const branches = gsap.utils.toArray(".branch");

    if (!isOpen) {
        // Opening animation
        branches.forEach((branch, index) => {
            const { angle, distance } = branchesConfig[index];
            const rad = angle * (Math.PI / 180);
            const x = Math.cos(rad) * distance;
            const y = Math.sin(rad) * distance;

            gsap.to(branch, {
                x: x,
                y: y,
                opacity: 1,
                duration: 0.6,
                ease: "back.out(1.2)"
            });
        });
    } else {
        // Closing animation
        gsap.to(branches, {
            x: 0,
            y: 0,
            opacity: 0,
            duration: 0.4,
            ease: "power1.in"
        });
    }

    isOpen = !isOpen;
});

// Footer entry animation
gsap.from(".footer-ultime", {
    y: 50,
    opacity: 0,
    duration: 1,
    ease: "power2.out",
    scrollTrigger: {
        trigger: ".footer-ultime",
        start: "top 80%",
        toggleActions: "play none none none"
    }
});

// Floating effect on social icons
gsap.to(".social-icon", {
    y: -5,
    duration: 2,
    repeat: -1,
    yoyo: true,
    ease: "sine.inOut"
});

document.addEventListener("DOMContentLoaded", function () {
    const elements = document.querySelectorAll(".animate-on-scroll");
  
    const observer = new IntersectionObserver(
      (entries) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting) {
            entry.target.classList.add("active");
          }
        });
      },
      {
        threshold: 0.5, // L'animation se déclenche quand 50% de l'élément est visible
      }
    );
  
    elements.forEach((el) => observer.observe(el));
  });

document.addEventListener("DOMContentLoaded", () => {
    const title = document.getElementById("work-title");
    const text = "my work so far";
    let index = 0;

    function typeEffect() {
        if (index < text.length) {
            title.textContent += text.charAt(index);
            index++;
            setTimeout(typeEffect, 100); // Adjust typing speed here
        }
    }

    const observer = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    typeEffect();
                    observer.unobserve(title); // Stop observing once animation starts
                }
            });
        },
        {
            threshold: 0.5, // Animation starts when 50% of the h1 is visible
        }
    );

    observer.observe(title);
});

const translations = {
    fr: "Formulaire de Contact",
    ja: "お問い合わせフォーム",
    es: "Formulario de Contacto",
    ko: "연락처 양식",
    zh: "联系表单",
    de: "Kontaktformular",
    it: "Modulo di Contatto"
};

const legend = document.getElementById("contact-legend");
const languages = Object.keys(translations);
let legendIndex = 0;

setInterval(() => {
    legend.style.opacity = "0"; // Fade out
    setTimeout(() => {
        legend.textContent = translations[languages[legendIndex]];
        legendIndex = (legendIndex + 1) % languages.length;
        legend.style.opacity = "1"; // Fade in
    }, 600);
}, 2500);

// Handle scroll behavior for the first section
document.addEventListener("DOMContentLoaded", () => {
    const firstSection = document.querySelector('section.bg-1');
    let lastScrollY = window.scrollY;
    let ticking = false;

    function updateFirstSection() {
        if (window.scrollY > 50) { // Adjust this value to control when the section hides
            firstSection.classList.add('hidden');
        } else {
            firstSection.classList.remove('hidden');
        }
        ticking = false;
    }

    window.addEventListener('scroll', () => {
        lastScrollY = window.scrollY;
        if (!ticking) {
            window.requestAnimationFrame(() => {
                updateFirstSection();
            });
            ticking = true;
        }
    });
});

// Add mouse tracking effect to cards
document.querySelectorAll('.side-projects .card').forEach(card => {
    card.addEventListener('mousemove', (e) => {
        const rect = card.getBoundingClientRect();
        const x = e.clientX - rect.left;
        const y = e.clientY - rect.top;
        
        // Calculate rotation values based on mouse position
        const centerX = rect.width / 2;
        const centerY = rect.height / 2;
        
        // Calculate rotation angles (increased from 20 to 10 for more dramatic effect)
        const rotateX = (y - centerY) / 10;
        const rotateY = (centerX - x) / 10;
        
        // Apply rotation to the card with a slight delay for smoother movement
        requestAnimationFrame(() => {
            card.style.setProperty('--rotateX', `${rotateX}deg`);
            card.style.setProperty('--rotateY', `${rotateY}deg`);
        });
    });
    
    // Reset rotation when mouse leaves
    card.addEventListener('mouseleave', () => {
        requestAnimationFrame(() => {
            card.style.setProperty('--rotateX', '0deg');
            card.style.setProperty('--rotateY', '0deg');
        });
    });
});

// Timeline Animation
const timelineItems = document.querySelectorAll('.timeline-item');
const timelineObserver = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add('active');
            timelineObserver.unobserve(entry.target);
        }
    });
}, { threshold: 0.2 });

timelineItems.forEach(item => {
    timelineObserver.observe(item);
});

  
