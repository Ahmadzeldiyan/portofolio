document.addEventListener('DOMContentLoaded', () => {

    // --- Sidebar Active Link on Scroll ---
    const sections = document.querySelectorAll('.section');
    const navLinks = document.querySelectorAll('.sidebar-icon');

    const updateActiveLink = () => {
        let currentSectionId = '';
        sections.forEach(section => {
            const sectionTop = section.offsetTop;
            // Set trigger point slightly below the top of the viewport
            if (pageYOffset >= sectionTop - (section.offsetHeight / 3)) {
                currentSectionId = section.getAttribute('id');
            }
        });

        navLinks.forEach(link => {
            link.classList.remove('active');
            // href is like "#home", we need to compare with "home"
            if (link.getAttribute('href').substring(1) === currentSectionId) {
                link.classList.add('active');
            }
        });
    };

    window.addEventListener('scroll', updateActiveLink);


    // --- Gallery Filtering ---
    const filterButtons = document.querySelectorAll('.filter-btn');
    const galleryItems = document.querySelectorAll('.gallery-item');

    filterButtons.forEach(button => {
        button.addEventListener('click', () => {
            const filter = button.getAttribute('data-filter');

            // Update active state on buttons
            filterButtons.forEach(btn => btn.classList.remove('active'));
            button.classList.add('active');

            // Filter gallery items
            galleryItems.forEach(item => {
                const category = item.getAttribute('data-category');
                if (filter === 'all' || filter === category) {
                    // Show item
                    item.classList.remove('hidden');
                    item.style.display = 'block';
                } else {
                    // Hide item
                    item.classList.add('hidden');
                    // We use a timeout to let the CSS transition play
                    setTimeout(() => {
                         if (item.classList.contains('hidden')) {
                           item.style.display = 'none';
                         }
                    }, 500); // Should match CSS transition duration
                }
            });
        });
    });

    // --- Animate Skill Percentages and Bars on Scroll ---
    const skillsSection = document.getElementById('skills');
    const skillCards = document.querySelectorAll('.skill-card');
    let animationTriggered = false;

    const animateSkills = () => {
        skillCards.forEach(card => {
            const percentageElement = card.querySelector('.skill-percentage');
            const progressBar = card.querySelector('.progress-bar');
            const targetPercentage = parseInt(percentageElement.getAttribute('data-percentage'));

            // Animate Progress Bar
            progressBar.style.width = targetPercentage + '%';

            // Animate Percentage Text
            let currentPercentage = 0;
            const animationDuration = 1500; // Sama dengan durasi transisi CSS
            const frameDuration = 1000 / 60; // 60 FPS
            const totalFrames = Math.round(animationDuration / frameDuration);
            const increment = targetPercentage / totalFrames;

            const updatePercentage = () => {
                currentPercentage += increment;
                if (currentPercentage >= targetPercentage) {
                    percentageElement.textContent = targetPercentage + '%';
                    return;
                }
                percentageElement.textContent = Math.ceil(currentPercentage) + '%';
                requestAnimationFrame(updatePercentage);
            };
            
            requestAnimationFrame(updatePercentage);
        });
    };

    // Gunakan Intersection Observer untuk efisiensi yang lebih baik
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting && !animationTriggered) {
                animateSkills();
                animationTriggered = true;
                observer.unobserve(skillsSection); // Berhenti mengamati setelah animasi berjalan
            }
        });
    }, { 
        threshold: 0.2 // Trigger saat 20% dari elemen terlihat
    });

    if (skillsSection) {
        observer.observe(skillsSection);
    }
});