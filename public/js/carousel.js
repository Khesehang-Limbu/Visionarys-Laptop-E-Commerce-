const carousel = document.querySelector(".carousel-body");
const carouselImg = document.querySelector(".carousel-image");
const carouselText = document.querySelector(".carousel-text");
const dots  = document.querySelectorAll(".dot");

function changeCarousel(imageNo){
    const images = ['carousel.png', 'carousel1.png', 'carousel2.png'];
    const text = ['A', 'B', 'C'];

    carousel.classList.add("slide-right");
    carouselImg.querySelector("img").setAttribute("src", `images/${images[imageNo]}`);
    carouselText.innerHTML = text[imageNo];
}

let i = 0;
setInterval(()=>{
    if(i == 3){
        i = 0;
    }
    if(dots[i].classList.contains("active")){
        dots[i].classList.remove("active");
    }
    if(i == 2){
        dots[0].classList.add("active");
    }else{
        dots[i+1].classList.add("active");
    }
    changeCarousel(i);

    setTimeout(()=>{
        carousel.classList.contains("slide-right") ? carousel.classList.remove("slide-right") : "";

    }, 3000);
    i++;
}, 3200);


