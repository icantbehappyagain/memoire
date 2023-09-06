// document.addEventListener("DOMContentLoaded", function() {
//   var slides = document.querySelectorAll(".slide");
//   var currentSlide = 0;
//   var slideInterval = setInterval(nextSlide, 3000);

//   function nextSlide() {
//     slides[currentSlide].classList.remove("active");
//     currentSlide = (currentSlide + 1) % slides.length;
//     slides[currentSlide].classList.add("active");
//   }
// });


  document.getElementById('next').onclick = function(){
    let lists = document.querySelectorAll('.item');
    document.getElementById('slide').appendChild(lists[0]);
}
document.getElementById('prev').onclick = function(){
    let lists = document.querySelectorAll('.item');
    document.getElementById('slide').prepend(lists[lists.length - 1]);
}
  
