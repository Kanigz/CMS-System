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


changeReview();
window.setInterval(changeReview, 5000);

document.getElementById('show-all-btn').addEventListener('click', function() {
    window.location.href = 'all-posts.html'; // Przekierowanie na stronę ze wszystkimi wpisami
});

const containers = document.querySelectorAll('.container');

const observer = new IntersectionObserver(entries => {
  entries.forEach(entry => {
      if (entry.isIntersecting) {
          entry.target.classList.add('active');
      }
  });
});

containers.forEach(container => {
  observer.observe(container);
});




