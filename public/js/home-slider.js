const prevBtn = document.querySelector('.prev-btn');
const nextBtn = document.querySelector('.next-btn');
const sliderTrack = document.querySelector('.slider-track');

let currentIndex = 0;
const items = document.querySelectorAll('.slider-item');
const itemWidth = items[0].offsetWidth;
const totalItems = items.length;

// Clone the first and last items to make an infinite loop effect
const firstItemClone = items[0].cloneNode(true);
const lastItemClone = items[totalItems - 1].cloneNode(true);

// Append the cloned items to the slider track
sliderTrack.appendChild(firstItemClone);
sliderTrack.insertBefore(lastItemClone, items[0]);

// Update the total width of the slider track to account for the cloned items
sliderTrack.style.width = `${(totalItems + 2) * itemWidth}px`;

// Move the slider to the first actual item
sliderTrack.style.transform = `translateX(-${itemWidth}px)`;

let isTransitioning = false;

// Function to handle next slide
nextBtn.addEventListener('click', () => {
    if (isTransitioning) return;
    isTransitioning = true;

    currentIndex++;
    sliderTrack.style.transition = 'transform 0.5s ease';
    sliderTrack.style.transform = `translateX(-${(currentIndex + 1) * itemWidth}px)`;

    sliderTrack.addEventListener('transitionend', () => {
        if (currentIndex === totalItems) {
            // If at the last cloned item, jump to the real first item
            sliderTrack.style.transition = 'none';
            currentIndex = 0;
            sliderTrack.style.transform = `translateX(-${itemWidth}px)`;
        }
        isTransitioning = false;
    });
});

// Function to handle previous slide
prevBtn.addEventListener('click', () => {
    if (isTransitioning) return;
    isTransitioning = true;

    currentIndex--;
    sliderTrack.style.transition = 'transform 0.5s ease';
    sliderTrack.style.transform = `translateX(-${(currentIndex + 1) * itemWidth}px)`;

    sliderTrack.addEventListener('transitionend', () => {
        if (currentIndex === -1) {
            // If at the first cloned item, jump to the real last item
            sliderTrack.style.transition = 'none';
            currentIndex = totalItems - 1;
            sliderTrack.style.transform = `translateX(-${totalItems * itemWidth}px)`;
        }
        isTransitioning = false;
    });
});
