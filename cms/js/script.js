let sidebar = document.querySelector('.sidebar');
let togglebtn = document.querySelector('.toggle-btn');

togglebtn.addEventListener('click', () => {
    sidebar.classList.toggle('active')
    
    
})

let currentReview = 0;

function changeReview() {
    const reviews = document.querySelectorAll('.opinia');
    console.log(reviews);
    reviews[currentReview].classList.remove('active');
    currentReview = (currentReview + 1) % reviews.length;
    reviews[currentReview].classList.add('active');
}


changeReview(); // Run it once immediately if needed
window.setInterval(changeReview, 5000);





