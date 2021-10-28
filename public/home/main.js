let dayitem = document.querySelector("#days");
let hoursitem = document.querySelector("#hours");
let minitem = document.querySelector("#min");
let secitem = document.querySelector("#sec");
let offer_time = document.getElementById("offer_time").value;
let coutdown = () => {

    let futuredate = new Date(offer_time);
    let currentdate = new Date();
    let mydate = futuredate - currentdate;

    let days = Math.floor(mydate / 1000 / 60 / 60 / 24);
    let hours = Math.floor(mydate / 1000 / 60 / 60) % 24;
    let min = Math.floor(mydate / 1000 / 60) % 60;
    let sec = Math.floor(mydate / 1000) % 60;


    dayitem.innerHTML = days;
    hoursitem.innerHTML = hours;
    minitem.innerHTML = min;
    secitem.innerHTML = sec;

}
coutdown()

setInterval(coutdown, 1000)

function scrolltopback(){
    let scrolltopbutton = document.querySelector("#scrollup");
    window.onscroll = function () {
        var scroll=document.documentElement.scrollTop;
        if(scroll >= 250){
            scrolltopbutton.classList.add('scrollActive');
        }else{
            scrolltopbutton.classList.remove('scrollActive');
        }
    }
    
}
scrolltopback();